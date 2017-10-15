<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {

	public function index()
	{
		$data  = array('title' => "Lists" );
		$this->load->view('list/all',$data);
	}

	public function __construct()
    {
        parent::__construct();
		$this->load->model('list_model');
	}

	public function create()
	{

		$this->load->helper('form');
   		$this->load->library('form_validation');
	
	    $this->form_validation->set_rules('title', 'Title', 'required');
	    $this->form_validation->set_rules('description', 'Description', 'required');

		$data  = array('title' => "Create New List" );

   		if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('list/add',$data);
	    }
	    else
	    {
	        $this->list_model->create_list();
	        $this->view();
	    }

	}

	public function view(){
		$this->load->view('list/videos');
	}


}
