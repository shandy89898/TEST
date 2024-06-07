<?php 


class Admin_produk extends Admin_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Kategori_model');
		$this->load->model('Produk_model');
	}

	public function index(){

		$data = []; 	
		$data['data_produk'] = $this->Produk_model->get_many();
		$data['data_kategori'] = $this->Kategori_model->get_many(['status' => 'ACTIVE']);
		$this->view( 'Admin_produk/index', $data );
	}


	public function tambah(){
		
		//Data formnya ada di modal di index 
		if ( $this->input->post('submit') ) {

			$tambah_produk = $this->Produk_model->tambah();
			$msg = $tambah_produk['msg'];
			$this->session->set_flashdata('produk_model', $msg);

			redirect('Admin_produk');
		}
	}


	public function update( $id_produk ){

		// Cek apakah id produk yang ingin di update itu ada atau tidak di tabel. Jika dia tidak ada maka jangan biarkan dia akses form ini
		$row_produk = $this->Produk_model->get_single(['id_produk' => $id_produk ]);
		if ( empty($row_produk) ) {
			$this->session->set_flashdata('update_produk', 'Produk yang ingin di update tidak terdaftar');
			redirect('Admin_produk');
			die;
		}

		
		if ( $this->input->post('submit') ) {

			$update_produk = $this->Produk_model->update( $id_produk );
			$msg = $update_produk['msg'];
			$this->session->set_flashdata('produk_model', $msg);

			redirect('Admin_produk/update/'.$id_produk);
		}

		$data = [];
		$data['row_produk'] = $row_produk;
		$data['data_kategori'] = $this->Kategori_model->get_many(['status' => 'ACTIVE']);
		$this->view('Admin_produk/update', $data);

	}





	public function delete_data( $id_produk ){

		$hapus_row = $this->DataSafe_model->delete_safe( 'data_produk',["id_produk" => $id_produk]);
		$msg = $hapus_row['msg'];

		$this->session->set_flashdata('delete_safe', $msg);

		redirect('Admin_produk');
	}

	public function restore_data( $id_produk ){

		$hapus_row = $this->DataSafe_model->restore_safe( 'data_produk',["id_produk" => $id_produk]);
		$msg = $hapus_row['msg'];

		$this->session->set_flashdata('restore_safe', $msg);

		redirect('Admin_produk');
	}

}







