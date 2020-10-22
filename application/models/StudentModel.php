<?php
class StudentModel extends CI_Model
{
    function get_all_students()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');

        $query = $this->db->get();

        return $query->result_array();
    }
}
