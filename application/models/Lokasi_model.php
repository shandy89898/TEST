<?php 

class Lokasi_model extends CI_Model{

	public function get_many( $where = [], $nama_tabel = "lokasi" ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()


		//Jika anda ingin mengambil banyak data tertentuk, bisa menggunakan optional limit dengan mengirim di parameter pertama dengan key "limit_data". Yang kemudian nilainya hanya akan diambil sebagai limit query tapi tidak akan dianggap jadi where query karena sudah dihapus duluan
		$limit_data = false;
		if ( isset($where['limit_data']) ) {
			//Menghapus key limit_data agar tidak tereksekusi sebagai where query
			$limit_data = $where['limit_data'];
			unset($where['limit_data']);
		}

		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$this->db->where($key_kolom, $value);
		}


		$result = $this->db->get( $nama_tabel, $limit_data )->result_array();
			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
		if ( $result == null ) {
			
			$result = [];
		}
		return $result; //Mengembalikan pasti array multi dimensi,
	}
	public function get_single( $where = [] , $nama_tabel = "lokasi"){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Jadi untuk mengambil single ini harus ada kondisi, gak boleh tidak ada 
		//Mengembalikan 1 dimensi dengan methode ->row_array()

		if ( count($where) > 0 ) {
			//Jika ada kondisinya 
			foreach ($where as $key => $value) {
				$this->db->where( $key, $value );
			}

			$result = $this->db->get($nama_tabel)->row_array(); 
		}else{
			$result = [];
		}


			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
		if ( $result == null ) {
			$result = [];
		}
		return $result; //Mengembalikan pasti array 1 dimensi,

	}
	public function tambah( $data ){
		$nama_lokasi = $data['nama_lokasi'];
		$negara = $data['negara'];
		$provinsi = $data['provinsi'];
		$kota = $data['kota'];

		$data = array(
			'id' =>  $this->input->post('id') ?  $this->input->post('id') : null,
			'nama_lokasi' =>  $nama_lokasi,
			'negara' =>  $negara,
			'provinsi' =>  $provinsi,
			'kota' =>  $kota,
			// 'created_at' =>  ,
		);
		$tambah_data = $this->db->insert('lokasi', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "Lokasi berhasil ditambahkan";
		}else{
			$response['status'] = false;
			$response['msg'] = "Lokasi gagal ditambahkan, masalah query!!";
		}
		return $response;

	}

	public function update( $id, $data ){
		$nama_lokasi = $data['nama_lokasi'];
		$negara = $data['negara'];
		$provinsi = $data['provinsi'];
		$kota = $data['kota'];

		$data = array(
			'nama_lokasi' =>  $nama_lokasi,
			'negara' =>  $negara,
			'provinsi' =>  $provinsi,
			'kota' =>  $kota,
		);
		$this->db->where('id', $id);
		$tambah_data = $this->db->update('lokasi', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "Lokasi berhasil di update";
		}else{
			$response['status'] = false;
			$response['msg'] = "Lokasi gagal di update, masalah query!!";
		}
		return $response;

	}
	public function delete( $id ){
		
		$this->db->where('id', $id);
		$delete = $this->db->delete('lokasi');
		if ( $delete == true ) {
			$response['status'] = true ;
			$response['msg'] = "Lokasi berhasil di delete";
		}else{
			$response['status'] = false;
			$response['msg'] = "Lokasi gagal di delete, masalah query!!";
		}
		return $response;

	}



}