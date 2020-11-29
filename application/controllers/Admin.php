<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['title'] = 'Ini Gym - Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		//panggil file index dalam folder user, dalam folder view
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{

		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		//panggil file index dalam folder user, dalam folder view
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}
	
	public function roleAccess($role_id)
	{

		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		//panggil file index dalam folder user, dalam folder view
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1){
			$this->db->insert('user_access_menu', $data);
		}else{
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	public function getAllPesertaById($id)
	{
		$data['title'] = 'Daftar Peserta';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['users'] = $this->db->get_where('registered_team', ['id_lomba' => $id])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/daftarpeserta', $data);
		$this->load->view('templates/footer');
	}

	public function getallmembers()
	{
		$data['title'] = 'Daftar Member';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('User_model','user');
		$data['users'] = $this->user->getallmembers();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('workout/members', $data);
		$this->load->view('templates/footer');
	}

	// public function getusersworkouts()
	// {
	// 	$data['title'] = 'Users Workout Plan';
	// 	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

	// 	$this->load->model('Workouts_model','workouts');
	// 	$data['users_workouts'] = $this->workouts->getallworkouts();

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/sidebar', $data);
	// 	$this->load->view('templates/topbar', $data);
	// 	$this->load->view('workout/users_workouts', $data);
	// 	$this->load->view('templates/footer');
	// }

	public function getuserworkoutbyid($user_id)
	{
		$data['title'] = 'Users Workout Plan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_id'] = $user_id;
		$data['member_workout'] = $this->db->get_where('workouts', ['user_id' => $user_id])->result_array();
		$data['member_detail'] = $this->db->get_where('user', ['id' => $user_id])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('workout/users_workouts', $data);
		$this->load->view('templates/footer');
	}

	public function setuserworkoutbyid($user_id)
	{
		$data['title'] = 'Member Workout Plan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_id'] = $user_id;
		$data['member_detail'] = $this->db->get_where('user', ['id' => $user_id])->row_array();

		$this->form_validation->set_rules('angkat_beban', 'Angkat Beban', 'required');
		$this->form_validation->set_rules('lari', 'Lari', 'required');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('workout/set_users_workouts', $data);
			$this->load->view('templates/footer');
		}else{
			$data = [
		        'user_id' 	   => $user_id,
		        'angkat_beban' => $this->input->post('angkat_beban'),
		        'lari'		   => $this->input->post('lari')
	      	];
	      $this->db->insert('workouts_admin', $data);

	      //update kondisi is_accepted menjadi accepted (1) pada tabel workouts
	      $this->db->set('is_accepted', 1);
	      $this->db->where('user_id', $user_id);
	      $this->db->update('workouts');
	      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Workout Plan Berhasil Ditambahkan! </div>');
	      redirect('admin/getuserworkout');
		}
	}
}