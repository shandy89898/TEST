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

		$this->Base_model->cek_sesi_loginAdmin();
	}
	
}

//Jika controllernya itu berurusan dengan aktivitas account
class Account_controller extends ShandyApps{

	//Jika viewnya itu pada halaman auth untuk portal end user, login dan sign ( Satu halaman dengan js )
	public function view( $file, $data = [] ){
		$data['data_sidebar_admin'] = $this->Base_model->data_sidebar_admin;
		$this->load->view('template/header_account', $data);
		$this->load->view('template/modal_aplikasi', $data);

		$this->load->view( $file, $data);
		$this->load->view('template/footer_auth', $data);
	}

}

//Jika controllernya itu berurusan dengan aktivitas auth 
class Auth_controller extends ShandyApps{

	//Jika viewnya itu pada halaman auth untuk portal end user, login dan sign ( Satu halaman dengan js )
	public function view( $file, $data = [] ){
		$data['data_sidebar_admin'] = $this->Base_model->data_sidebar_admin;
		$this->load->view('template/header_auth', $data);
		$this->load->view('template/modal_aplikasi', $data);
		$this->load->view( $file, $data);
		$this->load->view('template/footer_auth', $data);
	}

}

class Landing_controller extends ShandyApps{
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Account_model');
		$this->load->model('Produk_model');
		$this->load->model('Produk_model');
		$this->load->model('ProdukFitur_model');
		$this->load->model('Menu_model');
		$this->load->model('JenisFitur_model');
		$this->load->model('Fitur_model');
		$this->load->model('FiturIcon_model');
		$this->load->model('TemplateFitur_model');
	}

	public function view( $file, $data = [] ){

		$this->load->view('template/header_landing', $data);
		$this->load->view('template/modal_aplikasi', $data);

		$this->load->view( $file, $data);
		$this->load->view('template/footer_landing', $data);
	}

}


//Untuk controller yang berkaitan dengan App ketika user account sudah login dan akunnya sudah di verifikasi
class App_controller extends ShandyApps{
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Account_model');
		$this->load->model('Produk_model');

		//Cek sesi login user, jika tidak ada maka tidak boleh akses fitur fitur cntroller yang nyambung ke controller ini
		$this->Base_model->cek_sesi_loginUser();
	}

	public function view( $file, $data = [] ){
		$data['data_indicator'] = $this->Base_model->data_indicator;
		$data['data_menu'] = [];

		$this->load->view('template/header_app', $data);
		$this->load->view('template/modal_aplikasi', $data);

		$this->load->view('template/sidebar_app', $data);
		$this->load->view( $file, $data);
		$this->load->view('template/footer_app', $data);
	}

}

