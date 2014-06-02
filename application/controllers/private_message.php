<?php ob_start(); ?>
<?php

class Private_message extends CI_Controller{
	public function index(){
		if(!$this->is_signed_in()){
			redirect('account/sign_in');
			//set session data 'need login' och skriv ut felmeddelande
			//redirect('users/login');
		}
		else{
			$this->load->view('profile/templates/header');
			$this->load->view('private_message/pm_layout');
			$this->load->view('profile/templates/footer');
		}
	}
	
	public function initiate_conversation(){
	$participant_a = $this->session->userdata('user_id');
	$username = strtolower($this->input->post('participant_b'));
	$participant_b = $this->account_model->get_id($username);
	
	//If conversation does not exist AND participant_B is not empty AND initiating conversation is successfull
		if(!$this->private_message_model->conversation_exists($participant_a,$participant_b))
		{
			if(!empty($participant_b) && $participant_b != $participant_a)
			{
				if($conversation=$this->private_message_model->create_conversation($participant_a,$participant_b))
				{
				$c_id = $this->private_message_model->conversation_exists($participant_a,$participant_b);
				$username = ucfirst($this->account_model->get_username($participant_b));
				$date_started = date('Y-m-d H:i:s');
				echo("<li class='left clearfix'>
						<div class='conversation-body clearfix'>
							<div class='header'>
								<strong class='primary-font'><a data-c_id='$c_id' data-user_id='$participant_b' href='javascript:;' >$username</a>
								</strong>
								<small class='pull-right text-muted'>
									<i class='fa fa-clock-o fa-fw'></i>$date_started</small>  
							</div>
	    					<p id='$c_id'></p>
						</div>
                      </li>
                     ");
				
				}
			}
			else{
				echo 'username is either an empty string which would be strange, or you tried to have a conversation with 						  yourself which would be equally strange';
			}
		}
		else
		{
			echo 'Conversation already exists';
		}
		
	}
	public function view_conversation(){		
		$me = $this->session->userdata('user_id');
		if($conversations = $this->private_message_model->get_conversation($me)){
			foreach ($conversations->result() as $row):
				if(!($row->participant_a == $me)){
					$username = $this->account_model->get_username($row->participant_a);
					$participant_a = $row->participant_a;
					$c_id = $row->c_id;
					$date_started = $row->date_started;
					echo("<li class='left clearfix'>
						<div class='conversation-body clearfix'>
							<div class='header'>
								<strong class='primary-font'><a data-c_id='$c_id' data-user_id='$participant_a' href='javascript:;' >$username</a>
								</strong>
								
								<small class='pull-right text-muted'>
									<i class='fa fa-clock-o fa-fw'></i> $date_started</small>  
							</div>
						    <p id='$c_id'></p>
						</div>
                      </li>
                     ");
				}
				elseif(!($row->participant_b == $me)){
					$participant_b = $row->participant_b;
					$username = $this->account_model->get_username($row->participant_b);
					$c_id = $row->c_id;
					$date_started = $row->date_started;
					echo("<li class='left clearfix'>
						<div class='conversation-body clearfix'>
							<div class='header'>
								<strong class='primary-font'><a data-c_id='$c_id' data-user_id='$participant_b' href='javascript:;'>$username</a>
								</strong>
								<small class='pull-right text-muted'>
									<i class='fa fa-clock-o fa-fw'></i>$date_started</small>  
							</div>
						    <p id='$c_id'></p>
						</div>
                      </li>
                     ");
				}
			endforeach;
		}
	}
	public function view_message(){
		$c_id = $this->input->post('c_id');
		$me = $this->session->userdata('user_id');
		$data['messages'] = $this->private_message_model->get_message($c_id,$me);
		$this->load->view('private_message/view_message',$data);
		
    }
    public function view_last_message(){
        $conversationList = $this->input->post('conversationList');
        echo conversationList;
    }
	public function send_message(){
		//echo 'You just clicked SEND';
		$c_id = $this->input->post('c_id');
		$sender = $this->session->userdata('user_id');
		$recipient = $this->input->post('recipient');
		$content = $this->input->post('content');
			if($this->private_message_model->insert_message($c_id,$sender,$recipient,$content)){
				echo $content;
			}
			else{
				echo "<p class='error_message_chat'>Your message could not be sent.</p>";
			}
	}
	
    private function is_signed_in() {
		if($this->session->userdata('logged_in')){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}
/* End of file private_message.php */
/* Location: ./application/controllers/private_message.php */
