<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 *@author Ado Pabianko
     *Module Dashboard
	**/

	public function __construct()
	{
		parent::__construct();
		//Redirect ke halaman login
		if ($this->session->userdata('logged_in') == FALSE){redirect('login');}
	}
    
	public function index()
	{
		$data = array(
			'title'    => 'Administrator',
			'subtitle' => 'Dashboard',
			'content'  => 'dashboard'
		);

		$this->load->view('template',$data);
	}
}