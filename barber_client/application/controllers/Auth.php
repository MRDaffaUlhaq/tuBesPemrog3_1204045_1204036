<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model'); //load model 
        $this->load->library('form_validation');
    }

    //load all data to index view
    public function index()
    {

        $data['title'] = "Auth";
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            // $this->load->view('templates/header', $data);
            // $this->load->view('templates/menu', $data);
            // $this->load->view('templates/footer', $data);
            $this->load->view('auth/login', $data);
        } else {
            $data = [
                "username" => $this->input->post('username'),
                "password" => $this->input->post('password'),
                "KEY" => "ulbi123"
            ];
            // var_dump($data);
            $insert = $this->Auth_model->save($data);
            // var_dump($insert);
            if ($insert['value'] == "1") {
                $this->session->set_flashdata('flash', 'Berhasil Login');
                redirect('home');
            } elseif ($insert['value'] == "2") {
                $this->session->set_flashdata('message', 'Username Atau Password Salah');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', 'Login Gagal!');
                redirect('auth');
            }
        }
    }
}
