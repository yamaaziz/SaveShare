<?php 
class Private_message_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		
	}

	public function conversation_exists($participant_b){
	//Look if the sender or the recipient has an conversation in table conversation
	//Check if sender or recipient exists as par_a or par_b
		$participant_a = $this->session->userdata('user_id');
		$participant_b = $this->account_model->get_id($participant_b);
		
		$this->db->select("conversation.c_id");
		$this->db->from('conversation');
		$where = "participant_a = $participant_a AND participant_b = $participant_b OR
				  participant_a = $participant_b AND participant_b = $participant_a
				  ";
				  
		$this->db->where($where);

		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row(0)->c_id;
				}
			else{
				return FALSE;
			}
	}
	public function create_conversation($participant_b){
	//Create a conversation
	//Sender = participant a
	//Recipient = participant b
	$participant_a = $this->session->userdata('user_id');
	$participant_b = $this->account_model->get_id($participant_b);
	
	$new_conversation = array(
		'participant_a' => $participant_a,
		'participant_b'	=> $participant_b
		);
		
		$insert = $this->db->insert('conversation', $new_conversation);
		echo $participant_b;
		return $insert;
	//redirect('start');
	}
	
}
/*End of file private_message_model.php*/
/*Location: ./application/models/private_message_model.php */