<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File_model extends CI_Model
{
    public function showfile()
    {
        $hasil = $this->db->get('file');
        return $hasil;
    }

    public function insert($data)
    {
        $this->db->insert('file', $data);
    }
}
