<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public function do_login($eml,$pwd){
        $this->db->select('*');
        $this->db->where('email', $eml);
        $this->db->where('password', $pwd);
        return $res = $this->db->get('user',1);
    }

}

/* End of file LoginModel.php */

?>