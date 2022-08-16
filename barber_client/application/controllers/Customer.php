<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Customer_model'); //load model customer
        $this->load->library('form_validation'); //load form validation
    }

    //load all data to index view
    public function index()
    {

        $data['title'] = "List Data Pelanggan";

        $data['data_customer'] = $this->Customer_model->getAll();

        if ($this->session->userdata('KEY') != '') {
            //load to view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('customer/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Ups! kamu belum login');
            redirect('login');
        }
    }

    //load detail data to detail view
    public function detail($customer_id)
    {

        $data['title'] = "Detail Data Pelanggan";

        $data['data_customer'] = $this->Customer_model->getById($customer_id);
        if ($this->session->userdata('KEY') != '') {
            //load to view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('customer/detail', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Ups! kamu belum login');
            redirect('login');
        }
    }

    public function add()
    {

        $data['title'] = "Tambah Data Pelanggan";

        $this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|numeric');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');


        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('KEY') != '') {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('customer/add', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->session->set_flashdata('message', 'Ups! kamu belum login');
                redirect('login');
            }
        } else {
            $data = [
                "customer_id" => $this->input->post('customer_id'),
                "name" => $this->input->post('name'),
                "telp" => $this->input->post('telp'),
                "email" => $this->input->post('email'),
                "KEY" => "ulbi123"
            ];

            $insert = $this->Customer_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('customer');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!');
                redirect('customer');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('customer');
            }
        }
    }

    public function edit($customer_id)
    {

        $data['title'] = "Ubah Data customer";

        $data['data_customer'] = $this->Customer_model->getById($customer_id);

        $this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|numeric');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('KEY') != '') {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('customer/edit', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->session->set_flashdata('message', 'Ups! kamu belum login');
                redirect('login');
            }
        } else {
            $data = [
                "customer_id" => $this->input->post('customer_id'),
                "name" => $this->input->post('name'),
                "telp" => $this->input->post('telp'),
                "email" => $this->input->post('email'),
                "KEY" => "ulbi123"
            ];

            $update = $this->Customer_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', $update['message']);
                redirect('customer');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Gagal!');
                redirect('customer');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('customer');
            }
        }
    }

    public function delete($customer_id)
    {
        $delete = $this->Customer_model->delete($customer_id);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('customer');
        } elseif ($delete['response_code'] === 500) {
            $this->session->set_flashdata('flash', 'Data Sedang Digunakan');
            redirect('job');
        } else {
            $this->session->set_flashdata('message', 'Data Gagal Dihapus!');
            redirect('customer');
        }
    }
}
