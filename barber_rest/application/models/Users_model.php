<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $_table_users = 'users';
    // register
    // get data dari tabel Users
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

    public function cekUsername($username)
    {
        //query builder
        if ($username) {
            $this->db->from($this->_table_users);
            $this->db->where('username', $username);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_users);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }
    public function cekEmail($email)
    {
        //query builder
        if ($email) {
            $this->db->from($this->_table_users);
            $this->db->where('email', $email);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_users);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }
    public function insertUser($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_users, $data);
        return $this->db->affected_rows();
        // return $query;
    }


    // login function
    public function queryLogin($username, $password)
    {
        return $this->db->query("SELECT user_id FROM users WHERE username = '$username' AND password = '$password'");
    }

    function getUsers()
    {
        $query = $this->db->query("SELECT count(*) as user FROM users");
        return $query->row_array();
    }
}
