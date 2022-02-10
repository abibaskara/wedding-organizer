<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_loginAdmin();
    }

    function statusPembayaran()
    {
        $id_category = $this->uri->segment(3);
        $data =  array(
            'data_produk' => $this->ProdukModel->getProduk($id_category),
            'data_category' => $this->CategoryModel->getAll(),
            'data_pembayaran' => $this->TransaksiModel->getAll(),
        );
        $this->template->load('layout_admin', 'admin/transaksi/pembayaran', $data);
    }

    function dataOrder()
    {
        $id_category = $this->uri->segment(3);
        $data =  array(
            'data_produk' => $this->ProdukModel->getProduk($id_category),
            'data_category' => $this->CategoryModel->getAll(),
            'data_order' => $this->TransaksiModel->getAllOrder(),
        );
        $this->template->load('layout_admin', 'admin/transaksi/order', $data);
    }

    function transaksiStatus()
    {
        $status1 = $this->input->post('id_pembelian');
        $status2 = $this->input->post('id_pembelian2');
        if ($status1 == true) {
            $id['id_pembelian'] = $this->input->post('id_pembelian');
            $data = [
                'status' => 4,
            ];
            $this->TransaksiModel->update($data, $id);
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('transaksi/dataOrder');
        } elseif ($status2 == true) {
            $id['id_pembelian'] = $this->input->post('id_pembelian2');
            $data = [
                'status' => 5,
            ];
            $this->TransaksiModel->update($data, $id);
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('transaksi/dataOrder');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Diupdate');
            redirect('transaksi/dataOrder');
        }
    }
}
