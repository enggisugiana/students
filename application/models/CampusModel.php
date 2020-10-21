<?php 
Class CampusModel extends CI_Model
{
    function get_all_campus() {
        $this->db->select('*');
        $this->db->from('kampus');

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
}
?>