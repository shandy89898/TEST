<?php 

class Auth extends Auth_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Account_model');
	}
	public function index(){
		//Tampilan form login

		$this->view('Auth/index');
	}
	public function login(){
		if ( $this->input->post('user') ) {
			$login = $this->Account_model->login();
			if ( $login['status'] == true) {
				//Login berhasil, maka buat sessi user login dan arahkan ke Admin Dashboard 
				$row_db = $login['row_db'];
				$this->Base_model->set_sesi_loginUser( $row_db );
				$this->session->set_flashdata('msg_login', 'Berhasil login, Selamat datang ' . $row_db['nama'] );
				redirect('App_profile');
			}else{
				//Login gagal, maka kembalikan ulang ke index Auth
				$msg = $login['msg'];
				$this->session->set_flashdata('msg_login', $msg);
				redirect('Auth');
			}
		}
	}

	public function sign(){	
		if ( $this->input->post('user') ) {
			$sign = $this->Account_model->sign();

			//Oper ke halaman login
			$this->session->set_flashdata('Auth_sign', $sign['msg']);
			
			if ( $sign['status'] == true ) {
				redirect( 'Auth' );
			}else{
				redirect( 'Auth#sign_page' );

			}
		}
	}
}