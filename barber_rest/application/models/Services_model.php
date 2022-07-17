<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Services_model extends CI_Model
{
    private $_table_services = 'services';

    // get data dari tabel Services
    public function getDataServices($service_id)
    {
        //query builder
        if ($service_id) {
            $this->db->from($this->_table_services);
            $this->db->where('service_id', $service_id);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_services);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertServices($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_services, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateServices($data, $service_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_services, $data, ['service_id' => $service_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteServices($service_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_services, ['service_id' => $service_id]);
        return $this->db->affected_rows();
        // return $query;
    }
}
