<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cns extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Cns_model'); //load model Cns
        $this->load->model('Customer_model'); //load model Cns
        $this->load->library('form_validation'); //load form validation
    }

    //load all data to index view
    public function index()
    {

        $data['title'] = "List Data Kritik & Saran";

        $data['data_cns'] = $this->Cns_model->getAll();
        if ($this->session->userdata('KEY') != '') {
            //load to view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('cns/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Ups! kamu belum login');
            redirect('login');
        }
    }

    //load detail data to detail view
    public function detail($cns_id)
    {

        $data['title'] = "Detail Data Kritik & Saran";

        $data['data_cns'] = $this->Cns_model->getById($cns_id);

        if ($this->session->userdata('KEY') != '') {
            //load to view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('cns/detail', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Ups! kamu belum login');
            redirect('login');
        }
    }

    public function add()
    {

        $data['title'] = "Tambah Data Kritik & Saran";
        $data['data_customer'] = $this->Customer_model->getAll();

        $this->form_validation->set_rules('cns_id', 'Cns ID', 'trim|numeric');
        $this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required');
        $this->form_validation->set_rules('criticism', 'Criticism', 'trim|required');
        $this->form_validation->set_rules('suggest', 'Suggest', 'trim|required');
        $this->form_validation->set_rules('rate', 'Rate', 'trim|required');

        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('KEY') != '') {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('cns/add', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->session->set_flashdata('message', 'Ups! kamu belum login');
                redirect('login');
            }
        } else {
            $data = [
                "cns_id" => $this->input->post('cns_id'),
                "customer_id" => $this->input->post('customer_id'),
                "criticism" => $this->input->post('criticism'),
                "suggest" => $this->input->post('suggest'),
                "rate" => $this->input->post('rate'),
                "KEY" => "ulbi123"
            ];
            // var_dump($data);
            $insert = $this->Cns_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Cns');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!');
                redirect('Cns');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('Cns');
            }
        }
    }

    public function edit($cns_id)
    {

        $data['title'] = "Ubah Data Kritik & Saran";

        $data['data_allCns'] = $this->Customer_model->getAll();

        $data['data_cns'] = $this->Cns_model->getById($cns_id);

        $this->form_validation->set_rules('cns_id', 'Cns ID', 'trim|numeric');
        $this->form_validation->set_rules('customer_id', 'Customer ID', 'trim|required');
        $this->form_validation->set_rules('criticism', 'Criticism', 'trim|required');
        $this->form_validation->set_rules('suggest', 'Suggest', 'trim|required');
        $this->form_validation->set_rules('rate', 'Rate', 'trim|required');

        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('KEY') != '') {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('cns/edit', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->session->set_flashdata('message', 'Ups! kamu belum login');
                redirect('login');
            }
        } else {
            $data = [
                "cns_id" => $this->input->post('cns_id'),
                "customer_id" => $this->input->post('customer_id'),
                "criticism" => $this->input->post('criticism'),
                "suggest" => $this->input->post('suggest'),
                "rate" => $this->input->post('rate'),
                "KEY" => "ulbi123"
            ];

            $update = $this->Cns_model->update($data);
            // var_dump($update);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
                redirect('Cns');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Gagal!');
                redirect('Cns');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('Cns');
            }
        }
    }

    public function delete($cns_id)
    {
        $delete = $this->Cns_model->delete($cns_id);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('Cns');
        } else {
            $this->session->set_flashdata('message', 'Data Gagal Dihapus!');
            redirect('Cns');
        }
    }
}
