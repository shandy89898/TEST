<?php 

class Keranjang_model extends CI_Model{

	public function get_many( $where = [], $nama_tabel = "data_keranjang" ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()



		$this->db->select('*');
		$this->db->from('data_keranjang');
		$this->db->join('data_produk', 'data_keranjang.id_produk = data_produk.id_produk', 'inner' );

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
		// $this->db->order_by("CASE WHEN status = 'ACTIVE' THEN 1 ELSE 2 END", 'ASC'); //Mengurutkan berdasrkan status yang ACTIVE
		$this->db->order_by('data_keranjang.waktu', 'DESC');  // Mengurutkan berdasarkan kolom waktu yang kolom waktunya terbaru

		$result = $this->db->get()->result_array();
			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
		if ( $result == null ) {
			
			$result = [];
		}
		return $result; //Mengembalikan pasti array multi dimensi,
	}
	public function get_single($where = [], $nama_tabel = "data_keranjang") {
    // Mengambil satu data dengan kondisi tertentu, mengembalikan array satu dimensi

		$this->db->select('*');
		$this->db->from($nama_tabel);
		$this->db->join('data_produk', 'data_keranjang.id_produk = data_produk.id_produk', 'inner');

    // Menambahkan kondisi where
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where( $key, $value);
			}
		} else {
			return []; // Jika tidak ada kondisi, kembalikan array kosong
		}

		$query = $this->db->get();
		$result = $query->row_array();

    // Memastikan hasil adalah array
		return ($result) ? $result : [];
	}

	public function get_totalHarga( $where = [] ){
		$user_login = $this->Base_model->get_userLogin();
		

		$this->db->select_sum('data_produk.harga_jual', 'total_harga');
		$this->db->from('data_keranjang');
		$this->db->join('data_produk', 'data_keranjang.id_produk = data_produk.id_produk');

		foreach ($where as $key_kolom => $value) {
			$this->db->where(  $key_kolom, $value);
		}

		$result = $this->db->get()->row_array();
		return $result['total_harga'];
	}


	public function tambah( $row_produk ){
		$response = [];
		$user_beli = $this->Base_model->get_userLogin();
		$id_produk = $row_produk['id_produk'];

		// Cek apakah produk sudah pernah di tambahkan dengan user yang sedang login atau belum. Jika sudah maka tidak bisa, jika belum maka bisa 
		$cek_data_double = $this->get_single([
			'data_produk.id_produk' => $id_produk,
			'data_keranjang.user_beli' => $user_beli
		]); 

		if ( empty($cek_data_double) ) {
			//  Jika nama produk belum digunakan pada kategori yang dipilih
			$response =  $this->tambah_keranjang( $row_produk );
		}else{
			// Jika produk sudah ditambahkan di keranjang dengan user sedang login, maka gagal
			$response['status'] = false;
			$response['msg'] = "Produk sudah ditambahkan ke keranjang";
		}

		// var_dump($response);
		return $response;
	}
	public function tambah_keranjang( $row_produk ){
		$id_produk = $row_produk['id_produk'];
		$banyak_item = 1;// Untuk sementara hanya 1 barang
		$total_harga = $row_produk['harga_jual'] * $banyak_item;
		$user_beli = $this->Base_model->get_userLogin();
		$waktu = $this->Base_model->waktu();
		$status = $this->Base_model->status();

		$data = array(
			'id_keranjang' => null,
			'id_produk' => $id_produk,
			'user_beli' =>  $user_beli,
			'banyak_item' =>  $banyak_item,
			'total_harga' =>  $total_harga,
			'waktu' => $waktu,
			'status' => $status
		);
		$tambah_data = $this->db->insert('data_keranjang', $data);
		if ( $tambah_data == true ) {
			$response['status'] = true ;
			$response['msg'] = "Produk berhasil ditambahkan ke keranjang";
		}else{
			$response['status'] = false;
			$response['msg'] = "Produk gagal ditambahkan ke keranjang, masalah query!!";
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


}