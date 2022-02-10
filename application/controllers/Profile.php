<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_loginAdmin();
    }

    function index()
    {
        $data =  array(
            'data_category' => $this->CategoryModel->getAll(),
        );
        $this->template->load('layout_admin', 'admin/profile/index', $data);
    }

    function edit()
    {
        $data =  array(
            'data_category' => $this->CategoryModel->getAll(),
        );
        $this->template->load('layout_admin', 'admin/profile/edit', $data);
    }

    function update()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'gender' => $this->input->post('gender'),
            'role' => $this->input->post('role'),
            'email' => $this->input->post('email'),
        ];

        $this->db->update('user', $data, array('id' => $id));
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('profile');
    }

    function homeProfile()
    {
        $this->template->load('layout_admin', 'landing-page/profile/index');
    }
}
