<?php 


class Admin_level extends Admin_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Level_model');
	}		

	public function index(){

		$data = [];
		$data['data_level'] = $this->Level_model->get_many();
		$this->view( 'Admin_level/index', $data);
	}
	public function tambah(){
		if ( $this->input->post('submit') ) {
			$tambah_level = $this->Level_model->tambah();
			$msg = $tambah_level['msg'];
			$this->session->set_flashdata('tambah_level', $msg);

			redirect('Admin_level');
		}
	}


	public function delete_data( $id_level ){

		$hapus_row = $this->DataSafe_model->delete_safe( 'data_level',["id_level" => $id_level]);
		$msg = $hapus_row['msg'];

		$this->session->set_flashdata('delete_safe', $msg);

		redirect('Admin_level');
	}
		public function restore_data( $id_level ){

		$hapus_row = $this->DataSafe_model->restore_safe( 'data_level',["id_level" => $id_level]);
		$msg = $hapus_row['msg'];

		$this->session->set_flashdata('restore_safe', $msg);

		redirect('Admin_level');

	}


}


