<?php defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiModel extends CI_Model
{
    private $_table = "pembayaran";
    private $_pembelian = "pembelian";

    public function update($data, $id)
    {
        return $this->db->update($this->_pembelian, $data, $id);
    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->select('pembelian.status as status_pembelian');
        $this->db->select('pembayaran.status as status_pembayaran');
        $this->db->from('pembayaran');
        $this->db->join('user', 'user.id=pembayaran.id_customer');
        $this->db->join('pembelian', 'pembelian.id_pembelian=pembayaran.id_pembelian');
        return $this->db->get()->result();
    }

    public function getAllOrder()
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('user', 'user.id=pembelian.id_customer');
        return $this->db->get()->result();
    }

    public function joinDetail($id)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('detail_pembelian.id_detail', $id);
        $this->db->join('detail_pembelian', 'detail_pembelian.id_detail=pembelian.id_detail');
        $this->db->join('produk', 'produk.id=detail_pembelian.id_produk');
        return $this->db->get()->result();
    }

    public function getLaporan()
    {
        $this->db->select('SUM(kuantiti) as total_produk');
        $this->db->from('detail_pembelian');
        $this->db->group_by('id_produk');
        $this->db->join('pembelian', 'pembelian.id_detail=detail_pembelian.id_detail');
        $this->db->join('produk', 'produk.id=detail_pembelian.id_produk');
        $this->db->where('pembelian.status', 5);
        return $this->db->get()->result();
    }

    public function getProduk()
    {
        $this->db->select('detail_pembelian.id_produk');
        $this->db->select('produk.nama');
        $this->db->group_by('detail_pembelian.id_produk');
        $this->db->from('detail_pembelian');
        $this->db->join('pembelian', 'pembelian.id_detail=detail_pembelian.id_detail');
        $this->db->join('produk', 'produk.id=detail_pembelian.id_produk');
        $this->db->where('pembelian.status', 5);
        return $this->db->get()->result();
    }

    public function getTotal()
    {
        $this->db->select('SUM(kuantiti) as total_produk')->group_by('id_produk');
        // $this->db->group_by('id_produk');
        $this->db->from('detail_pembelian');
        $this->db->join('pembelian', 'pembelian.id_detail=detail_pembelian.id_detail');
        $this->db->join('produk', 'produk.id=detail_pembelian.id_produk');
        $this->db->where('pembelian.status', 5);
        return $this->db->get()->result();
    }

    public function getJumlah()
    {
        $this->db->select('SUM(kuantiti) as total_jumlah');
        $this->db->from('detail_pembelian');
        $this->db->join('pembelian', 'pembelian.id_detail=detail_pembelian.id_detail');
        $this->db->where('pembelian.status', 5);
        return $this->db->get()->result();
    }

    public function getPrint($start, $end)
    {
        $query = $this->db->query("SELECT a.order_number, a.tgl_pembelian, c.nama as nama_produk, b.kuantiti, d.nama, b.harga as harga_detail FROM pembelian a JOIN detail_pembelian b JOIN produk c JOIN user d ON b.id_detail = a.id_detail AND b.id_produk = c.id AND a.id_customer = d.id where a.status = 5 AND a.tgl_pembelian BETWEEN '$start' AND '$end'");
        return $query->result();
    }

    public function getMenungguKonfirmasi()
    {
        $this->db->select('SUM(kuantiti) as total_produk');
        $this->db->from('detail_pembelian');
        $this->db->join('pembelian', 'pembelian.id_detail=detail_pembelian.id_detail');
        $this->db->where('pembelian.status', 3);
        return $this->db->get()->result();
    }

    public function getDikerjakan()
    {
        $this->db->select('SUM(kuantiti) as total_produk');
        $this->db->from('detail_pembelian');
        $this->db->join('pembelian', 'pembelian.id_detail=detail_pembelian.id_detail');
        $this->db->where('pembelian.status', 4);
        return $this->db->get()->result();
    }
    public function getSelesai()
    {
        $this->db->select('SUM(kuantiti) as total_produk');
        $this->db->from('detail_pembelian');
        $this->db->join('pembelian', 'pembelian.id_detail=detail_pembelian.id_detail');
        $this->db->where('pembelian.status', 5);
        return $this->db->get()->result();
    }
}
