<?php

class DashboardController extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->module('Auth');
		$this->auth->checkLogin();
	}

	function getCounties(){
		$data = [];
		$counties = $this->db->get('county')->result();
		foreach ($counties as $county) {
			$data[] = [
				'id'	=>	$county->county_name,
				'text'	=>	$county->county_name
			];
		}

		return json_encode($data);
	}
}