<?php
class Author_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_author($image = "") {
    	$data = array(
        'name' => $this->input->post('name'),
        'image' => $image,
        'description' => $this->input->post('description')
    	);

    	return $this->db->insert('author', $data);
    }
}