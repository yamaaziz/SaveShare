<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->
<!DOCTYPE html>
<html lang="en">

<?php $attributes = array('id' =>'search_form',
						'class' => 'form-horizontal'); 
	$var = get_object_vars($user_info);
	?>
	
		<!-- Page content -->
		<div id="page-content-wrapper">
			<div class="content-header">
				<h1>
					<a id="menu-toggle" href="#" class="btn btn-default"> </a>
					 Search result
				</h1>	            
			</div><!-- content-header-->
			<!-- Keep all page content within the page-content inset div! -->
			<div class="page-content inset">
				<div class="row">
					<div class="col-md-12">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6">
									<form role="form">
									<div class="row">
			        <div class="col-md-12">
			            <p class="lead">User Info</p>
			        </div>
			    </div>
			    <?php echo ucfirst($var['username']); ?>

			 <ul class = "advanced-search">
 			            	<a href="<?php echo base_url(); ?>profile">
								<large><em>Go to profile</em></large>
								<i class="fa fa-angle-right"></i>
		        			</a>
		        		</ul>

			    <div class = "row">
					<div class="col-md-6" >
			            <?php $this->load->view('profile/user_info'); ?>

			        </div>

	
											<!-- /.col-lg-6 (nested) -->
										<div class="col-lg-6">
										</div>
										</form>
								</div><!-- /.col-lg-6 -->
							</div><!-- /.row -->
						</div><!-- /.panel body -->
					</div><!--/.col-md-12 -->
				</div><!--/.row -->
			</div><!-- /.page-content inset -->
		</div><!-- /.page-content-wrapper --> 
</html>