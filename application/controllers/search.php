<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Search extends CI_Controller{

	public function advanced_search(){
	
		$this->load->view('profile/templates/header');
		$this->load->view('search/advanced_search');
		$this->load->view('profile/templates/footer');
		
	}

	public function validate_advanced_search(){ 
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
		{	if($id = $this->search_model->adv_search())
			{
			
				$this->load->view('profile/templates/header');
				//foreach ($id as $idn) {
								
				$data1['user_info']		= 	$this->collect_userinfo($id);
				$data1['economy_info']	=	$this->collect_economyinfo($id);
				//Load Views
				
				$this->load->view('search/search_result', $data1);							
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
    
	public function validate_search(){ 
    	$this->form_validation->set_rules('search','Search','trim|xss_clean');
    	
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
}
/* End of file search.php */
/* Location: ./application/controllers//search.php */