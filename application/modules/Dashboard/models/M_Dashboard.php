<?php

class M_Dashboard extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	function getGender(){
		return $this->db->get('gender')->result();
	}

	function getPreferredKit(){
		$sql = "SELECT kit,MAX(number) as number FROM (SELECT k.kit, count(ukr.id) as `number` FROM user_kit_results ukr
		JOIN kits k ON k.id = ukr.kit_id
		GROUP BY k.id) b;";

		return $this->db->query($sql)->row();
	}

	function getAgeKitNumbers(){
		$this->db->select('k.kit');
		$this->db->select_max('s.age', 'oldest');
		$this->db->select_min('s.age', 'youngest');
		$this->db->from('survey s');
		$this->db->join('user_kit_results ukr', 'ukr.id = s.id');
		$this->db->join('kits k', 'k.id = ukr.kit_id');
		$this->db->group_by('k.id');

		return $this->db->get()->result();
	}

	function getGenderKitNumbers($kit_id, $gender_id){
		$this->db->select('count(DISTINCT(s.id)) as numbers');
		$this->db->from('survey s');
		$this->db->join('user_kit_results ukr', 'ukr.id = s.id');
		$this->db->join('kits k', 'k.id = ukr.kit_id');
		$this->db->join('gender g', 'g.id = s.gender');
		$this->db->where('k.id', $kit_id);
		$this->db->where('g.id', $gender_id);
		$this->db->group_by('g.id');

		return $this->db->get()->row();
	}
}