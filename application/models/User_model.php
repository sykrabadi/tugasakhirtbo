<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function getallmembers()
	{
		return $this->db->get_where('user', ['role_id' => 2])->result_array();
	}
}