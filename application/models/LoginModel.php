<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public function do_login($eml,$pwd){
        $this->db->select('*');
        $this->db->where('email', $eml);
        $this->db->where('password', $pwd);
        return $res = $this->db->get('user',1);
    }

    public function upLastLogin($eml){
        $in = array(
            'lst_login' => date('Y-m-d H:i:s')
        );
        $this->db->where('email', $eml);
        return $res = $this->db->update('user', $in);
    }

    public function check_email($eml){
        $this->db->select('email');
        $this->db->where('email', $eml);
        $res = $this->db->get('user');
        if($res->num_rows() > 0){
            return $var = 1;
        }
        else{
            return $var = 0;
        }
    }

    public function change_pass($email, $pass){
        $in = array(
            'password' => $pass
        );
        $this->db->where('email', $email);
        return $res = $this->db->update('user', $in);
    }

}

/* End of file LoginModel.php */

?>