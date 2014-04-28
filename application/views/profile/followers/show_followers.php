<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->
<!DOCTYPE html>
<html lang="en">

	<?php $followers = get_object_vars($followers_name); ?>
	<?php $following = get_object_vars($following_name); ?>
	<?php $no_of_followers = $no_of_followers; ?>
	<?php $no_of_followings = $no_of_followings; ?>
	<?php $testar = $testar; ?>

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
		                        <div class="panel-heading">
		                        <?php if ($no_of_followings>1) { ?>
		                        <?php echo 'You are following '; echo $no_of_followings; echo ' people';?>
		                        <?php } else {?>
		                        <?php echo 'You are following '; echo $no_of_followings; echo ' person';?>
		                        <?php } ?>
		                        </div>
		                        	<div class="panel-body">
										<ul class="list-group">
											<?php $username = 'username'; ?>
											<li class="list-group-item"><a href="#"><?php echo ucfirst($following[$username]); ?></a></li>
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
		                        <div class="panel-heading">
		                        <?php if ($no_of_followers>1) { ?>
		                        <?php echo 'There are '; echo $no_of_followers; echo ' people following you';?>
		                        <?php } else {?>
		                        <?php echo 'There is '; echo $no_of_followers; echo ' person following you';?>
		                        <?php } ?>
		                        </div>
		                        	<div class="panel-body">
										<ul class="list-group">
											<li class="list-group-item"><a href="#"><?php echo ucfirst($followers['username']); ?></a></li>
											<li class="list-group-item"><a href="#">Follower2</a></li>
											<li class="list-group-item"><a href="#">Follower3</a></li>
											<li class="list-group-item"><a href="#">Follower4</a></li>
											<li class="list-group-item"><a href="#">
												<?php echo array_values(array_values($testar)[1])[0]; ?> 
											<!--detta visar att followers verkligen hamnar i en array! Den innersta siffran är den man måste variera -->											
											</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>


</html>