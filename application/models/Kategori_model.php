<?php 

class Kategori_model extends CI_Model{

	public function get_many( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()
		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$this->db->where($key_kolom, $value);
		}

		$this->db->order_by("CASE WHEN status = 'ACTIVE' THEN 1 ELSE 2 END", 'ASC');
		$this->db->order_by('waktu', 'DESC');  // Mengurutkan berdasarkan kolom waktu


		$result = $this->db->get('data_kategori')->result_array();
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
			$result = $this->db->get('data_kategori')->row_array(); 
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
		$nama_kategori = $this->input->post('nama_kategori');
		//Cek dulu, apakah nama kategori sudah digunakan atau belum 
		$cek_nama = $this->get_single( ['nama_kategori' => $nama_kategori ] );
		if ( empty($cek_nama) ) {
			//  Jika nama kategori belum digunakan
			//Cek apakah kategori menggunakan gambar atau tidak
			$response = $this->tambah_kategori();
		}else{
			// Jika nama kategori sudah digunakan
			$response['status'] = false;
			$response['msg'] = "Nama kategori sudah digunakan";
		}

		// var_dump($response);
		return $response;
	}
	public function tambah_kategori(){
		$nama_kategori = $this->input->post('nama_kategori');
		$deskripsi_kategori = $this->input->post('deskripsi_kategori');
		$user_admin = $this->Base_model->get_adminLogin();
		$waktu = $this->Base_model->waktu();
		$status = $this->Base_model->status();

		$data = array(
			'id_kategori' => null,
			'user_admin' =>  $user_admin,
			'nama_kategori' =>  $nama_kategori,
			'deskripsi_kategori' =>  $deskripsi_kategori,
			'waktu' => $waktu,
			'status' => $status,
		);
		$tambah_data = $this->db->insert('data_kategori', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "kategori berhasil ditambahkan";
		}else{
			$response['status'] = false;
			$response['msg'] = "kategori gagal ditambahkan, masalah query!!";
		}
		return $response;

	}
	public function update( $id_kategori ){
		$response = [];

		$cek_data = $this->get_single(['id_kategori' => $id_kategori]);
		if ( !empty($cek_data) ) {
			$response = $this->update_kategori( $id_kategori );
		}else{
			$response['status'] = false;
			$response['msg'] = "Kategori yang dipilih tidak terdaftar";
		}

		return $response;
	}
	public function update_kategori( $id_kategori ){
		$nama_kategori = $this->input->post('nama_kategori');
		$deskripsi_kategori = $this->input->post('deskripsi_kategori');

		$data = array(
			'nama_kategori' => $nama_kategori,
			'deskripsi_kategori' => $deskripsi_kategori,
		);
		$this->db->where('id_kategori', $id_kategori);
		$update_data = $this->db->update('data_kategori', $data);
		if ( $update_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "kategori berhasil diupdate";
		}else{
			$response['status'] = false;
			$response['msg'] = "kategori gagal di update, masalah query!!";
		}
		return $response;

	}






}