<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    function index()
    {
        $this->template->load('layout_landing', 'landing-page/register');
    }

    function indexAdmin()
    {
        $this->load->view('admin/register');
    }

    function proses()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('no', 'no', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'trim|required');
        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $no = $this->input->post('no');
            $alamat = $this->input->post('alamat');
            $gender = $this->input->post('gender');
            $role = 'Customer';
            $this->auth->register($email, $password, $nama, $gender, $role, $no, $alamat);
            $this->session->set_flashdata('success', 'Proses Pendaftaran User Berhasil');
            redirect('login');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('register');
        }
    }

    function prosesAdmin()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[1]|max_length[30]');
        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $role = $this->input->post('role');
            $this->auth->registerAdmin($email, $password, $nama, $role);
            $this->session->set_flashdata('success', 'Proses Pendaftaran User Berhasil');
            redirect('login/loginAdmin');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('register/indexAdmin');
        }
    }
}
