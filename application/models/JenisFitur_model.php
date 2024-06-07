<?php 


//Faktorial

class JenisFitur_model extends CI_Model{

	public function get_many( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()

		// Karena berelasi dengan data menu dengan one to many
		$this->db->select('*');
		$this->db->from('data_jenis_fitur');
		$this->db->join('data_menu', 'data_jenis_fitur.id_menu = data_menu.id_menu', 'inner' );

		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$key_kolom =  "data_jenis_fitur." . $key_kolom;
			$this->db->where($key_kolom, $value);
		}

		$this->db->order_by('data_jenis_fitur.waktu', 'DESC');  // Mengurutkan berdasarkan kolom waktu yang kolom waktunya terbaru

		$result = $this->db->get()->result_array();

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

			$result = $this->db->get('data_jenis_fitur')->row_array(); 
		}else{
			$result = [];
		}

		if ( $result == null ) {
			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
			$result = [];
		}
		return $result; //Mengembalikan pasti array 1 dimensi,

	}
	public function tambah(){
		$response = [];
		$nama_jenis_fitur = $this->input->post('nama_jenis_fitur');
		$id_menu = $this->input->post('id_menu');

		//Cek dulu, apakah nama jenis_fitur sudah digunakan pada id_menu yang dipilih atau tidak  atau belum 
		$cek_nama = $this->get_single( ['id_menu' => $id_menu, "nama_jenis_fitur" => $nama_jenis_fitur ] );
		if ( empty($cek_nama) ) {
			//  Jika nama jenis_fitur pada id menu yang dipilih belum digunakan
			$data = array(
				'id_jenis_fitur' => null,
				'id_menu' => $this->input->post('id_menu', TRUE),
				'nama_jenis_fitur' =>  $nama_jenis_fitur,
				'waktu' => $this->Base_model->waktu(),
				'status' => $this->Base_model->status(),
			);
			$tambah_data = $this->db->insert('data_jenis_fitur', $data);
			if ( $tambah_data == true ) {
				$response['status'] = true ;
				$response['msg'] = "Jenis Fitur Menu berhasil ditambahkan";
			}else{
				$response['status'] = false;
				$response['msg'] = "Jenis Fitur Menu  gagal ditambahkan, masalah query!!";
			}
		}else{
			//  Jika nama Jenis Fitur Menu pada id menu yang dipilih sudah digunakan
			$response['status'] = false;
			$response['msg'] = "Nama Jenis Fitur Menu sudah digunakan";
		}

		return $response;
	}

}