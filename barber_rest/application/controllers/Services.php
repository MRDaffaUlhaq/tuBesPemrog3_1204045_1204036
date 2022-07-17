<?php

defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Services extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Services_model');
    }
    //fungsi CRUD 

    public function serv_get()
    {
        $service_id = $this->get('service_id');
        $data = $this->Services_model->getDataServices($service_id);
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

    //tambah data serv

    public function serv_post()
    {
        $data = array(
            'service_id' => $this->post('service_id'),
            'service_name' => $this->post('service_name'),
            'desc' => $this->post('desc'),
            'price' => $this->post('price')

        );
        $cek_data = $this->Services_model->getDataServices($this->post('service_id'));


        //Validasi Jika semua data wajib diisi
        if (
            $data['service_name'] == NULL ||
            $data['price'] == NULL ||
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
        } elseif ($this->Services_model->insertServices($data) > 0) {
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

    //edit data serv
    public function serv_put()
    {
        $service_id = $this->put('service_id');
        $data = array(
            'service_name' => $this->put('service_name'),
            'price' => $this->put('price'),
            'desc' => $this->put('desc')

        );
        //Jika field service_id tidak diisi
        if ($service_id == NULL) {
            $this->response(
                [
                    'status' => $service_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'service_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->Services_model->updateServices($data, $service_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Services Dengan service_id ' . $service_id . ' Berhasil Diubah',
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

    public function serv_delete()
    {
        $service_id = $this->delete('service_id');

        //Jika field service_id tidak diisi
        if ($service_id == NULL) {
            $this->response(
                [
                    'status' => $service_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'service_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->Services_model->deleteServices($service_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Services Dengan service_id ' . $service_id . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Services Dengan service_id ' . $service_id . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
