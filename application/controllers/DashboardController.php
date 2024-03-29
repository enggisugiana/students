<?php

class DashboardController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('CampusModel');
        $this->load->model('StudentModel');
        $this->load->model('UserMaster');
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('logon') != TRUE && $this->session->userdata('status') != 'A') {
            redirect('login');
        }
    }

    public function index()
    {
        $var['campus'] = $this->CampusModel->getCampus()->num_rows();
        $var['student'] = $this->StudentModel->getStudent()->num_rows();
        $var['user'] = $this->UserMaster->getUsers()->num_rows();

        $var['r_st_by_camp'] = $this->CampusModel->re_st_by_campus()->result_array();
        $var['r_st_by_reg'] = $this->CampusModel->get_region();
        // echo'<pre>';print_r($var['r_st_by_reg']);die();

        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/dashboard', $var);
        $this->load->view('dashboard/layouts/footer', $var);
    }

    public function add_campus()
    {
        $data['list_provinsi'] = $this->CampusModel->get_all_provinsi();
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/campus/addCampus', $data);
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
        redirect(site_url('DashboardController/add_campus'));
    }

    public function list_campus()
    {
        $data['list_provinsi'] = $this->CampusModel->get_all_provinsi();
        $data['list_kota'] = $this->CampusModel->get_all_kota();
        $data['list_kampus'] = $this->CampusModel->get_all_campus();
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/campus/listCampus', $data);
        $this->load->view('dashboard/layouts/footer');
    }

    public function get_all_campus()
    {
        $result = $this->CampusModel->get_all_campus();
        echo json_encode($result);
    }

    public function get_all_provinsi()
    {
        $result = $this->CampusModel->get_all_provinsi();
        echo json_encode($result);
    }

    public function get_kota_by_id()
    {
        $id = $this->input->post('id');
        $result = $this->CampusModel->get_kota_by_id($id);
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

    public function add_student()
    {
        $data['campus'] = $this->CampusModel->get_all_campus();
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/pages/addStudent', $data);
        $this->load->view('dashboard/layouts/footer');
    }
    public function students()
    {
        // $result = $this->StudentModel->get_all_students();
        // echo "<pre>";
        // var_dump($result);
        // die();
        $data['campus'] = $this->CampusModel->get_all_campus();
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/pages/students', $data);
        $this->load->view('dashboard/layouts/footer');
    }

    public function students_campus()
    {
        $data['students_campus'] = $this->CampusModel->get_campus();
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/dashboard/students_campus', $data);
        $this->load->view('dashboard/layouts/footer');
    }

    public function get_st_campus(){
        $id_camp = $_GET['id'];
        $data['camp'] = $this->CampusModel->get_camp_id($id_camp);
        $data['st_camp'] = $this->CampusModel->get_st_campus($id_camp);
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/dashboard/st_by_campus', $data);
        $this->load->view('dashboard/layouts/footer');
    }

    public function students_region()
    {
        $data['students_region'] = $this->CampusModel->get_region();
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/dashboard/students_region', $data);
        $this->load->view('dashboard/layouts/footer');
    }

    public function get_st_region(){
        $id = $_GET['id_prov'];
        $data['prov'] = $this->CampusModel->get_prov_id($id);
        $data['st_reg'] = $this->CampusModel->get_st_reg($id);
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar');
        $this->load->view('dashboard/dashboard/st_by_region', $data);
        $this->load->view('dashboard/layouts/footer');
    }

    public function submitFormStudent()
    {
        $data = array(
            'id_kampus' => $this->input->post('id_kampus'),
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'jurusan' => $this->input->post('jurusan'),
            'fakultas' => $this->input->post('fakultas'),
            'angkatan' => $this->input->post('angkatan'),
            'basic_storage' => $this->input->post('basic_storage'),
        );

        $this->db->insert('mahasiswa', $data);
        $this->session->set_flashdata('success_add', 'value');
        redirect(site_url('DashboardController/students'));
    }

    public function get_all_student()
    {
        $result = $this->StudentModel->get_all_students();
        echo json_encode($result);
    }

    public function get_detail_mahasiswa()
    {
        $id = $this->input->post('id');
        $res = $this->StudentModel->get_mahasiswa_by_id($id);
        echo json_encode($res);
    }

    public function delete_mahasiswa()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $res = $this->db->delete('mahasiswa');

        echo json_encode($res);
    }

    public function updateKampus()
    {
        $data = array(
            'id_kampus' => $this->input->post('id_kampus'),
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'jurusan' => $this->input->post('jurusan'),
            'fakultas' => $this->input->post('fakultas'),
            'angkatan' => $this->input->post('angkatan'),
            'basic_storage' => $this->input->post('basic_storage'),
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
        $this->session->set_flashdata('success_edit', 'value');
        redirect(site_url('DashboardController/students'));
    }
}
