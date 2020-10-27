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

    public function get_campus(){
        $this->db->select('*');
        $this->db->from('kampus');
        // $this->db->join('mahasiswa m', 'm.id_kampus = k.id', 'left');
        return $res = $this->db->get()->result_array();
    }

    public function get_st_campus($id){
        $this->db->select('*');
        $this->db->where('id_kampus', $id);
        $this->db->order_by('id', 'asc');
        return $res = $this->db->get('mahasiswa')->result_array();
    }

    public function get_camp_id($id){
        $this->db->select('*');
        $this->db->from('kampus');
        $this->db->where('id',$id);
        return $res = $this->db->get()->result_array();
    }

    public function count_st_by_campus(){
        $this->db->select('*');
        $this->db->from('kampus k');
        $this->db->join('mahasiswa m', 'm.id_kampus = k.id', 'left');
        $this->db->group_by('m.nama_mahasiswa','asc');
        return $res = $this->db->get('mahasiswa');
    }

    public function re_st_by_campus(){
        $this->db->select('*');
        $this->db->from('kampus k');
        $this->db->join('mahasiswa m', 'm.id_kampus = k.id', 'left');
        $this->db->group_by('k.nama','asc');
        return $res = $this->db->get('mahasiswa');
    }

    public function get_region(){
        $this->db->select('*');
        $this->db->from('kampus k');
        $this->db->join('provinsi p', 'p.id_prov = k.provinsi', 'left');
        $this->db->group_by('p.nama');
        return $res = $this->db->get()->result_array();
        // echo'<pre>';print_r($res);die();
    }

    public function get_prov_id($id){
        $this->db->select('*');
        $this->db->from('provinsi');
        $this->db->where('id_prov', $id);
        return $res = $this->db->get()->result_array();
    }

    public function get_st_reg($id){
        $this->db->select('*');
        $this->db->from('provinsi p');
        $this->db->join('kampus k', 'k.provinsi = p.id_prov', 'left');
        $this->db->where('p.id_prov', $id);
        $this->db->group_by('k.nama');
        $this->db->join('mahasiswa m', 'm.id_kampus = k.id', 'left');
        return $res = $this->db->get('mahasiswa')->result_array();
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

    public function getCampus(){
        $this->db->select('*');
        return $res = $this->db->get('kampus');
    }
}
