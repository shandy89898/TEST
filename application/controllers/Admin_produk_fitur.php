<?php 

class Admin_produk_fitur extends Admin_controller{

	public 
	$id_produk = false,
	$param_direct = false;

	public function __construct(){
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->model('ProdukFitur_model');

		if ( $this->input->get('id_produk') ) {
			$this->id_produk = $this->input->get('id_produk');
			$this->param_direct = "?id_produk=" . $this->id_produk; 
		}else{
			echo "Tidak ada produk yang dipilih untuk diatur gambarnya";
			die;
		}

	}


	public function index(){
		$data = [];
		$data['row_produk'] = $this->Produk_model->get_single(['id_produk' => $this->id_produk ]);
		$data['data_produkFitur'] = $this->ProdukFitur_model->get_many(['id_produk' => $this->id_produk]);
		$this->view( 'Admin_produk_fitur/index', $data );
	}
	public function tambah(){
		if (isset( $_POST['submit'] ) ) {
			$tambah_produkFitur = $this->ProdukFitur_model->tambah( $this->id_produk );
			$this->session->set_flashdata('tambah_produkFitur', $tambah_produkFitur['msg']);
			redirect('Admin_produk_fitur/' . $this->param_direct );
		}
	}

}