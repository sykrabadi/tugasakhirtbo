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
		$data['title'] = 'Sistem Informasi PKM';
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
			$name = $this->input->post('name');
			$email = $this->input->post('email');

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
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profil Berhasil Diubah! </div>');
			redirect('user');
		}
	}

	public function beranda()
	{
		$data['title'] = 'Beranda';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/beranda', $data);
		$this->load->view('templates/footer');
	}
}