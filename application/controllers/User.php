<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		//panggil file index dalam folder user, dalam folder view
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		if($this->form_validation->run()==false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		}else{
			$name  = $this->input->post('name', true);
			$email = $this->input->post('email', true);
			$paket = $this->input->post('paket', true);
			$tanggal_lahir = $this->input->post('tanggal_lahir', true);
			$berat_badan = $this->input->post('berat_badan', true);
			$tinggi_badan = $this->input->post('tinggi_badan', true);
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] 	 = './assets/img/profile';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('image')){
					//cari tau nama dari gambar sebelum di upload
					$old_image = $data['user']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH.'assets/img/profile/'.$old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->set('paket', $paket);
			$this->db->set('tinggi_badan', $tinggi_badan);
			$this->db->set('berat_badan', $berat_badan);
			$this->db->set('tanggal_lahir', $tanggal_lahir);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profil Berhasil Diubah! </div>');
			redirect('user');
		}
	}

	public function getassessmentdetail()
	{
		$data['title'] = 'Detail Asesmen Awal';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		//panggil file index dalam folder user, dalam folder view
		$this->load->view('user/assessment_detail', $data);
		$this->load->view('templates/footer');
	}

	public function getworkoutdetail()
	{
		$data['title'] = 'Workout';
		$data['subtitle'] = 'Detail Workout';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['workout_detail'] = $this->db->get_where('workouts', ['no' => $this->uri->segment(3)])->row();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		//panggil file index dalam folder user, dalam folder view
		$this->load->view('workout/user_workout_detail', $data);
		$this->load->view('templates/footer');
	}
}