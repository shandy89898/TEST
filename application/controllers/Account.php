



<?php 

class Account extends Auth_controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->view('Account/index');
	}

	public function kode_verifikasi(){
		$this->view('Account/kode_verifikasi');

	}

	public function aktivasi_akun(){
		echo "coming soon aktivasi_akun";
	}

	public function lupa_password(){
		echo "coming soon lupa_password";

	}


}