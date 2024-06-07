<?php

class App_transaksi extends App_controller{

	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->view('App_transaksi/index');
	}

}