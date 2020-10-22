<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserMaster');
        date_default_timezone_set('Asia/Jakarta');
        if($this->session->userdata('logon') != TRUE && $this->session->userdata('status') != 'A'){
            redirect('login');
        }
    }

    public function index()
    {
        $var['user'] = $this->UserMaster->getUser()->result_array();
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/setting/user', $var);
        $this->load->view('dashboard/layouts/footer');
    }

    public function profile(){
        $eml = $this->session->userdata('ses_email');
        $var['profile'] = $this->UserMaster->getProfile($eml)->result_array();
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/setting/user_profile', $var);
        $this->load->view('dashboard/layouts/footer');
    }

    public function add_user(){
        $pass = md5($_POST['password']);
        $arrInput = array(
            'email' => $_POST['email'],
            'password' => $pass,
            'role' => 1,
            'd_reg' => date('Y-m-d H:i:s')
        );
        $res = $this->UserMaster->add_user($arrInput);
        if($res == 1){
            $this->session->set_flashdata('success_add', 'value');
            redirect('Management');
        }
        else{
            $this->session->set_flashdata('error_add', 'value');
            redirect('Management');
        }
    }

    public function do_non_act($eml){
        $res = $this->UserMaster->do_non_act($eml);
        if($res == 1){
            $this->session->set_flashdata('success_non', 'value');
            redirect('Management');
        }
    }
    
    public function do_act($eml){
        $res = $this->UserMaster->do_act($eml);
        if($res == 1){
            $this->session->set_flashdata('success_act', 'value');
            redirect('Management');
        }
    }

    public function change_password(){
        $eml = $this->session->userdata('ses_email');
        $pass = md5($_POST['password']);
        $res = $this->UserMaster->change_password($eml,$pass);
        if($res == 1){
            $this->session->set_flashdata('success_pwd', 'value');
            redirect('Management/profile');
        }
        else{
            $this->session->set_flashdata('error_pwd', 'value');
            redirect('Management/profile');
        }
    }

}

/* End of file Management.php */

?>