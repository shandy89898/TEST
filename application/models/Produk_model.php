<?php 

class Produk_model extends CI_Model{

	public function get_many( $where = [], $nama_tabel = "data_produk" ){
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
		
		//Mengurutkan berdasrkan status yang ACTIVE dan waktunya yang terbaru/terbesar
		$this->db->order_by("CASE WHEN status = 'ACTIVE' THEN 1 ELSE 2 END", 'ASC'); //Mengurutkan berdasrkan status yang ACTIVE
		$this->db->order_by('waktu', 'DESC');  // Mengurutkan berdasarkan kolom waktu yang kolom waktunya terbaru


		$result = $this->db->get( $nama_tabel, $limit_data )->result_array();
			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
		if ( $result == null ) {
			
			$result = [];
		}
		return $result; //Mengembalikan pasti array multi dimensi,
	}
	public function get_single( $where = [] , $nama_tabel = "data_produk"){
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
	public function tambah(){
		$response = [];
		$nama_produk = $this->input->post('nama_produk', TRUE);
		$id_kategori = $this->input->post('id_kategori', TRUE);


		
		// Nama produk tidak boleh sama jika berada pada 1 kategori yang sama
		//Cek dulu, apakah nama produk sudah digunakan atau belum pada ketagori yang di pilih
		$cek_data_double = $this->get_single( 
			[
				'nama_produk' => $nama_produk,
				'id_kategori' => $id_kategori
			]
		);

		if ( empty($cek_data_double) ) {
			//  Jika nama produk belum digunakan pada kategori yang dipilih
			$response =  $this->tambah_produk( false );
		}else{
			// Jika nama menu sudah digunakan
			$response['status'] = false;
			$response['msg'] = "Nama produk sudah digunakan pada kategori yang dipilih!";
		}

		// var_dump($response);
		return $response;
	}
	public function tambah_produk( $img_produk ){
		$nama_produk = $this->input->post('nama_produk');
		$id_kategori = $this->input->post('id_kategori');
		$harga_jual = $this->input->post('harga_jual');
		$harga_modal = $this->input->post('harga_modal');
		$deskripsi_produk = $this->input->post('deskripsi_produk');
		$user_admin = $this->Base_model->get_adminLogin();
		$waktu = $this->Base_model->waktu();
		$status = $this->Base_model->status();

		$data = array(
			'id_produk' => null,
			'user_admin' =>  $user_admin,
			'id_kategori' =>  $id_kategori,
			'nama_produk' =>  $nama_produk,
			'harga_jual' =>  $harga_jual,
			'harga_modal' =>  $harga_modal,
			'deskripsi_produk' =>  $deskripsi_produk,
			'waktu' => $waktu,
			'status' => $status,
		);
		$tambah_data = $this->db->insert('data_produk', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "Produk berhasil ditambahkan";
		}else{
			$response['status'] = false;
			$response['msg'] = "Produk gagal ditambahkan, masalah query!!";
		}
		return $response;

	}




	public function update( $id_produk ){
		$response = [];

		$cek_data = $this->get_single(['id_produk' => $id_produk]);
		//Cek apakah id produk yang ingin di update itu ada atau tidak di database
		if ( !empty($cek_data) ) {

			$response = $this->update_produk( $id_produk );
		}else{
			$response['status'] = false;
			$response['msg'] = "Produk yang di update tidak terdaftar";
		}

		return $response;
	}

	public function update_produk( $id_produk ){
		$nama_produk = $this->input->post('nama_produk');
		$id_kategori = $this->input->post('id_kategori');
		$harga_jual = $this->input->post('harga_jual');
		$harga_modal = $this->input->post('harga_modal');
		$deskripsi_produk = $this->input->post('deskripsi_produk');

		$data = array(
			'id_kategori' =>  $id_kategori,
			'nama_produk' =>  $nama_produk,
			'harga_jual' =>  $harga_jual,
			'harga_modal' =>  $harga_modal,
			'deskripsi_produk' =>  $deskripsi_produk,
		);
		$this->db->where('id_produk', $id_produk);
		$tambah_data = $this->db->update('data_produk', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "Produk berhasil di update";
		}else{
			$response['status'] = false;
			$response['msg'] = "Produk gagal di update, masalah query!!";
		}
		return $response;

	}


}