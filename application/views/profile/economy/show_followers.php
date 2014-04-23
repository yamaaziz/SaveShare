<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->
<!DOCTYPE html>
<html lang="en">
	<?php $followers = get_object_vars($following_info1); ?>
	<?php $following = get_object_vars($following_info2); ?>
	<?php $followers2 = get_object_vars($following_info3); ?>
	<?php $following2 = get_object_vars($following_info4); ?>

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
		                        <div class="panel-heading">You are following</div>
		                        	<div class="panel-body">
										<ul class="list-group">
											<li class="list-group-item"><a><?php echo $following['user_id']; ?></a></li>
											<li class="list-group-item"><a>Username2</a></li>
											<li class="list-group-item"><a>Username3</a></li>
											<li class="list-group-item"><a>Username4</a></li>
											<li class="list-group-item"><a>Username5</a></li>
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
		                        <div class="panel-heading">Following you</div>
		                        	<div class="panel-body">
										<ul class="list-group">
											<li class="list-group-item"><a><?php echo $followers['follower_id']; ?></a></li>
											<li class="list-group-item"><a>Follower2</a></li>
											<li class="list-group-item"><a>Follower3</a></li>
											<li class="list-group-item"><a>Follower4</a></li>
											<li class="list-group-item"><a>Follower5</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>


</html>