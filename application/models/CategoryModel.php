<?php defined('BASEPATH') or exit('No direct script access allowed');

class CategoryModel extends CI_Model
{
    private $_table = "category";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function createData($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function updateData($data, $field_key)
    {

        $this->db->update($this->_table, $data, $field_key);
    }

    public function deleteData($field_key)
    {
        return $this->db->delete($this->_table, $field_key);
    } 
}
