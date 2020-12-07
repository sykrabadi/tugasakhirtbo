<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	public function getallmembers()
	{
		$data['title'] = 'Daftar Member';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('User_model', 'user');
		$data['users'] = $this->user->getallmembers();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('workout/members', $data);
		$this->load->view('templates/footer');
	}

	public function getusersworkouts()
	{
		$data['title'] = 'User Workouts';
		$data['subtitle'] = 'Detail Workout';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Workouts_model', 'workouts');
		$data['users_workouts'] = $this->workouts->getallworkouts()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('workout/users_workouts', $data);
		$this->load->view('templates/footer');
	}

	public function getuserworkoutbyid()
	{
		$data['title'] = 'Daftar Member';
		$data['subtitle'] = 'Riwayat Workout';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['member_data'] = $this->db->get_where('user', ['id' => $this->uri->segment(3)])->row_array();
		$data['member_history'] = $this->db->get_where('workouts', ['user_id' => $this->uri->segment(3)])->result_array();
		//$data['member_history'] = $this->db->get_where('workouts' ['user_id' => $this->uri->segment(3)])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('workout/users_workouts_byid', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_data($id)
	{
		$this->load->model('m_user');
		$this->m_user->hapus_data($id);
		redirect('admin/getallmembers');
	}

	public function setuserworkoutbyid($user_id)
	{
		$data['title'] = 'Users Workout Plan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_id'] = $user_id;
		$data['member_detail'] = $this->db->get_where('user', ['id' => $user_id])->row_array();

		$this->form_validation->set_rules('angkat_beban', 'Angkat Beban', 'required');
		$this->form_validation->set_rules('lari', 'Lari', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('workout/set_users_workouts', $data);
			$this->load->view('templates/footer');
		} else {
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

	public function setassessmentbyid($user_id)
	{
		$data['title'] = 'Daftar Member';
		$data['subtitle'] = 'Asesmen Awal User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_id'] = $this->uri->segment(3);
		$data['member_detail'] = $this->db->get_where('user', ['id' => $user_id])->row_array();
		$data['workout_id'] = $this->db->get('workouts')->row();

		$this->form_validation->set_rules('bmi', 'BMI', 'required');
		$this->form_validation->set_rules('lemak_tubuh', 'Lemak Tubuh', 'required');
		$this->form_validation->set_rules('detak_jantung', 'Detak Jantung', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('workout/set_users_assessment', $data);
			$this->load->view('templates/footer');
		} else {
			$bmi 	   		= $this->input->post('bmi', true);
			$lemak_tubuh   = $this->input->post('lemak_tubuh', true);
			$detak_jantung = $this->input->post('detak_jantung', true);
			$is_assessed	= 1;
			//update kondisi is_accepted menjadi accepted (1) pada tabel workouts
			$this->db->set('bmi', $bmi);
			$this->db->set('lemak_tubuh', $lemak_tubuh);
			$this->db->set('detak_jantung', $detak_jantung);
			$this->db->set('is_assessed', $is_assessed);
			$this->db->where('id', $user_id);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Workout Plan Berhasil Ditambahkan! </div>');
			redirect('admin/getallmembers');
		}
	}

	public function getuserworkoutdetail()
	{
		$data['title'] = 'User Workouts';
		$data['subtitle'] = 'Detail Workout';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['member_detail'] = $this->db->get_where('workouts', ['no' => $this->uri->segment(3)])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		//panggil file index dalam folder user, dalam folder view
		$this->load->view('workout/user_workout_detail_for_admin', $data);
		$this->load->view('templates/footer');
	}
	public function terima()
	{
		$is_accepted = 1;
		$this->db->set('is_accepted', $is_accepted);
		$this->db->where('no', $this->uri->segment(3));
		$this->db->update('workouts');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Dikonfirmasi! </div>');
		redirect('admin/getusersworkouts/' . $this->uri->segment(3));
	}
}
