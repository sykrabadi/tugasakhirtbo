<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lomba extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Lomba';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['lomba'] = $this->db->get('lomba')->result_array();
    $this->form_validation->set_rules('namatim', 'Nama Tim', 'required');
    $this->form_validation->set_rules('dosen', 'Dosen', 'required');
    $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
    $this->form_validation->set_rules('nama1', 'Nama Anggota 1', 'required');
    $this->form_validation->set_rules('nim1', 'NIM Anggota 1', 'required');
    $this->form_validation->set_rules('jurusan1', 'Jurusan Anggota 1', 'required');
    $this->form_validation->set_rules('nama2', 'Nama Anggota 2', 'required');
    $this->form_validation->set_rules('nim2', 'NIM Anggota 2', 'required');
    $this->form_validation->set_rules('jurusan2', 'Jurusan Anggota 2', 'required');
    $this->form_validation->set_rules('id_lomba', 'id_lomba', 'required');
    $this->form_validation->set_rules('id_user', 'id_user', 'required');

    $this->load->model('Menu_model', 'menu');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('lomba/index', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'namatim' => $this->input->post('namatim'),
        'dosen' => $this->input->post('dosen'),
        'nip' => $this->input->post('nip'),
        'nama1' => $this->input->post('nama1'),
        'nim1' => $this->input->post('nim1'),
        'jurusan1' => $this->input->post('jurusan1'),
        'nama2' => $this->input->post('namatim'),
        'nim2' => $this->input->post('nim2'),
        'jurusan2' => $this->input->post('jurusan2'),
        'id_lomba' => $this->input->post('id_lomba'),
        'id_user' => $this->input->post('id_user')
      ];
      $this->db->insert('registered_team', $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Tim Berhasil Didaftarkan! </div>');
      redirect('lomba');
    }
  }
}
