<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workouts_model extends CI_Model
{
	public function getallworkouts()
	{
		return $this->db->get_where('workouts')->result_array();
	}
	
}