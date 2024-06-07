<?php 

class Level_model extends CI_Model{

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

		
		$result = $this->db->get('data_level')->result_array();
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
			$result = $this->db->get('data_level')->row_array(); 
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
		$response = [];
		$nama_level = $this->input->post('nama_level');
		//Cek dulu, apakah nama level sudah digunakan atau belum 
		$cek_nama = $this->get_single( ['nama_level' => $nama_level ] );
		if ( empty($cek_nama) ) {
			//  Jika nama level belum digunakan
			//Cek apakah level menggunakan gambar atau tidak
			$response = $this->tambah_level();
		}else{
			// Jika nama level sudah digunakan
			$response['status'] = false;
			$response['msg'] = "Nama level sudah digunakan";
		}

		// var_dump($response);
		return $response;
	}

	public function tambah_level(){

		$nama_level = $this->input->post('nama_level', TRUE);
		$user_admin = $this->Base_model->get_adminLogin();
		$waktu = $this->Base_model->waktu();
		$status = $this->Base_model->status();

		$data = array(
			'id_level' => null,
			'nama_level' =>  $nama_level,
			'user_admin' =>  $user_admin,
			'status' =>  $status,
			'waktu' =>  $waktu
		);

		$tambah_data = $this->db->insert('data_level', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "level berhasil ditambahkan";
		}else{
			$response['status'] = false;
			$response['msg'] = "level gagal ditambahkan, masalah query!!";
		}

		return $response;

	}


}