<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model'); //load model 
        $this->load->library('form_validation');
    }

    //load all data to index view
    public function index()
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
                "KEY" => "ulbi123"
            ];
            // var_dump($data);
            $insert = $this->Login_model->save($data);
            // var_dump($insert);
            if ($insert['value'] == "1") {
                $this->session->set_flashdata('flash', 'Kamu Telah Login');
                redirect('getkey');
            } elseif ($insert['value'] == "2") {
                $this->session->set_flashdata('message', 'Username Atau Password Salah');
                redirect('login');
            } elseif ($insert['value'] == "3") {
                $this->session->set_flashdata('message', 'Beberapa data masih kosong');
                redirect('login');
            } else {
                $this->session->set_flashdata('message', 'Login Gagal!');
                redirect('login');
            }
        }
    }
}
