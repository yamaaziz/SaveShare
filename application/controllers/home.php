<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Home extends CI_Controller{

	public function index(){
	
		$this->load->view('profile/templates/header');
		$this->load->view('home/home');
		$this->load->view('profile/templates/footer');
		
	}

}