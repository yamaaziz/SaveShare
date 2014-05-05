<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Profile extends CI_Controller{
	
	public function __construct(){
	
		parent::__construct();
            // Your own constructor code           
    }

    public function index(){
    
    	if(!$this->is_signed_in()){
	    	redirect('account/sign_in');
    	}
    	else{
    		//Load Data
    		$id = $this->get_id();
    		$data1['user_info']		= 	$this->collect_userinfo($id);
    		$data1['economy_info']	=	$this->collect_economyinfo($id);
    		//Load Views
    		$this->load->view('profile/templates/header');
	    	$this->load->view('profile/profile_layout', $data1);
	    	$this->load->view('profile/templates/footer');
	    }    	    
    }
    
    private function collect_userinfo($id) {	
    	return $this->account_model->get_userdata($id);
    }
     
	private function collect_economyinfo($id) {
		return $this->economy_model->get_economydata($id);
    }
    	
 	private function get_id(){
	 	return $id = $this->session->userdata('user_id');
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
/* End of file profile.php */
/* Location: ./application/controllers//profile.php */