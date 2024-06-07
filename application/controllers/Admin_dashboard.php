<?php 


class Admin_dashboard extends Admin_controller{

	public function __construct(){
		parent::__construct();

	}
	public function index(){


		$this->view( 'Admin_dashboard/index' );
	}

}


