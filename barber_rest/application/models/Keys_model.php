<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keys_model extends CI_Model
{
    private $_table_keys = 'keys';

    // get data dari tabel Keys
    public function getDataKeys($id)
    {
        //query builder
        if ($id) {
            $this->db->from($this->_table_keys);
            $this->db->where('id', $id);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_keys);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function cekUserId($key)
    {
        //query builder
        if ($key) {
            $this->db->from($this->_table_keys);
            $this->db->where('key', $key);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_keys);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertKeys($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_keys, $data);
        return $this->db->affected_rows();
        // return $query;
    }
}
