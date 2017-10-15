<?php

class List_model extends CI_Model {

        public $title;
        public $description;
        public $cover_image;
        public $author;
        public $vide_list;

        public function __construct()
        {
                $this->load->database();
        }

        public function get($id = 0){
                $this->db->from('list');
                $this->db->where('id', $id );
                $query = $this->db->get();

                $videos = $this->video_model->list_videos($id);

                return  array("list"=> $query->row(), "videos" => $videos);
        }

        public function get_all(){

                $this->db->from('list');
                $this->db->order_by('id', 'DESC');
                $query = $this->db->get();

                return $query->result();
        }
        


        public function create_list($image = "")
        {
                $this->title    = $this->input->post('title');
                $this->description  = $this->input->post('description');
                $this->cover_image     = $image;
                $this->author     = $this->input->post('author');

                $data = array(
                        'title' => $this->title,
                        'description' => $this->description,
                        'cover_image' =>$this->cover_image,
                        'author_id' =>$this->author
                );

                $this->db->insert('list', $data);
                $list_id = $this->db->insert_id();

                return $list_id;
        }
}