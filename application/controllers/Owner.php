<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_loginOwner();
    }

    public function index()
    {
        $data =  array(
            'menunggu_konfirmasi' => $this->TransaksiModel->getMenungguKonfirmasi(),
            'dikerjakan' => $this->TransaksiModel->getDikerjakan(),
            'selesai' => $this->TransaksiModel->getSelesai(),
        );
        $this->template->load('layout_owner', 'admin/dashboard', $data);
    }

    public function produk()
    {
        $data =  array(
            'get_laporan' => $this->TransaksiModel->getLaporan(),
            'produk' => $this->TransaksiModel->getProduk(),
            'jumlah_laporan' => $this->TransaksiModel->getJumlah(),
        );
        $this->template->load('layout_owner', 'admin/laporan/index', $data);
    }

    function print()
    {
        $data =  array(
            'data_category' => $this->CategoryModel->getAll(),
        );
        $this->template->load('layout_owner', 'admin/laporan/print/index', $data);
    }

    function filterPrint()
    {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $data = [
            'get_laporan' => $this->TransaksiModel->getPrint($start, $end),
        ];
        $this->load->view('admin/laporan/print/cetak', $data);
    }

    public function user()
    {
        $data =  array(
            'data_category' => $this->CategoryModel->getAll(),
            'data_user' => $this->UserModel->getAll(),
        );
        $this->template->load('layout_owner', 'admin/user/index', $data);
    }

    function delete()
    {
        $id['id'] = $this->input->post('id');
        $this->UserModel->deleteData($id);
        $this->session->set_flashdata('warning', 'User Berhasil Dihapus');
        redirect('owner/user');
    }

    function update()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'gender' => $this->input->post('gender'),
            'role' => $this->input->post('role'),
            'email' => $this->input->post('email'),
            'no' => $this->input->post('no'),
            'alamat' => $this->input->post('alamat'),
            'is_active' => $this->input->post('is_active'),
        ];
        $this->db->update('user', $data, array('id' => $id));
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('owner/user');
    }

    function add()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('no', 'no', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'trim|required');
        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $no = $this->input->post('no');
            $alamat = $this->input->post('alamat');
            $gender = $this->input->post('gender');
            $role = $this->input->post('role');
            $is_active = $this->input->post('is_active');
            $this->auth->registerOwner($email, $password, $nama, $gender, $role, $no, $alamat, $is_active);
            $this->session->set_flashdata('success', 'Proses Pendaftaran User Berhasil');
            redirect('owner/user');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('owner/user');
        }
    }

    function setting()
    {
        $this->template->load('layout_owner', 'admin/setting/index');
    }

    function updateSetting()
    {
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        if ($password == $confirm_password) {
            $data = [
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
            $this->db->update('user', $data, array('id' => $id));
            $this->session->set_flashdata('success', 'Password Berhasil Diubah');
            redirect('owner/setting');
        } else {
            $this->session->set_flashdata('error', 'Password Tidak Sama');
            redirect('owner/setting');
        }
    }

    function profile()
    {
        $this->template->load('layout_owner', 'admin/profile/index');
    }

    function editProfile()
    {
        $this->template->load('layout_owner', 'admin/profile/edit');
    }

    function updateProfile()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'gender' => $this->input->post('gender'),
            'role' => $this->input->post('role'),
            'email' => $this->input->post('email'),
        ];
        $this->db->update('user', $data, array('id' => $id));
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('owner/profile');
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
        redirect('login');
    }
}
