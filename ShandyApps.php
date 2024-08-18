<?php 


class ShandyApps extends CI_Controller{


}



//jika controllernya ituberurusan dengan aktivitas admin dan sidebar
class Admin_controller extends ShandyApps{
	//Jika viewnya menggun akan sidebar
	public function view( $file, $data = [] ){
		$data['data_sidebar_admin'] = $this->Base_model->data_sidebar_admin;
		$this->load->view('template/header_admin', $data);
		$this->load->view('template/modal_aplikasi', $data);
		$this->load->view('template/sidebar_admin', $data);
		$this->load->view( $file, $data);
		$this->load->view('template/footer_admin', $data);

		// $this->Base_model->cek_sesi_loginAdmin();
	}
	
}



