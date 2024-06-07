<?php 

class Fitur_model extends CI_Model{

	public function get_many( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()

		// Karena berelasi dengan data jenis fitur dengan one to many
		$this->db->select('*');
		$this->db->from('data_fitur');
		$this->db->join('data_jenis_fitur', 'data_fitur.id_jenis_fitur = data_jenis_fitur.id_jenis_fitur', 'inner' );
		// $this->db->join('data_fitur_icon', 'data_fitur.id_fitur = data_fitur_icon.id_fitur', 'inner' );

		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$key_kolom =  "data_fitur." . $key_kolom;
			$this->db->where($key_kolom, $value);
		}

		$this->db->order_by('data_fitur.waktu', 'DESC');  // Mengurutkan berdasarkan kolom waktu yang kolom waktunya terbaru

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

		// Menghubungkan dengan relasinya pada dengan jenis fitur
		$this->db->select('*');
		$this->db->from('data_fitur');
		$this->db->join('data_jenis_fitur', 'data_fitur.id_jenis_fitur = data_jenis_fitur.id_jenis_fitur', 'inner' );


		if ( count($where) > 0 ) {
					//Jika ada kondisinya 
			foreach ($where as $key_kolom => $value) {
				$key_kolom = "data_fitur.".$key_kolom;
				$this->db->where( $key_kolom, $value );
			}

			$result = $this->db->get()->row_array(); 
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
		$nama_fitur = $this->input->post('nama_fitur');
		$id_jenis_fitur = $this->input->post('id_jenis_fitur');

		//Cek dulu, apakah nama fitur sudah digunakan pada id_jenis_fitur yang dipilih atau tidak  atau belum 
		$cek_nama = $this->get_single( ['id_jenis_fitur' => $id_jenis_fitur, "nama_fitur" => $nama_fitur ] );
		if ( empty($cek_nama) ) {
			//  Jika nama fitur pada id menu yang dipilih belum digunakan
			$data = array(
				'id_fitur' => null,
				'id_jenis_fitur' => $this->input->post('id_jenis_fitur', TRUE),
				'id_template_fitur' => $this->input->post('id_template_fitur', TRUE),
				'nama_fitur' =>  $nama_fitur,
				'waktu' => $this->Base_model->waktu(),
				'status' => $this->Base_model->status(),
			);
			$tambah_data = $this->db->insert('data_fitur', $data);
			if ( $tambah_data == true ) {
				$response['status'] = true ;
				$response['msg'] = "Fitur Menu berhasil ditambahkan";
			}else{
				$response['status'] = false;
				$response['msg'] = "Fitur Menu  gagal ditambahkan, masalah query!!";
			}
		}else{
			//  Jika nama Fitur Menu pada id menu yang dipilih sudah digunakan
			$response['status'] = false;
			$response['msg'] = "Nama Fitur Menu sudah digunakan pada jenis fitur yang dipilih !!";
		}

		return $response;
	}

}