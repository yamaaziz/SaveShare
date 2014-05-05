<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
<?php
	$session_data = $this->session->all_userdata();
	if(isset($economy_info) && isset($user_info)){
		$economy = get_object_vars($economy_info);
		$var = get_object_vars($user_info);	
	} 
	?>
	<!-- START PAGE -->
		<!-- Page content -->
	    <div id="page-content-wrapper">
	        <div class="content-header">
	            <h1>
	                <a id="menu-toggle" href="#" class="btn btn-default"> </a>
	                <?php echo ucfirst($var['username']); ?> 
	            </h1>	            
	        </div><!-- content-header-->
	    	 <!-- Keep all page content within the page-content inset div! -->
			<div class="page-content inset">
			    <div class="row">
			        <div class="col-md-12">
			        <!-- Display success messages -->
					<?php 
						//Sign in success
						if($this->session->flashdata('sign_in_succeeded'))
						{
						echo '<div class="alert alert-success alert-dismissable">';
							echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							echo '<strong>' .$this->session->flashdata('sign_in_succeeded') .'</strong>';
						echo '</div>'; 
						}
						//Economy success
						elseif($this->session->flashdata('economy_succeeded'))
						{
						echo '<div class="alert alert-success alert-dismissable">';
							echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							echo '<strong>' .$this->session->flashdata('economy_succeeded') .'</strong>';
						echo '</div>'; 
						}
						//Profile settings success
						elseif($this->session->flashdata('profile_settings_succeeded'))
						{
						echo '<div class="alert alert-success alert-dismissable">';
							echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							echo '<strong>' .$this->session->flashdata('profile_settings_succeeded') .'</strong>';
						echo '</div>'; 
						}
						//Security settings success
						elseif($this->session->flashdata('security_settings_succeeded'))
						{
						echo '<div class="alert alert-success alert-dismissable">';
							echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							echo '<strong>' .$this->session->flashdata('security_settings_succeeded') .'</strong>';
						echo '</div>'; 
						}
						?>
			            <p class="lead">User Info</p>
			        </div>
			    </div>
			    <div class = "row">
					<div class="col-md-6" >
			            <?php $this->load->view('profile/user_info'); ?>

			        </div>
			        <div class="col-md-6" >
			            	<?php 
							if(strtolower($session_data['username']) != strtolower($var['username']))
							{						
							$this->load->view('profile/extra');								
							}
							?> 
			        </div>
			    </div>
				<div class="row">
					<div class="col-md-6">
						<p class="lead" >Savings Chart</p>		
							<div id="savings_chart" style="height: 350px;"></div>
							<?php 
							if(isset($economy_info))
							{
							$total_savings = $economy['funds']+
							$economy['shares']+$economy['bonds']+$economy['commodities']+
							$economy['saving_account']+$economy['properties']+$economy['other_savings'];
							}
							?>
							<script>
								new Morris.Donut({
									element: 'savings_chart',
									data: [
										<?php if (!empty ($economy['funds'])) {?>
										{
											label: "Funds",
											value: <?php echo round(($economy['funds']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['shares'])) {?>
										{
											label: "Shares",
											value: <?php echo round(($economy['shares']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['bonds'])) {?>
										{
											label: "Bonds",
											value: <?php echo round(($economy['bonds']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['commodities'])) {?>
										{
											label: "Commodities",
											value: <?php echo round(($economy['commodities']/$total_savings)*100); ?>
											},
										<?php } ?>
										<?php if (!empty ($economy['saving_account'])) {?>
										{
											label: "Saving Account",
											value: <?php echo round(($economy['saving_account']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['properties'])) {?>
										{
											label: "Properties",
											value: <?php echo round(($economy['properties']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['other_savings'])) {?>
										{
											label: "Other Savings",
											value: <?php echo round(($economy['other_savings']/$total_savings)*100); ?>
										}
										<?php } ?>
										],
										resize: true,
										formatter: function (x, data) { return x + "%"; }
									});
							</script>
					</div><!--./col-md-6-->
					<div class="col-md-6">
						<?php echo $this->load->view('economy/show_savings'); ?>
					</div><!--./col-md-6-->
				</div><!--./row-->
				<div class="row">
					<div class="col-md-6">
						<p class="lead"> Liabilities Chart</p>
							<div id="liabilities_chart" style="height: 350px;"></div>
							<?php
							if(isset($economy_info))
							{
							$total_lias = $economy['housing_loan']+$economy['construction_loan']+
							$economy['private_loan']+$economy['student_loan']+$economy['senior_loan']+
							$economy['other_loan'];
							}
							?>
								<script>
									new Morris.Donut({
										element: 'liabilities_chart',
										data: [
										<?php if (!empty ($economy['housing_loan'])) {?>
										{
											label: "Housing Loan",
											value: <?php echo round(($economy['housing_loan']/$total_lias)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['construction_loan'])) {?>
										{
											label: "Construction Loan",
											value: <?php echo round(($economy['construction_loan']/$total_lias)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['private_loan'])) {?>
										{
											label: "Private Loan",
											value: <?php echo round(($economy['private_loan']/$total_lias)*100);?>
										},
										<?php } ?>
										<?php if (!empty ($economy['student_loan'])) {?>
										{
											label: "Student Loan",
											value: <?php echo round(($economy['student_loan']/$total_lias)*100); ?>
											},
										<?php } ?>
										<?php if (!empty ($economy['senior_loan'])) {?>
										{
											label: "Senior Loan",
											value: <?php echo round(($economy['senior_loan']/$total_lias)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['other_loan'])) {?>
										{
											label: "Other Loan",
											value: <?php echo round(($economy['other_loan']/$total_lias)*100);?>
										}
										<?php } ?>
										],
										resize: true,
										formatter: function (x, data) { return x + "%"; }
									});
								</script>
					</div><!--./col-md-6-->
					<div class="col-md-6">
						<?php echo $this->load->view('economy/show_lias'); ?>
					</div><!--./col-md-6-->
				</div><!--./row-->
		<!--		<div class="row">
					<div class="col-md-12">
						<p class="well"> Session data </p>
						<? foreach ($session_data as $key => $value){ echo "$key: $value\n".'<br/>';}?>
					</div><!--./col-md-12-->
				</div><!-- /.row -->
			</div><!-- /.page-content inset -->
		</div><!-- /.page-content-wrapper --> 
w
