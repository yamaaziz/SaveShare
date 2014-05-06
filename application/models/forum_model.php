<?php
class Forum_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}
	
	
	public function create_thread($id){
		
		//$session_data = $this->session->userdata();
		$today = getdate();
		
		$thread = array(
			'topic'			=>		$this->input->post('topic'),                    
			//'date_started'	=>		$today['year'],
			//'day'			=>		$today['mday'],
			//'mon'			=>		$today['mon'],
			//'year'		=>		$today['year'],	
			'creator_id'	=>		$id		
			);
		
		$insert = $this->db->insert('thread', $thread);
		
		
		$thread_id = $this->db->select('thread', $id);
		
			$message = array(
			't_id'				=>		$this->input->post('topic'),                    
			'sender'			=>		$id,
			'content'			=>		$this->input->post('message'),
			//'date_posted'		=>		$today['year'],	
			);	
	
	
		//$this->session->userdata('userid');
		
		
		return $insert;
		}	
	
	}
/*End of file account_model.php*/
/*Location: ./application/models/account_model.php */