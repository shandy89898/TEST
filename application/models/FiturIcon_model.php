<?php 


class FiturIcon_model extends CI_Model{

	public function get_many( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()

		// Karena berelasi dengan data fitur dengan one to many
		$this->db->select('*');
		$this->db->from('data_fitur_icon');


		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$key_kolom = "data_fitur_icon." . $key_kolom;
			$this->db->where($key_kolom, $value);
		}

		$this->db->order_by('id_fitur_icon', 'ASC');


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

			$result = $this->db->get('data_fitur_icon')->row_array(); 
		}else{
			$result = [];
		}

			//Lakukan agar menjadi suatu penyetaraan yang dapat dihitung, jadi yang keluar itu pasti array
		if ( $result == null ) {
			$result = [];
		}
		return $result; //Mengembalikan pasti array 1 dimensi,

	}

	public function tambah( $id_fitur ){

		// Aturan : 1 Fitur Hanya punya 1 icon saja. Jadi cek jika sudah terdapat suatu row dengan id fitur tersebut pada tabel data_fitur_icon, maka itu tidak bisa untuk menambah gambar icon lagi 
		$row_icon = $this->get_single(['id_fitur'=> $id_fitur]);
		if ( !empty($row_icon) ) {
			//Jika row icon dengan id fitur tersebut ada, atau fitur tersebut sudah punya row. Maka tidak bisa melanjutkan proses
			$response = [
				'status' => false,
				'msg' => "Gagal menambah icon fitur dengan id " . $id_fitur . ", Karena fitur sudah memiliki icon dan hanya boleh 1 icon saja yang di tambahkan!"
			];

			return $response; //Menghentikan laju fungsi.
		}  

		// Id fitur Ini Dimaksudkan untuk gambar yang di upload punyanya si suatu fitur yang terdaftar
		$upload_gambar = $this->upload_gambar( $id_fitur );
		if ( $upload_gambar['status'] == true ) {
			//Tambahkan ke database
			$data = array(
				'id_fitur_icon' => null,
				'id_fitur' => $id_fitur ,
				'file_gambar' => $upload_gambar['nama_file'],
				'waktu' => $this->Base_model->waktu(),
			);
			$tambah_data = $this->db->insert('data_fitur_icon', $data);
			if ( $tambah_data == true ) {
				$response['status'] = true ;
				$response['msg'] = "Gambar fitur Id" . " " . $id_fitur . " berhasil ditambahkan";
			}else{
				$response['status'] = false;
				$response['msg'] = "Gambar fitur gagal ditambahkan, masalah query!!";
			}
		}else{
			$response = $upload_gambar;
		}

		return $response;

	}
	public function upload_gambar( $id_fitur = "null" ) {

		$config['upload_path'] = 'asset_fitur_icon/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 10000; // maksimum ukuran file dalam KB

		$file_name = $_FILES["upload_gambar_fiturIcon"]["name"]; //Nama file lengkap dengan eksistensi

		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
		$nama_file_baru = uniqid() . "_fiturid_" . $id_fitur . "_" . uniqid() . "." . $extension;

		$config['file_name'] = $nama_file_baru;

		$this->load->library('upload', $config);

		$response =  []; 
		if ( $this->upload->do_upload('upload_gambar_fiturIcon') == true ) {
			$response['status'] = true;
			$response['msg'] = "Berhasil mengupload gambar fitur!!";
			$response['nama_file'] = $nama_file_baru;
		} else {
			$response['status'] = false;
			$response['msg'] = $this->upload->display_errors();
		}

		return $response;
	}

	public function hapus( $id_fitur_icon ){
		//JIka gambarnya gagal dihapus, maka tarik rollback query hapus datanya 

		$response = [];
		$this->db->trans_begin();
		$row_fiturIcon = $this->get_single(['id_fitur_icon' => $id_fitur_icon]);//Simpan data rownya, sebelum dihapus
		$hapus_data_icon = $this->hapus_data_icon( $id_fitur_icon );
		if ( $hapus_data_icon['status'] == true ) {
			// Hapus file gambar icon yang terakit data di asset_fitur_icon
			$path_img = $this->Base_model->get_imgFiturIcon( $row_fiturIcon );
			$hapus_data_icon = $this->hapus_gambar_icon("asset_fitur_icon/" .  $row_fiturIcon['file_gambar']);
			$response = $hapus_data_icon;
		}else{
			$response['status'] = false;
			$response['msg'] = "Gagal menghapus data gambar icon!";
		}


		if ($response['status'] == true) {
			//Izinan semua query berjalan
			$this->db->trans_commit();
		}else{
			//Batalkan semua query berjalan
			$this->db->trans_rollback();
		}

		return $response;
	}

	public function hapus_data_icon( $id_fitur_icon ){

		$this->db->where('id_fitur_icon', $id_fitur_icon);
		$hapus_data = $this->db->delete( 'data_fitur_icon' );

		$response = [];
		if ( $hapus_data == true ) {
			$response['status'] = true;
			$response['msg'] = "Berhasil menghapus data di icon di tabel!";

		}else{
			$response['status'] = false;
			$response['msg'] = "Gagal menghapus data icon, masalah query!";
		}

		return $response;
	}
	public function hapus_gambar_icon( $path_img_icon ){

		$hapus_gambar = unlink( $path_img_icon );
		if ( $hapus_gambar ) {
			$response['status'] = true;
			$response['msg'] = "Berhasil menghapus gambar fitur icon!";
		}else{
			$response['status'] = false;
			$response['msg'] = "Gagal menghapus file gambar icon!";
		}

		return $response;
	}


}