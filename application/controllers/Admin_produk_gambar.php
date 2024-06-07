<?php 

class Admin_produk_gambar extends Admin_controller{

	public 
	$id_produk = false,
	$param_direct = false;

	public function __construct(){
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->model('ProdukGambar_model');

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
		$data['id_produk'] = $this->id_produk;
		$data['row_produk'] = $this->Produk_model->get_single(['id_produk'=> $this->id_produk ] );
		$data['data_produk_gambar'] = $this->ProdukGambar_model->get_many( ['id_produk' => $this->id_produk ]);

		$this->view( 'Admin_produk_gambar/index', $data );
	}

	public function tambah(){
		if ( $this->input->post('submit') ) {

			$tambah_gambar = $this->ProdukGambar_model->tambah($this->id_produk);
			$msg = $tambah_gambar['msg'];

			$this->session->set_flashdata('tambah_gambar', $msg);

			redirect('Admin_produk_gambar/' . $this->param_direct );
		}
	}

}