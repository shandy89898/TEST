<?php 	

class About extends Landing_controller{

	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->view('About/index');
	}
}
