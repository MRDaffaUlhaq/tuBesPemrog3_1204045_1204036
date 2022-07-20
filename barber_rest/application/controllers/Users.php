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
    //fungsi CRUD 

    public function user_get()
    {
        $user_id = $this->get('user_id');
        $data = $this->Users_model->getDataUsers($user_id);
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

    //tambah data user

    public function user_post()
    {
        $data = array(
            'user_id' => $this->post('user_id'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'email' => $this->post('email')
        );
        $cek_data = "";
        if ($data['user_id'] != NULL) {
            $cek_data = $this->Users_model->getDataUsers($this->post('user_id'));
        }


        //Validasi Jika semua data wajib diisi
        if (
            $data['username'] == NULL ||
            $data['password'] == NULL ||
            $data['email'] == NULL
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
        } elseif ($this->Users_model->insertUsers($data) > 0) {
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

    //edit data user
    public function user_put()
    {
        $user_id = $this->put('user_id');
        $data = array(
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'email' => $this->put('email')
        );
        //Jika field user_id tidak diisi
        if (
            $user_id == NULL ||
            $data['username'] == NULL ||
            $data['password'] == NULL ||
            $data['email'] == NULL
        ) {
            $this->response(
                [
                    'status' => $user_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Ups! Mohon isi semua data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->Users_model->updateUsers($data, $user_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Users Dengan user_id ' . $user_id . ' Berhasil Diubah',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Mengubah Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    public function user_delete()
    {
        $user_id = $this->delete('user_id');

        //Jika field user_id tidak diisi
        if ($user_id == NULL) {
            $this->response(
                [
                    'status' => $user_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'user_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->Users_model->deleteUsers($user_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Users Dengan user_id ' . $user_id . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Users Dengan user_id ' . $user_id . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
