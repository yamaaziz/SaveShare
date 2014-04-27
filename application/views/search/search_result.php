<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!-- PHP Code Here -->
<?php $var = get_object_vars($user_info); ?>
	<!-- START PAGE -->
	<!-- Page content -->
	<div id="page-content-wrapper">
		<div class="content-header">
			<h1>
				<a id="menu-toggle" href="#" class="btn btn-default"> </a>
				 Advanced Search
			</h1>	            
		</div><!-- content-header-->
		<!-- Keep all page content within the page-content inset div! -->
		<div class="page-content inset">
			<div class="row">
		        <div class="col-md-6">
		            <p class="lead">Search Results</p>
		            
		        </div>
		    </div>
		    
		    <div class = "row">
		    	<div class="col-md-6">
		            <p><?php echo ucfirst($var['username']);?>
		            	<a href="#"><em>Go to profile</em> <i class="fa fa-angle-right"></i></a>
		            </p>
		            
		            <p><a href="<?php echo base_url();?>search/advanced_search"><large><em>Search again</em></large> <i class="fa fa-angle-right"></i></a></p>
		    	</div>
		    </div>
		    
		    <div class = "row">
				<div class="col-md-6" >
					<?php $this->load->view('profile/user_info'); ?>
		        </div>
		    </div>
		</div><!-- /.page-content inset -->
	</div><!-- /.page-content-wrapper --> 