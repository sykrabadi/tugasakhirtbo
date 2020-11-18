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
		$data['title'] = 'Sistem Informasi PKM - Admin';
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

	public function addLomba()
	{
		$data['title'] = 'Daftar Lomba - Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['lomba'] = $this->db->get('lomba')->result_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required');
		$this->form_validation->set_rules('tingkat', 'Tingkat', 'required');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/lomba', $data);
			$this->load->view('templates/footer');
		}else{
			$data = [
				'nama' => $this->input->post('nama'),
				'penyelenggara' => $this->input->post('penyelenggara'),
				'tingkat' => $this->input->post('tingkat')
			];
			$this->db->insert('lomba', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Lomba Berhasil Ditambah! </div>');
			redirect('admin/addlomba');
		}
	}

	public function hapusLombaById($id)
	{
		$this->load->model('Menu_model', 'menu');
		$this->menu->hapusLombaById($id);
		redirect('admin/lomba');
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

	public function getallusers()
	{
		$data['title'] = 'Daftar User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model','menu');
		$data['users'] = $this->menu->getallusers();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/users', $data);
		$this->load->view('templates/footer');
	}
}