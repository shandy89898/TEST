<?php 


class App_aktivasi extends App_controller{

	private $user_login = false;
	public function __construct(){
		parent::__construct();

		$this->load->model('UserAktivasi_model');
		$this->load->model('UserToken_model');
		// Controller ini hanya bisa diakses oleh :
		/*
		- Akun yang sudah berhasil login
		- Akun yang belum verifikasi

		Semuanya harus terpenuhi, jika ada 1 saja yang terpenuhi maka langsung arahakna ke Login
		*/

		//Cek apakah user sudah login atau belum. Jika dia belum login, maka tendang ke halaman login
		if ( !$this->session->userdata('user_login') ) {
			
			$this->session->set_flashdata('msg_login', 'Kamu belum login!');
			redirect('Auth');
		}

		//Jika user sudah login, maka cek apakah dia sudah verfikasi atau belum
		$user_login = $this->session->userdata('user_login');
		$cek_user_aktivasi = $this->UserAktivasi_model->get_single([ 'user_account' => $user_login ]);

		//Cek apakah user sudah aktivasi atau belum. Jika dia sudah aktivasi, maka tendang ke halaman login ( Agar prosesnya runut )
		if (  count($cek_user_aktivasi) > 0 ) {
			$this->session->set_flashdata('msg_login', 'Akun kamu sudah aktif!');
			redirect('Auth');
		}

		//Jika user belum melakukan aktivasi dan sudah login, maka lakukan aktivasi di index



	}
	public function index(){
		echo "Verifikasi user akun dengan menggunakan token";
	}

}
