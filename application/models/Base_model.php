
<?php  


class Base_model extends CI_Model{


	





	public $data_sidebar_admin = [];
	public $data_sidebar_app = [];

	private $default_path_errorImg;

// Data yang akan di loop sidebar dan content section menu header landing
	public $data_jenis_fitur = [
    // [ "id_jenis" => $id_jenis, "jenis_fitur" => $jenis_fitur ];
	];

//Data yang akan di loop untuk indicator slide yang berhubungan dengan slide
	public $data_indicator = [
    // [ "title_indicator" => "Indicator 1", "title" => "", "content" => "lorem", "list" => [ "List 1", "List 2", "List 2" ] ],
	];
	public function tambah_dataRow_indicator( $title_indicator, $title, $content, $list ){
		$this->data_indicator[] = [ "title_indicator" => $title_indicator, "title" => $title, "content" => $content, "list_item" => $list ];
	}
	public function tambah_row_jenisFitur( $id_jenis, $jenis_fitur  ){
		$this->data_jenis_fitur[] = [ "id_jenis" => $id_jenis, "jenis_fitur" => $jenis_fitur ];
	}

	public function __construct(){


		//Mengisi path default jika ada gambar yang error 
		$this->default_path_errorImg = base_url() . "asset/main_asset/gam/img_error.jpg";

		// session_destroy();
				//Menambahkan data row ke jenis indicator slide untuk template
		for ($i=0; $i < 4; $i++) { 
			$this->tambah_dataRow_indicator( "Indicator " . $i , "Judul artikel " . $i, "Dapatkan laporan keuangan kredibel secara tepat waktu untuk buat keputusan bisnis efektif berkat software akuntansi online ", [
				"lorem ipsum data list",
				"lorem ipsum data list",
				"lorem ipsum data list",
			]);
		}

		//Menambahkan data row ke jenis fitur
		for ($i=0; $i < 5; $i++) { 
			$this->tambah_row_jenisFitur( "fitur_" . $i, "Jenis Fitur " . $i );
		}	

		// Sidebar untuk menu admin
		$this->data_sidebar_admin = [

			[
				"nama_menu" => "Dashboard",
				"url_menu" => "Admin_dashboard",
				"icon" => "fas fa-tachometer-alt",
			],

			[
				"nama_menu" => "Akun User",
				"url_menu" => "#",
				"icon" => "fas fa-users",
				"sub_menu" => [ 

					["nama_menu" => "Atur Level", "url_menu" => "Admin_level", "icon" => "fas fa-key"],
					["nama_menu" => "Atur User", "url_menu" => "Admin_user", "icon" => "fas fa-user"]

				]
			],


			[
				"nama_menu" => "Inventaris Menu",
				"url_menu" => "#",
				"icon" => "fas fa-list",
				"sub_menu" => [ 

					["nama_menu" => "Atur Menu", "url_menu" => "Admin_menu", "icon" => "fas fa-chevron-right"],
					["nama_menu" => "Atur Jenis Fitur", "url_menu" => "Admin_jenis_fitur", "icon" => "fas fa-chevron-right"],
					["nama_menu" => "Atur Fitur", "url_menu" => "Admin_fitur", "icon" => "fas fa-chevron-right"],
					["nama_menu" => "Atur Template Fitur", "url_menu" => "Admin_template_fitur", "icon" => "fas fa-chevron-right"]

				]
			],

			[
				"nama_menu" => "Inventaris Produk",
				"url_menu" => "#",
				"icon" => "fas fa-box",
				"sub_menu" => [ 

					["nama_menu" => "Atur Kategori", "url_menu" => "Admin_kategori", "icon" => "fas fa-chevron-right"],
					["nama_menu" => "Atur Produk", "url_menu" => "Admin_produk", "icon" => "fas fa-chevron-right"],
					["nama_menu" => "Atur Stok", "url_menu" => "Admin_Stok", "icon" => "fas fa-chevron-right"]

				]
			]

		];



		// Sidebar untuk menu user app
		$this->data_sidebar_app = [

			[ 
				"nama_menu" => "Dashboard", 
				"icon_menu" => "fas fa-tachometer-alt",
				"url_menu" => "App_dashboard"
			],    
			[ 
				"nama_menu" => "Produk", 
				"icon_menu" => "fas fa-box",
				"url_menu" => "App_produk"
			],

			[ 
				"nama_menu" => "Keranjang", 
				"icon_menu" => "fas fa-shopping-cart",
				"url_menu" => "App_keranjang"
			],

			[ 
				"nama_menu" => "Transaksi", 
				"icon_menu" => "fas fa-wallet",
				"url_menu" => "App_transaksi"
			],
			[ 
				"nama_menu" => "Profile", 
				"icon_menu" => "fas fa-user",
				"url_menu" => "App_profile"
			],  

			// [ 
			// 	"nama_menu" => "Keranjang", 
			// 	"icon_menu" => "fas fa-shopping-cart",
			// 	"url_menu" => "App_keranjang"
			// ],
			// [ 
			// 	"nama_menu" => "Transaksi", 
			// 	"icon_menu" => "fas fa-cash-register",
			// 	"url_menu" => "App_transaksi"
			// ],
		];
	}	
	//Untuk ambil path gambar produk
	public function get_imgProduk( $row_gambar ){

		$default_img = $this->default_path_errorImg;
		if ( !isset($row_gambar['file_gambar']) ) {
			return  $default_img;
		}

		$file_gambar = $row_gambar['file_gambar'];
		// File gambar adalah nilai yang diambil dari tabel database tersimpan
		$gambar = "asset_produk/" . $file_gambar; 
		//Jika  tidak ada file dari data gambar
		if ( file_exists($gambar) ) {
			$gambar = base_url() . $gambar;
		}else{
			$gambar = $default_img;
		}
		return $gambar;
	}

