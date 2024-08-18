<?php 



class Test extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('Lokasi_model');
		$this->load->model('Proyek_model');
	}

	// Lokasi
	public function tambah_lokasi(){

		// Format data
		$data = array(
			'id' => null,
			'nama_lokasi' =>  "Jakarta",
			'negara' =>  "Indonesia",
			'provinsi' =>  "Banten",
			'kota' =>  "Tangerang",
			// 'created_at' => null
		);

		$tambah_lokasi = $this->Lokasi_model->tambah( $data );	
		var_dump($tambah_lokasi);
	}

	public function update_lokasi( $id_lokasi ){

		// Format data
		$data = array(
			'id' => null,
			'nama_lokasi' =>  "KK",
			'negara' =>  "Indonesia",
			'provinsi' =>  "Banten",
			'kota' =>  "Tangerang",
			// 'created_at' => null
		);

		$update_lokasi = $this->Lokasi_model->update( $id_lokasi, $data );	
		var_dump($update_lokasi);
	}





	// 	Proyek
	public function tambah_proyek(){

		$data = array(
			'nama_proyek' =>  'nama_proyek',
			'client' =>  'client',
			'tgl_mulai' =>  'tgl_mulai',
			'tgl_selesai' =>  'tgl_selesai',
			'pimpinan_proyek' =>  'pimpinan_proyek',
			'keterangan' =>  'keterangan',
			// 'created_at' =>  ,
		);

		$tambah_proyek = $this->Proyek_model->tambah( $data );	
		var_dump($tambah_proyek);
	}

	public function update_proyek( $id_proyek ){

		$data = array(
			'nama_proyek' =>  'nama_proyek_update',
			'client' =>  'client',
			'tgl_mulai' =>  'tgl_mulai',
			'tgl_selesai' =>  'tgl_selesai',
			'pimpinan_proyek' =>  'pimpinan_proyek',
			'keterangan' =>  'keterangan',
			// 'created_at' =>  ,
		);

		$update_proyek = $this->Proyek_model->update( $id_proyek, $data );	
		var_dump($update_proyek);
	}

	



}
