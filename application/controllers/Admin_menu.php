<?php 


class Admin_menu extends Admin_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Menu_model');
	}		

	public function index(){

		$data = [];
		$data['data_menu'] = $this->Menu_model->get_many();
		$this->view( 'Admin_menu/index', $data);
	}
	public function tambah(){

		if ( isset($_POST['submit']) ) {
			$tambah_level = $this->Menu_model->tambah();
			$msg = $tambah_level['msg'];
			$this->session->set_flashdata('tambah_level', $msg);

			redirect('Admin_menu');
		}
	}

}


