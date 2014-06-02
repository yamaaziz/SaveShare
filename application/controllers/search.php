<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Search extends CI_Controller{

	public function advanced_search(){
		if(!$this->is_signed_in()){
	    	redirect('account/sign_in');
    	}
    	else{
    		$this->load->view('profile/templates/header');
			$this->load->view('search/advanced_search');
			$this->load->view('profile/templates/footer');
    	}
		$this->load->view('profile/templates/header');
		$this->load->view('search/advanced_search');
		$this->load->view('profile/templates/footer');
	}

	public function validate_advanced_search(){
		$index = 0;
		$array = $this->search_model->adv_search();
		foreach (range(0, count($array)-1) as $whatever) {
			$id3 = $array[$index]['id'];
			$data['privacy'. $index] = $this->account_model->get_privacy_data($id3);
			$index = $index + 1;
		}

    	$this->form_validation->set_rules('username','Username','trim|xss_clean');
    	$this->form_validation->set_rules('birth_year','birth_year','trim|xss_clean');
    	$this->form_validation->set_rules('gender','Gender','trim|xss_clean');
    	$this->form_validation->set_rules('city','City','trim|xss_clean');
    	$this->form_validation->set_rules('income','Income','trim|xss_clean');
    	
    	$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->advanced_search();
		}
		else
		{	if ($data['user_info'] = $this->search_model->adv_search())
			{
				$this->load->view('profile/templates/header');
				
				
				//$data['user_info'] = $this->collect_userinfo($row['id']);				
				//$data1['user_info']		= 	$this->collect_userinfo($id);
				//$data1['economy_info']	=	$this->collect_economyinfo($id);
				//Load Views				
				$this->load->view('search/search_result', $data);
				//}
				
				$this->load->view('profile/templates/footer'); 
			}
			else
			{
				$this->load->view('profile/templates/header');
				$this->load->view('search/no_find');
				$this->load->view('profile/templates/footer');
			}
		}
	}
	public function validate_search(){ 
    	$this->form_validation->set_rules('search_data','Search','trim|xss_clean');
    	
    	$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->advanced_search();
		}
		else
		{	if($id = $this->search_model->search())
			{									
				$data1['user_info']		= 	$this->collect_userinfo($id);
				$data1['economy_info']	=	$this->collect_economyinfo($id);
				$data1['followers_name']		=	$this->get_followernames();
				$data1['following_name']		= 	$this->get_followingnames();
				$data1['privacy']		= 	$this->account_model->get_privacy_data($id);
				
				//Load Views
				$this->load->view('profile/templates/header');
				$this->load->view('profile/profile_layout', $data1);							
				$this->load->view('profile/templates/footer'); 
			}
			else
			{
				$this->load->view('profile/templates/header');
				$this->load->view('search/no_find');
				$this->load->view('profile/templates/footer');
			}
		}

  }
  	public function autocomplete() {
        $search_data = $this->input->post('search_data');
        $query = $this->search_model->get_autocomplete($search_data);

        foreach ($query->result() as $row):
        	$link = base_url() . 'profile/' . $row->username;
        	$privacy_data = get_object_vars($this->account_model->get_privacy_data($row->id));
        	if ($privacy_data['p_city'] == 2) {
            echo "<li><a href='$link'><strong id='search_result_username'>".$row->username."</strong></a>"."<br>".
            "<span class=text-muted small>".$row->city."</span></li>";
            } elseif ($privacy_data['p_city'] == 1) {
            echo "<li><a href='$link'><strong id='search_result_username'>".$row->username."</strong></a>"."<br>".
            "<span class=text-muted small>".' '."</span></li>";
            }
        endforeach;
    }
    public function autocompleteMessage(){
    	$message_search = $this->input->post('message_search');
        $query = $this->search_model->get_autocompleteMessage($message_search);
		
        foreach ($query->result() as $row):
        	
        	$link = base_url() . 'profile/' . $row->username;
            echo "<li><strong><a href='javascript:;' class='search_result_message'>"
            .$row->username
            ."</a></strong></li>";
        endforeach;
    }
	
	private function collect_userinfo($id) {	
    	return $this->account_model->get_userdata($id);
    }
    private function collect_economyinfo($id) {
		return $this->economy_model->get_economydata($id);
    }
    public function get_followernames() {
    	$id = $this->session->userdata('user_id');
		$id_array = $this->follower_model->get_followersid($id);
		$name_array = $this->follower_model->get_follower_username($id_array);
		return $name_array;
	}
	
	public function get_followingnames() {
    	$id = $this->session->userdata('user_id');
		$id_array = $this->follower_model->get_followingid($id);
		$name_array = $this->follower_model->get_following_username($id_array);
		return $name_array;
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
/* End of file search.php */
/* Location: ./application/controllers//search.php */
