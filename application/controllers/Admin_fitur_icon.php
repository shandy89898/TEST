<?php 

class Admin_fitur_icon extends Admin_controller{

	public 
	$id_fitur = false,
	$param_direct = false;

	public function __construct(){
		parent::__construct();
		$this->load->model('Fitur_model');
		$this->load->model('FiturIcon_model');

		if ( $this->input->get('id_fitur') ) {
			$this->id_fitur = $this->input->get('id_fitur');
			$this->param_direct = "?id_fitur=" . $this->id_fitur; 
		}else{
			echo "Tidak ada fitur yang dipilih untuk diatur gambarnya";
			die;
		}

	}

	public function index(){

		$data = []; 
		$data['id_fitur'] = $this->id_fitur;
		$data['row_fitur'] = $this->Fitur_model->get_single(['id_fitur'=> $this->id_fitur ] );
		$data['data_fitur_icon'] = $this->FiturIcon_model->get_many( ['id_fitur' => $this->id_fitur ]);

		$this->view( 'Admin_fitur_icon/index', $data );
	}

	public function tambah(){
		if ( $this->input->post('submit') ) {

			$tambah_gambar = $this->FiturIcon_model->tambah($this->id_fitur);
			$msg = $tambah_gambar['msg'];

			$this->session->set_flashdata('tambah_gambar', $msg);

			redirect('Admin_fitur_icon/' . $this->param_direct );
		}
	}
	public function hapus(){
		if ( $this->input->get('id_fitur_icon') ) {
			$id_fitur_icon = $this->input->get('id_fitur_icon', TRUE);
			$hapus_data = $this->FiturIcon_model->hapus( $id_fitur_icon );
			$msg = $hapus_data['msg'];
			
			$this->session->set_flashdata('Hapus_gambar', $msg);
			redirect('Admin_fitur_icon/' . $this->param_direct );
		}
	}

}