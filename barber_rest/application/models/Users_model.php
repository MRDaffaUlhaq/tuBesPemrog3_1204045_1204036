<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $_table_users = 'users';

    // get data dari tabel users
    public function getDataUsers($user_id)
    {
        //query builder
        if ($user_id) {
            $this->db->from($this->_table_users);
            $this->db->where('user_id', $user_id);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_users);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertusers($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_users, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateusers($data, $user_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_users, $data, ['user_id' => $user_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteusers($user_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_users, ['user_id' => $user_id]);
        return $this->db->affected_rows();
        // return $query;
    }
}
