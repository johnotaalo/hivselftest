<?php

class Surveys extends DashboardController{
	protected $gender;
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard');

		$this->gender = $this->M_Dashboard->getGender();
	}

	function index(){
		$this->assets
				->addJs('dashboard/vendor/jquery-flot/jquery.flot.js')
				->addJs('dashboard/vendor/jquery-flot/jquery.flot.pie.js')
				->addJs('dashboard/vendor/chartjs/Chart.min.js')
				->setJavascript('Dashboard/surveys/survey_js');
		$this->template
				->setPartial('Dashboard/surveys/index_v')
				->adminTemplate();
	}

	function getAnalyticsData(){
		$response = $monthly_count_data = $gender_data = $average_age_data = $gendernos = $monthly_curve_data = [];
		// get number of users grouped by gender
		$this->db->select('g.gender, g.color, count(s.age) as age');
		$this->db->from('survey s');
		$this->db->join('gender g', 'g.gender=s.gender', 'right');
		$this->db->group_by('g.gender');
		$gender_counts = $this->db->get()->result();

		if ($gender_counts) {
			foreach ($gender_counts as $gender_count) {
				$count = ($gender_count->age == null) ? 0 : $gender_count->age;
				$gender_data[] = [
					'label'	=>	$gender_count->gender,
					'data'	=>	$count,
					'color'	=>	$gender_count->color	
				];

				$gendernos[$gender_count->gender] = $count;
			}
		}

		// getting average age of users grouped by users
		$this->db->select('g.gender');
		$this->db->select_avg('s.age');
		$this->db->from('survey s');
		$this->db->join('gender g', 'g.gender=s.gender', 'right');
		$this->db->group_by('g.gender');

		$average_ages = $this->db->get()->result();

		if ($average_ages) {
			$total_age_averages = 0;
			foreach ($average_ages as $gender_age) {
				$average_age = ($gender_age->age == null) ? 0 : $gender_age->age;

				$total_age_averages += $average_age;

				$average_age_data[$gender_age->gender] = $average_age;
			}

			$response['data']['overall_average'] = round($total_age_averages / 3, 0);
		}

		$monthly_counts = $this->db->query("SELECT g.gender, count(s.id) as age FROM survey s
			RIGHT JOIN gender g ON g.gender = s.gender AND MONTH(s.date_of_entry) = " . date('n') ."
			GROUP BY g.gender")->result();

		if ($monthly_counts) {
			$total_monthly_count = 0;
			foreach ($monthly_counts as $monthly_count) {
				$count = ($monthly_count->age == null) ? 0 : $monthly_count->age;
				$total_monthly_count += $count;
				$monthly_count_data[$monthly_count->gender] = $count;
			}

			$response['data']['monthly_total'] = $total_monthly_count;
		}

		// getting data for months
		$from_date = date("Y-m-01", strtotime("-6months"));
		$to_date = date('Y-m-d');

		$sql = "SELECT 
					DATE_FORMAT(date_of_entry, '%M') as `month`,
					count(id) as surveys
				FROM survey
				GROUP BY DATE_FORMAT(date_of_entry, '%M %Y')
				ORDER BY date_of_entry ASC
				LIMIT 6;";

		$monthly_data = $this->db->query($sql)->result();

		if ($monthly_data) {
			$outer_key = 0;
			$data_set = [];
			foreach ($monthly_data as $month) {
				$monthly_curve_data['labels'][] = $month->month;
				$data_set[] = $month->surveys;
				$outer_key++;
			}

			$monthly_curve_data['datasets'][] = [
				"label"					=>	"Surveys",
				"backgroundColor"		=>	"rgba(254,223,0,0.5)",
				"data"					=>	$data_set,
				"lineTension"			=>	0,
				"pointBorderWidth"		=>	1,
				"pointBackgroundColor"	=>	"rgba(254,223,0,1)",
				"pointRadius"			=>	3,
				"pointBorderColor"		=>	"#ffffff",
				"borderWidth"			=>	1
			];
		}

		$response['data']['monthly_curve_data']	= $monthly_curve_data;
		$response['data']['average_ages'] = $average_age_data;
		$response['data']['gender_counts'] = $gender_data;
		$response['data']['gendernos'] = $gendernos;
		$response['data']['monthly_count'] = $monthly_count_data;

		return $this->output->set_content_type('application/json')->set_output(json_encode($response, JSON_NUMERIC_CHECK));
	}
}