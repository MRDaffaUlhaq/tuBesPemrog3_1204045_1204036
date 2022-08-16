<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model'); //load model 
        $this->load->library('form_validation');
    }

    //load all data to index view
    public function index()
    {
        $data['title'] = "Sign Up";

        $this->load->view('auth/register', $data);
    }

    public function tryRegister()
    {
        $data = [
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            "email" => $this->input->post('email'),
        ];

        $insert = $this->Register_model->tryRegister($data);

        if ($insert['status'] == 'Register Berhasil') {
            $this->session->set_flashdata('flash', 'Register Berhasil!');
            $this->genNewKey($insert['data']);
        } elseif ($insert['status'] == 'Register Gagal') {
            $this->session->set_flashdata('message', 'Inputan tidak boleh ada yang kosong!');
            redirect('register');
        } else {
            $this->session->set_flashdata('message', 'Username atau Email telah digunakan!');
            redirect('register');
        }
    }

    public function genNewKey($nId)
    {
        $nKey['nKey'] = '';
        $nKey['nId'] = $nId;
        $this->load->view('key/getKey', $nKey);
    }

    public function generatekey()
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charsLength = strlen($chars);
        $keyLength = 7;
        $nKey['nKey'] = '';
        for ($i = 0; $i < $keyLength; $i++) {
            $nKey['nKey'] .= $chars[rand(0, $charsLength - 1)];
        }
        $data = [
            'user_id' => intval($this->input->post('user_id')),
            'key' => $nKey['nKey']
        ];
        $nKey['nId'] = intval($this->input->post('user_id'));
        $simpanKey = $this->Register_model->simpanKey($data);

        $this->session->set_flashdata('berhasil', 'Generate Berhasil, Silahkan Ke Halaman Login!');

        $this->load->view('key/getKey', $nKey);
    }
}
