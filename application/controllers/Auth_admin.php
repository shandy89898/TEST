<?php 

class Auth_admin extends Auth_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Account_model');
	}

	public function index(){
		//Tampilan form login
		$this->view('Auth_admin/index');
	}
	public function login(){
		if ( $this->input->post('user') ) {

			$login_admin = $this->Account_model->login_admin();
			if ( $login_admin['status']  == true) {
				//Login berhasil, maka buat sessi admin login dan arahkan ke Admin Dashboard 
				$row_db = $login_admin['row_db'];

				$this->Base_model->set_sesi_loginAdmin( $row_db );
				$this->session->set_flashdata('msg_login', 'Berhasil login admin, Selamat datang ' . $row_db['nama'] );
				redirect('Admin_dashboard');
			}else{
				//Login gagal, maka kembalikan ulang ke index Auth_admin
				$msg = $login_admin['msg'];
				$this->session->set_flashdata('msg_login', $msg);
				redirect('Auth_admin');
			}
		}
	}

}