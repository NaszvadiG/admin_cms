<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 *@author Ado Pabianko
     *Create Module Users
	**/

	public function __construct()
	{
		parent::__construct();
		//Redirect ke halaman login
		if ($this->session->userdata('logged_in') == FALSE){redirect('login');}

        //Load Model
        $this->load->model('users_model');

		//Set Form Validation
		$this->form_validation->set_message('required', '%s harus di isi');
		$this->form_validation->set_message('is_unique', '%s sudah terdaftar di database');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'trim|required|xss_clean|is_unique[tbl_users.username]');
		$this->form_validation->set_rules('hak_akses', 'Hak Akses', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
	}

	public function index()
	{
		$data = array(
			'title'    => 'Administrator - Pengguna',
			'subtitle' => 'Pengguna',
			'content'  => 'users/view',
			'users'	   => $this->users_model->getAllDataUsers()
		);

		$this->load->view('template',$data);
	}

	public function add()
	{
		$data = array(
			'title'    => 'Administrator - Pengguna',
			'subtitle' => 'Tambah Pengguna',
			'content'  => 'users/add',
			'roles'	   => $this->model_general->getAllDataFromTable('tbl_roles','','','id asc')
		);

		$this->load->view('template',$data);
	}

	public function save()
	{
		//Set Form Validation
		$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'trim|required|xss_clean');

		//Set Default Time Zone
		date_default_timezone_set("Asia/Jakarta");

        $tgl_buat       = date('Y-m-d');
		$hak_akses      = $this->input->post('hak_akses');
		$nama_depan 	= $this->input->post('nama_depan');
		$nama_belakang 	= $this->input->post('nama_belakang');
		$nama_pengguna 	= $this->input->post('nama_pengguna');
		$kata_sandi 	= $this->input->post('kata_sandi');
		$status   		= $this->input->post('status');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title'    => 'Administrator - Pengguna',
				'subtitle' => 'Tambah Pengguna',
				'content'  => 'users/add',
				'roles'	   => $this->model_general->getAllDataFromTable('tbl_roles','','','id asc')
			);

			$this->load->view('template',$data);
		} else {
			$DataUser = array(
				'role_id'  		=> $hak_akses,
				'firstname'		=> $nama_depan,
				'lastname'		=> $nama_belakang,
				'username'		=> $nama_pengguna,
				'password'		=> md5($kata_sandi),
				'active'		=> $status,
				'date_created'	=> $tgl_buat
			);

			$this->model_general->saveTable('tbl_users',$DataUser);
			redirect('users');
		}
	}

	public function edit($id)
	{
		$data = array(
			'title'    => 'Administrator - Pengguna',
			'subtitle' => 'Ubah Pengguna',
			'content'  => 'users/edit',
			'edit'	   => $this->model_general->getRowDataFromTable('tbl_users',array('id' => $id)),
			'roles'	   => $this->model_general->getAllDataFromTable('tbl_roles','','','id asc')
		);

		$this->load->view('template',$data);
	}

	public function update()
	{
		//Set Default Time Zone
		date_default_timezone_set("Asia/Jakarta");

		$id 			= $this->input->post('id');
        $tgl_ubah       = date('Y-m-d');;
		$hak_akses      = $this->input->post('hak_akses');
		$nama_depan 	= $this->input->post('nama_depan');
		$nama_belakang 	= $this->input->post('nama_belakang');
		$nama_pengguna 	= $this->input->post('nama_pengguna');
		$kata_sandi 	= $this->input->post('kata_sandi');
		$status   		= $this->input->post('status');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title'    => 'Administrator - Pengguna',
				'subtitle' => 'Ubah Pengguna',
				'content'  => 'users/edit',
				'edit'	   => $this->model_general->getRowDataFromTable('tbl_users',array('id' => $id)),
				'roles'	   => $this->model_general->getAllDataFromTable('tbl_roles','','','id asc')
			);

			$this->load->view('template',$data);
		} else {
			if (empty($kata_sandi)) {
				$DataUser = array(
					'role_id'  		=> $hak_akses,
					'firstname'		=> $nama_depan,
					'lastname'		=> $nama_belakang,
					'username'		=> $nama_pengguna,
					'active'		=> $status,
					'date_modified'	=> $tgl_ubah
				);
			} else {
				$DataUser = array(
					'role_id'  		=> $hak_akses,
					'firstname'		=> $nama_depan,
					'lastname'		=> $nama_belakang,
					'username'		=> $nama_pengguna,
					'password'		=> md5($kata_sandi),
					'active'		=> $status,
					'date_modified'	=> $tgl_ubah
				);
			}

			$this->model_general->updateTable('tbl_users',array('id' => $id),$DataUser);
			redirect('users');
		}
	}

	public function delete()
	{
        $array_id   = $this->input->post('array_id');
        $id         = $this->input->post('id');

        foreach ($array_id as $key => $value) {
            if(!empty($id[$value])) {
                $this->model_general->deleteRowTable('tbl_users',array('id' => $value));
            }
        }
		redirect('users');
	}

}

// Testing
// $id       = $this->input->post('id');
// $username = $this->input->post('username');
// $q_serach = "SELECT * FROM tbl_users WHERE id = '$id'";
// $q_result = $this->db->query($q_search);
// $search_username->result();

// if (!empty($username)) {
// 	if ($q_result->username == $username) {
// 		echo "Username tidak di ubah";
// 	} else {
// 		$search_username = "SELECT * FROM tbl_users WHERE username = '$username'";
// 		$search_result   = $this->db->query($search_username);
// 		$search_result->result();
// 		if ($search_result->username == $username) {
// 			echo "Nama Pengguna sudah terdaftar di database";
// 		} else {
// 			echo "Data Berhasil di ubah";
// 		}
// 	}
// }