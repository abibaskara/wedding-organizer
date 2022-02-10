<?php
class Auth extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function register($email, $password, $nama, $gender, $role, $no, $alamat)
    {
        $data_user = array(
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama' => $nama,
            'no' => $no,
            'alamat' => $alamat,
            'gender' => $gender,
            'role' => $role,
        );
        $this->db->insert('user', $data_user);
    }

    function registerAdmin($email, $password, $nama, $role)
    {
        $data_user = array(
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama' => $nama,
            'role' => $role,
        );
        $this->db->insert('user', $data_user);
    }

    function cek_login()
    {
        if (empty($this->session->userdata('is_login'))) {
            redirect('login');
        } elseif ($this->session->userdata('role') != 'Customer') {
            redirect('/');
        }
    }

    function cek_loginAdmin()
    {
        if (empty($this->session->userdata('is_login'))) {
            redirect('login');
        } elseif ($this->session->userdata('role') != 'Admin') {
            redirect('admin');
        }
    }

    function cek_loginOwner()
    {
        if (empty($this->session->userdata('is_login'))) {
            redirect('login');
        } elseif ($this->session->userdata('role') != 'Owner') {
            redirect('owner');
        }
    }

    function registerOwner($email, $password, $nama, $gender, $role, $no, $alamat, $is_active)
    {
        $data_user = array(
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama' => $nama,
            'no' => $no,
            'alamat' => $alamat,
            'gender' => $gender,
            'role' => $role,
            'is_active' => $is_active
        );
        $this->db->insert('user', $data_user);
    }
}
