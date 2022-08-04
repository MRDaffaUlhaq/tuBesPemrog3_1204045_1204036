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
            } elseif ($insert['result'] == "failed user id") {
                $this->session->set_flashdata('message', 'Ups! kamu belum generate api key');
                redirect('getKey');
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

    public function register()
	{
		$this->load->view('auth/register');
	}

    public function tryRegister()
	{
		$data = [
			"username" => $this->input->post('username'),
			"password" => $this->input->post('password'),
			"email" => $this->input->post('email'),
		];

		$insert = $this->Login_model->tryRegister($data);
        // var_dump($insert);
		if($insert['status'] == 'Register Berhasil'){
			$this->session->set_flashdata('flash','Register Berhasil!');
			$this->genNewKey($insert['data']);
		}elseif ($insert['status'] == 'Register Gagal') {
			$this->session->set_flashdata('message','Inputan tidak boleh ada yang kosong!');
			redirect('register');
		}else{
			$this->session->set_flashdata('message', 'Username atau Email telah digunakan!');
			redirect('register');
		}
	}

    public function genNewKey($nId) {
		$nKey['nKey'] = '';
		$nKey['nId'] = $nId;
		$this->load->view('key/getKey', $nKey);
	}

    public function generatekey() {
		$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charsLength = strlen($chars);
		$keyLength = 7;
		$nKey['nKey'] = '';
		for ($i = 0;$i < $keyLength; $i++) {
			$nKey['nKey'] .= $chars[rand(0, $charsLength - 1)];
		}
		$data = [
			'user_id' => $this->input->post('user_id'),
			'key' => $nKey['nKey']
		];

		$simpanKey = $this->Login_model->simpanKey($data);
		$nKey['nId'] = $this->input->post('user_id');
        $this->session->set_flashdata('berhasil','Generate Berhasil, Silahkan Ke Halaman Login!');

		$this->load->view('key/getKey', $nKey);
	}
    
}
