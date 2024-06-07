<?php 

class User_model extends CI_Model{

	public function get_many( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()
		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$this->db->where($key_kolom, $value);
		}

		//Mengurutkan berdasrkan status yang ACTIVE dan waktunya yang terbaru/terbesar
		$this->db->order_by("CASE WHEN status = 'ACTIVE' THEN 1 ELSE 2 END", 'ASC'); //Mengurutkan berdasrkan status yang ACTIVE
		$this->db->order_by('waktu', 'DESC');  // Mengurutkan berdasarkan kolom waktu


		$result = $this->db->get('data_user')->result_array();
			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
		if ( $result == null ) {
			
			$result = [];
		}
		return $result; //Mengembalikan pasti array multi dimensi,
	}
	public function get_single( $where = []   ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Jadi untuk mengambil single ini harus ada kondisi, gak boleh tidak ada 
		//Mengembalikan 1 dimensi dengan methode ->row_array()
		if ( count($where) > 0 ) {
					//Jika ada kondisinya 
			foreach ($where as $key => $value) {
				$this->db->where( $key, $value );
			}
			$result = $this->db->get('data_user')->row_array(); 
		}else{
			$result = [];
		}
			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
		if ( $result == null ) {
			$result = [];
		}
		return $result; //Mengembalikan pasti array 1 dimensi,

	}



	public function tambah(){

		/*
		- Validasi konfirmasi password
		- Validasi user dan email double dengan aturan user dan email belum pernah digunakan di akun manapun
		*/
		$response = [];
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');

		if ( $password_confirm != $password ) {
			$response['status'] = false;
			$response['msg'] = "Password konfirmasi tidak sama!";
			return $response;
		}

		//Cek  akun double atau tidak, dengan validasi apakah user( nomor desa ) atau  email sudah digunakan atau belum untuk suatu akun saat registrasi

		$user = $this->input->post('user', TRUE);
		$email = $this->input->post('email', TRUE);
		// Cek apakah user untuk nomor desa sudah digunakan atau belum
		$user_double = $this->get_single( ['user' => $user ] );
		$email_double = $this->get_single( ['email' => $email ] );

		$param_validasi = true;
		$msg_false = "Gagal Daftar! ";
		$msg_kolom_false = [];

		// Logik OR dengan skema berbeda proses algoritma dengan nilai output false
		if ( count( $user_double ) > 0 ) {
			//Jika user sudah pernah digunakan untuk registrasi
			$param_validasi = false;
			$msg_kolom_false[] = "User";
		}

		if ( count( $email_double ) > 0 ) {
			//Jika user sudah pernah digunakan untuk registrasi
			$param_validasi = false;
			$msg_kolom_false[] = "Email";
		}

		if ( $param_validasi == true ) {
			$response = $this->tambah_user();
		}else{
			$msg_kolom_false = implode(' dan ', $msg_kolom_false);
			$msg_false .= $msg_kolom_false . " Sudah digunakan oleh akun lain";
			$response['status'] = $param_validasi;
			$response['msg'] = $msg_false;
		}


		return $response;

	}
	public function tambah_user(){

		//Saat pertama kali user ditambahkan, maka levelnya akan menjadi user

		//Jadi wajib hukumnya ada row ppada tabel data level dengan nilai nama_levelnya adalah 'user'
		$this->load->model('Level_model');
		$row_level_user = $this->Level_model->get_single( ['nama_level' => "user"] );
		//Jika row level user belum dibuat, maka proses tambah user atau registrasi user tidak bisa dilakukan 
		if ( empty($row_level_user) ) {
			$response['status'] = false;
			$response['msg'] = "SYSTEM ERROR!!, Data row dengan nilai nama level 'user' belum dibuat";


			return $response;//Menghentikan laju fungsi
		}

		// Saat pertama kali user ditambahkan atau daftar register, maka file gambarnya kosong

		$user = $this->input->post('user', TRUE);
		$password = $this->input->post('password', TRUE);
		$file_gambar = "";
		$nama = $this->input->post('nama', TRUE);
		$email = $this->input->post('email', TRUE);
		$level = $row_level_user['nama_level'];
		$alamat = "NULL";
		$waktu = $this->Base_model->waktu();
		$status = $this->Base_model->status();

		//Menentukan user pembuat. Jika user dibuat dari proses sign, maka nilainya akan REGISTER. Tapi jika user dibuat oleh suatu user admin, maka nilainya adalah user tersebut 

		if ( $this->session->userdata('login_admin') ) {
			$user_pembuat = $this->session->userdata('login_admin');
		}else{
			$user_pembuat = "REGISTER";
		}

		$data = array(
			'id_user' => null,
			'user' =>  $user,
			'user_pembuat' =>  $user_pembuat,
			'password' =>  $password,
			'file_gambar' =>  $file_gambar,
			'nama' =>  $nama,
			'alamat' =>  $alamat,
			'email' =>  $email,
			'level' =>  $level,
			'waktu' => $waktu,
			'status' => $status,
		);

		$tambah_data = $this->db->insert('data_user', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "Akun berhasil didaftarkan";
		}else{
			$response['status'] = false;
			$response['msg'] = "Akun gagal didaftarkan, masalah query!!";
		}
		return $response;

	}

	public function update( $user ){
		$response = [];

		$cek_data = $this->get_single(['user' => $user]);
		if ( !empty($cek_data) ) {
			$response = $this->update_user_profile( $user );
		}else{
			$response['status'] = false;
			$response['msg'] = "Kategori yang dipilih tidak terdaftar";
		}

		return $response;
	}

	public function update_user_profile(){

		// Mengupdate data user hanya bagian personal informasinya saja.
		$nama = $this->input->post('nama', TRUE);
		$alamat = $this->input->post('alamat', TRUE);


		$data = array(
			'nama' => $nama,
			'alamat' => $alamat
		);

		$update_data = $this->db->update('data_user', $data);
		if ( $update_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "Berhasil merubah profile";
		}else{
			$response['status'] = false;
			$response['msg'] = "Gagal merubah profile, masalah query!!";
		}
		return $response;

	}


	public function cek_user_verif(){

		$response = [];
		$response['status'] = true;

		return $response;
	}

}