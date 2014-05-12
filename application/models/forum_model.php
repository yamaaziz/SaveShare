<?php
class Forum_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}
	
	
	public function create_thread($id){
				
		
		//$slug = url_title($this->input->post('topic'), 'dash', TRUE);
		
		$thread = array(
			'topic'			=>		$this->input->post('topic'),                    
			'creator_id'	=>		$id,
			//'slug'			=>		$slug
			);
		
		$insert = $this->db->insert('thread', $thread);
	
		
		//Create message
		$topic = $this->input->post('topic');
		
		$this->db->where('topic', $topic);
		$this->db->select('t_id');
		$t_id = $this->db->get('thread');
		
		$t_id = $t_id->row();
		$t_id = get_object_vars($t_id);	
		$t_id = $t_id['t_id'];
		
		$message = array(
					't_id' 		=> $t_id,
					'content' 	=> $this->input->post('message'),
					'sender' 	=> $id
					);
							
		$insert_message = $this->db->insert('message', $message);
	
		$slug = array(
					'slug' 		=> $t_id,
					);
		$this->db->where('t_id', $t_id);
		$this->db->update('thread', $slug);
		
		return $insert;

		
		}	
		
	
	
	public function create_message($id){
			
			$slug = $t_id;
			$message = array(
					't_id' 		=> $t_id,
					'content' 	=> $this->input->post('answer'),
					'sender' 	=> $id
					);
							
		$insert_message = $this->db->insert('message', $message);
	
				
		
	}
	
		public function get_threads($slug=FALSE){
	
		if ($slug === FALSE)
		{
			$query = $this->db->get('thread');
			return $query->result_array();
	
		}
			$query = $this->db->get_where('thread', array('slug' => $slug));
			return $query->row_array();
		}
		
		
		public function get_messages($topic_id){			
			
			$this->db->where('t_id', $topic_id);
			$query = $this->db->get('message');
			return $query->result_array();
			
		}
		
	//	public function get_username($sender);
		
	//	$this->db->select("users.username");
	//	$this->db->from('users');
	//	$this->db->where('users.id', $sender);
			
	//		$query = $this->db->get();
	//		if ($query->num_rows() == 1) {
	//			return $query->row(0)->username;
	//			}
		
	


	}
	
	
/*End of file account_model.php*/
/*Location: ./application/models/account_model.php */