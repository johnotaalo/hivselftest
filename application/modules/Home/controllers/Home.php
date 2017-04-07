<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->model('Home_m');
	}
	
	public function index()
	{
		$this->assets
				->addCss('css/aslider.css')
				->addCss('css/viba-portfolio.css')
				->addCss('css/viba-portfolio-custom.css');
		$this->assets
				->addJs('js/vendor/jquery.swiper.min.js')
				->addJs('js/vendor/aslider.js')
				->addJs('js/vendor/viba-portfolio.js')
				->addJs('js/vendor/owl.carousel.min.js')
				->addJs('js/vendor/isotope.pkgd.min.js');
		$this->template->setPageTitle('BeSure::HIV Self Test')->setPartial('home_v2')->frontEndTemplate();
	}

	public function videos()
	{
		$this->template->setPageTitle('Videos')->setPartial('videos_v')->frontEndTemplate();
	}

	public function FAQ()
	{
		$this->template->setPageTitle('FAQ')->setPartial('faq_v')->frontEndTemplate();
	}

	public function Resources()
	{
		$this->template->setPageTitle('Resources')->setPartial('resources_v')->frontEndTemplate();
	}

}

/* End of file Home.php */
/* Location: ./application/modules/Home/controllers/Home.php */