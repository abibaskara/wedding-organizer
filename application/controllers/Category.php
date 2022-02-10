<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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
        $this->template->load('layout_admin', 'admin/category/index', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('category_name', 'category_name', 'trim|required|min_length[1]|max_length[30]');
        if ($this->form_validation->run() == true) {
            $data = array(
                'category_name' => $this->input->post('category_name'),
            );
            $this->CategoryModel->createData($data);
            $this->session->set_flashdata('success', 'Category Berhasil Ditambahkan');
            redirect('category');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('category');
        }
    } 

    function edit()
    {
        $id['id_category'] = $this->input->post('id_category');
        $data = array(
            'category_name' => $this->input->post('category_name'),
        );
        $this->CategoryModel->updateData($data, $id);
        $this->session->set_flashdata('success', 'Category Berhasil Diubah');
        redirect('category');
    }

    function delete()
    {
        $id['id_category'] = $this->input->post('id_category');
        $this->CategoryModel->deleteData($id);
        $this->session->set_flashdata('warning', 'Category Berhasil Dihapus');
        redirect('category');
    }
}
