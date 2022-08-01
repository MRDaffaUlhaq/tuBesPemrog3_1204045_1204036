<?php

defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class JobPositions extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JobPositions_model');
    }
    //fungsi CRUD 

    public function jp_get()
    {
        $position_id = $this->get('position_id');
        $data = $this->JobPositions_model->getDataJobPositions($position_id);
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

    //tambah data jp

    public function jp_post()
    {
        $data = array(
            'position_id' => $this->post('position_id'),
            'position' => $this->post('position'),
            'salary' => $this->post('salary'),
            'desc' => $this->post('desc')

        );
        $cek_data = "";
        if ($data['position_id'] != NULL) {
            $cek_data = $this->JobPositions_model->getDataJobPositions($this->post('position_id'));
        }

        //Validasi Jika semua data wajib diisi
        if (
            $data['position'] == NULL ||
            $data['salary'] == NULL ||
            $data['desc'] == NULL
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
        } elseif ($this->JobPositions_model->insertJobPositions($data) > 0) {
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

    //edit data jp
    public function jp_put()
    {
        $position_id = $this->put('position_id');
        $data = array(
            'position' => $this->put('position'),
            'salary' => $this->put('salary'),
            'desc' => $this->put('desc')

        );
        //Jika field position_id tidak diisi
        if (
            $position_id == NULL ||
            $data['position'] == NULL ||
            $data['salary'] == NULL ||
            $data['desc'] == NULL
        ) {
            $this->response(
                [
                    'status' => $position_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'position_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->JobPositions_model->updateJobPositions($data, $position_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data JobPositions Dengan position_id ' . $position_id . ' Berhasil Diubah',
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

    public function jp_delete()
    {
        $position_id = $this->delete('position_id');

        //Jika field position_id tidak diisi
        if ($position_id == NULL) {
            $this->response(
                [
                    'status' => $position_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'position_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->JobPositions_model->deleteJobPositions($position_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data JobPositions Dengan position_id ' . $position_id . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data JobPositions Dengan position_id ' . $position_id . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    public function countJob_get()
    {
        $this->response(
            [
                $this->JobPositions_model->getJob()
            ],
            RestController::HTTP_OK
        );
    }
}
