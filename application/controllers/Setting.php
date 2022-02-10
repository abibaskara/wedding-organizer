<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
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
        $this->template->load('layout_admin', 'admin/setting/index', $data);
    }

    function update()
    {
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        // $query = $this->db->get_where('user', ['id' => $id])->row_array();
        if ($password == $confirm_password) {
            $data = [
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
            $this->db->update('user', $data, array('id' => $id));
            $this->session->set_flashdata('success', 'Password Berhasil Diubah');
            redirect('profile');
        } else {
            $this->session->set_flashdata('error', 'Password Tidak Sama');
            redirect('setting');
        }
    }
}
