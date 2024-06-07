<?php  

class Account_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}


	public function login(){
		//Cek dengan user bisa login bisa dengan user ( nomor desa ) atau email 
		$user_login = $this->input->post('user', TRUE);
		$pass_login = $this->input->post('password', TRUE);

		$response = [];
		$db_user = [];
		
		$sql = "SELECT * FROM data_user WHERE user = '$user_login' OR email = '$user_login'";

		$db_user = $this->db->query($sql)->row_array();
		
		if ( $db_user != null ) {
			$user_db = $db_user['user'];
			$pass_db = $db_user['password'];

			if ( $pass_login == $pass_db ) {

				$response['status'] = true;
				$response['msg'] = "Berhasil login";
				$response['row_db'] = $db_user;
				
			}else{
				$response['status'] = false;
				$response['msg'] = "Gagal login, Password salah!!";
			}
		}else{
			$response['status'] = false;
			$response['msg'] = "Gagal login, User belum terdaftar!!";
		}

		return $response;
	}

	public function login_admin(){
		$response = [];
		$login_user = $this->login();
		if ( $login_user['status'] ) {
			$db_user = $login_user['row_db'];
			// Cek level apakah user yang login tersebut adalah admin atau bukan levelnya
			if ( $db_user['level'] == "admin" ) {
				$response['status'] = true;
				$response['msg'] = "Login admin berhasil dilakukan!!";
				$response['row_db'] = $db_user;
			}else{
				$response['status'] = false;
				$response['msg'] = "Akun kamu bukan akun admin!!";
			}
		}else{
			$response = $login_user;
		}

		return $response;
	}

	public function sign(){
		//Untuk sign ini kita menggunakan method dari User_model
		return $this->User_model->tambah();
	}
	

}

