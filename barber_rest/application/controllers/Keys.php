<?php

defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Keys extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keys_model');
        $this->load->model('Users_model');
    }
    //fungsi CRUD 

    public function key_get()
    {
        $id = $this->get('id');
        $data = $this->Keys_model->getDataKeys($id);
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

    //tambah data key

    public function key_post()
    {
        $now = date('Y-m-d H:i:s');
        $data = array(
            'id' => $this->post('id'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'key' => $this->post('key'),
            'level' => 1,
            'ignore_limits' => 0,
            'is_private_key' => 0,
            'ip_addresses' => $this->post(''),
            'date_created' => $now,
        );
        $cek_data = "";
        if ($data['id'] != NULL) {
            $cek_data = $this->Keys_model->getDataKeys($this->post('id'));
        } elseif ($data['email'] != NULL) {
            $cek_data = $this->Users_model->cekEmail($this->post('email'));
        } elseif ($data['username'] != NULL) {
            $cek_data = $this->Users_model->cekUsername($this->post('username'));
        }

        //Validasi Jika semua data wajib diisi
        if (
            $data['key'] == NULL
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
        } elseif ($this->Keys_model->insertkeys($data) > 0) {
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
}
