<?php

class Dashboard extends DashboardController{
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$data['stats']	= $this->getInHouseCounters();
		$this->assets->setJavascript('Dashboard/dashboard/dashboard_js');
		$this->template
				->setPartial('Dashboard/dashboard/dashboard_v', $data)
				->adminTemplate();
	}

	function getSessions(){
		$this->load->library('GAnalytics');
		$sessions = $this->ganalytics->getResults();

		$response = [
			'type'	=>	true,
			'data'	=>	[
				'views'	=>	$sessions
			]
		];

		$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}

	function getInHouseCounters(){
		$surveys = $this->db->get('survey')->num_rows();
		$pharmacies = $this->db->get('pharmacies')->num_rows();
		$referrals = $this->db->get('facilities')->num_rows();

		return [
			'surveys'		=>	$surveys,
			'pharmacies'	=>	$pharmacies,
			'referrals'		=>	$referrals
		];
	}
}