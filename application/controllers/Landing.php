<?php 

class Landing extends Landing_controller{

	public function __construct(){
		parent::__construct();

	}

	public function index(){

		$data = [];
		$NAMA_JENIS_FITUR = ""; 
		$NAMA_FITUR = ""; 
		if ( $this->input->get('id_fitur') ) {

			$id_fitur = $this->input->get('id_fitur', TRUE);
			$row_fitur = $this->Fitur_model->get_single( [ 'id_fitur' => $id_fitur ] );
			$id_template_fitur = $row_fitur['id_template_fitur'];
			$row_template = $this->TemplateFitur_model->get_single( ['id_template_fitur' => $id_template_fitur ]  ); 
			//Row template tidak usah di susun path urlnya lagi karena sudah ada di folder view, dan bisa menggunakan method view dari ci yang diarahkan langsung 
			$file_template = $row_template['file_template'];
			// var_dump($file_template);
			//Menghilangkan eksistensi 
			$file_template = explode('.php', $file_template);
			$file_template = $file_template[0];//Hanya nama file tanpa eksistensi

			$NAMA_JENIS_FITUR = $row_fitur['nama_jenis_fitur']; 
			$NAMA_FITUR = $row_fitur['nama_fitur']; 

			$view = "template_data/" . $file_template;
		}else{
			$NAMA_JENIS_FITUR = "Index"; 
			$NAMA_FITUR = "Landing"; 

			$view = "Landing/index";
		}

		$data['nama_jenis_fitur'] = $NAMA_JENIS_FITUR; 
		$data['nama_fitur'] = $NAMA_FITUR; 
		// Data produk khusus untuk template harga
		$data['data_produk'] = $this->data_produk_untukTemplateHarga(); 

		$data['data_indicator'] = $this->Base_model->data_indicator;
		$data['data_menu'] = $this->Menu_model->get_many();
		$this->view( $view, $data );
	}

	public function data_produk_untukTemplateHarga(){

		//Warning!! Cara ini diperuntukkan untuk viewnya dengan template harga menu 5_1
		$data_produk = $this->Produk_model->get_many();

		//Setiap row data produk buat key baru row_produkFitur yang dimana row_produkFitur merupakan data_produkFitur  array multidimensi. 
		foreach ($data_produk as $key => $row_produk) {
			$id_produk = $row_produk['id_produk'];
			// Ambil row produk fitur berdasarkan id, dengan one to many relasinya
			$data_produkFiturById = $this->ProdukFitur_model->get_many(['id_produk' => $id_produk]); // Array Multi dimensi

			/*
			Tambahkan setiap row dengan key baru yang valuenya berbentuk array multidimensi yang nilainya diambil dari data produk fitur berdasarkan id produk dari setiap row, dengan bentuk nantinya :
			$data_produk = [
			"row_produkFitur" => [ [ rowdariprodukfitur ], [ rowdariprodukfitur ]  ]
			]
			note : key pada data_produk yang dicontohkan diatas hanyalah simulasi, aslinya adalah key yang diambil dari database
			*/
			$data_produk[$key]['data_produkFitur'] = $data_produkFiturById; 
		}


		//Yang dikembalikan data produk yang sudah direlasikan setiap rownya, jadi tinggal di pake ajad dengan key data_produkFitur
		return $data_produk;
	}

}
