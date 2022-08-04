<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model'); //load model 
        $this->load->model('Employees_model'); //load model 
        $this->load->library('form_validation');
    }

    //load all data to index view
    public function index()
    {
        $data['title'] = "Sign Up";
        $data['data_emp'] = $this->Employees_model->getAll();

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('emp_id', 'Emp id', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register', $data);
        } else {
            $data = [
                "username" => $this->input->post('username'),
                "password" => $this->input->post('password'),
                "email" => $this->input->post('email'),
                "emp_id" => $this->input->post('emp_id'),
                
            ];
            $insert = $this->Register_model->save($data);
            // var_dump($insert);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('berhasil', 'Berhasil Registrasi ! Silahkan generate key');
                redirect('getKey');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Maaf, sepertinya username atau email sudah digunakan!');
                redirect('register');
            } else {
                $this->session->set_flashdata('message', 'Ups! sepertinya ada yang salah');
                redirect('register');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id');

        $this->session->set_flashdata('berhasil', 'Berhasil Logout');
        redirect('login');
    }
}
