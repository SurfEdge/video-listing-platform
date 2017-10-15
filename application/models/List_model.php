<?php

class List_model extends CI_Model {

        public $title;
        public $description;
        public $image;
        public $author;
        public $vide_list;

        public function get_last_ten_entries()
        {
                $query = $this->db->get('list', 10);
                return $query->result();
        }

        public function create_list()
        {
                $this->title    = $this->input->post('title');
                $this->description  = $this->input->post('description');
                $this->image     = $this->input->post('image');
                $this->image     = $this->input->post('image');
                $this->author     = $this->input->post('author');
        }


}