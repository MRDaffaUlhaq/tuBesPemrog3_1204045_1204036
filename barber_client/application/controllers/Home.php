<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //load all data to index view
    public function index()
    {
        $data['title'] = "SI King's Barbershop";

        if ($this->session->userdata('KEY') != '') {
            //load to view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Ups! kamu belum login');
            redirect('login');
        }
    }
}
