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

        public function forgot_pass(){
            $this->load->view('auth/forgot');
        }

        public function do_request(){
            $email = $_POST['email'];
            $checkeml = $this->LoginModel->check_email($email);
            $var['email'] = $email;
            if($checkeml == 1){
                $this->load->view('auth/pass_change', $var);
            }
            else{
                $this->session->set_flashdata('notfound_email', 'value');
                redirect('Login/forgot_pass');
            }
        }

        public function do_change_pass(){
            $password = md5($_POST['password']);
            $con_password = md5($_POST['pass_con']);
            $email = $_POST['email'];
            if($con_password != $password){
                $this->session->set_flashdata('pass_diff', 'value');
                $this->load->view('auth/pass_change'); 
            }
            else{
                $do_up = $this->LoginModel->change_pass($email,$password);
                if($do_up == 1){
                    $this->session->set_flashdata('pass_change', 'value');
                    redirect('Login');
                }
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