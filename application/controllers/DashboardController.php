<?php

class DashboardController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/dashboard');
        $this->load->view('dashboard/layouts/footer');
    }

    public function campus()
    {
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/pages/campus');
        $this->load->view('dashboard/layouts/footer');
    }
}
