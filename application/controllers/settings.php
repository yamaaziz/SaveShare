<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//SaveShare 2014
class Settings extends CI_Controller{

	public function index(){
		$this->load->view('templates/header');
    	$this->load->view("settings/settings_layout");
    	$this->load->view('templates/footer');
		
	}













}	
/* End of file settings.php */
/* Location: ./application/controllers//settings.php */