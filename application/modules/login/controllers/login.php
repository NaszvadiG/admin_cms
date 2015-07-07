<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 *@author Ado Pabianko
     *Create Module Login
	**/

	public function __construct()
	{
		parent::__construct();

       // session_start();

        //Load Model
		$this->load->model('login_model');

		//Set Form Validation
		$this->form_validation->set_message('required', '%s harus di isi');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		$this->form_validation->set_rules('username', 'Nama Pengguna', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required|xss_clean');
	}
    
	public function index()
	{
		$data = array(
			'title'    => 'Administrator',
			'subtitle' => 'Login'
		);

		$this->load->view('input',$data);
	}

	public function log_in()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title'    => 'Administrator',
				'subtitle' => 'Login'
			);

			$this->load->view('input',$data);
		} else {
			if ($this->login_model->getDataLogin($username,md5($password)) == FALSE) {
				$this->session->set_flashdata('error','Peringatan! User tidak ditemukan');
				redirect('login');
			} elseif($this->db->get_where('tbl_users',array('active' => 'Tidak Aktif'))->row()) {
				$this->session->set_flashdata('error','Peringatan! User sudah tidak aktif');
				redirect('login');
			} else {
               // $_SESSION['ses_kcfinder'] = array();
               // $_SESSION['ses_kcfinder']['disabled'] = false;

				redirect('dashboard');
			}
		}
	}

	public function log_out()
	{
		$this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('login');
	}

}