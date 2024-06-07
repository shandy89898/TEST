<?php 

class Transaksi_model extends CI_Model{

	public function get_many( $where = [], $nama_tabel = "data_transaksi" ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()



		$this->db->select('*');
		$this->db->from('data_transaksi');

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
		$this->db->order_by('data_transaksi.id_keranjang', 'DESC');  // Mengurutkan berdasarkan kolom waktu yang kolom waktunya terbaru

		$result = $this->db->get()->result_array();
			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
		if ( $result == null ) {
			
			$result = [];
		}
		return $result; //Mengembalikan pasti array multi dimensi,
	}
	public function get_single($where = [], $nama_tabel = "data_transaksi") {
    // Mengambil satu data dengan kondisi tertentu, mengembalikan array satu dimensi

		$this->db->select('*');
		$this->db->from($nama_tabel);

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
		$this->db->from('data_transaksi');
		$this->db->join('data_produk', 'data_transaksi.id_produk = data_produk.id_produk');

		foreach ($where as $key_kolom => $value) {
			$this->db->where(  $key_kolom, $value);
		}

		$result = $this->db->get()->row_array();
		return $result['total_harga'];
	}


	public function tambah( $data_param ){
		$response = [];
		$user_beli = $data_param['user_beli'];
		$total_pesanan = $data_param['total_pesanan'];
		$total_harga = $data_param['total_harga'];
		$data_checkout_produk = $data_param['data_checkout_produk'];

		$this->db->trans_begin();
		$tambah_transaksi = $this->tambah_transaksi( $data_param );
		if ( $tambah_transaksi['status'] == true ) {
			// Menambahkan semua data produk pada keranjang yang dipilih ke data transaksi produk
			$id_transaksi_new = $tambah_transaksi['id_transaksi_new'];
			//Memasukkan semua data produk di keranjang pada $data_checkout_produk ke tabel data transaksi produk dengan id transaksi yang baru saja di tambahkan. Kemudian menghapus data data terkait di data keranjangnya 
			$tambah_transaksi_produk = $this->tambah_transaksi_produk( $id_transaksi_new, $data_checkout_produk ); 

			//Setelah berhasil menambahkan data transaksi produk, kemudian hapus data terkait produk tadi pada tabel data keranjang 
			if ( $tambah_transaksi_produk['status'] == true ) {
				$hapus_produk_keranjang = $this->hapus_produk_keranjang( $data_checkout_produk );
				$response = $hapus_produk_keranjang; 
			}else{
				$response = $tambah_transaksi_produk;
			}
		}else{
			$response = $tambah_transaksi;
		}

		if ( $response['status'] === true ) {
			// Jika semua query berhasil dan tidak ada query yang gagal maka jalankan semua query sql
			$response['status'] = true;
			$response['msg'] = "Transaksi berhasil dilakukan, silahkan lakukan pembayaran!";
			$response['id_transaksi_new'] = $id_transaksi_new;
			$this->db->trans_commit();
		}else{

			// Jika ada query yang gagal maka gagalkan semua query sql
			$response['status'] = false;
			$response['msg'] = "Transaksi gagal dilakukan, masalah query!";
			$response['msg_debug'] = "Transaksi gagal dilakukan, karena : " . $response['msg'];

			$this->db->trans_rollback(); //Menggagalkan semua query yang sudah berjalan 
		}

		return $response;
	}
	public function tambah_transaksi( $data_param ){
		
		$user_beli = $data_param['user_beli'];
		$total_pesanan = $data_param['total_pesanan'];
		$total_harga = $data_param['total_harga'];
		$waktu = $this->Base_model->waktu();
		$status = $this->Base_model->status();

		$data = [
			'id_transaksi' => null,
			'user_beli' => $user_beli,
			'total_pesanan' => $total_pesanan,
			'total_harga' => $total_harga,
			'waktu' => $waktu,
			'status' => $status,
		];
		$add_transaksi = $this->db->insert('data_transaksi', $data);
		$response = [];
		if ( $add_transaksi ) {
			$response['status'] = true;
			$response['msg'] = "Transaksi berhasil ditambahkan";
			$response['id_transaksi_new'] = $this->db->insert_id();

		}else{
			$response['status'] =  false;
			$response['msg'] = "Transaksi gagal ditambahkan";
		}

		return $response;


	}
	public function tambah_transaksi_produk( $id_transaksi_new, $data_checkout_produk ){
		$param = true;
		//Memasukkan semua data produk di keranjang pada $data_checkout_produk ke tabel data transaksi produk dengan id transaksi yang baru saja di tambahkan. Kemudian menghapus data data terkait di data keranjangnya 
		foreach ($data_checkout_produk as $row_checkout_produk ) {
			$row_add = [
				"id_transaksi_produk" => null,
				"id_transaksi" => $id_transaksi_new,
				"id_produk" => $row_checkout_produk['id_produk'],
				"banyak_item" => $row_checkout_produk['banyak_item'],
				"total_harga" => $row_checkout_produk['total_harga'],
				"waktu" => $this->Base_model->waktu(),
				"status" => $this->Base_model->status()
			];
			$tambah_transaksi_produk = $this->db->insert('data_transaksi_produk', $row_add);
			if ( $tambah_transaksi_produk == false) {
				//Jika ada yang gagal saat menambahkan produk, maka gagal semua
				$param = false;
				break; //Menghentikan loop
			}
		}

		$response = [];
		if ( $param == true ) {
			$response['status'] = true;
			$response['msg'] = "Transaksi produk berhasil ditambahkan, silahkan lakukan pembayaran!";
		}else{
			$response['status'] = false;
			$response['msg'] = "Transaksi produk gagal ditambahkan, masalah query!";

		}

		return $response;
	}
	public function hapus_produk_keranjang( $data_checkout_produk ){
		$param = true;
		//Setelah berhasil menambahkan data transaksi produk, kemudian hapus data terkait produk tadi pada tabel data keranjang 
		foreach ($data_checkout_produk as $row_checkout_produk ) {

			$id_keranjang = $row_checkout_produk['id_keranjang'];
			$this->db->where('id_keranjang', $id_keranjang);
			$hapus_data = $this->db->delete('data_keranjang');
			if ( $hapus_data == false ) {
				$param = false;
				break; //Menghentikan loop
			}
		}

		$response = [];
		if ( $param == true ) {
			$response['status'] = true;
			$response['msg'] = "Produk keranjang yang baru ditransaksikan berhasil dihapus , silahkan lakukan pembayaran!";
		}else{
			$response['status'] = false;
			$response['msg'] = "Produk keranjang yang baru ditransaksikan gagal dihapus , masalah query!";
		}

		return $response;
	}






}