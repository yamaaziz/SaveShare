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
	
	public function initiate_conversation()
	{
	$participant_a = $this->session->userdata('user_id');
	$username = strtolower($this->input->post('participant_b'));
	$participant_b = $this->account_model->get_id($username);
	
	//If conversation does not exist AND participant_B is not empty AND initiating conversation is successfull
		if(!$this->private_message_model->conversation_exists($participant_a,$participant_b))
		{
			if(!empty($participant_b) && $participant_b != $participant_a)
			{
				if($this->private_message_model->create_conversation($participant_a,$participant_b))
				{
				//Write participant_b in the conversation window
				$username = ucfirst($this->account_model->get_username($participant_b));
				echo("<li class='left clearfix'>
						<div class='conversation-body clearfix'>
							<div class='header'>
								<strong class='primary-font'><a data-userid='$participant_b' href='javascript:;' >$username</a>
								</strong>
								<small class='pull-right text-muted'>
									<i class='fa fa-clock-o fa-fw'></i> 13 mins ago</small>  
							</div>
							<p>text2</p>
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
			echo 'conversation already exists';
			echo $username;
			echo '<br>';
			echo $participant_b;
			echo '<br>';
		}
		
	}
	public function incoming_message(){
		
		
	}
	public function outgoing_message(){
		
	}
	public function view_message(){
		$c_id = $this->input->post('participant_b_c_id');
		$me = $this->session->userdata('user_id');
		echo 'c_id is: '.$c_id;
		$data['messages'] = $this->private_message_model->get_message($c_id,$me);
		$this->load->view('private_message/view_message',$data);
		
	}
	public function view_conversation(){		
		$me = $this->session->userdata('user_id');
		if($conversations = $this->private_message_model->get_conversation($me)){
			foreach ($conversations->result() as $row):
				$participant_a = $row->participant_a;
				$participant_b = $row->participant_b;
				if(!($row->participant_a == $me)){
					$username = $this->account_model->get_username($row->participant_a);
					$c_id = $row->c_id;
					echo("<li class='left clearfix'>
						<div class='conversation-body clearfix'>
							<div class='header'>
								<strong class='primary-font'><a data-userid:'$c_id' href='javascript:;' >$username</a>
								</strong>
								
								<small class='pull-right text-muted'>
									<i class='fa fa-clock-o fa-fw'></i> 13 mins ago</small>  
							</div>
							<p>text2</p>
						</div>
                      </li>
                     ");
				}
				elseif(!($row->participant_b == $me)){
					$username = $this->account_model->get_username($row->participant_b);
					$c_id = $row->c_id;
					echo("<li class='left clearfix'>
						<div class='conversation-body clearfix'>
							<div class='header'>
								<strong class='primary-font'><a data-userid='$c_id' href='javascript:;'>$username</a>
								</strong>
								<small class='pull-right text-muted'>
									<i class='fa fa-clock-o fa-fw'></i> 13 mins ago</small>  
							</div>
							<p>text2</p>
						</div>
                      </li>
                     ");
				}
			endforeach;
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