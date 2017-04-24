<?php

class API extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_API');
	}

	function getFacilities(){
		$columns = [];
		$limit = $offset = $search_value = $order = $order_direction = NULL;

		if($this->input->is_ajax_request()){
			$columns = [
				1	=>	"facility_code",
				2	=>	"facility_name",
				3	=>	"county_name"
			];

			$limit = $_REQUEST['length'];
			$offset = $_REQUEST['start'];
			$search_value = $_REQUEST['search']['value'];
			$order = $columns[$_REQUEST['order'][0]['column']];
			$order_direction = $_REQUEST['order'][0]['dir'];
		}
		
		$facilities = $this->M_API->searchFacility($search_value, $limit, $offset, $order, $order_direction);

		$data = [];

		if ($facilities) {
			$counter = $offset + 1;
			foreach ($facilities as $facility) {
				$data[] = [
					$counter,
					$facility->facility_code,
					$facility->facility_name,
					"<span data-value = '{$facility->county_name}' class = 'facility_county' data-type = 'select2' data-pk = '{$facility->uuid}' data-url = '".base_url('Dashboard/API/updateFacility')."' data-name = 'county_name' data-title = 'Select a County'>$facility->county_name</span>",
					"<span class = 'facility_latitude' data-type = 'text' data-pk = '{$facility->uuid}' data-url = '".base_url('Dashboard/API/updateFacility')."' data-name = 'latitude' data-title = 'Enter the latitude of the facility'>$facility->latitude</span>",
					"<span class = 'facility_longitude' data-type = 'text' data-pk = '{$facility->uuid}' data-url = '".base_url('Dashboard/API/updateFacility')."' data-name = 'longitude' data-title = 'Enter the longitude of the facility'>$facility->longitude</span>"
				];

				$counter++;
			}
		}

		if($this->input->is_ajax_request()){
			$allfacilities = $this->M_API->searchFacility();
			$total_data = count($allfacilities);
			$data_total = count($facilities);

			$json_data = [
				"draw"				=>	intval( $_REQUEST['draw']),
				"recordsTotal"		=>	intval($total_data),
				"recordsFiltered"	=>	intval(count($this->M_API->searchFacility($search_value))),
				"data"				=>	$data	
			];

			return $this->output->set_content_type('application/json')->set_output(json_encode($json_data));
		}
	}

	function getPharmacies(){
		$columns = [];
		$limit = $offset = $search_value = $order = $order_direction = NULL;

		if($this->input->is_ajax_request()){
			$columns = [
				1	=>	"pharmacy_name",
				2	=>	"pharmacy_contact_person",
				4	=>	"pharmacy_location"
			];

			$limit = $_REQUEST['length'];
			$offset = $_REQUEST['start'];
			$search_value = $_REQUEST['search']['value'];
			$order = $columns[$_REQUEST['order'][0]['column']];
			$order_direction = $_REQUEST['order'][0]['dir'];
		}

		$pharmacies = $this->M_API->searchPharmacy($search_value, $limit, $offset, $order, $order_direction);
		$data = [];
		if ($pharmacies) {
			$counter = $offset + 1;
			foreach ($pharmacies as $pharmacy) {
				$data[] = [
					$counter,
					"<span data-type = 'text' class = 'pharmacy_name' data-pk = '{$pharmacy->id}' data-url = '".base_url('Dashboard/API/updatePharmacy')."' data-name = 'pharmacy_name' data-title = 'Enter Pharmacy Name'>$pharmacy->pharmacy_name</span>",
					"<span data-type = 'text' class = 'pharmacy_contact_person' data-pk = '{$pharmacy->id}' data-url = '".base_url('Dashboard/API/updatePharmacy')."' data-name = 'pharmacy_contact_person' data-title = 'Enter Pharmacy Contact Person'>$pharmacy->pharmacy_contact_person</span>",
					"<span data-type = 'text' class = 'pharmacy_phone' data-pk = '{$pharmacy->id}' data-url = '".base_url('Dashboard/API/updatePharmacy')."' data-name = 'pharmacy_phone' data-title = 'Enter Pharmacy Phone Number'>$pharmacy->pharmacy_phone</span>",
					"<span data-type = 'text' class = 'pharmacy_location' data-pk = '{$pharmacy->id}' data-url = '".base_url('Dashboard/API/updatePharmacy')."' data-name = 'pharmacy_location' data-title = 'Enter Pharmacy Location'>$pharmacy->pharmacy_location</span>",
					"<span data-type = 'text' class = 'pharmacy_latitude' data-pk = '{$pharmacy->id}' data-url = '".base_url('Dashboard/API/updatePharmacy')."' data-name = 'pharmacy_latitude' data-title = 'Enter Pharmacy Latitude'>$pharmacy->pharmacy_latitude</span>",
					"<span data-type = 'text' class = 'pharmacy_longitude' data-pk = '{$pharmacy->id}' data-url = '".base_url('Dashboard/API/updatePharmacy')."' data-name = 'pharmacy_longitude' data-title = 'Enter Pharmacy Longitude'>$pharmacy->pharmacy_longitude</span>"
				];

				$counter++;
			}
		}

		if($this->input->is_ajax_request()){
			$allpharmacies = $this->M_API->searchPharmacy();
			$total_data = count($allpharmacies);
			$data_total = count($pharmacies);

			$json_data = [
				"draw"				=>	intval( $_REQUEST['draw']),
				"recordsTotal"		=>	intval($total_data),
				"recordsFiltered"	=>	intval(count($this->M_API->searchPharmacy($search_value))),
				"data"				=>	$data	
			];

			return $this->output->set_content_type('application/json')->set_output(json_encode($json_data));
		}
	}

	function updateFacility(){
		$response = [];
		$update_data = [
			$this->input->post('name')	=>	$this->input->post('value')
		];

		$this->db->where('uuid', $this->input->post('pk'));

		$update = $this->db->update('facilities', $update_data);

		if ($update) {
			$response = [
				'message'	=>	'Successfully updated data'
			];
		}else{
			$this->output->set_status_header(500);
			$response = [
				'message'	=>	'There was an error trying to update this data'
			];
		}

		return $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function updatePharmacy(){
		$response = [];
		$update_data = [
			$this->input->post('name')	=>	$this->input->post('value')
		];

		$this->db->where('id', $this->input->post('pk'));

		$update = $this->db->update('pharmacies', $update_data);

		if ($update) {
			$response = [
				'message'	=>	'Successfully updated data'
			];
		}else{
			$this->output->set_status_header(500);
			$response = [
				'message'	=>	'There was an error trying to update this data'
			];
		}

		return $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}