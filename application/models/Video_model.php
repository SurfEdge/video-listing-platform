<?php

class Video_model extends CI_Model {

        public $title;
        public $position;
        public $youtube_id;
        public $list_id;

        public function __construct()
        {
                $this->load->database();
                $this->load->model('video_model');

        }

        public function get($id = 0){
                $this->db->from('video');
                $this->db->where('id', $id );
                $query = $this->db->get();

                return $query->row();
        }

       public function get_video_count() {
        	$query = $this->db->get('video');
          return $query->num_rows();
       }

        public function list_videos($id = 0){
                $this->db->from('video');
                $this->db->where('list_id', $id );
                $this->db->order_by('position', 'ASC');

                $query = $this->db->get();

                return $query->result();
        }

        public function delete($id = 0){
                $this->db->from('video');
                $this->db->where('id', $id );
                $query = $this->db->delete();

                return $query;
        }

        public function create()
        {
                $this->title    = $this->input->post('title');
                $this->youtube_id     = $this->input->post('youtube_id');
                $this->position     = $this->input->post('position');
                $this->list_id     = $this->input->post('list_id');

                $data = array(
                        'title' => $this->title,
                        'position' =>$this->position,
                        'youtube_id' =>$this->youtube_id,
                        'list_id' =>$this->list_id
                );

                $this->db->insert('video', $data);
                $video_id = $this->db->insert_id();

                return $video_id;
        }

        public function update($id = 0)
        {
                $this->title    = $this->input->post('title');
                $this->youtube_id     = $this->input->post('youtube_id');
                $this->position     = $this->input->post('position');
                $this->list_id     = $this->input->post('list_id');

                $data = array(
                    'title' => $this->title,
                    'position' =>$this->position,
                    'youtube_id' =>$this->youtube_id,
                    'list_id' =>$this->list_id
                );

                $this->db->where('id', $id);
                $this->db->update('video', $data);
                //$this->db->replace('video', $data);
        }


}
