<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    function index()
    {
        $this->template->load('layout_landing', 'landing-page/login');
    }

    // function loginAdmin()
    // {
    //     $this->load->view('admin/login');
    // }

    function proses()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $query = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($query) {
            //jika usernya aktif
            if ($query['is_active'] == 1) {
                //cek password
                if (password_verify($password, $query['password'])) {
                    $data = [
                        'email' => $query['email'],
                        'nama' => $query['nama'],
                        'gender' => $query['gender'],
                        'alamat' => $query['alamat'],
                        'no' => $query['no'],
                        'role' => $query['role'],
                        'id' => $query['id'],
                        'is_login' => TRUE,
                    ];
                    $this->session->set_userdata($data);
                    if ($query['role'] == 'Customer') {
                        $this->session->set_flashdata('success', 'Anda Berhasil Login!');
                        redirect('/');
                    } elseif ($query['role'] == 'Admin') {
                        $this->session->set_flashdata('success', 'Anda Berhasil Login!');
                        redirect('admin');
                    } elseif ($query['role'] == 'Owner') {
                        $this->session->set_flashdata('success', 'Anda Berhasil Login!');
                        redirect('owner');
                    } else {
                        $this->session->unset_userdata('email');
                        $this->session->unset_userdata('nama');
                        $this->session->unset_userdata('id');
                        $this->session->unset_userdata('no');
                        $this->session->unset_userdata('alamat');
                        $this->session->unset_userdata('gender');
                        $this->session->unset_userdata('role');
                        $this->session->sess_destroy();
                        session_destroy();
                        redirect('login');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Wrong Password!');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('error', 'Email is Not Been Activated!');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', 'Email is Not Registered');
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('no');
        $this->session->unset_userdata('alamat');
        $this->session->unset_userdata('gender');
        $this->session->unset_userdata('role');
        $this->session->sess_destroy();
        session_destroy();
        $this->session->set_flashdata('success', 'Terimakasih Telah Menggunakan Aplikasi Ini');
        redirect('/');
    }

    function logoutAdmin()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('no');
        $this->session->unset_userdata('alamat');
        $this->session->unset_userdata('gender');
        $this->session->unset_userdata('role');
        $this->session->sess_destroy();
        session_destroy();
        $this->session->set_flashdata('success', 'Terimakasih Telah Menggunakan Aplikasi Ini');
        redirect('login');
    }
}
