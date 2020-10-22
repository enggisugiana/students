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

}

/* End of file LoginModel.php */

?>