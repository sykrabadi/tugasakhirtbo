<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
				FROM `user_sub_menu` JOIN `user_menu` ON 
				`user_sub_menu`.`menu_id` = `user_menu`.`id`";
		return $this->db->query($query)->result_array();
	}
	public function cekTerdaftar($id_user, $id_lomba)
	{
		$this->db->select('rt.id');
		$this->db->from('registered_team as rt');
		$this->db->join('user', 'rt.id_user = user.id');
		$this->db->join('lomba', 'rt.id_lomba = lomba.id');
		$this->db->where(array('id_user' => $id_user, 'id_lomba' => $id_lomba));
		$query = $this->db->get()->num_rows();
		if ($query === 0) {
			return false;
		} else {
			return true;
		}
	}

	public function getTeamByLomba($id_lomba)
	{
		return $this->db->get_where('registered_team', array('id_lomba' => $id_lomba))->result_array();
	}

	public function hapusLombaById($id)
	{
		$this->db->delete('lomba', ['id' => $id]);
	}

	public function getallusers()
	{
		$this->db->select();
        $this->db->from('registered_team');
        $this->db->join('lomba', 'registered_team.id_lomba = lomba.id', 'left');

		return $this->db->get()->result_array();
	}
}
