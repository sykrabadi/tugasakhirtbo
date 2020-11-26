<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workout extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
	
  public function index()
  {
  	$data['title'] = 'Workout';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['workout_data'] = $this->db->get_where('workouts', ['user_id' => $this->session->userdata('id')])->result_array();

    $this->form_validation->set_rules('bb', 'Berat Badan', 'required');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('workout/index', $data);
      $this->load->view('templates/footer');
    }else{
      $data = [
        'user_id' => $this->session->userdata('id'),
        'bb'      => $this->input->post('bb'),
        'tb'      => $this->input->post('tb'),
        'tanggal' => time(),
        'is_accepted' => 0
      ];
      $this->db->insert('workouts', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Workout Plan Berhasil Ditambahkan! </div>');
      redirect('workout');
    }
  }
}