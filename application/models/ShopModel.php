<?php defined('BASEPATH') or exit('No direct script access allowed');

class ShopModel extends CI_Model
{
    private $_table = "detail_pembelian";
    private $_pembelian = "pembelian";
    private $_pembayaran = "pembayaran";


    public function insert($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function insertTransaksi($transaksi)
    {
        $this->db->insert($this->_pembelian, $transaksi);
    }

    public function insertPembayaran($data)
    {
        $this->db->insert($this->_pembayaran, $data);
    }

    public function updatePembelian($data, $field_key)
    {
        return $this->db->update($this->_pembelian, $data, $field_key);
    }

    public function updatePembayaran($data, $field_key)
    {

        return $this->db->update($this->_pembayaran, $data, $field_key);
    }

    public function getDetailPembelian()
    {
        return $this->db->get($this->_pembelian)->result();
    }

    public function getIDPembelian()
    {

        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->order_by('id_detail', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function getOrder($id)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('pembelian.id_customer', $id);
        $this->db->join('user', 'user.id=pembelian.id_customer');
        return $this->db->get()->result();
    }

    public function joinDetail($id, $idBeli)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('detail_pembelian.id_customer', $id);
        $this->db->where('detail_pembelian.id_detail', $idBeli);
        $this->db->join('detail_pembelian', 'detail_pembelian.id_detail=pembelian.id_detail');
        $this->db->join('produk', 'produk.id=detail_pembelian.id_produk');
        // $this->db->where('detail_pembelian.id_detail', 'pembelian.id_detail');
        return $this->db->get()->result();
    }

    public function getPembelian($id)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('pembelian.id_pembelian', $id);
        $this->db->join('user', 'user.id=pembelian.id_customer');
        // $this->db->join('pembayaran', 'pembayaran.id_pembelian=pembelian.id_pembelian');
        return $this->db->get()->result();
    }

    public function getPembelianLunas($id)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('pembelian.id_pembelian', $id);
        $this->db->join('user', 'user.id=pembelian.id_customer');
        $this->db->join('pembayaran', 'pembayaran.id_pembelian=pembelian.id_pembelian');
        return $this->db->get()->result();
    }

    public function getProduk($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id', $id);
        return $this->db->get()->result();
    }
}
