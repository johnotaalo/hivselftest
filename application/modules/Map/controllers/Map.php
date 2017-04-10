<?php
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends MY_Controller{
	protected $client;
	function __construct(){
		parent::__construct();
		$this->load->config('map');
	}

	function index(){
		$data['pharmacy_table'] = $this->getPharmaciesList();
		$this->assets->setJavascript('Map/map_js');
		$this->template
				->setPartial('Map/index_v', $data)
				->frontEndTemplate();
	}

	function getPharmacies(){
		$this->db->where('pharmacy_latitude IS NOT NULL', NULL, FALSE);
		$this->db->where('pharmacy_longitude IS NOT NULL', NULL, FALSE);
		$pharmacies = $this->db->get('pharmacies')->result();
		$response = [];
		foreach ($pharmacies as $pharmacy) {
			// $response[] = [
			// 	'latitude'			=>	$pharmacy->pharmacy_latitude,
			// 	'longitude'			=>	$pharmacy->pharmacy_longitude,
			// 	'content_string'	=>	"<b>$pharmacy->pharmacy_name</b><br/><b>Name: </b>$pharmacy->pharmacy_location<br/><b>Contact Person: </b>$pharmacy->pharmacy_contact_person<br/><b>Phone: </b>$pharmacy->pharmacy_phone",
			// 	'name'				=>	$pharmacy->pharmacy_name
			// ];
			$response[] = [
				'latitude'			=>	$pharmacy->pharmacy_latitude,
				'longitude'			=>	$pharmacy->pharmacy_longitude,
				'content_string'	=>	"<b>$pharmacy->pharmacy_name</b><br/><b>Name: </b>$pharmacy->pharmacy_location<br/><b>Contact Person: </b>$pharmacy->pharmacy_contact_person<br/>",
				'name'				=>	$pharmacy->pharmacy_name
			];
		}

		return $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function getPharmaciesList(){
		$this->db->where('pharmacy_latitude IS NOT NULL', NULL, FALSE);
		$this->db->where('pharmacy_longitude IS NOT NULL', NULL, FALSE);
		$pharmacies = $this->db->get('pharmacies')->result();
		$pharmacies_table = "";
		if($pharmacies){
			$counter = 1;
			foreach ($pharmacies as $pharmacy) {
				$pharmacies_table .= "<tr>";
				$pharmacies_table .= "<td>{$counter}</td>";
				$pharmacies_table .= "<td>".strtoupper($pharmacy->pharmacy_name)."</td>";
				$pharmacies_table .= "<td>".strtoupper($pharmacy->pharmacy_contact_person)."</td>";
				// $pharmacies_table .= "<td>".strtoupper($pharmacy->pharmacy_phone)."</td>";
				$pharmacies_table .= "<td>".strtoupper($pharmacy->pharmacy_location)."</td>";
				$pharmacies_table .= "<td>".strtoupper($pharmacy->pharmacy_name)."</td>";
				$pharmacies_table .= "</tr>";
				$counter++;
			}
		}
		else{
			$pharmacies_table .= "<tr>
				<td colspan = '6'>No Pharmacies Registered Yet</td>
			</tr>";
		}
		return $pharmacies_table;
	}
}