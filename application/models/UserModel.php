<?php defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    private $_table = "user";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function deleteData($field_key)
    {
        return $this->db->delete($this->_table, $field_key);
    }

    public function updateData($data, $field_key)
    {
        return $this->db->update($this->_table, $data, $field_key);
    }
}
