<?php

class Sites extends DashboardController{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Excel');
	}

	// pharmacies sub section

	function pharmacies(){
		$js_data['counties'] = $this->getCounties();
		$this->assets
				->addCss('dashboard/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css')
				->addCss('plugin/bootstrap3-editable/css/bootstrap-editable.css')
				->addCss('plugin/select2/css/select2.min.css');

		$this->assets
				->addJs('plugin/select2/js/select2.full.min.js')
				->addJs('dashboard/vendor/datatables/media/js/jquery.dataTables.min.js')
				->addJs('dashboard/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js')
				->addJs('dashboard/vendor/datatables.net-buttons/js/buttons.html5.min.js')
				->addJs('dashboard/vendor/datatables.net-buttons/js/buttons.print.min.js')
				->addJs('dashboard/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')
				->addJs('dashboard/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')
				->addJs('plugin/bootstrap3-editable/js/bootstrap-editable.min.js');

		$this->assets->setJavascript('Dashboard/sites/sites_js', $js_data);
		$this->template
					->setPartial('Dashboard/sites/pharmacies_v')
					->adminTemplate();
	}

	function addPharmacy(){
		if ($this->input->post()) {
			$insertData = [
				'pharmacy_name'	=>	$this->input->post('pharmacy_name'),
				'pharmacy_contact_person'	=>	$this->input->post('contact_person'),
				'pharmacy_phone'	=>	$this->input->post('pharmacy_phone'),
				'pharmacy_location'	=>	$this->input->post('pharmacy_location'),
				'pharmacy_longitude'	=>	$this->input->post('pharmacy_longitude'),
				'pharmacy_latitude'	=>	$this->input->post('pharmacy_latitude')
			];

			$insert = $this->db->insert('pharmacies', $insertData);

			redirect('Dashboard/Sites/pharmacies');
		}
	}

	

	// end of pharmacies sub section

	// referrals sub section
	function referrals(){
		$js_data['counties'] = $this->getCounties();
		$this->assets
				->addCss('dashboard/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css')
				->addCss('plugin/bootstrap3-editable/css/bootstrap-editable.css')
				->addCss('plugin/select2/css/select2.min.css');

		$this->assets
				->addJs('plugin/select2/js/select2.full.min.js')
				->addJs('dashboard/vendor/datatables/media/js/jquery.dataTables.min.js')
				->addJs('dashboard/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js')
				->addJs("dashboard/vendor/pdfmake/build/pdfmake.min.js")
				->addJs("dashboard/vendor/pdfmake/build/vfs_fonts.js")
				->addJs('dashboard/vendor/datatables.net-buttons/js/buttons.html5.min.js')
				->addJs('dashboard/vendor/datatables.net-buttons/js/buttons.print.min.js')
				->addJs('dashboard/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')
				->addJs('dashboard/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')
				->addJs('plugin/bootstrap3-editable/js/bootstrap-editable.min.js');

		$this->assets->setJavascript('Dashboard/sites/sites_js', $js_data);
		$this->template
					->setPartial('Dashboard/sites/referrals_v')
					->adminTemplate();
	}

	function importFacilities(){
		$file_path = './docs/facilites_geo_codes.xlsx';
		$data = $this->excel->readExcel($file_path);
		if (count($data) > 0) {
			foreach ($data as $item => $itemData) {
				$headers = $itemData[0];
				$dbColumns = $this->getDbColumnNames($item);
				$cleaned_headers = array_replace($headers, $dbColumns);
				$insertData = [];

				for ($i=1; $i < count($itemData); $i++) { 
					if ($itemData[$i][1] != "" && is_numeric($itemData[$i][1])) {
						$rowData = array_combine($cleaned_headers, $itemData[$i]);
						array_push($insertData, $rowData);
					}
				}

				if (count($insertData)) {
					if ($item == "facilities") {
						$this->db->insert_batch('facilities', $insertData);
					}
				}
			}
		}
	}

	function getDbColumnNames($table = 'facilities'){
		$dbColumns = [];
		switch ($table) {
			case 'facilities':
				$dbColumns = [
					0	=>	'dhis_code',
					1	=>	'facility_code',
					2	=>	'facility_name',
					3	=>	'longitude',
					4	=>	'latitude',
					5	=>	'county_name'
				];
			break;
			default:
				# code...
				break;
		}

		return $dbColumns;
	}

	// end of referrals sub section
}