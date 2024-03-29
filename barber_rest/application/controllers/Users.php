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
        $this->load->model('Keys_model');
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
        $data = [
            'user_id' => $this->post('user_id'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'email' => $this->post('email'),
        ];

        $cek_data = "";
        if ($data['user_id'] != NULL) {
            $cek_data = $this->Users_model->getDataUsers($this->post('user_id'));
        } elseif ($data['email'] != NULL) {
            $cek_data = $this->Users_model->cekEmail($this->post('email'));
        } elseif ($data['username'] != NULL) {
            $cek_data = $this->Users_model->cekUsername($this->post('username'));
        }

        if (
            $data['username'] == NULL ||
            $data['email'] == NULL ||
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
        } elseif ($cek_data) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Duplikat',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($newUserId = $this->Users_model->register($data)) {
            $this->response(
                [
                    'data'  => $newUserId,
                    'status' => 'Register Berhasil',
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Berhasil Register',
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'data' => '',
                    'status' => 'Gagal Registrasi',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    public function login_post()
    {
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
            $getUserId = $this->Users_model->loginNoKey($username, $password);
            $this->response(
                [
                    'user_id'  => intval($getUserId),
                    'username' => $username,
                    'password' => $password,
                    'result' => 'failed',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    public function simpankey_post()
    {
        $data = [
            'user_id' => intval($this->input->post('user_id')),
            'key' => $this->post('key')
        ];

        $keySaved = $this->Users_model->simpanKey($data);
        if ($keySaved > 0) {
            $this->response(
                [
                    'data'  => true,
                    'status' => 'API Key Tersimpan',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'data' => '',
                    'status' => 'API key Gagal disimpan',
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
