<?php 


class Admin_user extends Admin_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index(){	
		//Data yang ditampilkan adalah data user yang levelnya 'user'. Jadi sesama admin tidak bisa melakukan manipulasi data. Admin hanya bisa memenipulasi data kepada user yang levelnya 'user'

		$data = [];
		$data['data_user'] = $this->User_model->get_many(['level' => 'user']);
		$this->view( 'Admin_user/index', $data );
	}
	public function tambah(){
		if ( isset($_POST['submit']) ) {
			$tambah_user = $this->User_model->tambah();
			$msg = $tambah_user['msg'];
			$this->session->set_flashdata('user_tambah', $msg);
			redirect('Admin_user');
		}
	}

	public function update( $user ){

		// Cek apakah user yang ingin di update itu ada atau tidak di tabel. Jika dia tidak ada maka jangan biarkan dia akses form ini
		$row_user = $this->User_model->get_single(['user' => $user ]);
		if ( empty($row_user) ) {
			$this->session->set_flashdata('update_produk', 'User yang ingin di update tidak terdaftar');
			redirect('Admin_user');
			die;
		}

		//Cek apakah user akun yang ingin di update sesuai atau tidak, jika levelnya bukan user maka tidak boleh melakukan update
		if ( $row_user['level'] != "user" ) {
			$this->session->set_flashdata('update_user', 'Level akun tidak sesuai, dan admin hanya bisa mengubah akun yang levelnya user!');
			redirect('Admin_user');
			die;
		}



		//Terdaapat di 2 form yang berbeda. From yang memiliki input post hidden update_img_profile adalah form yang ingin mengubah gambar 
		if ( $this->input->post('submit') ) {

			//Saat buttton submit di klik itu terdaapat di 2 form yang berbeda. From yang memiliki input post update_img_profile adalah form yang ingin mengubah gambar 

			if ( $this->input->post('update_img_profile') ) {
				//Jika yang di submit form untuk ubah gambar profile saja
				echo "Ubah Gambar Profile";
				die;
			}else{
				//Jika yang di submit form untuk ubah profile saja
				$update_user = $this->User_model->update( $user );
				$msg = $update_user['msg'];
				$this->session->set_flashdata('user_model', $msg);
			}	

			redirect("Admin_user/update/".$user);
		}

		$data = [];
		$data['row_user'] = $row_user;
		$this->view('Admin_user/update', $data);

	}

	public function delete_data( $id_user ){

		$hapus_row = $this->DataSafe_model->delete_safe( 'data_user',["id_user" => $id_user]);
		$msg = $hapus_row['msg'];

		$this->session->set_flashdata('delete_safe', $msg);

		redirect('Admin_user');
	}
	public function restore_data( $id_user ){

		$hapus_row = $this->DataSafe_model->restore_safe( 'data_user',["id_user" => $id_user]);
		$msg = $hapus_row['msg'];

		$this->session->set_flashdata('restore_safe', $msg);

		redirect('Admin_user');

	}


}


