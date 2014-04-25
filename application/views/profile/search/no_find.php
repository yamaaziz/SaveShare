<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->
<!DOCTYPE html>
<html lang="en">

	
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
			            <p class="lead">No user was found</p>
			        </div>
			    </div>
			   

			 <ul class = "advanced-search">
 			            	<a href="<?php echo base_url(); ?>profile/advanced_search">
								<large><em>Search again</em></large>
								<i class="fa fa-angle-right"></i>
		        			</a>
		        		</ul>

	

	
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