<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->
<!DOCTYPE html>
<html lang="en">
	<?php $followers = get_object_vars($following_info1); ?>
	<?php $following = get_object_vars($following_info2); ?>
	<?php $followers2 = get_object_vars($following_info3); ?>
	<?php $following2 = get_object_vars($following_info4); ?>
	<?php $no_of_followers = $no_of_followers; ?>
	<?php $no_of_followings = $no_of_followings; ?>

	    <div id="page-content-wrapper">
	        <div class="content-header">
	            <h1>
	                <a id="menu-toggle" href="#" class="btn btn-default"> </a>
	                Followers
	            </h1>	            
	        </div><!-- content-header-->
		    <!-- Keep all page content within the page-content inset div! -->
			<div class="page-content inset">
			    <div class="row">
			        <div class="col-md-12">
			            <p class="lead">Your current follow relationships</p>
			        </div>
			    
					<div class="row">
		                <div class="col-lg-6">
		                    <div class="panel panel-default">
		                        <div class="panel-heading">You are following <?php echo $no_of_followings; ?> people</div>
		                        	<div class="panel-body">
										<ul class="list-group">
											<li class="list-group-item"><a href="#"><?php echo ucfirst($following2['username']); ?></a></li>
											<li class="list-group-item"><a href="#">Username2</a></li>
											<li class="list-group-item"><a href="#">Username3</a></li>
											<li class="list-group-item"><a href="#">Username4</a></li>
											<li class="list-group-item"><a href="#">Username5</a></li>
										</ul>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel-heading -->
							</div>
							<!-- /.panel-default -->
						<!-- /.col-lg-6 -->
						<div class="col-lg-6">
		                    <div class="panel panel-default">
		                        <div class="panel-heading">There are <?php echo $no_of_followers; ?> people are following you</div>
		                        	<div class="panel-body">
										<ul class="list-group">
											<li class="list-group-item"><a href="#"><?php echo ucfirst($followers2['username']); ?></a></li>
											<li class="list-group-item"><a href="#">Follower2</a></li>
											<li class="list-group-item"><a href="#">Follower3</a></li>
											<li class="list-group-item"><a href="#">Follower4</a></li>
											<li class="list-group-item"><a href="#">Follower5</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>


</html>