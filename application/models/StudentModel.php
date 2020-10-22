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

    public function get_mahasiswa_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getStudent(){
        $this->db->select('*');
        $this->db->from('mahasiswa');
        return $res = $this->db->get();
    }
}
