<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->model('LoginModel');
            date_default_timezone_set('Asia/Jakarta');
        }
    
        public function index()
        {
            $this->load->view('auth/login');
        }

        public function do_login(){
            $varEmail = $_POST['email'];
            $varPwd = md5($_POST['password']);
            $res = $this->LoginModel->do_login($varEmail,$varPwd);
            if($res->num_rows() > 0){
                $data = $res->row_array();
                $this->session->set_userdata('logon', TRUE);
                $this->session->set_userdata('ses_email', $data['email']);
                $this->session->set_userdata('status', $data['status']);
                $this->session->set_userdata('ses_role', $data['role']);
                redirect('DashboardController');
            }
            else{
                redirect('login');
            }
        }

        public function do_logout(){
            $eml = $this->session->userdata('ses_email');
            $res = $this->LoginModel->upLastLogin($eml);
            if($res == 1){
                $this->session->sess_destroy();
                redirect('login');
            }
        }
    
    }
    
    /* End of file Login.php */
    
?>