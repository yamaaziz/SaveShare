<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
		<!-- Page content -->
	    <div id="page-content-wrapper">
	        <div class="content-header">
	            <h1>
	                <a id="menu-toggle" href="#" class="btn btn-default"> </a>
	                Settings
	            </h1>	            
	        </div><!-- content-header-->
		    <!-- Keep all page content within the page-content inset div! -->
			<div class="page-content inset">
			    <div class="row">
			        <div class="col-md-6">
			        	<!--Start form-->
						<?php $attributes = array('id' =>'security_settings_form','class' => 'form-horizontal'); ?>
						<?php echo form_open('account/validate_security_settings', $attributes); ?>
						<!--Field: Password-->
						<p>
						<?php echo form_label('Old Password'); ?>
						<?php
						$data = array(
										'name' 			=>'old_password',
										'placeholder' 	=> 'Enter Old Password',
										'style' 		=> 'width:100%',
										'value'			=> set_value('old_password')
										
									);
						?>
						<?php echo form_password($data); ?>
						<!--Display field errors-->
						<?php echo form_error('old_password'); ?>
						<!--Field: New Password -->
						<p>
						<?php echo form_label('New Password'); ?>
						<?php
						$data = array(
										'name' 			=>'new_password',
										'placeholder' 	=> 'Enter New Password',
										'style' 		=> 'width:100%',
										'value'			=> set_value('new_password')
										
									);
						?>
						<?php echo form_password($data); ?>
						<!--Display field errors-->
						<?php echo form_error('new_password'); ?>
						</br>
						<p>
						<!--Submit Buttons-->
						<?php $data = array(
												"value" 	=> "Save",
												"name"		=> "submit", //kanske ändra till login
												"class"		=> "btn btn-success",
												"style"		=>	"margin-right:10px"
											);
						?>
						<?php echo form_submit($data); ?>
						<?php $data = array(
											    'name' => 'reset',
											    'id' => 'reset_button',
											    'value' => 'true',
											    'type' => 'reset',
											    'content' => 'Reset',
											    'class'	=>	'btn btn-danger'
											);
						?>				
						<?php echo form_button($data); ?>
						</p>
						</br>
						<?php echo form_close(); ?>
			        </div>
			    </div><!-- /.row -->
			</div><!-- /.page-content inset -->
		</div><!-- /.page-content-wrapper -->