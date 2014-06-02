<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->
<!DOCTYPE html>
	<?php $today = getdate(); ?>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">
	     <link rel="icon" type="image/ico" href="http://www.saveshare.stsvt14.student.it.uu.se/saveshare/favicon.ico">

	    <title>Save Share</title>
	
	    <!-- Bootstrap core CSS 
	   <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">-->
	    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		
	    <!-- Add custom CSS here -->
	    <link href="<?php echo base_url();?>assets/css/profile.css" rel="stylesheet">
	    <!--<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">-->
	    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	    
	    <!-- PHP Code Here -->
	    <?php $username = $this->session->userdata['username']; ?>

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
                    <a class="navbar-brand" id="logo" href="<?php echo base_url();?>home"><img src="<?php echo base_url();?>assets/img/logo_text.png"></img></a>			        
			    </div>
			    <div id="head" class="collapse navbar-collapse">
			        <ul class="nav navbar-nav">
			            <!-- Put more content in here in lists -->
			        </ul>
			        <ul class="nav navbar-top-links navbar-right">
			        	<li class="head_text">
			        		Date: <?php echo ucfirst($today['mon']); echo '/'; echo ucfirst($today['mday']);
			        		echo '/'; echo ucfirst($today['year']);?> 
			            </li>
				    	<li class="dropdown">
				            	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				                	<i class="fa fa-user fa-fw"></i><?php echo ' '.ucfirst($username.' '); ?><i class="fa fa-caret-down"></i>
				                </a>
				                <ul class="dropdown-menu dropdown-user">
									<li><a href="<?php echo base_url(); ?>account"><i class="fa fa-gear fa-fw"></i> Settings</a>
									</li>
									<li class="divider"></li>
									<li><a href="<?php echo base_url(); ?>account/sign_out"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
									</li>
				                </ul>
				            </li>
					</ul>
					<div class="navbar-form navbar-left">
						<input name="search_data" class="form-control" id="search_data" type="text" placeholder="Username" 						autocomplete="off" onkeyup="ajaxSearch();" onmousedown="redisplaySearch();" 											onmouseup="redisplaySearch();" onclick="redisplaySearch();">
						<div id="suggestions">
							<div id="autoSuggestionsList">
							</div>
						</div>
					</div>
		        	<ul class = "advanced-search">
		        		<a href="<?php echo base_url(); ?>search/advanced_search">
		        			<small><em>Advanced search</em></small>
							<i class="fa fa-angle-right"></i>
						</a>
	        		</ul>
			    </div><!--./collapse navbar-collapse -->
			</nav>
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
			    <ul class="sidebar-nav">
			    	<li>
			        	<a href="<?php echo base_url();?>home"><i class="fa fa-home"></i> Home</a>
			        </li>
			        <li>
			        	<a href="<?php echo base_url();?>profile<?php echo "/$username" ?>"><i class="fa fa-user"></i> Profile</a>
			        </li>
			        <li>
			        	<a href="<?php echo base_url(); ?>economy"><i class="fa fa-table"></i> Economy</a>
			        </li>
			        <li>
			        	<a href="<?php echo base_url(); ?>followers"><i class="fa fa-heart"></i> Followers</a>
			        </li>
					<li>
			        	<a href="<?php echo base_url();?>forum"><i class="fa fa-comment-o"></i> Forum</a>
			        </li>
					<li>
			        	<a href="<?php echo base_url();?>private_message"><i class="fa fa-envelope"></i> PM</a>
			        </li>    
			    </ul>
			</div>
