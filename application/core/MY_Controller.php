<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->module('Template');
	}

	function getCounties(){
		$option_string = "";
		$counties = $this->db->get('county')->result();

		if($counties){
			foreach ($counties as $county) {
				$coordinates_json = $county->county_coordinates;
				$coordinates_array = json_decode($coordinates_json);
				$coordinates = $coordinates_array[0][0][1];

				$option_string .= "<option data-lng = '{$coordinates[0]}' data-lat = '{$coordinates[1]}' value = '{$county->county_name}'>{$county->county_name}</option>";
			}
		}


		return $option_string;
	}
	
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */