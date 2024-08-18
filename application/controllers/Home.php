<?php 


class Home extends Admin_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Proyek_model');
		$this->load->model('Lokasi_model');

	}

	public function get_proyek(){

// URL endpoint RESTful API
		$api_url = 'http://127.0.0.1/My_Script/SCRIPT_PROJECT/client_product/Konsep_OOP/APP_BASE_CI_3/APP_PROYEK/GET/Proyek'; // Ganti dengan URL endpoint Anda

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

			return $response_data;
		}

// Tutup cURL
		curl_close($ch);
	}


	public function get_lokasi(){

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

			return $response_data;
		}

// Tutup cURL
		curl_close($ch);
	}



	public function index(){



		$data = [];
		$data['data_proyek'] = $this->get_proyek();
		$data['data_lokasi'] = $this->get_lokasi();

		$data['data_proyek_lokasi'] = $this->Home_model->get_many();
		$this->view('Home/index', $data);

	}
	public function tambah_proyek_lokasi(){
		$tambah = $this->Home_model->tambah();
		$this->session->set_flashdata('sd', $tambah['msg']);
		redirect('Home');
	}




}




