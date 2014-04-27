<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SaveShare</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="<?php echo base_url(); ?>assets/css/start.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <!-- Full Page Image Header Area -->
    <div id="top" class="header">
        <div class="vert-text">
            <h1 class="logo_text">
            	<a href="<?php echo base_url();?>start">SaveShare</a>
            	<a href="<?php echo base_url();?>start"><i class="fa fa-bar-chart-o"></i></a>
            </h1>
            <h3>
                <em>Save</em> More,
                <em>Learn</em> More
           </h3>    			
			<!-- Button trigger sign_up_modal -->
			<h3>
				<button class="sign_buttons btn btn-primary btn-lg" data-toggle="modal" data-target="#sign_up_modal">
				Sign up
				</button>
				<!--/ Button trigger sign_up_modal -->	
			</h3>	
				<!-- Button trigger sign_in_modal -->
			<h3>
				<button class="sign_buttons btn btn-link btn-lg" data-toggle="modal" data-target="#sign_in_modal">
				Sign in
				</button>
				<!--/ Button trigger sign_in_modal -->	
			</h3>
			<h3>
				<a href="#about" id="info_button" class="btn btn-link">Read More</a>
			</h3>         
        </div>
    </div><!--./header-->
    <!-- /Full Page Image Header Area-->
    
    <!-- Sign up modal -->
	<div class="modal" id="sign_up_modal" tabindex="-1" role="dialog" aria-labelledby="sign_up" aria-hidden="true">
	  <div class="modal-dialog modal-sm" id ="sign_up_modal_">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="sign_up">Sign up</h4>
	      </div>
	      <div class="modal-body">     
	     <?php $this->load->view('account/sign_up'); ?> 
	      	        
	      </div>
	    </div>
	  </div><!--/modal-dialog-->
	</div><!--/modal fade-->
	<!-- /Sign up modal -->
	
	<!-- Sign in modal -->
	<div class="modal" id="sign_in_modal" tabindex="-1" role="dialog" aria-labelledby="sign_in" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content" id="sign_in_modal_">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="sign_in">Sign in</h4>
	      </div>
	      <div class="modal-body">     
	      <?php $this->load->view('account/sign_in'); ?> 	        
	      </div>
	    </div>
	  </div><!--/modal-dialog-->
	</div><!--/modal fade-->
	<!-- /Sign in modal -->
		
    <!-- Intro -->
    <div id="about" class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h2>The World's Best Web Application</h2>
                    <p class="lead">Sign up today and start saving. You can even look up how much money your annoying neighbour 			 makes.</p>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- /Intro -->
    
    <!-- Services -->
    <div id="services" class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <h2>Our Services</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-2 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-money"></i>
                        <h4>Money</h4>
                        <p>You can win 1 000 000$ just by signing up </p>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-globe"></i>
                        <h4>Connect</h4>
                        <p>Find friends!</p>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-users"></i>
                        <h4>Profiles</h4>
                        <p>Cool user features!</p>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="service-item">
                        <i class="service-icon fa fa-lock"></i>
                        <h4>Security</h4>
                        <p>Trust me, I have everything under controll. Your data is safe with us.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Services -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <ul class="list-inline">
                        <li><a><i class="fa fa-facebook fa-3x"></i></a>
                        </li>
                        <li><a><i class="fa fa-twitter fa-3x"></i></a>
                        </li>
                        <li><a><i class="fa fa-dribbble fa-3x"></i></a>
                        </li>
                    </ul>
                    <div class="top-scroll">
                        <a href="#top"><i class="fa fa-arrow-circle-o-up fa-4x"></i></a>
                    </div>
                    <hr>
                    <p>Copyright &copy; SaveShare 2014</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    
    <!-- JavaScript for showing the modals after form validation errors -->
	<? if (isset($pathway) && $pathway != '') : ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/<?=$pathway;?>"></script>
	<? endif;?>
    <!-- Custom JavaScript for the Side Menu and Smooth Scrolling -->
    <script>
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
