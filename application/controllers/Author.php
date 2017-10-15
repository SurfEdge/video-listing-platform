<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('author_model');
        $this->load->helper('form');
    	$this->load->library('form_validation');
    }

    public function index() {
    	$data  = array('title' => "Login" );
		$this->load->view('add_author',$data);
    }

    // public function view($slug = NULL) {
    //     $data['news_item'] = $this->news_model->get_news($slug);
    // }

    public function add() {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Add a new author';

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');

    if ($this->form_validation->run() === FALSE) {
        $data  = array('title' => "Login" );
		$this->load->view('add_author',$data);
    }
    else {
    	$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            $this->load->view('list/add', $error);
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $image = $data["upload_data"]["file_name"];
        	$this->author_model->add_author($image);
        	$data  = array('title' => "Login" );
			$this->load->view('add_author',$data);
    	}
	}
}
}