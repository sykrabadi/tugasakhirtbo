<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workouts_model extends CI_Model
{
	public function getallworkouts()
	{
		$this->db->select('*');
		$this->db->from('workouts');
		$this->db->join('user', 'workouts.user_id = user.id');
		return $this->db->get();
	}
	
}