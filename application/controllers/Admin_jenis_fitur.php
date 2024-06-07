<?php  
class Admin_jenis_fitur extends Admin_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Menu_model');
		$this->load->model('JenisFitur_model');
	}
	public function index(){
		$data = [];
		$data['data_menu'] = $this->Menu_model->get_many();
		$data['data_jenis_fitur'] = $this->JenisFitur_model->get_many();
		$this->view( 'Admin_jenis_fitur/index', $data );
	}
	public function tambah(){	
		if ( isset($_POST['submit']) ) {
			$tambah_data = $this->JenisFitur_model->tambah();
	
			$this->session->set_flashdata('tambah_data', $tambah_data['msg']);
			redirect('Admin_jenis_fitur');			
		}
	}
}