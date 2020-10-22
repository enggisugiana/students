<?php 
Class CampusModel extends CI_Model
{
    function get_all_campus() {
        $this->db->select('*,k.nama as nama, p.nama as nama_provinsi, b.nama as nama_kota');
        $this->db->from('kampus k');
        $this->db->join('provinsi p', 'p.id_prov = k.provinsi');
        $this->db->join('kota_kab b', 'b.id_kab = k.kota_kab');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_kampus_by_id($id)
	{
		$this->db->select('*');
        $this->db->from('kampus');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_provinsi() {
        $this->db->select('*');
        $this->db->from('provinsi');
        $this->db->order_by("nama", "asc");

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_kota() {
        $this->db->select('*');
        $this->db->from('kota_kab');
        $this->db->order_by("nama", "asc");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_kota_by_id($id)
	{
		$this->db->select('id_kab,nama');
        $this->db->from('kota_kab');
        $this->db->where('id_prov', $id);

        $query = $this->db->get();

        return $query->result_array();
    }
}
