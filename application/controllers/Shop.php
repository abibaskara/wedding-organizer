<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();
        $this->load->library('cart');
    }

    public function index()
    {
        $data =  array(
            'data_category' => $this->CategoryModel->getAll(),
            'data_produk' => $this->ProdukModel->joinCategory(),
        );
        $this->template->load('layout_landing', 'landing-page/shop/index', $data);
    }

    function keranjang()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );

        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    function cart()
    {
        $this->template->load('layout_landing', 'landing-page/shop/cart');
    }

    function updateKeranjang()
    {
        $i = 1;
        foreach ($this->cart->contents() as $row) {
            $data = array(
                'rowid' => $row['rowid'],
                'qty'   => $this->input->post($row['rowid'] . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('shop/cart');
    }

    function deleteKeranjang($rowid)
    {
        $this->cart->remove($rowid);
        redirect('shop/cart');
    }

    function checkout()
    {
        $this->template->load('layout_landing', 'landing-page/shop/checkout');
    }

    function checkoutProses()
    {
        $query = $this->ShopModel->getIDPembelian();
        foreach ($query as $row) {
            $a = $row->id_detail;
        }
        $hasil = $a + 1;
        $transaksi = [
            'id_detail' => $hasil,
            'id_customer' => $this->input->post('id_customer'),
            'order_number' => $this->input->post('order_number'),
            'tgl_pembelian' => $this->input->post('tgl_pembelian'),
            'total_harga' => $this->input->post('total_harga'),
            'status' => 1,
        ];
        $getPembelian = $this->ShopModel->getDetailPembelian();
        if (empty($getPembelian)) {
            $i = 1;
            $keranjang = $this->cart->contents();
            foreach ($keranjang as $row) {
                $data = [
                    'id_detail' => 1,
                    'id_customer'   => $this->input->post($i . '[id_customer]'),
                    'id_produk'   => $this->input->post($i . '[id_produk]'),
                    'kuantiti'   => $this->input->post($i . '[kuantiti]'),
                    'harga'   => $this->input->post($i . '[harga]')
                ];
                $i++;
                $this->ShopModel->insert($data);
            }
        } else {

            $i = 1;
            $keranjang = $this->cart->contents();
            foreach ($keranjang as $row) {
                $data = [
                    'id_detail' => $hasil,
                    'id_customer'   => $this->input->post($i . '[id_customer]'),
                    'id_produk'   => $this->input->post($i . '[id_produk]'),
                    'kuantiti'   => $this->input->post($i . '[kuantiti]'),
                    'harga'   => $this->input->post($i . '[harga]')
                ];
                $i++;
                $this->ShopModel->insert($data);
            }
        }
        $this->ShopModel->insertTransaksi($transaksi);
        $this->cart->destroy();
        redirect('myorder');
    }

    function cariProduk()
    {
        $id_category = $this->uri->segment(3);

        $data =  array(
            'data_produk' => $this->ProdukModel->getProduk($id_category),
            'data_category' => $this->CategoryModel->getAll(),
            'kategori' => $id_category,
            'title' => $this->ProdukModel->getTitle($id_category),
        );

        $this->template->load('layout_landing', 'landing-page/shop/cari', $data);
    }

    function detail($id)
    {
        $data =  array(
            'data_detail' => $this->ShopModel->getProduk($id),
        );
        $this->template->load('layout_landing', 'landing-page/shop/detail', $data);
    }

    function buy($id)
    {
        $data =  array(
            'data_buy' => $this->ShopModel->getProduk($id),
        );
        $this->template->load('layout_landing', 'landing-page/shop/buy', $data);
    }

    function checkoutBuy()
    {
        $query = $this->ShopModel->getIDPembelian();
        foreach ($query as $row) {
            $a = $row->id_detail;
        }
        $hasil = $a + 1;
        $transaksi = [
            'id_detail' => $hasil,
            'id_customer' => $this->input->post('id_customer'),
            'order_number' => $this->input->post('order_number'),
            'tgl_pembelian' => $this->input->post('tgl_pembelian'),
            'total_harga' => $this->input->post('total_harga'),
            'status' => 1,
        ];
        $getPembelian = $this->ShopModel->getDetailPembelian();
        if (empty($getPembelian)) {
            $data = [
                'id_detail' => 1,
                'id_customer'   => $this->input->post('id_customer'),
                'id_produk'   => $this->input->post('id_produk'),
                'kuantiti'   => 1,
                'harga'   => $this->input->post('harga')
            ];
            $this->ShopModel->insert($data);
        } else {
            $data = [
                'id_detail' => $hasil,
                'id_customer'   => $this->input->post('id_customer'),
                'id_produk'   => $this->input->post('id_produk'),
                'kuantiti'   => 1,
                'harga'   => $this->input->post('harga')
            ];
            $this->ShopModel->insert($data);
        }
        $this->ShopModel->insertTransaksi($transaksi);
        $this->cart->destroy();
        redirect('myorder');
    }
}
