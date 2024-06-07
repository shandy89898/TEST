<?php 

class Menu_model extends CI_Model{

	public function get_many( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()

		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$this->db->where($key_kolom, $value);
		}

		$this->db->order_by('waktu', 'DESC');  // Mengurutkan berdasarkan kolom waktu yang kolom waktunya terbaru

		$result = $this->db->get('data_menu')->result_array();
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

			$result = $this->db->get('data_menu')->row_array(); 
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
		$nama_menu = $this->input->post('nama_menu');
		//Cek dulu, apakah nama menu sudah digunakan atau belum 

		$cek_nama = $this->get_single( ['nama_menu' => $nama_menu ] );
		// var_dump($cek_nama);
		// die;
		if ( empty($cek_nama) ) {
			//  Jika nama menu belum digunakan
			$data = array(
				'id_menu' => null,
				'nama_menu' =>  $nama_menu,
				'waktu' => $this->Base_model->waktu(),
				'status' => $this->Base_model->status(),
			);
			$tambah_data = $this->db->insert('data_menu', $data);
			if ( $tambah_data == true ) {
				$response['status'] = true ;
				$response['msg'] = "Menu berhasil ditambahkan";
			}else{
				$response['status'] = false;
				$response['msg'] = "Menu gagal ditambahkan, masalah query!!";
			}
		}else{
			// Jika nama menu sudah digunakan
			$response['status'] = false;
			$response['msg'] = "Nama menu sudah digunakan";
		}

		return $response;
	}

}