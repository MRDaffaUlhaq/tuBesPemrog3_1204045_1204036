<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Job_model'); //load model Job
        $this->load->library('form_validation'); //load form validation
    }

    //load all data to index view
    public function index()
    {

        $data['title'] = "List Data Jabatan";

        $data['data_job'] = $this->Job_model->getAll();

        //load to view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('job/index', $data);
        $this->load->view('templates/footer', $data);
    }

    //load detail data to detail view
    public function detail($position_id)
    {

        $data['title'] = "Detail Data Jabatan";

        $data['data_job'] = $this->Job_model->getById($position_id);

        //load to view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('job/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {

        $data['title'] = "Tambah Data Jabatan";

        $this->form_validation->set_rules('position_id', 'Job ID', 'trim|numeric');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');
        $this->form_validation->set_rules('salary', 'Salary', 'trim|required');
        $this->form_validation->set_rules('desc', 'Description', 'trim|required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('job/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                "position_id" => $this->input->post('position_id'),
                "position" => $this->input->post('position'),
                "salary" => $this->input->post('salary'),
                "desc" => $this->input->post('desc'),
                "KEY" => "ulbi123"
            ];

            $insert = $this->Job_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('job');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!');
                redirect('job');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('job');
            }
        }
    }

    public function edit($position_id)
    {

        $data['title'] = "Ubah Data job";

        $data['data_job'] = $this->Job_model->getById($position_id);

        $this->form_validation->set_rules('position_id', 'Job ID', 'trim|numeric');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');
        $this->form_validation->set_rules('salary', 'Salary', 'trim|required');
        $this->form_validation->set_rules('desc', 'Description', 'trim|required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('job/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                "position_id" => $this->input->post('position_id'),
                "position" => $this->input->post('position'),
                "salary" => $this->input->post('salary'),
                "desc" => $this->input->post('desc'),
                "KEY" => "ulbi123"
            ];

            $update = $this->Job_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
                redirect('job');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Gagal!');
                redirect('job');
            } else {
                $this->session->set_flashdata('message', 'Data Gagal!');
                redirect('job');
            }
        }
    }

    public function delete($position_id)
    {
        $delete = $this->Job_model->delete($position_id);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('job');
        } elseif ($delete['response_code'] === 500) {
            $this->session->set_flashdata('flash', 'Data Gagal Dihapus');
            redirect('job');
        } else {
            $this->session->set_flashdata('message', 'Data Gagal Dihapus!');
            redirect('job');
        }
    }
}
