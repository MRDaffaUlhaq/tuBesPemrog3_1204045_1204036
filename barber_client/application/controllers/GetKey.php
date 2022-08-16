<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetKey extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('GetKey_model'); //load model GetKey
        $this->load->library('form_validation'); //load form validation
    }

    public function index()
    {

        $data['title'] = "Generate API Key";

        if ($this->session->userdata('KEY') != '') {
            //load to view
            $this->load->view('key/getKey', $data);
        } else {
            $this->session->set_flashdata('message', 'Ups! register dulu ya');
            redirect('register');
        }
    }
    function generate()
    {
        $key = $this->input->post('key');
        $newKey = $this->GetKey_model->getRandomChar($key);
        var_dump($newKey);

        // $data = [
        //     'key' => $this->input->post('key'),
        //     "KEY" => "ulbi123"
        // ];
        // $insert = $this->GetKey_model->save($data);
        // if ($insert['response_code'] === 201) {
        //     $this->session->set_flashdata('berhasil', 'Berhasil Generate ! Silahkan ke halaman login');
        //     $this->load->view('key/getKey', $data);
        // } elseif ($insert['response_code'] === 400) {
        //     $this->session->set_flashdata('message', 'Maaf, sepertinya username atau email sudah digunakan!');
        //     redirect('register');
        // } else {
        //     $this->session->set_flashdata('message', 'Registrasi Gagal!');
        //     redirect('register');
        // }

    }
}
