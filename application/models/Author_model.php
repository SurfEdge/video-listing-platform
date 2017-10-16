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

    public function get_authors() {
    	$query = $this->db->get('author');
        return $query->result();
    }

    public function get_author_count() {
    	$query = $this->db->get('author');
      return $query->num_rows();
    }

    public function get($id = 0){
        $this->db->from('author');
        $this->db->where('id', $id );
        $query = $this->db->get();

        return $query->row();
    }

}
