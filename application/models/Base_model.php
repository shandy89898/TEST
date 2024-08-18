
<?php  


class Base_model extends CI_Model{


	


	public $data_sidebar_admin = [];


	public function __construct(){

		// Sidebar untuk menu admin
		$this->data_sidebar_admin = [

			[
				"nama_menu" => "Lokasi",
				"url_menu" => "Lokasi",
				"icon" => "fas fa-tachometer-alt",
			],

			[
				"nama_menu" => "Proyek",
				"url_menu" => "Proyek",
				"icon" => "fas fa-tachometer-alt",
			],

		];
	}	
	
	public function waktu(){
		return date('Y-m-d');
	}


}


































