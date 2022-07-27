<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $_table_users = 'users';

    // login function
    public function queryLogin($username, $password)
    {
        return $this->db->query("SELECT user_id FROM users WHERE username = '$username' AND password = '$password'");
    }

    // register

    public function cekUsername($username)
    {
        return $this->db->query("SELECT username FROM users WHERE username = '$username'");
    }
    public function cekEmail($email)
    {
        return $this->db->query("SELECT email FROM users WHERE email = '$email'");
    }

    public function addUser()
    {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];

        $this->db->query("INSERT INTO users VALUE (user_id = '$user_id', username = '$username', password = '$password', email = '$email')");
    }
}
