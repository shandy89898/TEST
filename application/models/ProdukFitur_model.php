
<?php 

class ProdukFitur_model extends CI_Model{

	public function get_many( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()

		// Karena berelasi dengan data produk dengan one to many
		$this->db->select('*');
		$this->db->from('data_produkfitur');
		$this->db->join('data_produk', 'data_produkfitur.id_produk = data_produk.id_produk', 'inner' );


		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$key_kolom = "data_produkfitur." . $key_kolom;
			$this->db->where($key_kolom, $value);
		}

		$this->db->order_by('id_produkFitur', 'ASC');


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

			$result = $this->db->get('data_produkfitur')->row_array(); 
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
		$response = [];
		$nama_produkFitur = $this->input->post('nama_produkFitur');
		//Cek dulu, apakah nama produk fitur sudah digunakan atau belum 
		$cek_nama = $this->get_single( ['nama_produkFitur' => $nama_produkFitur ] );
		if ( empty($cek_nama) ) {
			//  Jika nama produk fitur belum digunakan
			$nama_produkFitur = $this->input->post('nama_produkFitur');
			$user_admin = $this->Base_model->get_adminLogin();
			$status = $this->Base_model->status();
			$waktu = $this->Base_model->waktu();
			
			$data = array(
				'id_produkFitur' => null,
				'id_produk' => $id_produk,
				'user_admin' =>  $user_admin,
				'nama_produkFitur' =>  $nama_produkFitur,
				'waktu' => $waktu,
				'status' => $status,
			);
			$tambah_data = $this->db->insert('data_produkfitur', $data);
			if ( $tambah_data == true ) {
				$response['status'] = true ;
				$response['msg'] = "Produk Fitur berhasil ditambahkan";
			}else{
				$response['status'] = false;
				$response['msg'] = "Produk Fitur gagal ditambahkan, masalah query!!";
			}
			return $response;

		}else{
			// Jika nama menu sudah digunakan
			$response['status'] = false;
			$response['msg'] = "Nama produk fitur sudah digunakan";
		}

		// var_dump($response);
		return $response;
	}



	

}

