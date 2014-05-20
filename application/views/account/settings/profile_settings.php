<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!-- PHP Code Here -->
<?php global $profile_data_;
 $profile_data_ = get_object_vars($profile_data);?>

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
						<?php $attributes = array('id' =>'profile_settings_form','class' => 'form-horizontal'); ?>
						<?php echo form_open('account/validate_profile_settings', $attributes); ?>
						<!--Field: Username-->
						<p>
						<?php echo form_label('Username *'); ?>
						<?php
						$data = array(
										'name' 			=> 'username_',
										'placeholder' 	=> 'Enter Username',
										'style' 		=> 'width:100%',
										'value'			=> set_value('username', $profile_data_['username'])
										
									);
						?>
						<?php echo form_input($data); ?>
						<!--Display field errors-->
						<?php echo form_error('username_'); ?>
						</p>
						<!--Field: Email-->
						<p>
						<?php echo form_label('Email *'); ?>
						<?php
						$data = array(
										'name'			=> 'email',
										'placeholder' 	=> 'Enter Email',
										'style' 		=> 'width:100%',
										'value'			=> set_value('email', $profile_data_['email']) //ta bort sen
									);
						?>
						<?php echo form_input($data); ?>
						
						<!--Display field errors-->
						<?php echo form_error('email'); ?>
						</p>
						<!--Field: Birthyear-->
						<p>
						<?php echo form_label('Birth year'); ?>
						<?php
						$data = array(
										'name'			=> 'birth_year',
										'placeholder' 	=> 'Enter Birth year',
										'style' 		=> 'width:100%',
										'value'			=> set_value('birth_year', $profile_data_['birth_year'])
									);
						?>
						<?php
						//This creates a empty default value for the birthyear dropdown.
						//It is merged in front of the birthyears.
						$empty_key = '';
						$empy_value = '';
						
						$number_keys = range(1914,2000);
						$number_values = range(1914,2000);
						
						$keys = array_merge((array)$empty_key, (array)$number_keys);
						$values = array_merge((array)$empy_value, (array)$number_values);
						
						$data= array_combine($keys,$values);
						
						echo form_dropdown('birth_year', $data, $profile_data_['birth_year']);
						?>
						<!--Display field errors-->
						<?php echo form_error('birth_year'); ?>
						</p>
						<!--Field: Gender-->
						<p>
						<?php echo form_label('Gender'); ?>
						<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function is_male()
						{	
						global $profile_data_;
						
							if($profile_data_['gender'] === 'male'){

								return TRUE;
							}
							else
							{
								return FALSE;
							}
						}
						function is_female()
						{	
						global $profile_data_;
						
							if($profile_data_['gender'] === 'female'){

								return TRUE;
							}
							else
							{
								return FALSE;
							}
						}
						?>
						<?php			
						echo form_radio($data, 'male', is_male());
						echo 'Male';
						echo form_radio($data, 'female', is_female());
						echo 'Female'; 
						?>
						<!--Display field errors-->
						<?php echo form_error('gender'); ?>
						</p>
						<!--Field: City-->
						<p>
						<?php echo form_label('City'); ?>
						<?php
						$data = array(
										'name' 			=> 'city',
										'placeholder' 	=> 'Enter City',
										'style' 		=> 'width:100%',
										'value'			=> set_value('city', $profile_data_['city'])
										
									);
						?>
						<?php echo form_input($data); ?>
						
						<!--Display field errors-->
						<?php echo form_error('city'); ?>
						</p>
						<!--Field: Occupation-->
						<p>
						<?php echo form_label('Occupation'); ?>
						<?php
						$data = array(
										'name' 			=> 'occupation',
										'placeholder' 	=> 'Enter Occupation',
										'style' 		=> 'width:100%',
										'value'			=> set_value('occupation', $profile_data_['occupation'])
										
									);
						?>
						<?php echo form_input($data); ?>
						<!--Display field errors-->
						<?php echo form_error('occupation'); ?>
						</p>
						<!--Field: Income-->
						<p>
						<?php echo form_label('Income'); ?>
						<?php
						$data = array(
										'name' 			=> 'income',
										'placeholder' 	=> 'Enter Income',
										'style' 		=> 'width:100%',
										'value'			=> set_value('income', $profile_data_['income'])
										
									);
						?>
						<?php echo form_input($data); ?>
						<!--Display field errors-->
						<?php echo form_error('income'); ?>
						</p>
						<br/>					
						<p>
						<?php echo '* marked fields are required.';?>
						</p>
						<br/>						
						<p>
						<?php echo '<strong>Enter your password to continue</strong>';?>
						</p>													
						<!--Field: Enter password to save -->
						<!--Field: Password-->
						<p>
						<?php echo form_label('Password'); ?>
						<?php
						$data = array(
										'name'			=> 'password_',
										'placeholder' 	=> 'Enter Password',
										'style' 		=> 'width:100%',
									);
						?>
						<?php echo form_password($data); ?>					
						<!--Display field errors-->
						<?php echo form_error('password_'); ?>
						</p>					
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
					</div><!-- /.col-md-6 -->
			    </div><!-- /.row -->
			</div><!-- /.page-content inset -->
		</div><!-- /.page-content-wrapper --> 