<?php

defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Employees extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employees_model');
    }
    //fungsi CRUD 

    public function emp_get()
    {
        $emp_id = $this->get('emp_id');
        $data = $this->Employees_model->getDataEmployees($emp_id);
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

    public function emp_post()
    {
        $data = array(
            'emp_id' => $this->post('emp_id'),
            'position_id' => $this->post('position_id'),
            'emp_name' => $this->post('emp_name'),
            'telp' => $this->post('telp'),
            'address' => $this->post('address'),
            'bank_acc' => $this->post('bank_acc')
        );
        $cek_data = "";
        if ($data['emp_id'] != NULL) {
            $cek_data = $this->Employees_model->getDataEmployees($this->post('emp_id'));
        }

        //Validasi Jika semua data wajib diisi
        if (
            $data['position_id'] == NULL ||
            $data['emp_name'] == NULL ||
            $data['telp'] == NULL ||
            $data['address'] == NULL ||
            $data['bank_acc'] == NULL

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
        } elseif ($this->Employees_model->insertEmployees($data) > 0) {
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
    public function emp_put()
    {
        $emp_id = $this->put('emp_id');
        $data = array(
            'position_id' => $this->put('position_id'),
            'emp_name' => $this->put('emp_name'),
            'telp' => $this->put('telp'),
            'address' => $this->put('address'),
            'bank_acc' => $this->put('bank_acc')
        );
        //Jika field emp_id tidak diisi
        if (
            $emp_id == NULL ||
            $data['emp_name'] == NULL ||
            $data['telp'] == NULL ||
            $data['address'] == NULL ||
            $data['bank_acc'] == NULL
        ) {
            $this->response(
                [
                    'status' => $emp_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'emp_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->Employees_model->updateEmployees($data, $emp_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Employees Dengan emp_id ' . $emp_id . ' Berhasil Diubah',
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

    public function emp_delete()
    {
        $emp_id = $this->delete('emp_id');

        //Jika field emp_id tidak diisi
        if ($emp_id == NULL) {
            $this->response(
                [
                    'status' => $emp_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'emp_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->Employees_model->deleteEmployees($emp_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Employees Dengan emp_id ' . $emp_id . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Employees Dengan emp_id ' . $emp_id . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
