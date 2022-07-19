<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Cns_model extends CI_Model
{
    private $_guzzle;

    public function __construct()
    {
        parent::__construct();

        $this->_guzzle = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://barber_rest.test/index.php/Criticisms_n_suggests/cns',
            // You can set any number of default request options.
            'auth'  => ['ulbi', 'pemrograman3'],
        ]);
    }

    //get all data
    public function getAll()
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'ulbi123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    //get data by cns_id
    public function getById($cns_id)
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'ulbi123',
                'cns_id' => $cns_id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
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

    //update data
    public function update($data)
    {
        $response = $this->_guzzle->request('PUT', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function delete($cns_id)
    {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
                'http_errors => false',
                'KEY' => 'ulbi123',
                'cns_id' => $cns_id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}
