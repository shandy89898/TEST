<?php  


class Admin_template_fitur extends Admin_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('templateFitur_model');
	}
	public function index(){
		$data = [];
		$data['data_template'] = $this->templateFitur_model->get_many();
		$this->view( 'Admin_template_fitur/index', $data );
	}
	public function tambah(){	
		if ( isset($_POST['submit']) ) {
			$tambah_data = $this->templateFitur_model->tambah();

			$this->session->set_flashdata('tambah_data', $tambah_data['msg']);
			redirect('Admin_template_fitur');			

		}
	}



}