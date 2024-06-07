<?php


class Pembayaran extends Midtrans_app{


	protected
	$token_serverKey_midtrans = "SB-Mid-server-4hm0wuqJwfYFj3Uq1OQZ7-66",
	$token_clientKey_midtrans = "SB-Mid-client-Kvfg9CdiDi02G7oV";

	public function __construct(){
		parent::__construct();
		$this->load->model('Transaksi_model');
		$this->load->model('User_model');
	}

	public function get_token(){

		//Method ini akan dijalankan secara ajax 
		error_reporting(0); //Untuk menghandle error karena ini sandbox 

		//Format Row Transaksi
		$row_transaksi_format = array(
			'transaction_details' => array(
				'order_id' => rand(),
				'gross_amount' => 10000,
			),
			'customer_details' => array(
				'first_name' => 'CONTOH',
				'email' => 'contoh@example.com',
				'phone' => '08111222333',
			),
		);


		// LEWAT AJAX POST DI VIEW INDEX PEMBAYARAN
		if ( isset($_POST['transaksi_submit_ajax']) ) {
		
			$id_transaksi = $this->input->post('id_transaksi'); //Sesuai format data yang dikirim lewat ajax 

			//Ubah nilai row transaksi yang akan di proses snap dengan data data imlai id transaksi yang dipilih
			$row_transaksi = $this->Transaksi_model->get_single(['id_transaksi' => $id_transaksi ]); 
			$row_transaksi_format['transaction_details']['order_id'] = $row_transaksi['id_transaksi'];
			$row_transaksi_format['transaction_details']['gross_amount'] = $row_transaksi['total_harga'];
			// Data user 
			$user_trans = $row_transaksi['user_beli'];
			$row_user_transaksi = $this->User_model->get_single(['user'=>$user_trans]);
			$row_transaksi_format['customer_details']['first_name'] = $row_user_transaksi['nama'];
			$row_transaksi_format['customer_details']['email'] = $row_user_transaksi['email'];

			$init_token = $this->init_token( $row_transaksi_format );
			echo $init_token; //Untuk ajax 
		}
	}
	public function index( $id_transaksi ){

		$row_transaksi = $this->Transaksi_model->get_single(['id_transaksi' => $id_transaksi ]);
		//Jika tidak ada row transaksi yang terkait dengan id transaksi pada parammeter maka tidak bisaa masuk.
		if ( empty( $row_transaksi ) ) {
			$this->session->set_flashdata('Transaksi S', 'Tidak ada transaksi yang dipilih!');
			redirect('Auth_keranjang');
			die;
		}

		$data = [];
		$data['row_transaksi'] = $row_transaksi;
		$data['token_serverKey_midtrans'] = $this->token_serverKey_midtrans;
		$data['token_clientKey_midtrans'] = $this->token_clientKey_midtrans;
		$this->view('Pembayaran/index', $data);
	}

}

class Midtrans_app extends App_controller{

	public function init_token( $row_transaksi ){


		//Karena semua controller pada suatu skema mvc itu pasti berjalan di index 
		require_once 'Midtrans/Midtrans.php'; 

		//SAMPLE REQUEST START HERE

		// Set your Merchant Server Key
		\Midtrans\Config::$serverKey = $this->token_serverKey_midtrans;
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;

		// Disable SSL verification (Not recommended for production)
		\Midtrans\Config::$curlOptions = array(
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
		);


		$snapToken = \Midtrans\Snap::getSnapToken($row_transaksi);
		return $snapToken;
	}
}



