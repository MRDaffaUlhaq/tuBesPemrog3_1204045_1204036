<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model'); //load model 
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    //load all data to index view
    public function index()
    {
        if ($this->session->userdata('KEY') == '') {
            $this->load->view('auth/login');
        } else {
            redirect('home');
        }
    }

    public function login()
    {
        $data['title'] = "Auth";
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login', $data);
        } else {
            $data = [
                "username" => $this->input->post('username'),
                "password" => $this->input->post('password'),

            ];
            // var_dump($data);
            $insert = $this->Login_model->save($data);
            // var_dump($insert);
            if ($insert['result'] == "done") {
                $this->session->set_flashdata('flash', 'Kamu Telah Login');
                $this->session->set_userdata('KEY', $insert['data']['key']);
                redirect('home');
            } elseif ($insert['result'] == "failed") {
                $this->session->set_flashdata('message', 'Ups! username atau password salah');
                redirect('login');
            } else {
                $this->session->set_flashdata('message', 'Login Gagal!');
                redirect('login');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('KEY');
        redirect('login');
    }
}
