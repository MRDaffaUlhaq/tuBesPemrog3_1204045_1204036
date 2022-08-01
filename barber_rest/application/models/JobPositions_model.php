<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JobPositions_model extends CI_Model
{
    private $_table_jp = 'job_positions';

    // get data dari tabel JobPositions
    public function getDataJobPositions($position_id)
    {
        //query builder
        if ($position_id) {
            $this->db->from($this->_table_jp);
            $this->db->where('position_id', $position_id);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_jp);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertJobPositions($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_jp, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateJobPositions($data, $position_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_jp, $data, ['position_id' => $position_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteJobPositions($position_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_jp, ['position_id' => $position_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    public function getJob()
    {
        $query = $this->db->query("SELECT count(*) as job FROM job_positions");
        return $query->row_array();
    }
}
