<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Criticisms_n_suggests_model extends CI_Model
{
    private $_table_cns = 'criticisms_n_suggests';

    // get data dari tabel cns
    public function getDataCns($cns_id)
    {
        //query builder
        $this->db->from($this->_table_cns);
        if ($cns_id) {
            $this->db->where('cns_id', $cns_id);
        }
        $this->db->join('customers', 'criticisms_n_suggests.customer_id = customers.customer_id');
        $this->db->select('cns_id, name, criticism, suggest, rate');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insertCns($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_cns, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateCns($data, $cns_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_cns, $data, ['cns_id' => $cns_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteCns($cns_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_cns, ['cns_id' => $cns_id]);
        return $this->db->affected_rows();
        // return $query;
    }
}
