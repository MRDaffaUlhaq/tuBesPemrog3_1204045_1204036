<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employees_model extends CI_Model
{
    private $_table_employees = 'employees';

    // get data dari tabel Customers
    public function getDataEmployees($emp_id)
    {
        //query builder
        $this->db->from($this->_table_employees);
        if ($emp_id) {
            $this->db->where('emp_id', $emp_id);
        }
        $this->db->join('job_positions', 'employees.position_id = job_positions.position_id');
        $this->db->select('emp_id, username, telp, email, position, salary');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insertEmployees($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_employees, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateEmployees($data, $emp_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_employees, $data, ['emp_id' => $emp_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteEmployees($emp_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_employees, ['emp_id' => $emp_id]);
        return $this->db->affected_rows();
        // return $query;
    }
}
