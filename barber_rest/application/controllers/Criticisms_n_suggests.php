<?php

defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Criticisms_n_suggests extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Criticisms_n_suggests_model');
    }
    //fungsi CRUD 

    public function cns_get()
    {
        $cns_id = $this->get('cns_id');
        $data = $this->Criticisms_n_suggests_model->getDataCns($cns_id);
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

    //tambah data cns

    public function cns_post()
    {
        $data = array(
            'cns_id' => $this->post('cns_id'),
            'customer_id' => $this->post('customer_id'),
            'criticism' => $this->post('criticism'),
            'suggest' => $this->post('suggest'),
            'rate' => $this->post('rate'),

        );

        $cek_data = $this->Criticisms_n_suggests_model->getDataCns($this->post('cns_id'));

        //Validasi Jika semua data wajib diisi
        if (
            $data['cns_id'] == NULL || $data['customer_id'] == NULL || $data['criticism']
            == NULL || $data['suggest'] == NULL || $data['rate'] == NULL
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
        } elseif ($this->Criticisms_n_suggests_model->insertCns($data) > 0) {
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

    //edit data cns
    public function cns_put()
    {
        $cns_id = $this->put('cns_id');
        $data = array(
            'customer_id' => $this->put('customer_id'),
            'criticism' => $this->put('criticism'),
            'suggest' => $this->put('suggest'),
            'rate' => $this->put('rate'),

        );
        //Jika field cns_id tidak diisi
        if ($cns_id == NULL) {
            $this->response(
                [
                    'status' => $cns_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'cns_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->Criticisms_n_suggests_model->updateCns($data, $cns_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Criticisms_n_suggests Dengan cns_id ' . $cns_id . ' Berhasil Diubah',
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

    public function cns_delete()
    {
        $cns_id = $this->delete('cns_id');

        //Jika field cns_id tidak diisi
        if ($cns_id == NULL) {
            $this->response(
                [
                    'status' => $cns_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'cns_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->Criticisms_n_suggests_model->deleteCns($cns_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Criticisms_n_suggests Dengan cns_id ' . $cns_id . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Criticisms_n_suggests Dengan cns_id ' . $cns_id . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
