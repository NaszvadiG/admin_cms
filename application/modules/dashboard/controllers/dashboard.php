<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ado Pabianko
 * Email adopabianko@gmail.com
 * Class Dashboard
 */

class Dashboard extends CI_Controller {

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