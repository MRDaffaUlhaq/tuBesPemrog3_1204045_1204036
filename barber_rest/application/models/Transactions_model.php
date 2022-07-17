<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transactions_model extends CI_Model
{
    private $_table_transactions = 'transactions';

    // get data dari tabel Transactions
    public function getDataTransactions($t_id)
    {
        //query builder
        $this->db->from($this->_table_transactions);
        if ($t_id) {
            $this->db->where('t_id', $t_id);
        }
        $this->db->join('customers', 'transactions.customer_id = customers.customer_id');
        $this->db->join('employees', 'transactions.emp_id = employees.emp_id');
        $this->db->join('services', 'transactions.service_id = services.service_id');
        $this->db->select('t_id, username, service_name, name, date');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insertTransactions($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_transactions, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateTransactions($data, $t_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_transactions, $data, ['t_id' => $t_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteTransactions($t_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_transactions, ['t_id' => $t_id]);
        return $this->db->affected_rows();
        // return $query;
    }
}
