<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_user extends CI_Model
{
    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
