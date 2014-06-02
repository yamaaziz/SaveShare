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
            	<!--<a href="<?php echo base_url();?>start"><i class="fa fa-bar-chart-o"></i></a> -->
            </h1>
            <h3>
                <em>Save</em> Money,
                <em>Share</em> Economy
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
				<a href="#about" id="info_button" class="btn btn-link">Learn More</a>
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
			<?php 
			if($this->session->flashdata('sign_up_succeeded'))
			{
			echo '<div class="alert alert-success alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				echo '<strong>' .$this->session->flashdata('sign_up_succeeded') .'</strong>';
			echo '</div>'; 
			}
			elseif($this->session->flashdata('forgot_password_succeeded'))
			{
			echo '<div class="alert alert-success">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				echo '<strong>' .$this->session->flashdata('forgot_password_succeeded') .'</strong>';
			echo '</div>'; 
			}
			?>
			<?php $this->load->view('account/sign_in'); ?>
			<p><a id="forgot_password" data-toggle="modal" data-target="#forgot_password_modal" onclick="hide_forgot_password_modal()"> Forgot your password? </a></p>
	      </div>
	    </div>
	  </div><!--/modal-dialog-->
	</div><!--/modal fade-->
	<!-- /Sign in modal -->
	
	<!-- Forgot password modal -->
	<div class="modal" id="forgot_password_modal" tabindex="-1" role="dialog" aria-labelledby="forgot_password" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content" id="forgot_password_modal_">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="sign_in">Forgot password</h4>
	      </div>
	      <div class="modal-body">
	      	<?php $this->load->view('account/forgot_password'); ?>	
	      </div>
	    </div>
	  </div><!--/modal-dialog-->
	</div><!--/modal fade-->
	<!-- /Forgot password modal -->
		
    <!-- Intro -->
    <div id="about" class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h2>Save and share</h2>
                    <p class="lead">SaveShare helps you to get order in your economy and also lets you see how other people save to improve your own savings. Sign up today and start saving!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Intro -->
	<!-- START THE FEATURETTES -->
	<div class="container">
        <hr class="featurette-divider">

        <div class="featurette" id="about">
            <img class="featurette-image img-rounded img-responsive pull-right" src="<?php echo base_url(); ?>assets/img/savingchart.jpg">
            <h2 class="featurette-heading">Save Your Money
                <span class="text-muted">And Keep Control Of It.</span>
            </h2>
            <p class="lead">Insert your saving and liabilities at your account to bring order in your economy. If you have your savings dispersed in different bank accounts or assets SaveShare lets you gather all in the same place.</p>
        </div>

        <hr class="featurette-divider">

        <div class="featurette" id="services">
            <img class="featurette-image img-rounded img-responsive pull-left" src="<?php echo base_url(); ?>assets/img/katrin.jpg">
            <h2 class="featurette-heading">Follow People
                <span class="text-muted">To Learn How Other Save.</span>
            </h2>
            <p class="lead">Follow other people to learn and study how similar people arrange their money.  In the forum users can connect with each other and discuss economy related issues. By sharing economic information it has never been this easy to save money!</p>
        </div>

        <hr class="featurette-divider">

        <div class="featurette" id="contact">
            <img class="featurette-image img-rounded img-responsive pull-right" src="<?php echo base_url(); ?>assets/img/privacy.jpg">
            <h2 class="featurette-heading">Protect Your Privacy
                <span class="text-muted">To Have Your Money Secured.</span>
            </h2>
            <p class="lead">By choosing a nickname it is possible to be anonymous and you can also chose how much you want to share with other users. The privacy settings lets you decide what only you can see and what everyone can see about your finances. </p>
	</div>
	<hr>
	<!-- /END THE FEATURETTES -->
	
	</div class="container">
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
					<div class="top-scroll">
                        <a href="#top"><i class="fa fa-arrow-circle-o-up fa-4x"></i></a>
                    </div>
	                	<div id="footer">
	                		<p>SaveShare &copy; 2014</p>
	                    </div>
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
	<!-- Custom JavaScript for hidig forgot password modal -->
	<script>
	function hide_forgot_password_modal()
	{
	$('#sign_in_modal').modal('hide');
	}
	</script>
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
    <!-- Custom JavaScript for the Alert messages -->
	<script>
    window.setTimeout(function()
    {
    	$(".alert-dismissable").fadeTo(500, 0).slideUp(500, function(){
    		$(this).remove();
    	});
    }, 3000);
	</script>
</body>

</html>
