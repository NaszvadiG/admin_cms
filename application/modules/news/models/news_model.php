<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_Model extends CI_Model {

    /**
     *@author Ado Pabianko
     *Create Module News
     **/

    function getAllDataNews()
    {
        $this->db->select('
            tbl_users.firstname,
            tbl_news.news_title,
            tbl_news.news_content,
            tbl_news.id,
            tbl_news.publish,
            tbl_news.date_created
        ');
        $this->db->join('tbl_news','tbl_users.id = tbl_news.user_id');
        $this->db->order_by('tbl_news.id','desc');
        $q = $this->db->get('tbl_users');

        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return array();
        }
    }
}