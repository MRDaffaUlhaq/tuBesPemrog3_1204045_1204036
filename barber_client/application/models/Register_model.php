<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Register_model extends CI_Model
{
    private $_guzzle;

    public function __construct()
    {
        parent::__construct();

        $this->_guzzle = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://barber_rest.test/index.php/Users/register',
            // You can set any number of default request options.
            'auth'  => ['ulbi', 'pemrograman3'],
        ]);
    }

    //add data
    public function save($data)
    {
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function tryRegister($data)
    {
        $tryUri = $this->_guzzle = new Client([
            'base_uri' => 'http://barber_rest.test/index.php/Users/register',
        ]);

        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function simpanKey($data)
    {
        $simpanKeyUri = new Client([
            'base_uri' => 'http://barber_rest.test/index.php/Users/simpankey',
        ]);

        $response = $simpanKeyUri->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}
