<?php

class App_dashboard extends App_controller{

	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->view('App_dashboard/index');
	}

}