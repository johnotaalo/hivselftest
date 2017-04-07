<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->model('Home_m');
	}
	
	public function index()
	{
		$this->template->setPageTitle('HIV Self Test')->setPartial('home_v')->frontEndTemplate();
	}

	public function videos()
	{
		$this->template->setPageTitle('Videos')->setPartial('videos_v')->frontEndTemplate();
	}

	public function FAQ()
	{
		$this->template->setPageTitle('FAQ')->setPartial('faq_v')->frontEndTemplate();
	}

}

/* End of file Home.php */
/* Location: ./application/modules/Home/controllers/Home.php */