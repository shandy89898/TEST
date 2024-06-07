<?php 


class Admin_kategori extends Admin_controller{

	public function __construct(){
		parent::__construct();

		$this->load->model('Kategori_model');
	}
	public function index(){

		$data = [];
		$data['data_kategori'] = $this->Kategori_model->get_many();
		$this->view( 'Admin_kategori/index', $data );
	}
	public function tambah(){

		//Data formnya dari modal di index 
		if ( $this->input->post('submit') ) {
			$tambah_kategori = $this->Kategori_model->tambah();
			$msg = $tambah_kategori['msg'];
			$this->session->set_flashdata('update_kategori', $msg);

			redirect('Admin_kategori');
		}
	}


	public function update( $id_kategori ){

		// Cek apakah id kategori yang ingin di update itu ada atau tidak di tabel. Jika dia tidak ada maka jangan biarkan dia akses form ini
		$row_kategori = $this->Kategori_model->get_single(['id_kategori' => $id_kategori ]);
		if ( empty($row_kategori) ) {
			$this->session->set_flashdata('update_kategori', 'kategori yang ingin di update tidak terdaftar');
			redirect('Admin_kategori');
			die;
		}

		// Yang di update adalah nama dan deskripsi
		if ( $this->input->post('submit') ) {
			$update_kategori = $this->Kategori_model->update( $id_kategori );
			$msg = $update_kategori['msg'];
			$this->session->set_flashdata('update_kategori', $msg);

			redirect('Admin_kategori/update/'.$id_kategori);
		}

		$data = [];
		$data['row_kategori'] = $row_kategori;
		$this->view('Admin_kategori/update', $data);

	}



	public function delete_data( $id_kategori ){

		$hapus_row = $this->DataSafe_model->delete_safe( 'data_kategori',["id_kategori" => $id_kategori]);
		$msg = $hapus_row['msg'];

		$this->session->set_flashdata('delete_safe', $msg);

		redirect('Admin_kategori');
	}
	public function restore_data( $id_kategori ){

		$hapus_row = $this->DataSafe_model->restore_safe( 'data_kategori',["id_kategori" => $id_kategori]);
		$msg = $hapus_row['msg'];

		$this->session->set_flashdata('restore_safe', $msg);

		redirect('Admin_kategori');

	}
}


