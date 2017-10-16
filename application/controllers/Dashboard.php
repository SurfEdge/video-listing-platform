<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('author_model');
		$this->load->model('list_model');
		$this->load->model('video_model');
		$author_count = $this->author_model->get_author_count();
		$list_count = $this->list_model->get_list_count();
		$video_count = $this->video_model->get_video_count();
		$data = array(
    'title' => 'Dashboard',
    'author_count' => $author_count,
    'list_count' => $list_count,
    'video_count' => $video_count
		);
		$this->load->view('dashboard_index',$data);
	}

	public function update_counts(){

	}
}
