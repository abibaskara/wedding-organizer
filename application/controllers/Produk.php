<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_loginAdmin();
    }

    function indexProduk()
    {
        $id_category = $this->uri->segment(3);

        $data =  array(
            'data_produk' => $this->ProdukModel->getProduk($id_category),
            'data_category' => $this->CategoryModel->getAll(),
            'data_foto' => $this->ProdukModel->getAllGambar(),
            'kategori' => $id_category,
            'title' => $this->ProdukModel->getTitle($id_category),
        );
        $this->template->load('layout_admin', 'admin/produk/index', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');

        $id_category = $this->input->post('id_category');

        $query = $this->ProdukModel->getIDProduk();
        foreach ($query as $row) {
            $a = $row->id;
        }
        $hasil = $a + 1;

        $add = [
            'id_gambar' => $hasil,
            'id_category' => $id_category,
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'description' => $this->input->post('description'),
        ];

        $getProduk = $this->ProdukModel->getAll();
        if (empty($getProduk)) {
            $config['upload_path'] = './assets/assets-admin/foto-produk/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            for ($i = 0; $i <= 5; $i++) {
                if (!$this->upload->do_upload('filefoto' . $i)) {
                    echo $this->upload->display_errors();
                } else {
                    $data = [
                        'id_produk' => 1,
                        'foto' => $this->upload->data('file_name'),
                    ];
                    $this->ProdukModel->createGambar($data);
                }
            }
        } else {
            $config['upload_path'] = './assets/assets-admin/foto-produk/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            for ($i = 0; $i <= 5; $i++) {
                if (!$this->upload->do_upload('filefoto' . $i)) {
                    echo $this->upload->display_errors();
                } else {
                    $data = [
                        'id_produk' => $hasil,
                        'foto' => $this->upload->data('file_name'),
                    ];
                    $this->ProdukModel->createGambar($data);
                }
            }
        }
        $this->ProdukModel->createData($add);
        $this->session->set_flashdata('success', 'Produk Berhasil Ditambahkan');
        redirect(base_url() . 'produk/indexProduk/' . $id_category);
    }

    function edit()
    {
        $id['id'] = $this->input->post('id');
        $id_category = $this->input->post('id_category');
        if (!$this->input->post('foto')) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'description' => $this->input->post('description'),
                'harga' => $this->input->post('harga'),
                'id_category' => $this->input->post('id_category'),
            );
            $this->ProdukModel->updateData($data, $id);
            $this->session->set_flashdata('success', 'Produk Berhasil Diedit');
            redirect(base_url() . 'produk/indexProduk/' . $id_category);
        } else {
            $config['upload_path'] = './assets/assets-admin/foto-produk/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                echo $this->upload->display_errors();
            } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'description' => $this->input->post('description'),
                    'harga' => $this->input->post('harga'),
                    'id_category' => $this->input->post('id_category'),
                    'foto' => $this->upload->data('file_name'),
                ];
                $this->ProdukModel->updateData($data, $id);
                $this->session->set_flashdata('success', 'Produk Berhasil Diedit');
                redirect(base_url() . 'produk/indexProduk/' . $id_category);
            }
        }
    }

    function editFoto()
    {
        $id['id'] = $this->input->post('id');
        $id_category = $this->input->post('id_category');
        $config['upload_path'] = './assets/assets-admin/foto-produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filefoto')) {
            echo $this->upload->display_errors();
        } else {
            $data = [
                'foto' => $this->upload->data('file_name'),
            ];
            // unlink('./assets/assets-admin/foto-produk/' . $foto);
            $this->ProdukModel->updateGambar($data, $id);
            $this->session->set_flashdata('success', 'Foto Berhasil Diedit');
            redirect(base_url() . 'produk/indexProduk/' . $id_category);
        }
    }

    function delete()
    {
        $id['id'] = $this->input->post('id');
        $foto = $this->input->post('foto');
        $id_produk = $this->input->post('id_produk');
        // $this->ProdukModel->deleteData($id);
        unlink('./assets/assets-admin/foto-produk/' . $foto);
        $this->ProdukModel->deleteData($id);
        $this->ProdukModel->deleteGambar($id_produk);
        $id_category = $this->input->post('id_category');
        $this->session->set_flashdata('success', 'Produk Berhasil Dihapus');
        redirect(base_url() . 'produk/indexProduk/' . $id_category);
    }
}
