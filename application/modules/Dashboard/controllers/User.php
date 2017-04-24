<?php

class User extends DashboardController{
	function __construct(){
		parent::__construct();
	}

	function profile(){
		$this->template
				->setPartial('Dashboard/user/profile')
				->adminTemplate();
	}
}