<?php 


class App_produk extends App_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->model('ProdukGambar_model');
	}
	public function index(){

		$data = [];
		$data['data_produk'] =  $this->Produk_model->get_many(['status' => "ACTIVE"]);
		$this->view( 'App_produk/index', $data );
	}

}


