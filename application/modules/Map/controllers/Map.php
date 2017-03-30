<?php
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends MY_Controller{
	protected $client;
	function __construct(){
		parent::__construct();
		$this->client = new Client();
	}

	function index(){
		$this->load->config('map');
		$this->load->view('Map/index_v');
	}

	function getPharmacies(){
		$this->db->where('pharmacy_latitude IS NOT NULL', NULL, FALSE);
		$this->db->where('pharmacy_longitude IS NOT NULL', NULL, FALSE);
		$pharmacies = $this->db->get('pharmacies')->result();
		$response = [];
		foreach ($pharmacies as $pharmacy) {
			$response[] = [
				'latitude'	=>	$pharmacy->pharmacy_latitude,
				'longitude'	=>	$pharmacy->pharmacy_longitude,
				'name'		=>	$pharmacy->pharmacy_name
			];
		}

		return $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}