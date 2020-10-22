<?php

class DashboardController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('CampusModel');
        $this->load->model('StudentModel');
    }

    public function index()
    {
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/dashboard');
        $this->load->view('dashboard/layouts/footer');
    }

    public function add_campus()
    {
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/campus/addCampus');
        $this->load->view('dashboard/layouts/footer');
    }

    public function submitFormCampus()
    {
        $logo = $_FILES['logo']['name'];
        $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $date = date('Ymdhis');
        $filename = $date . "." . $extension;

        $config['upload_path'] = "assets/images/";
        $config['allowed_types'] = "jpg|jpeg|png";
        $config['file_name'] = $filename;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')) {
            $this->session->set_flashdata('error_up_foto', 'value');
            redirect(site_url('dashboard/addformcampus'));
        } else {
            $logo = $filename;
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'provinsi' => $this->input->post('provinsi'),
            'kota_kab' => $this->input->post('kota_kab'),
            'logo' => $logo,
            'warna' => $this->input->post('warna'),
        ];
        $this->db->insert('kampus', $data);
        $this->session->set_flashdata('success_add', 'value');
        redirect(site_url('dashboard/addcampus'));
    }

    public function list_campus()
    {
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/campus/listCampus');
        $this->load->view('dashboard/layouts/footer');
    }

    public function get_all_campus()
    {
        $result = $this->CampusModel->get_all_campus();
        echo json_encode($result);
    }

    public function get_detail_kampus()
    {
        $id = $this->input->post('id');
        $res = $this->CampusModel->get_kampus_by_id($id);
        echo json_encode($res);
    }

    public function update_detail_kampus()
    {
        $date_now = date('Y-m-d H:i:s');

        $logo_lama = $this->input->post('logo_lama');

        $logo = $_FILES['logo']['name'];
        $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $date = date('Ymdhis');
        $filename = $date . "." . $extension;

        if ($logo) {
            // echo 'gk msk gambar';die();
            unlink('assets/images/' . $logo_lama);

            $config['upload_path'] = "assets/images/";
            $config['allowed_types'] = "jpg|jpeg|png";
            $config['file_name'] = $filename;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('logo')) {
                $this->session->set_flashdata('error_up_foto', 'value');
                redirect(site_url('dashboard/listcampus'));
            } else {
                $logo = $filename;
            }
            $data = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'kota_kab' => $this->input->post('kota_kab'),
                'logo' => $logo,
                'warna' => $this->input->post('warna'),
            );
            $this->db->where('id', $this->input->post('id'));
            $res = $this->db->update('kampus', $data);
            echo json_encode($res);
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'kota_kab' => $this->input->post('kota_kab'),
                'warna' => $this->input->post('warna'),
            );
            $this->db->where('id', $this->input->post('id'));
            $res = $this->db->update('kampus', $data);
            echo json_encode($res);
        }
    }

    public function delete_kampus()
    {
        $id = $this->input->post('id');
        $logo = $this->input->post('logo_hapus');
        unlink('assets/images/' . $logo);

        $this->db->where('id', $id);
        $res = $this->db->delete('kampus');

        echo json_encode($res);
    }

    public function campus()
    {
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/pages/campus');
        $this->load->view('dashboard/layouts/footer');
    }
    
    public function students()
    {
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/pages/students');
        $this->load->view('dashboard/layouts/footer');
    }

    public function submitFormStudent()
    {
        $data = array(
            'id_kampus' => $this->input->post('id_kampus'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'jurusan' => $this->input->post('jurusan'),
            'fakultas' => $this->input->post('fakultas'),
            'angkatan' => $this->input->post('angkatan'),
            'basic_storage' => $this->input->post('basic_storage'),
        );

        $result = $this->db->insert('mahasiswa', $data);
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }

        echo json_encode($msg);
    }

    public function get_all_student()
    {
        $result = $this->StudentModel->get_all_students();
        echo json_encode($result);
    }
}
