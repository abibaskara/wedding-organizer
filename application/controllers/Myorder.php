<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myorder extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();
    }

    public function index()
    {
        $this->template->load('layout_landing', 'landing-page/myorder/index');
    }

    public function pembayaran($id)
    {
        $data =  array(
            'pembelian' => $this->ShopModel->getPembelian($id),
            'data_rekening' => $this->RekeningModel->getAll(),
        );
        $this->template->load('layout_landing', 'landing-page/myorder/pembayaran', $data);
    }

    function bayardp()
    {
        $id['id_pembelian'] = $this->input->post('id_pembelian');
        // $id_pembelian = $this->input->post('id_pembelian');
        $data = [
            'status' => 2,
        ];
        $this->ShopModel->updatePembelian($data, $id);

        $config['upload_path'] = './assets/assets-landing/foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo $this->upload->display_errors();
        } else {
            $data = [
                'id_pembelian' => $this->input->post('id_pembelian'),
                'id_customer' => $this->input->post('id_customer'),
                'rekening_dp' => $this->input->post('rekening_dp'),
                'bayar' => $this->input->post('bayar'),
                'tgl_pembayaran_dp' => date('Y-m-d'),
                'foto_dp' => $this->upload->data('file_name'),
                'status' => 1
            ];
            $this->ShopModel->insertPembayaran($data);
            redirect('myorder');
        }
    }

    public function pelunasan($id)
    {
        $data =  array(
            'pembelian' => $this->ShopModel->getPembelianLunas($id),
            'data_rekening' => $this->RekeningModel->getAll(),
        );
        $this->template->load('layout_landing', 'landing-page/myorder/pelunasan', $data);
    }

    function bayarlunas()
    {
        $id['id_pembelian'] = $this->input->post('id_pembelian');
        $data = [
            'status' => 3,
        ];
        $this->ShopModel->updatePembelian($data, $id);

        $config['upload_path'] = './assets/assets-landing/foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo $this->upload->display_errors();
        } else {
            $data = [
                'id_pembelian' => $this->input->post('id_pembelian'),
                'rekening_lunas' => $this->input->post('rekening_lunas'),
                'bayar' => $this->input->post('bayar'),
                'tgl_pembayaran_lunas' => date('Y-m-d'),
                'foto_lunas' => $this->upload->data('file_name'),
                'status' => 2
            ];
            $id['id_pembelian'] = $this->input->post('id_pembelian');
            $this->ShopModel->updatePembayaran($data, $id);
            redirect('myorder');
        }
    }

    public function cash($id)
    {
        $data =  array(
            'pembelian' => $this->ShopModel->getPembelian($id),
            'data_rekening' => $this->RekeningModel->getAll(),
        );
        $this->template->load('layout_landing', 'landing-page/myorder/cash', $data);
    }

    function bayarCash()
    {
        $id['id_pembelian'] = $this->input->post('id_pembelian');
        $data = [
            'status' => 3,
        ];
        $this->ShopModel->updatePembelian($data, $id);

        $config['upload_path'] = './assets/assets-landing/foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo $this->upload->display_errors();
        } else {
            $data = [
                'id_pembelian' => $this->input->post('id_pembelian'),
                'id_customer' => $this->input->post('id_customer'),
                'rekening_lunas' => $this->input->post('rekening_lunas'),
                'bayar' => $this->input->post('bayar'),
                'tgl_pembayaran_lunas' => date('Y-m-d'),
                'foto_lunas' => $this->upload->data('file_name'),
                'status' => 2
            ];
            $this->ShopModel->insertPembayaran($data);
            redirect('myorder');
        }
    }
}
