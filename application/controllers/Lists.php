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
	            $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        $this->load->view('list/add', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $image = $data["upload_data"]["file_name"];
                       	$list_id = $this->list_model->create_list($image);
                       	print_r(	$list_id);
                       	//$data  = array( 'list_id' => $list_id );
                        //$this->load->view('upload_success');
                }

   		    }

	}

	public function view(){
		$this->load->view('list/videos');
	}


}
