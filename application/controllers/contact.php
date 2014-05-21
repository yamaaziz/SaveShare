<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Contact extends CI_Controller{

	public function index(){
	
		$this->load->view('profile/templates/header');
		$this->load->view('contact/contact');
		$this->load->view('profile/templates/footer');
		
	}

}