<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserMaster extends CI_Model {

    public function add_user($arr){
        $this->db->select('email');
        $this->db->where('email', $arr['email']);
        $res = $this->db->get('user')->num_rows();
        if($res > 0){
            return $res = 00;
        }
        else{
            return $res = $this->db->insert('user', $arr);
        }
    }

    public function getUser(){
        $this->db->select('*');
        $this->db->from('user');
        return $res = $this->db->get();
    }

    public function getProfile($eml){
        $this->db->select('*');
        $this->db->where('email', $eml);
        return $res = $this->db->get('user');
    }

    public function do_non_act($id){
        $in = array(
            'status' => 'N'
        );
        $this->db->where('id', $id);
        return $res = $this->db->update('user', $in);
    }

    public function do_act($id){
        $in = array(
            'status' => 'A'
        );
        $this->db->where('id', $id);
        return $res = $this->db->update('user', $in);
    }

    public function change_password($eml,$pass){
        $in = array(
            'password' => $pass
        );
        $this->db->where('email', $eml);
        return $res = $this->db->update('user', $in);
    }

    public function getUsers(){
        $this->db->select('*');
        $this->db->from('user');
        return $res = $this->db->get();
    }

}

/* End of file UserMaster.php */

?>