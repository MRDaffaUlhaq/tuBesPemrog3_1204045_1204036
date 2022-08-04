<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Service_model'); //load model Service
        $this->load->library('form_validation'); //load form validation

    }

    //load all data to index view
    public function index()
    {

        $data['title'] = "List Data Pelayanan";

        $data['data_service'] = $this->Service_model->getAll();
        if ($this->session->userdata('KEY') != '') {
            //load to view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('service/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Ups! kamu belum login');
            redirect('login');
        }
    }

    //load detail data to detail view
    public function detail($service_id)
    {

        $data['title'] = "Detail Data Pelayanan";

        $data['data_service'] = $this->Service_model->getById($service_id);

        if ($this->session->userdata('KEY') != '') {
            //load to view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('service/detail', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Ups! kamu belum login');
            redirect('login');
        }
    }

    public function add()
    {

        $data['title'] = "Tambah Data Pelayanan";

        $this->form_validation->set_rules('service_id', 'Service ID', 'trim|numeric');
        $this->form_validation->set_rules('service_name', 'Service Name', 'trim|required');
        $this->form_validation->set_rules('desc', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');


        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('KEY') != '') {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('service/add', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->session->set_flashdata('message', 'Ups! kamu belum login');
                redirect('login');
            }
        } else {
            $data = [
                "service_id" => $this->input->post('service_id'),
                "service_name" => $this->input->post('service_name'),
                "desc" => $this->input->post('desc'),
                "price" => $this->input->post('price'),
                "KEY" => "ulbi123"
            ];

            $insert = $this->Service_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Service');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!');
                redirect('Service');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('Service');
            }
        }
    }

    public function edit($service_id)
    {

        $data['title'] = "Ubah Data Service";

        $data['data_service'] = $this->Service_model->getById($service_id);

        $this->form_validation->set_rules('service_id', 'Service ID', 'trim|required|numeric');
        $this->form_validation->set_rules('service_name', 'Service Name', 'trim|required');
        $this->form_validation->set_rules('desc', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');

        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('KEY') != '') {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('service/edit', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->session->set_flashdata('message', 'Ups! kamu belum login');
                redirect('login');
            }
        } else {
            $data = [
                "service_id" => $this->input->post('service_id'),
                "service_name" => $this->input->post('service_name'),
                "desc" => $this->input->post('desc'),
                "price" => $this->input->post('price'),
                "KEY" => "ulbi123"
            ];

            $update = $this->Service_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
                redirect('Service');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Gagal!');
                redirect('Service');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('Service');
            }
        }
    }

    public function delete($service_id)
    {
        $delete = $this->Service_model->delete($service_id);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('Service');
        } else {
            $this->session->set_flashdata('message', 'Data Gagal Dihapus!');
            redirect('Service');
        }
    }
}
