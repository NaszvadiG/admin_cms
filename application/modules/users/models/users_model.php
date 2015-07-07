<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model {

    /**
     *@author Ado Pabianko
     *Create Module Users
     **/

    function getAllDataUsers()
    {
        $this->db->select('
            tbl_users.id,
            tbl_users.firstname,
            tbl_users.lastname,
            tbl_users.username,
            tbl_users.active,
            tbl_roles.rolename
        ');
        $this->db->join('tbl_roles','tbl_roles.id = tbl_users.role_id');
        $q = $this->db->get('tbl_users');

        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return array();
        }
    }
}