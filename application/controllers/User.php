<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->model('UserModel');
        $this->auth->cek_loginAdmin();
    }

    public function index()
    {
        $data =  array(
            'data_category' => $this->CategoryModel->getAll(),
            'data_user' => $this->UserModel->getAll(),
        );
        $this->template->load('layout_admin', 'admin/user/index', $data);
    }

    function delete()
    {
        $id['id'] = $this->input->post('id');
        $this->UserModel->deleteData($id);
        $this->session->set_flashdata('warning', 'User Berhasil Dihapus');
        redirect('user');
    }
}
