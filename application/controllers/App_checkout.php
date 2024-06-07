<?php

class App_checkout extends App_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->model('ProdukGambar_model');
		$this->load->model('Keranjang_model');
		$this->load->model('Transaksi_model');
		$this->load->model('User_model');

		//Jika tidak ada paramter untuk id produk yang di transajsujab maka tidak boleh ke controller sini 
		if ( !($this->session->userdata('id_keranjang_banyak')) && !isset($_POST['id_keranjang_banyak']) ) {
			$this->session->set_flashdata('Transaksi', 'Tidak ada keranjang item yang di transaksikan!');
			redirect('App_keranjang');
		}
	}


	private function siapkan_data( $id_keranjang_banyak ){
		// $_POST['id_keranjang dikirim dari form form pada halaman yang dilewati terkait ']
		$user_login = $this->Base_model->get_userLogin();
		$total_harga = 0;
		$total_pesanan = 0;
		$data_checkout_produk = [];
		foreach ( $id_keranjang_banyak as $id_keranjang) {
			$row_keranjang = $this->Keranjang_model->get_single(['id_keranjang' => $id_keranjang ]);
			$total_harga_item = $row_keranjang['total_harga'];
			$total_harga += $total_harga_item;
			$total_pesanan += $row_keranjang['banyak_item'];
			$data_checkout_produk[] = $row_keranjang;
		}

		$result = [
			'user_beli' => $user_login,
			'total_harga' => $total_harga,
			'total_pesanan' => $total_pesanan,
			'data_checkout_produk' => $data_checkout_produk
		];

		return $result;
	}

	public function index(){



		$data_param = $this->siapkan_data($_POST['id_keranjang_banyak']);
		$user_beli = $data_param['user_beli'];
		$data_checkout_produk = $data_param['data_checkout_produk'];
		$total_pesanan = $data_param['total_pesanan'];
		$total_harga = $data_param['total_harga'];

		$data = [];
		$data['row_user'] = $this->User_model->get_single(['user' => $user_beli]);
		$data['data_checkout_produk'] = $data_checkout_produk;
		$data['total_harga'] = $total_harga;
		$data['total_pesanan'] = $total_pesanan;
		$this->view('App_checkout/index', $data);
	}
	public function validasi_transaksi(){

		//Cek apakah user yang ingin melakukan transaksi merupakan user dengan account yang verif 
		$cek_user_verif = $this->User_model->cek_user_verif(); //Coming soon
		if ( $cek_user_verif['status'] == true ) {
			//Jika akunnya verif, lanjutkan ke proses masukkan ke transaksi
			$this->session->set_userdata('id_keranjang_banyak', $_POST['id_keranjang_banyak']);
			$this->session->set_userdata('token_transaksi', uniqid());
			redirect('App_checkout/tambah_transaksi');
		}else{
			$this->session->set_flashdata('Transaksi', 'Tidak bisa melakukan transaksi, Akun belum verifikasi!');
			redirect('App_keranjang');
		}
	}
	public function tambah_transaksi(){
		//Tambah transaksi dilakukan jika terdapat session token_transaksi
		if ( !$this->session->userdata('token_transaksi') ) {
			//Jika tidak terdapat token transaksi, maka tidak bisa menambahka transaksi baru dan tendang ke halaman keranjang
			$this->session->set_flashdata('Transkasi', 'Transaksi tidak valid!');
			redirect('App_keranjang');
			die;
		}

		$id_keranjang_banyak = $this->session->userdata('id_keranjang_banyak');
		$data_param = $this->siapkan_data( $id_keranjang_banyak );

		$tambah_transaksi = $this->Transaksi_model->tambah( $data_param );

		//Mengahapus izin transaksi agar dari awal jika ada yang mau masuk secara paksa
		$this->session->set_userdata('token_transaksi', '');
		$this->session->set_userdata('id_keranjang_banyak', '');

		$this->session->set_flashdata('Transaksi Proses',$tambah_transaksi['msg']);
		if ( $tambah_transaksi['status'] == true ) {
			// Jika transaksi berhasil ditambahkan, maka hapus session token transaksinya agar tidak melakukan transaksi lagi secara redundan dan agar menghindari konflik error data 
			$id_transaksi_new = $tambah_transaksi['id_transaksi_new'];
			redirect('Pembayaran/index/'.$id_transaksi_new);
		}else{
			redirect('App_keranjang');
		}

	}








	//Saat menambahkan data produk ke keranjang
	public function tambah_item_keranjang( $id_produk ){

		$tambah_data = $this->Keranjang_model->tambah( $id_produk );
		$this->session->set_flashdata('tambah_data', $tambah_data['msg']);
		redirect('App_checkout');
	}

}