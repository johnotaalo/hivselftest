<?php

class M_Dashboard extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	function getGender(){
		return $this->db->get('gender')->result();
	}
}