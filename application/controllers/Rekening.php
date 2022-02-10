<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
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
            'data_rekening' => $this->RekeningModel->getAll(),
        );
        $this->template->load('layout_admin', 'admin/rekening/index', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'trim|required');
        $this->form_validation->set_rules('no_rekening', 'no_rekening', 'trim|required');
        if ($this->form_validation->run() == true) {
            $data = array(
                'nama_bank' => $this->input->post('nama_bank'),
                'no_rekening' => $this->input->post('no_rekening'),
            );
            $this->RekeningModel->createData($data);
            $this->session->set_flashdata('success', 'Data Rekening Berhasil Ditambahkan');
            redirect('rekening');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('rekening');
        }
    }

    function edit()
    {
        $id['id'] = $this->input->post('id');
        $data = array(
            'nama_bank' => $this->input->post('nama_bank'),
            'no_rekening' => $this->input->post('no_rekening')
        );
        $this->RekeningModel->updateData($data, $id);
        $this->session->set_flashdata('success', 'Data Rekening Berhasil Diubah');
        redirect('rekening');
    }

    function delete()
    {
        $id['id'] = $this->input->post('id');
        $this->RekeningModel->deleteData($id);
        $this->session->set_flashdata('warning', 'Data Rekening Berhasil Dihapus');
        redirect('rekening');
    }
}
