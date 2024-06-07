<?php

class App_profile extends App_controller{

	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->view('App_profile/index');
	}




}