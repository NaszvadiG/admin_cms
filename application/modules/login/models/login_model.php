<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ado Pabianko
 * Email adopabianko@gmail.com
 * Class Login_Model
 */

class Login_Model extends CI_Model {

	public function getDataLogin($username,$password)
	{
		$cekLogin = $this->db->get_where('
            tbl_users',
            array(
                'username' => $username, 
                'password' => $password), 1, 0
            );

        if ($cekLogin->num_rows() > 0)
        {
            $user = $cekLogin->row();

            $session = array(
                'logged_in'     => 1,
                'id'       		=> $user->id,
                'firstname'     => $user->firstname,
                'lastname'      => $user->lastname,
                'username'      => $user->username,
                'date_created'  => $user->date_created
            );

            $this->session->set_userdata($session);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
	}

}