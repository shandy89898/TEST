<?php 


class ProdukGambar_model extends CI_Model{

	public function get_many( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()

		// Karena berelasi dengan data produk dengan one to many
		$this->db->select('*');
		$this->db->from('data_produk_gambar');


		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$key_kolom = "data_produk_gambar." . $key_kolom;
			$this->db->where($key_kolom, $value);
		}

		$this->db->order_by('id_produk_gambar', 'DESC');


		$result = $this->db->get()->result_array();
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

			$result = $this->db->get('data_produk_gambar')->row_array(); 
		}else{
			$result = [];
		}

			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
		if ( $result == null ) {
			$result = [];
		}
		return $result; //Mengembalikan pasti array 1 dimensi,

	}

	public function tambah( $id_produk ){
		// Id Produk Ini Dimaksudkan untuk gambar yang di upload punyanya si suatu produk yang terdaftar

		$upload_gambar = $this->upload_gambar( $id_produk );
		$status = $this->Base_model->status();
		if ( $upload_gambar['status'] == true ) {
			//Tambahkan ke database
			$data = array(
				'id_produk_gambar' => null,
				'id_produk' => $id_produk ,
				'file_gambar' => $upload_gambar['nama_file'],
				'user_admin' => $this->Base_model->get_adminLogin(),
				'waktu' => $this->Base_model->waktu(),
				'status' => $this->Base_model->status(),
			);
			$tambah_data = $this->db->insert('data_produk_gambar', $data);
			if ( $tambah_data == true ) {
				$response['status'] = true ;
				$response['msg'] = "Gambar Produk Id" . " " . $id_produk . " berhasil ditambahkan";
			}else{
				$response['status'] = false;
				$response['msg'] = "Gambar Produk gagal ditambahkan, masalah query!!";
			}
		}else{
			$response = $upload_gambar;
		}

		return $response;

	}
	public function upload_gambar( $id_produk = "null" ) {

		$config['upload_path'] = 'asset_produk/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 10000; // maksimum ukuran file dalam KB

		$file_name = $_FILES["upload_gambar_produk"]["name"]; //Nama file lengkap dengan eksistensi

		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
		$nama_file_baru = uniqid() . "_produkid_" . $id_produk . "_" . uniqid() . "." . $extension;

		$config['file_name'] = $nama_file_baru;

		$this->load->library('upload', $config);

		$response =  []; 
		if ( $this->upload->do_upload('upload_gambar_produk') == true ) {
			$response['status'] = true;
			$response['msg'] = "Berhasil mengupload gambar produk!!";
			$response['nama_file'] = $nama_file_baru;
		} else {
			$response['status'] = false;
			$response['msg'] = $this->upload->display_errors();
		}

		return $response;
	}
}