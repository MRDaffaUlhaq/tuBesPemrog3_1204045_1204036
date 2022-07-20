<?php

defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Customers extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customers_model');
    }
    //fungsi CRUD 

    public function customer_get()
    {
        $customer_id = $this->get('customer_id');
        $data = $this->Customers_model->getDataCustomers($customer_id);
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

    //tambah data customer

    public function customer_post()
    {
        $data = array(
            'customer_id' => $this->post('customer_id'),
            'name' => $this->post('name'),
            'telp' => $this->post('telp'),
            'email' => $this->post('email'),
        );
        $cek_data = "";
        if ($data['customer_id'] != NULL) {
            $cek_data = $this->Customers_model->getDataCustomers($this->post('customer_id'));
        }

        //Validasi Jika semua data wajib diisi
        if (
            $data['name'] == NULL ||
            $data['email'] == NULL ||
            $data['telp'] == NULL
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
        } elseif ($this->Customers_model->insertCustomers($data) > 0) {
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

    //edit data customer
    public function customer_put()
    {
        $customer_id = $this->put('customer_id');
        $data = array(
            'name' => $this->put('name'),
            'email' => $this->put('email'),
            'telp' => $this->put('telp')

        );
        //Jika field customer_id tidak diisi
        if (
            $customer_id == NULL ||
            $data['name'] == NULL ||
            $data['email'] == NULL ||
            $data['telp'] == NULL
        ) {
            $this->response(
                [
                    'status' => $customer_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'customer_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->Customers_model->updateCustomers($data, $customer_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Customers Dengan customer_id ' . $customer_id . ' Berhasil Diubah',
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

    public function customer_delete()
    {
        $customer_id = $this->delete('customer_id');

        //Jika field customer_id tidak diisi
        if ($customer_id == NULL) {
            $this->response(
                [
                    'status' => $customer_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'customer_id Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->Customers_model->deleteCustomers($customer_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Customers Dengan customer_id ' . $customer_id . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Customers Dengan customer_id ' . $customer_id . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
