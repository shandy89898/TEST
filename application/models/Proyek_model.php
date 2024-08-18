<?php 

class Proyek_model extends CI_Model{

	public function get_many( $where = [], $nama_tabel = "proyek" ){
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
	public function get_single( $where = [] , $nama_tabel = "proyek"){
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
		$nama_proyek = $data['nama_proyek'];
		$client = $data['client'];
		$tgl_mulai = $data['tgl_mulai'];
		$tgl_selesai = $data['tgl_selesai'];
		$pimpinan_proyek = $data['pimpinan_proyek'];
		$keterangan = $data['keterangan'];

		$data = array(
			'id' =>  $this->input->post('id') ?  $this->input->post('id') : null,
			'nama_proyek' =>  $nama_proyek,
			'client' =>  $client,
			'tgl_mulai' =>  $tgl_mulai,
			'tgl_selesai' =>  $tgl_selesai,
			'pimpinan_proyek' =>  $pimpinan_proyek,
			'keterangan' =>  $keterangan,
			// 'created_at' =>  ,
		);
		$tambah_data = $this->db->insert('proyek', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "proyek berhasil ditambahkan";
		}else{
			$response['status'] = false;
			$response['msg'] = "proyek gagal ditambahkan, masalah query!!";
		}
		return $response;

	}

	public function update( $id, $data ){
		$nama_proyek = $data['nama_proyek'];
		$client = $data['client'];
		$tgl_mulai = $data['tgl_mulai'];
		$tgl_selesai = $data['tgl_selesai'];
		$pimpinan_proyek = $data['pimpinan_proyek'];
		$keterangan = $data['keterangan'];

		$data = array(
			'nama_proyek' =>  $nama_proyek,
			'client' =>  $client,
			'tgl_mulai' =>  $tgl_mulai,
			'tgl_selesai' =>  $tgl_selesai,
			'pimpinan_proyek' =>  $pimpinan_proyek,
			'keterangan' =>  $keterangan,
			// 'created_at' =>  ,
		);
		$this->db->where('id', $id);
		$tambah_data = $this->db->update('proyek', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "proyek berhasil di update";
		}else{
			$response['status'] = false;
			$response['msg'] = "proyek gagal di update, masalah query!!";
		}
		return $response;

	}
	public function delete( $id ){
		
		$this->db->where('id', $id);
		$delete = $this->db->delete('proyek');
		if ( $delete == true ) {
			$response['status'] = true ;
			$response['msg'] = "proyek berhasil di delete";
		}else{
			$response['status'] = false;
			$response['msg'] = "proyek gagal di delete, masalah query!!";
		}
		return $response;

	}



}