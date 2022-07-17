<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customers_model extends CI_Model
{
    private $_table_customers = 'customers';

    // get data dari tabel Customers
    public function getDataCustomers($customer_id)
    {
        //query builder
        if ($customer_id) {
            $this->db->from($this->_table_customers);
            $this->db->where('customer_id', $customer_id);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_customers);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertCustomers($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_customers, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateCustomers($data, $customer_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_customers, $data, ['customer_id' => $customer_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteCustomers($customer_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_customers, ['customer_id' => $customer_id]);
        return $this->db->affected_rows();
        // return $query;
    }
}
