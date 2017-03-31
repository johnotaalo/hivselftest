<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resources extends MY_Controller {
	protected $asset_url;

	protected $pageTitle;
	protected $pageDescription;
	protected $contentView;
	protected $contentViewData;
	protected $metaData;
	protected $modalView;
	protected $modalData;
	protected $modalTitle;

	function __construct(){
		parent::__construct();

		$this->asset_url = $this->config->item('assets_url');
		$this->load->library('Assets', $this->config);
	}

	public function index()
	{
		echo "This is the resources controller";exit;
	}

	public function what_is_prep()
	{
		$data = '';
		$this->template
				->setPartial('Resources/index_v', $data)
				->frontEndTemplate();
	}

}

?>