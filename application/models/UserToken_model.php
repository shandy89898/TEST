<?php  

class UserToken_model extends CI_Model{
	/*
	========================== SKEMA VERIFIKASI TOKEN =====================
	- Ketika token di buat maka akan ditetapkan Waktu penjadwalan token tersebut akan dihapus atau berlaku
	- Setiap token yang dibuat itu dibuat untuk setiap 1 user. Jadi 1 token 1 user ( One to One ). Dimana tidak boleh ada 1 user yang memiliki lebih dari satu token
	- Setiap token baru dibuat, misalnya user sudah pernah menyimpan suatu token maka token yang sebelumnya sudah terbuat akan dihapus

	- Jadi setiap halaman di load, maka back end akan selalu mengecek apakah ada token yang sudah waktunya untuk dihapus. Jika ada maka token tersebut akan dihapus dan otomatis tidak bisa digunakan untuk melakukan verifikasi pada user 

	*/ 


	public function get_many( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()

		//Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
		foreach ($where as $key_kolom => $value) {
			$this->db->where($key_kolom, $value);
		}

		// Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()
		$result = $this->db->get('data_user')->result_array();
		if ( $result == null ) {
			$result = [];
		}
		return $result; //Mengembalikan pasti array multi dimensi,
	}
	public function get_single( $where = [] ){
		// $where itu adalah array associatif [ "nama_kolom" => "value" ]
		// Jadi untuk mengambil single ini harus ada kondisi, gak boleh tidak ada 
		//Mengembalikan 1 dimensi dengan methode ->row_array()


		if ( count($where) > 0 ) {
			//Jika ada kondisinya 
			foreach ($where as $key => $value) {
				$this->db->where( $key, $value );
			}

			$result = $this->db->get('data_user')->row_array(); 

		}else{
			$result = [];
		}


		//Ini dilakukan agar bisa dihitung, dan dapat diraktakan yang dibalikin itu berbentuk array
		if ( $result == null ) {
			$result = [];
		}
		return $result; //Mengembalikan pasti array 1 dimensi,
	}
	public function generate_userToken(){
		$user_login = $this->Base_model->get_userLogin();
		$new_token = uniqid() . $user_login;
		$waktu_dihapus = "1 Jam Setelah Dibuat";
		// Cek apakah user tersebut sudah memiliki token atau belum, jika sudah maka 
		$cek_token = $this->get_single(['user' => $user_login]);
		if ( count($cek_token) > 0 ) {
			//Jika user sudah pernah membuat suatu token, maka cukup update saja token user tersebut sebelummnya dengan nilai token baru dan update juga waktu jadwal penghapusa
			echo "User token sudah dibuat!";
		}else{
			//Jika user belum pernah membuat suatu token, maka buat baru suatu token 
			echo "User token belum dibuat!";
		}

	}
	public function create_userToken(){
		echo "Membuat suatu user token";
	}
	public function update_userToken(){
		echo "Mengupdate suatu suatu user token";
	}
	public function delete_userToken(){
		echo "Menghapus suatu user token";
	}
	

}

