<?php

class Referrals extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->config('Map/map');
	}

	function index(){
		$data = [];

		$data['counties'] = $this->getCounties();
		$this->assets
				->addCss('plugin/select2/css/select2.min.css')
				->addJs('plugin/select2/js/select2.min.js');
		$this->assets->setJavascript('Referrals/map_js');
		$this->template
				->setPartial('Referrals/index', $data)
				->frontEndTemplate();
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

	function getfacilities(){
		if ($this->input->post()) {
			$response = [];
			$county = $this->input->post('county');
			if($county){
				$this->db->where('county_name', $county);
			}
			$facilities = $this->db->get('facilities')->result();
			if($facilities){
				$response['status'] = true;
				$counter = 1;
				$table = "";
				foreach ($facilities as $facility) {
					$response['map_data'][] = [
						'lat'			=>	$facility->latitude,
						'lng'			=>	$facility->longitude,
						'contentString'	=>	$facility->facility_name,
						'title'			=>	$facility->facility_name
					];

					$table .= "<tr>
					<td>{$counter}</td>
					<td>{$facility->facility_code}</td>
					<td>{$facility->facility_name}</td>
					</tr>";

					$counter++;
				}
				$response['table']	= $table;
			}else{
				$response['status'] = false;
				$response['message'] = "There are no facilties for the selected county";
			}

			return $this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}
}