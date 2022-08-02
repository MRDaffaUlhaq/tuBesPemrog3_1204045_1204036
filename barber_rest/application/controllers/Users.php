<?php

defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Users extends RestController
{
    public function __construct($config = 'restnokey')
    {
        parent::__construct($config);
        $this->load->model('Users_model');
    }

    public function register_get()
    {
        $user_id = $this->get('user_id');
        $data = $this->Users_model->getDatausers($user_id);
        //Jika variabel $data terdapat data di dalamnya 
        if ($data) {
            $this->response(
                [
                    'data' => $data,
                    'status' => 'success',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => 'false',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
    //Register
    public function register_post()
    {
        $data = array(
            'user_id' => $this->post('user_id'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'email' => $this->post('email'),
            "emp_id" => $this->post('emp_id'),
        );
        $cek_data = "";
        if ($data['user_id'] != NULL) {
            $cek_data = $this->Users_model->getDataUsers($this->post('user_id'));
        } elseif ($data['email'] != NULL) {
            $cek_data = $this->Users_model->cekEmail($this->post('email'));
        } elseif ($data['username'] != NULL) {
            $cek_data = $this->Users_model->cekUsername($this->post('username'));
        }


        //Validasi Jika semua data wajib diisi
        if (
            $data['username'] == NULL ||
            $data['email'] == NULL ||
            $data['emp_id'] == NULL ||
            $data['password'] == NULL
        ) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Validasi Jika data duplikat
        } else if ($cek_data) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Duplikat',
                ],
                RestController::HTTP_BAD_REQUEST
            );

            //Jika data tersimpan
        } elseif ($this->Users_model->insertUser($data) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Berhasil Ditambahkan',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Menambahkan Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    public function login_post()
    {
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     if (isset($_POST['username']) && isset($_POST['password'])) {

        //         $user_login = $this->Users_model->queryLogin($_POST['username'], $_POST['password']);
        //         $result['user_id']   = null;

        //         if ($user_login->num_rows() == true) {
        //             $result['value']    = "1";
        //             $result['pesan']    = "sukses login!";
        //             $result['user_id']  = $user_login->row()->user_id;
        //         } else {
        //             $result['value'] = "2";
        //             $result['pesan'] = "username atau password salah!";
        //         }
        //     } else {
        //         $result['value'] = "3";
        //         $result['pesan'] = "beberapa inputan masih kosong!";
        //     }
        // } else {
        //     $result['value'] = "4";
        //     $result['pesan'] = "invalid request method!";
        // }

        // echo json_encode($result);
        $username = $this->post('username');
        $password = $this->post('password');
        $data = $this->Users_model->login($username, $password);
        if ($data) {
            $this->response(
                [
                    'data'  => $data,
                    'result' => 'done',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'data' => '',
                    'result' => 'failed',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    public function countUsers_get()
    {
        $this->response(
            [
                $this->Users_model->getUsers()
            ],
            RestController::HTTP_OK
        );
    }
}
