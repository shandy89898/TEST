<?php 


class Lokasi extends Admin_controller{

	public function __construct(){
		parent::__construct();

	}
	public function index(){

// URL endpoint RESTful API
		$api_url = 'http://127.0.0.1/My_Script/SCRIPT_PROJECT/client_product/Konsep_OOP/APP_BASE_CI_3/APP_PROYEK/GET/Lokasi'; // Ganti dengan URL endpoint Anda

// Inisialisasi cURL
		$ch = curl_init();

// Set opsi cURL
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPGET, true);

// Eksekusi cURL dan ambil respons
		$response = curl_exec($ch);

// Periksa apakah terjadi kesalahan
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		} else {
    // Decode dan tampilkan hasil
			$response_data = json_decode($response, true);
		}

// Tutup cURL
		curl_close($ch);

		$data =[];
		$data['data_lokasi'] = $response_data;
		$this->view( 'Lokasi/index', $data );
	}


	public function tambah_lokasi(){
		// URL endpoint RESTful API
		$api_url = 'http://127.0.0.1/My_Script/SCRIPT_PROJECT/client_product/Konsep_OOP/APP_BASE_CI_3/APP_PROYEK/POST/Lokasi'; // Ganti dengan URL endpoint Anda

		// Data yang akan dikirim melalui POST
		$post_data = $this->input->post();

		// Inisialisasi cURL
		$ch = curl_init();

	// Set opsi cURL
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

// Eksekusi cURL dan ambil respons
		$response = curl_exec($ch);

// Periksa apakah terjadi kesalahan
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		} else {
    // Decode dan tampilkan hasil
			$response_data = json_decode($response, true);
			$this->session->set_flashdata('lokasi_c', 'Proses Berhasil!');
			redirect('Lokasi');
		
		}

// Tutup cURL
		curl_close($ch);
	}


	public function delete_lokasi( $id_lokasi ){
		// URL endpoint RESTful API
		$api_url = 'http://127.0.0.1/My_Script/SCRIPT_PROJECT/client_product/Konsep_OOP/APP_BASE_CI_3/APP_PROYEK/DELETE/Lokasi/'.$id_lokasi; 
		// Inisialisasi cURL
		$ch = curl_init();

// Set opsi cURL
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Menetapkan metode HTTP sebagai DELETE

// Eksekusi cURL dan ambil respons
		$response = curl_exec($ch);

// Periksa apakah terjadi kesalahan
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		} else {
    // Decode dan tampilkan hasil
			$response_data = json_decode($response, true);
			$this->session->set_flashdata('lokasi_c', 'Proses Berhasil!');
			redirect('Lokasi');
		
		}

// Tutup cURL


	}
}




