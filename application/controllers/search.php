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
				$data1['user_info']		= 	$this->collect_userinfo($id);
				$data1['economy_info']	=	$this->collect_economyinfo($id);
				//Load Views
				$this->load->view('profile/templates/header');
				$this->load->view('search/search_result', $data1);
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
    	return $this->profile_model->get_userdata($id);
    }
    private function collect_economyinfo($id) {
		return $this->economy_model->get_economydata($id);
    }
}
/* End of file search.php */
/* Location: ./application/controllers//search.php */