<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicView extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('list_model');
    }

    public function index()
    {
        $data = array('title' => "Public Page");
        $data['videoList'] = $this->list_model->get_all();

        $this->load->view('public_view/index', $data);
    }
}