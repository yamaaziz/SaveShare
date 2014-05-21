<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->

<<<<<<< HEAD
=======
        </h1>	            
    </div><!-- content-header-->
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <!-- Display user-feedback messages -->
                <?php
                //Sign in success
                if ($this->session->flashdata('sign_in_succeeded')) {
                    echo '<div class="alert alert-success alert-dismissable">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<strong>' . $this->session->flashdata('sign_in_succeeded') . '</strong>';
                    echo '</div>';
                }
                //Economy success
                elseif ($this->session->flashdata('economy_succeeded')) {
                    echo '<div class="alert alert-success alert-dismissable">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<strong>' . $this->session->flashdata('economy_succeeded') . '</strong>';
                    echo '</div>';
                }
                //Profile settings success
                elseif ($this->session->flashdata('profile_settings_succeeded')) {
                    echo '<div class="alert alert-success alert-dismissable">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<strong>' . $this->session->flashdata('profile_settings_succeeded') . '</strong>';
                    echo '</div>';
                }
                //Security settings success
                elseif ($this->session->flashdata('security_settings_succeeded')) {
                    echo '<div class="alert alert-success alert-dismissable">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<strong>' . $this->session->flashdata('security_settings_succeeded') . '</strong>';
                    echo '</div>';
                }
                //Privacy settings success
                elseif ($this->session->flashdata('privacy_settings_succeeded')) {
                    echo '<div class="alert alert-success alert-dismissable">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<strong>' . $this->session->flashdata('privacy_settings_succeeded') . '</strong>';
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
>>>>>>> yama
<?php
	$session_data = $this->session->all_userdata();
	if(isset($economy_info) && isset($user_info)){
		$economy = get_object_vars($economy_info);
		$var = get_object_vars($user_info);	
		$today = getdate();
	} ?>
 <?php $privacy = get_object_vars($privacy);?>
 <?php $id = $this->session->userdata('user_id'); ?>
	
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
						//Privacy settings success
						elseif($this->session->flashdata('privacy_settings_succeeded'))
						{
						echo '<div class="alert alert-success alert-dismissable">';
							echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							echo '<strong>' .$this->session->flashdata('privacy_settings_succeeded') .'</strong>';
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
							if ($privacy['p_id'] != $id && $privacy['p_following'] == 2) {
								$this->load->view('profile/followers/follow_button');
								}							
							}
							?>
			        </div>
			    </div>
				<div class="row">
					<div class="col-md-6">
					
					<?php if ($privacy['p_id'] != $id && $privacy['p_dsavings'] == 2) { ?>
							<?php echo $this->load->view('economy/savings_donut'); ?>
						<?php } ?>
						<?php if ($privacy['p_id'] == $id) { ?>
							<?php echo $this->load->view('economy/savings_donut'); ?>
					<?php } ?>
					
					</div><!--./col-md-6-->
					
					<div class="col-md-6">
						<?php if ($privacy['p_id'] != $id && $privacy['p_savings'] == 2) { ?>
							<?php echo $this->load->view('economy/show_savings'); ?>
						<?php } ?>
						<?php if ($privacy['p_id'] == $id) { ?>
							<?php echo $this->load->view('economy/show_savings'); ?>
						<?php } ?>
					</div><!--./col-md-6-->
				</div><!--./row-->
				<div class="row">
					<div class="col-md-6">
					<?php if ($privacy['p_id'] != $id && $privacy['p_dlias'] == 2) { ?>
							<?php echo $this->load->view('economy/lias_donut'); ?>
						<?php } ?>
						<?php if ($privacy['p_id'] == $id) { ?>
							<?php echo $this->load->view('economy/lias_donut'); ?>
					<?php } ?>
					
					
					</div><!--./col-md-6-->
					<div class="col-md-6">
						<?php if ($privacy['p_id'] != $id && $privacy['p_lias'] == 2) { ?>
							<?php echo $this->load->view('economy/show_lias'); ?>
						<?php } ?>
						<?php if ($privacy['p_id'] == $id) { ?>
							<?php echo $this->load->view('economy/show_lias'); ?>
						<?php } ?>	
					</div><!--./col-md-6-->
				</div><!--./row-->
				<div class="row">
					<div class="col-md-12">
						<p class="well"> Session data </p>
						<? foreach ($session_data as $key => $value){ echo "$key: $value\n".'<br/>';}?>
					</div><!--./col-md-12-->
				</div><!-- /.row -->
			</div><!-- /.page-content inset -->
		</div><!-- /.page-content-wrapper --> 
