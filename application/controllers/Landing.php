<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data =  array(
            'data_category' => $this->CategoryModel->getAll(),
        );
        $this->template->load('layout_landing', 'landing-page/home/index', $data);
    }
}
