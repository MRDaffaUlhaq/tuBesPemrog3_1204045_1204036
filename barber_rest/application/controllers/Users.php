<?php

defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Users extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function login_post()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['username']) && isset($_POST['password'])) {

                $user_login = $this->Users_model->queryLogin($_POST['username'], $_POST['password']);
                $result['user_id']   = null;

                if ($user_login->num_rows() == true) {
                    $result['value'] = "1";
                    $result['pesan'] = "sukses login!";
                    $result['user_id']   = $user_login->row()->user_id;
                } else {
                    $result['value'] = "2";
                    $result['pesan'] = "username atau password salah!";
                }
            } else {
                $result['value'] = "3";
                $result['pesan'] = "beberapa inputan masih kosong!";
            }
        } else {
            $result['value'] = "4";
            $result['pesan'] = "invalid request method!";
        }

        echo json_encode($result);
    }
    //Register
    public function register_post()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {

                // validasi jika username sudah ada
                if ($this->Users_model->cekUsername($_POST['username'])->num_rows() == 1) {
                    $result['value'] = "1";
                    $result['pesan'] = "username sudah terdaftar!";
                }
                // validasi jika email sudah ada
                else if ($this->Users_model->cekEmail($_POST['email'])->num_rows() == 1) {
                    $result['value'] = "2";
                    $result['pesan'] = "email sudah ter registrasi!";
                } else {
                    $this->Users_model->addUser();
                    $result['value'] = "3";
                    $result['pesan'] = "registrasi berhasil!";
                }
            }
            // validasi jika ada data yang kosong
            else {
                $result['value'] = "4";
                $result['pesan'] = "beberapa inputan masih kosong!";
            }
        } else {
            $result['value'] = "5";
            $result['pesan'] = "invalid request method!";
        }

        echo json_encode($result);
    }
}
