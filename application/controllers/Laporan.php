<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
            'get_laporan' => $this->TransaksiModel->getLaporan(),
            'produk' => $this->TransaksiModel->getProduk(),
            'jumlah_laporan' => $this->TransaksiModel->getJumlah(),
        );
        $this->template->load('layout_admin', 'admin/laporan/index', $data);
    }

    function print()
    {
        $data =  array(
            'data_category' => $this->CategoryModel->getAll(),
        );
        $this->template->load('layout_admin', 'admin/laporan/print/index', $data);
    }

    function filterPrint()
    {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $data = [
            'get_laporan' => $this->TransaksiModel->getPrint($start, $end),
        ];
        $this->load->view('admin/laporan/print/cetak', $data);
    }
}
