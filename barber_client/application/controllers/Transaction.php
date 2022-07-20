<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Transaction_model'); //load model Transaction
        $this->load->model('Customer_model'); //load model Customer
        $this->load->model('Employees_model'); //load model Employees
        $this->load->model('Service_model'); //load model Service
        $this->load->library('form_validation'); //load form validation
    }

    //load all data to index view
    public function index()
    {

        $data['title'] = "List Data Transaksi";

        $data['data_transaction'] = $this->Transaction_model->getAll();

        //load to view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        if ($data != null) {
            $this->load->view('transaction/index', $data);
        }

        $this->load->view('templates/footer', $data);
    }

    //load detail data to detail view
    public function detail($t_id)
    {

        $data['title'] = "Detail Data Transaksi";

        $data['data_transaction'] = $this->Transaction_model->getById($t_id);

        //load to view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('transaction/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {

        $data['title'] = "Tambah Data Transaksi";
        $data['data_customer'] = $this->Customer_model->getAll();
        $data['data_service'] = $this->Service_model->getAll();
        $data['data_employees'] = $this->Employees_model->getAll();

        $this->form_validation->set_rules('t_id', 'Transaction ID', 'trim|numeric');
        $this->form_validation->set_rules('customer_id', 'Customer ID', 'trim|required');
        $this->form_validation->set_rules('emp_id', 'Employees ID', 'trim|required');
        $this->form_validation->set_rules('service_id', 'Service ID', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('time', 'Time', 'trim|required');
        $this->form_validation->set_rules('total', 'Total', 'trim|required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('transaction/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                "t_id" => $this->input->post('t_id'),
                "customer_id" => $this->input->post('customer_id'),
                "emp_id" => $this->input->post('emp_id'),
                "service_id" => $this->input->post('service_id'),
                "date" => $this->input->post('date'),
                "time" => $this->input->post('time'),
                "total" => $this->input->post('total'),
                "KEY" => "ulbi123"
            ];

            $insert = $this->Transaction_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Transaction');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!');
                redirect('Transaction');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('Transaction');
            }
        }
    }

    public function edit($t_id)
    {

        $data['title'] = "Ubah Data Transaksi";

        $data['data_transaction'] = $this->Transaction_model->getById($t_id);
        $data['data_customer'] = $this->Customer_model->getAll();
        $data['data_service'] = $this->Service_model->getAll();
        $data['data_employees'] = $this->Employees_model->getAll();

        $this->form_validation->set_rules('t_id', 'Transaction ID', 'trim|numeric');
        $this->form_validation->set_rules('customer_id', 'Customer ID', 'trim|required');
        $this->form_validation->set_rules('emp_id', 'Employees ID', 'trim|required');
        $this->form_validation->set_rules('service_id', 'Service ID', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('time', 'Time', 'trim|required');
        $this->form_validation->set_rules('total', 'Total', 'trim|required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('transaction/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                "t_id" => $this->input->post('t_id'),
                "customer_id" => $this->input->post('customer_id'),
                "emp_id" => $this->input->post('emp_id'),
                "service_id" => $this->input->post('service_id'),
                "date" => $this->input->post('date'),
                "time" => $this->input->post('time'),
                "total" => $this->input->post('total'),
                "KEY" => "ulbi123"
            ];

            $update = $this->Transaction_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
                redirect('Transaction');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Gagal!');
                redirect('Transaction');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('Transaction');
            }
        }
    }

    public function delete($t_id)
    {
        $delete = $this->Transaction_model->delete($t_id);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('Transaction');
        } else {
            $this->session->set_flashdata('message', 'Data Gagal Dihapus!');
            redirect('Transaction');
        }
    }
}