	public function get_imgFiturIcon( $row_gambar ){
		$default_img = $this->default_path_errorImg;
		if ( !isset($row_gambar['file_gambar']) ) {
			return  $default_img;
		}

		$file_gambar = $row_gambar['file_gambar'];
		// File gambar adalah nilai yang diambil dari tabel database tersimpan
		$gambar = "asset_fitur_icon/" . $file_gambar; 

		//Jika  tidak ada file dari data gambar
		if ( file_exists($gambar) ) {
			$gambar = base_url() . $gambar;
		}else{
			$gambar = $default_img;
		}
		return $gambar;
	}

	public function waktu(){
		return date('Y-m-d');
	}
	public function status(){
		return 'ACTIVE';
	}
	public function contact(){
		return "https://wa.me/6289612545236?text=Halo%20saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20produk%20anda";
	}


	//=========== Berkaitan dengan akun sesi aplikasi

	public function get_adminLogin(){
		//Nantinya ini akan diambil dari session admin yang sedang login 
		$login = false;
		if ( $this->session->userdata('login_admin') ) {
			$login = $this->session->userdata('login_admin');
		}
		return $login;
	}
	public function get_userLogin(){
		//Nantinya ini akan diambil dari session user yang sedang login 
		$login = false;
		if ( $this->session->userdata('login_user') ) {
			$login = $this->session->userdata('login_user');
		}
		return $login;
	}

	//Aturan, di aplikasi tidak boleh adanya 2 login yang terjadi secara bersamaan. Misalnya saat user login melakukan login maka ada akun admin juga yang login. Maka itu tidak diperbolehkan. Jadi ketika ada salah satu yang login, maka login lainnya harus di hapus 

	public function set_sesi_loginAdmin( $row_db = [] ){
		// session_destroy(); //Menghancurkan session user_login yang bukan user_admin 


		$this->session->set_userdata( 'login_admin', $row_db['user'] );
		$this->session->set_userdata( 'login_level', $row_db['level'] );
	}
	public function delete_sesi_loginAdmin(){

	}


	public function set_sesi_loginUser( $row_db = [] ){
		// session_destroy(); //Menghancurkan session user_admin yang bukan user_login 
		$this->session->set_userdata( 'login_user', $row_db['user'] );
		$this->session->set_userdata( 'login_level', $row_db['level'] );
	}




	public function cek_sesi_loginUser(){
		return 1;
		
		//Jika tidak ada sesi user login, maka tidak boleh masuk ke fitur fitur end user
		if ( !$this->session->userdata('login_user') ) {
			$this->session->set_flashdata('msg_login', 'Harap login terlebih dahulu!');
			redirect('Auth');	
		}
	}

	public function cek_sesi_loginAdmin(){
		//Jika tidak ada sesi adi login, maka tidak boleh masuk ke fitur fitur admin

		return 1;
		if ( !$this->session->userdata('login_admin') ) {
			$this->session->set_flashdata('msg_login', 'Harap login terlebih dahulu dengan akun admin kamu!');
			redirect('Auth_admin');	
		}
	}




}


































