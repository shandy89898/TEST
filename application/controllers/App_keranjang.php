<?php

class App_keranjang extends App_controller{


	
	public function __construct(){
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->model('ProdukGambar_model');
		$this->load->model('Keranjang_model');
	}
	public function index(){
		$user_login = $this->Base_model->get_userLogin();
		$data = [];
		$data['data_keranjang'] = $this->Keranjang_model->get_many(['user_beli'=>$user_login]);
		$data['total_hargaKeranjang'] = $this->Keranjang_model->get_totalHarga(['user_beli' => $user_login ]);
		$this->view('App_keranjang/index', $data);
	}
	public function tambah_item_keranjang( $id_produk ){

		$row_produk = $this->Produk_model->get_single(['id_produk'=> $id_produk]);


		$tambah_data = $this->Keranjang_model->tambah( $row_produk );
		$this->session->set_flashdata('tambah_data', $tambah_data['msg']);
		redirect('App_keranjang');
	}

}