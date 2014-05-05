<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">
	
	    <title>Save Share</title>
	
	    <!-- Bootstrap core CSS 
	   <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">-->
	    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		
	    <!-- Add custom CSS here -->
	    <link href="<?php echo base_url();?>assets/css/profile.css" rel="stylesheet">
	    <!--<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">-->
	    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	    <script src="<?php echo base_url();?>assets/js/Chart.js"></script>
	    <script src="<?php echo base_url();?>assets/js/morris.js"></script>
	    <script src="<?php echo base_url();?>assets/js/Donut.js"></script>
	    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	    
	    <!-- PHP Code Here -->
	    <?php $username = ucfirst($this->session->userdata['username']); ?>

	</head>

	<body>	
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
			        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#head">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			        </button>
			        <a class="navbar-brand" href="<?php echo base_url(); ?>profile">Save Share</a>
			    </div>
			    <div id="head" class="collapse navbar-collapse">
			        <ul class="nav navbar-nav">
			            <!-- Put more content in here in lists -->
			        </ul>
			        <ul class="nav navbar-top-links navbar-right">
				    	<li class="dropdown">
			        		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-messages">
			                	<li>
			                    	<a href="#">
			                        	<div class="head_text">
			                            	<strong>John Smith</strong>
											<span class="pull-right text-muted">
			                                	<em>Yesterday</em>
											</span>
										</div>
										<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
									</a>
								</li>
								<li class="divider"></li>
									<li>
										<a class="text-center" href="#">
											<strong>Read All Messages</strong>
											<i class="fa fa-angle-right"></i>
										</a>
									</li>
							</ul>
				            <!-- /.dropdown-messages -->
							</li>
							<li class="dropdown">
					            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					                <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
					            </a>
					            <ul class="dropdown-menu dropdown-alerts">
					                <li>
					                    <a href="#">
					                        <div class="head_text">
					                            <i class="fa fa-comment fa-fw"></i> New Comment
					                            <span class="pull-right text-muted small">4 minutes ago</span>
					                        </div>
					                    </a>
					                </li>
					                <li class="divider"></li>
					                <li>
					                    <a href="#">
					                        <div class="head_text">
					                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
					                            <span class="pull-right text-muted small">12 minutes ago</span>
					                        </div>
					                    </a>
					                </li>
					                <li class="divider"></li>
					                <li>
					                    <a href="#">
					                        <div class="head_text">
					                            <i class="fa fa-envelope fa-fw"></i> Message Sent
					                            <span class="pull-right text-muted small">4 minutes ago</span>
					                        </div>
					                    </a>
					                </li>
					                <li class="divider"></li>
					                <li>
					                    <a href="#">
					                        <div class="head_text">
					                            <i class="fa fa-tasks fa-fw"></i> New Task
					                            <span class="pull-right text-muted small">4 minutes ago</span>
					                        </div>
					                    </a>
					                </li>
					                <li class="divider"></li>
					                <li>
					                    <a href="#">
					                        <div class="head_text">
					                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
					                            <span class="pull-right text-muted small">4 minutes ago</span>
					                        </div>
					                    </a>
					                </li>
					                <li class="divider"></li>
					                <li>
					                    <a class="text-center" href="#">
					                        <strong>See All Alerts</strong>
					                        <i class="fa fa-angle-right"></i>
					                    </a>
					                </li>
					            </ul>
					            <!-- /.dropdown-alerts -->
					        </li>
				            <li class="dropdown">
				            	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				                	<i class="fa fa-user fa-fw"></i><?php echo ' '.$username.' '; ?><i class="fa fa-caret-down"></i>
				                </a>
				                <ul class="dropdown-menu dropdown-user">
				                	<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
									</li>
									<li><a href="<?php echo base_url(); ?>account"><i class="fa fa-gear fa-fw"></i> Settings</a>
									</li>
									<li class="divider"></li>
									<li><a href="<?php echo base_url(); ?>account/sign_out"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
									</li>
				                </ul>
				            </li>
					</ul>
					<!-- Start search form -->
					<?php $attributes = array('id' =>'search_form','class' => 'navbar-form navbar-left'); ?>
					<?php echo form_open('search/validate_search', $attributes); ?>
					<?php echo form_open(); ?>
					<!--Field: Search-->
					<?php echo form_label(); ?>
					<?php
					$data = array(
									'name'			=> 'search',
									'placeholder' 	=> 'Search',
									'class'			=> 'form-control',
									'value'			=> set_value('search')
								);
					?>
					<?php echo form_input($data); ?>
					<!--Display field errors-->
					<?php echo form_error('search'); ?>
					<!--Submit Buttons-->
					
					<?php $data = array(
											"value" => "",
											"name"	=> "submit", 
											"class"	=> "btn btn-default"					
										);
					?>
					<?php echo form_submit($data); ?>
					<?php echo form_close(); ?>
		        	<ul class = "advanced-search">
			            	<a href="<?php echo base_url(); ?>search/advanced_search">
							<small><em>Advanced search</em></small>
							<i class="fa fa-angle-right"></i>
	        			</a>
	        		</ul>
			    </div>

			</nav>
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
			    <ul class="sidebar-nav">
			        <li>
			        	<a href="<?php echo base_url();?>profile"><i class="fa fa-truck"></i> Profile</a>
			        </li>
			        <li>
			        	<a href="<?php echo base_url(); ?>economy"><i class="fa fa-table"></i> Economy</a>
			        </li>
			        <li>
			        	<a href="<?php echo base_url(); ?>followers"><i class="fa fa-heart"></i> Followers</a>
			        </li>
					<li>
			        	<a href="#"><i class="fa fa-comment-o"></i> Forum</a>
			        </li>   
			    </ul>
			</div>
