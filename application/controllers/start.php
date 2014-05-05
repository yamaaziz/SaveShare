<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Start extends CI_Controller{
	
	public function __construct(){
       
            parent::__construct();
            // Your own constructor code	
	}
	
	public function index(){

		if($this->is_signed_in()){
	    	redirect('profile');
    	}
    	else{
	    	$this->load->view('start');
    	}
	}
	private function is_signed_in(){
	
		if($this->session->userdata('logged_in')){
			return TRUE;
		}
		
		else{
			return FALSE;
		}
	}
}
/*End of file start.php*/
/*Location: ./application/controllers/start.php*/