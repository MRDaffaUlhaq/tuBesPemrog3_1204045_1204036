<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employees extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Employees_model'); //load model Employees
        $this->load->model('Job_model'); //load model Employees
        $this->load->library('form_validation'); //load form validation
    }

    //load all data to index view
    public function index()
    {

        $data['title'] = "List Data Pegawai";

        $data['data_employees'] = $this->Employees_model->getAll();

        //load to view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('employees/index', $data);
        $this->load->view('templates/footer', $data);
    }

    //load detail data to detail view
    public function detail($emp_id)
    {

        $data['title'] = "Detail Data Pegawai";

        $data['data_employees'] = $this->Employees_model->getById($emp_id);

        //load to view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('employees/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {

        $data['title'] = "Tambah Data Pegawai";

        $data['data_jabatan'] = $this->Job_model->getAll();

        $this->form_validation->set_rules('emp_id', 'Employees ID', 'trim|numeric');
        $this->form_validation->set_rules('position_id', 'Position Job', 'trim|required');
        $this->form_validation->set_rules('emp_name', 'Employees Name', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telpon', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('bank_acc', 'Bank Account', 'trim|required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('employees/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                "emp_id" => $this->input->post('emp_id'),
                "position_id" => $this->input->post('position_id'),
                "emp_name" => $this->input->post('emp_name'),
                "telp" => $this->input->post('telp'),
                "address" => $this->input->post('address'),
                "bank_acc" => $this->input->post('bank_acc'),
                "KEY" => "ulbi123"
            ];

            $insert = $this->Employees_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Employees');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!');
                redirect('Employees');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('Employees');
            }
        }
    }

    public function edit($emp_id)
    {

        $data['title'] = "Ubah Data Pegawai";

        $data['data_jabatan'] = $this->Job_model->getAll();
        $data['data_employees'] = $this->Employees_model->getById($emp_id);

        $this->form_validation->set_rules('emp_id', 'Employees ID', 'trim|numeric');
        $this->form_validation->set_rules('position_id', 'Position Job', 'trim|required');
        $this->form_validation->set_rules('emp_name', 'Employees Name', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telpon', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('bank_acc', 'Bank Account', 'trim|required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('employees/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                "emp_id" => $this->input->post('emp_id'),
                "position_id" => $this->input->post('position_id'),
                "emp_name" => $this->input->post('emp_name'),
                "telp" => $this->input->post('telp'),
                "address" => $this->input->post('address'),
                "bank_acc" => $this->input->post('bank_acc'),
                "KEY" => "ulbi123"
            ];

            $update = $this->Employees_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
                redirect('Employees');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Gagal!');
                redirect('Employees');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('Employees');
            }
        }
    }

    public function delete($emp_id)
    {
        $delete = $this->Employees_model->delete($emp_id);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('Employees');
        } else {
            $this->session->set_flashdata('message', 'Data Gagal Dihapus!');
            redirect('Employees');
        }
    }
}
