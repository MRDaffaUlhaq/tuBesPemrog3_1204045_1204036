<?php

defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Transactions extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transactions_model');
    }
    //fungsi CRUD 

    public function tr_get()
    {
        $t_id = $this->get('t_id');
        $data = $this->Transactions_model->getDataTransactions($t_id);
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

    // tambah data emp

    public function tr_post()
    {
        $data = array(
            't_id' => $this->post('t_id'),
            'customer_id' => $this->post('customer_id'),
            'emp_id' => $this->post('emp_id'),
            'service_id' => $this->post('service_id'),
            'date' => $this->post('date'),
            'time' => $this->post('time'),
            'total' => $this->post('total')
        );

        $cek_data = $this->Transactions_model->getDataTransactions($this->post('t_id'));

        //Validasi Jika semua data wajib diisi
        if (
            $data['t_id'] == NULL || $data['customer_id'] == NULL || $data['emp_id']
            == NULL || $data['service_id'] == NULL || $data['date'] == NULL || $data['total'] ==
            NULL || $data['time'] == NULL
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
        } elseif ($this->Transactions_model->insertTransactions($data) > 0) {
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

    //edit data emp
    public function tr_put()
    {
        $t_id = $this->put('t_id');
        $data = array(
            'customer_id' => $this->put('customer_id'),
            'emp_id' => $this->put('emp_id'),
            'service_id' => $this->put('service_id'),
            'date' => $this->put('date'),
            'time' => $this->put('time'),
            'total' => $this->put('total')
        );
        //Jika field t_id tidak diisi
        if ($t_id == NULL) {
            $this->response(
                [
                    'status' => $t_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 't_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->Transactions_model->updateTransactions($data, $t_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Transactions Dengan t_id ' . $t_id . ' Berhasil Diubah',
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

    public function tr_delete()
    {
        $t_id = $this->delete('t_id');

        //Jika field t_id tidak diisi
        if ($t_id == NULL) {
            $this->response(
                [
                    'status' => $t_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 't_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->Transactions_model->deleteTransactions($t_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Transactions Dengan t_id ' . $t_id . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Transactions Dengan t_id ' . $t_id . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
