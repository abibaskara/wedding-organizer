<?php defined('BASEPATH') or exit('No direct script access allowed');

class ProdukModel extends CI_Model
{
    private $_table = "produk";
    private $_gambar = "detail_gambar";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function createData($add)
    {
        return $this->db->insert($this->_table, $add);
    }

    public function createGambar($data)
    {
        return $this->db->insert($this->_gambar, $data);
    }

    public function updateData($data, $field_key)
    {

        return $this->db->update($this->_table, $data, $field_key);
    }

    public function deleteData($field_key)
    {
        return $this->db->delete($this->_table, $field_key);
    }

    public function getIDProduk()
    {

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function joinCategory()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('category', 'produk.id_category = category.id_category');
        return $this->db->get()->result();
    }

    public function detailProduk($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->select('detail_gambar.foto as foto_detail');
        $this->db->select('detail_gambar.id as id_detail');
        $this->db->join('category', 'produk.id_category = category.id_category');
        $this->db->join('detail_gambar', 'produk.id_gambar = detail_gambar.id_produk');
        $this->db->where('produk.id', $id);
        return $this->db->get()->row_array();
    }

    public function getGambar($id)
    {
        $this->db->select('*');
        $this->db->from('detail_gambar');
        $this->db->where('detail_gambar.id_produk', $id);
        return $this->db->get();
    }

    public function getAllGambar()
    {
        return $this->db->get($this->_gambar)->result();
    }

    public function updateGambar($data, $field_key)
    {

        return $this->db->update($this->_gambar, $data, $field_key);
    }

    public function deleteGambar($id_produk)
    {
        return $this->db->query("DELETE FROM detail_gambar WHERE id_produk = '$id_produk'");
    }

    public function getProduk($id_category)
    {
        $this->db->select('*');
        $this->db->select('produk.id');
        $this->db->select('category.id_category');
        $this->db->from('produk');
        $this->db->join('category', 'produk.id_category = category.id_category');
        $this->db->join('detail_gambar', 'produk.id_gambar = detail_gambar.id_produk');
        $this->db->where('category.id_category', $id_category);
        return $this->db->get()->result();
    }

    public function getTitle($id_category)
    {
        // $this->db->select('produk');
        $this->db->from('category');
        $this->db->where('id_category', $id_category);
        return $this->db->get()->result();
    }
}
