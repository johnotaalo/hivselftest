<?php

class API extends MY_Controller{
	function __construct()
	{
		parent::__construct();
	}
	function index(){
		
	}
	function loadPage(){
		$response = [];

		$response['type'] = 'success';
		$response['html'] = $this->load->view('API/page_v', NULL, TRUE);
		echo json_encode($response);
	}
}