<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
<?php $session_data = $this->session->all_userdata(); ?>
	<!-- START PAGE -->
		<!-- Page content -->
	    <div id="page-content-wrapper">
	        <div class="content-header">
	            <h1>
	                <a id="menu-toggle" href="#" class="btn btn-default"> </a>
	                Profile
	            </h1>	            
	        </div><!-- content-header-->
	    	 <!-- Keep all page content within the page-content inset div! -->
			<div class="page-content inset">
			
			    <div class="row">
			        <div class="col-md-12">
			            <p class="lead">User Info</p>
			        </div>
			    </div>
			    
			    <div class = "row">
					<div class="col-md-6" >
			            <?php $this->load->view('profile/user_info'); ?>

			        </div>
			        <div class="col-md-6" >
			            <p class="well"> Extra space. Follow-button? Send private message-button? </p>
			        </div>
			    </div>
				
				<div class="row">
					<div class="col-md-6">
						<p class="lead">Savings Chart</p>
						<canvas id="canvas" height="300" width="300"></canvas>
							<script>
							
								var pieData = [
										{
											value: 30,
											color:"#F38630"
										},
										{
											value : 50,
											color : "#E0E4CC"
										},
										{
											value : 100,
											color : "#69D2E7"
										}
									
									];
							
								var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
								
								</script>
			
					</div>
					<div class="col-md-6">
						<?php echo $this->load->view('economy/show_savings'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p class="lead"> Liabilities Chart</p>
						<canvas id="canvas2" height="300" width="300"></canvas>
							<script>
							
								var pieData = [
										{
											value: 30,
											color:"#F38630"
										},
										{
											value : 50,
											color : "#E0E4CC"
										},
										{
											value : 100,
											color : "#69D2E7"
										}
									
									];
							
								var myPie2 = new Chart(document.getElementById("canvas2").getContext("2d")).Pie(pieData);
								
								</script>
							<p>&nbsp;<p>
			
					</div>
					
					<div class="col-md-6">
						<?php echo $this->load->view('economy/show_lias'); ?>
					</div>
				</div>

				<div class="row">
			        <div class="col-md-6">

			            <p class="well"> Session data </p>
			            
			            <?
			            foreach ($session_data as $key => $value)
			            {
							echo "Key: $key"."<br/>"."Value: $value\n".'<br/>';
						}			            
			            ?>   
			
			        </div>
			        <div class="col-md-6">
			            <p class="well">But the full-width layout means that you wont be using containers.</p>
			        </div>

			        <div class="col-md-4">
			            <p class="well">You get the idea! Do whatever you want in the page content area!</p>
			        </div>

			    </div><!-- /.row -->
			</div><!-- /.page-content inset -->
		</div><!-- /.page-content-wrapper --> 
