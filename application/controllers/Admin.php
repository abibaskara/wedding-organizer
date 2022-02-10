<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_loginAdmin();
    }

    public function index()
    {
        $data =  array(
            'data_category' => $this->CategoryModel->getAll(),
            'menunggu_konfirmasi' => $this->TransaksiModel->getMenungguKonfirmasi(),
            'dikerjakan' => $this->TransaksiModel->getDikerjakan(),
            'selesai' => $this->TransaksiModel->getSelesai(),
        );
        $this->template->load('layout_admin', 'admin/dashboard', $data);
    }
}
