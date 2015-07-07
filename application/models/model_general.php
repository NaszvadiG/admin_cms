<?php if ( ! defined('BASEPATH')) exit('Akses tidak diperkenankan');

class Model_General extends CI_Model
{

    public function getAllDataFromTable($table="",$condition="",$row="",$order="",$groupby="",$limit=0,$offset=0) {
        /* Set Field To Select */
        if (is_array($row) && !empty($row)) {
            $field = implode(",", $row);
            $this->db->select($field);
        }

        /* Set Condition */
        if(is_array($condition) && !empty($condition)) {
            foreach ($condition as $key => $value) {
                if (!empty($value)) {
                    $this->db->where($key,$value);
                } else {
                    $this->db->where($key);
                }
            }
        }

        /* Set Limit And Offset*/
        if($limit != 0 || $offset != 0) $this->db->limit($offset,$limit);

        /* Set Group By */
        if($groupby) $this->db->group_by($groupby);

        /* Set Order By*/
        if($order) $this->db->order_by($order);

        /* Get Data */
        $q = $this->db->get($table);
        // echo $this->db->last_query();
        if($q && $q->num_rows() > 0) {
            return $q->result();
        } else{
            return array();
        }
    }

    public function getRowDataFromTable($table="",$condition="",$row="", $limit=0, $order="") {
        /* Set Field To Select */
        if (is_array($row) && !empty($row)) {
            $field = implode(",", $row);
            $this->db->select($field);
        }

        /* Set Condition */
        if(is_array($condition) && !empty($condition)) {
            foreach ($condition as $key => $value) {
                if (!empty($value)) {
                    $this->db->where($key,$value);
                } else {
                    $this->db->where($key);
                }
            }
        }

        /* Set Limit */
        if($limit) $this->db->limit($limit);

        /* Set Order By */
        if($limit) $this->db->order_by($order);

        /* Get Data */
        $q = $this->db->get($table);
        if ($q && $q->num_rows() > 0) {
            return $q->row();
        } else {
            return false;
        }
    }

    public function customQuery($query="") {
        if (!empty($query)) {
            $q = $this->db->query($query);
            if ($q && $q->num_rows() > 0) {
                if ($q->num_rows() == 1) {
                    return $q->row();
                } elseif ( $q->num_rows() > 1) {
                    return $q->result();
                } else return false;
            } else return false;
        } else return false;
    }

    public function saveTable($tableName="",$data="",$generateMessage=true) {
        if(!empty($tableName)) {
            $this->db->insert($tableName,$data);
            if($this->db->affected_rows() > 0) {
                if($generateMessage == true) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan.');
                }
                return TRUE;
            } else {
                if($generateMessage == true) {
                    $this->session->set_flashdata('error', 'Data gagal di simpan.');
                }
                return FALSE;
            }
        } else {
            if ($generateMessage == true) {
                $this->session->set_flashdata('error', 'Data gagal di simpan.');
            }
            return FALSE;
        }
    }

    public function updateTable($tableName="",$condition="",$data="",$generateMessage=true) {
        if(!empty($tableName) && !empty($condition)) {
            $this->db->where($condition);
            $this->db->update($tableName,$data);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil di ubah.');
                return TRUE;
            } else {
                $this->session->set_flashdata('error', 'Data gagal di ubah / Tidak ada data yang di ubah.');
                return FALSE;
            }
        } else {
            $this->session->set_flashdata('error', 'Data gagal di ubah.');
            return FALSE;
        }
    }

    public function deleteRowTable($table="",$condition="",$generateMessage=true) {
        /* Set Condition */
        if(is_array($condition) && !empty($condition)) {
            foreach ($condition as $key => $value) {
                if (!empty($value)) {
                    $this->db->where($key,$value);
                } else {
                    $this->db->where($key);
                }
            }
        }

        /* Delete Action */
        $this->db->delete($table);
        if($this->db->affected_rows() > 0) {
            if ($generateMessage == true) {
                $this->session->set_flashdata('success', 'Data Berhasil di hapus.');
            }
            return true;
        } else {
            if ($generateMessage == true) {
                $this->session->set_flashdata('error', 'Data gagal di hapus.');
            }
            return false;
        }
    }

}