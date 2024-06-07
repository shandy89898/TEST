<?php  
class Admin_fitur extends Admin_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Menu_model');
		$this->load->model('JenisFitur_model');
		$this->load->model('Fitur_model');
		$this->load->model('FiturIcon_model');
		$this->load->model('TemplateFitur_model');
	}
	public function index(){
		$data = [];
		$data['data_menu'] = $this->Menu_model->get_many();
		$data['data_template_fitur'] = $this->TemplateFitur_model->get_many();
		$data['data_jenis_fitur'] = $this->JenisFitur_model->get_many();
		$data['data_fitur'] = $this->Fitur_model->get_many();
		$this->view( 'Admin_fitur/index', $data );
	}
	public function tambah(){	
		if ( isset($_POST['submit']) ) {
			$tambah_data = $this->Fitur_model->tambah();
			
			$this->session->set_flashdata('tambah_data', $tambah_data['msg']);
			redirect('Admin_fitur');			
		}
	}

	public function update_icon( $id_fitur ){
		$data = [];
		$this->view( 'Admin_fitur/update_icon', $data );

	}
}