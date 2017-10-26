<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {

	public function index()
	{
		$lists = $this->list_model->get_all();
		$data  = array('title' => "Lists", "lists" => $lists );

		$this->load->view('list/all',$data);
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('list_model');
		$this->load->model('video_model');
		$this->load->model('author_model');
	}

	public function create()
	{

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$authors = $this->author_model->get_authors();

		$data  = array('title' => "Create New List" , "authors" => $authors );


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('list/add',$data);
		}
		else
		{
			$config['upload_path']          = './uploads/lists';
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
				redirect("/lists/view/$list_id", 'refresh');
			}

		}

	}

	public function add_video(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('youtube_id', 'YouTube ID', 'required');
		$this->form_validation->set_rules('position', 'Position', 'required');

		$list_id = $this->input->post('list_id');
		if ($this->form_validation->run() === FALSE)
		{
			$this-> view($list_id);
		}
		else
		{
			$this->video_model->create();
			redirect("/lists/view/$list_id", 'refresh');
		}
	}

	public function delete_video(){
		$this->load->helper('form');

		$video_id = $this->input->post('video_id');
		$list_id = $this->input->post('list_id');

		if ($video_id)
		{
			$this->video_model->delete($video_id);
			redirect("/lists/view/$list_id", 'refresh');
		}
		else
		{
			redirect("/lists/view/$list_id", 'refresh');
		}
	}

	public function edit_video(){
		$this->load->helper('form');

		$video_id = $this->input->post('video_id');
		$list_id = $this->input->post('list_id');

		if ($video_id)
		{
			$this->video_model->update($video_id);
			redirect("/lists/view/$list_id", 'refresh');
		}
		else
		{
			redirect("/lists/view/$list_id", 'refresh');
		}
	}


	public function view($id = 0){

		$list = $this->list_model->get($id);		
		$this->load->helper('form');
		$this->load->library('form_validation');

        $list['title'] = "View List";

		$this->load->view('list/view', $list);
	}


}
