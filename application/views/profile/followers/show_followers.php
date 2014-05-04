<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->
<!DOCTYPE html>
<html lang="en">

	<?php $followers = $followers_name; ?>
	<?php $following = $following_name; ?>

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
		                        <?php if (count($following)>1) { ?>
		                        <?php echo 'You are following '; echo count($following); echo ' people';?>
		                        <?php } else {?>
		                        <?php echo 'You are following '; echo count($following); echo ' person';?>
		                        <?php } ?>
		                        </div>
		                        	<div class="panel-body">
										<ul class="list-group">
											<?php $index = 0; ?>
											<?php foreach (range(0, count($following)-1) as $whatever) { ?>
												<li class="list-group-item"><a href="#"><?php echo ucfirst(array_values(array_values(array_values($following)[$index])[0])[0]); ?></a></li>
												<?php $index = $index + 1;?>
											<?php } ?>
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
		                        <?php if (count($followers)>1) { ?>
		                        <?php echo 'There are '; echo count($followers); echo ' people following you';?>
		                        <?php } else {?>
		                        <?php echo 'There is '; echo count($followers); echo ' person following you';?>
		                        <?php } ?>
		                        </div>
		                        	<div class="panel-body">
										<ul class="list-group">
											<?php $index2 = 0; ?>
											<?php foreach (range(0, count($followers)-1) as $whatever) { ?>  
												<li class="list-group-item"><a href="#"><?php echo ucfirst(array_values(array_values(array_values($followers)[$index2])[0])[0]); ?></a></li>
												<?php $index2 = $index2 + 1;?>
											<?php } ?>											
											</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
</html>