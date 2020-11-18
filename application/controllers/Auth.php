<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{

		//mencegah user kembali ke halaman login
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			//validasi lolos
			$this->_login();
		}
	}

	private function _login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		//SELECT * FROM user WHERE email = $email
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		//usernya ada
		if ($user) {
			//jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id' => $user['id'],
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					//simpan ke dalam session
					$this->session->set_userdata($data);
					//cek role_id, apakah user biasa atau admin
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah! </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email Belum Aktif! </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Login Gagal! </div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		//mencegah user kembali ke halaman login
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		//set rules untuk input
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email has already registered']); // array untuk menampilkan pesan error buatan jika rules tidak terpenuhi
		//matches digunakan untuk mencocokkan input dari dua name pada tag input
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'WPU Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Registrasi Berhasil! </div>');
			redirect('auth/index');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Anda Telah Logout! </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
