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
	                Settings OBS OBS DONT TRY THIS YET
				</h1> 
	        </div><!-- content-header-->
	        
		    <!-- Keep all page content within the page-content inset div! -->
			<div class="page-content inset">
			    <div class="row">
			        <div class="col-md-7">
			        <p class="lead">Your personal information <span style="float: right;">Only me Everyone</span></p>
			         <!-- <p><span style="float: right;">Visible for me Visible for everyone</span></p> -->
			        <div>
			        	<!--Start form-->
						<?php $attributes = array('id' =>'privacy_settings_form','class' => 'form-horizontal'); ?>
						<?php echo form_open('account/validate_profile_settings', $attributes); ?>

					<!--Field: Gender-->
						<p><?php echo form_label('Gender'); ?>
						<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function gender_show_me()
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
						function gender_show_everyone()
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
						<span style="float: right;">
						<?php			
						echo form_radio($data, 'male', gender_show_me());
						echo form_radio($data, 'female', gender_show_everyone());
						?>
						</span>
						<!--Display field errors-->
						<?php echo form_error('gender'); ?></p>
												
						
					
					<!--Field: Age-->
						<p><?php echo form_label('Age'); ?>
						<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function age_show_me()
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
						function age_show_everyone()
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
						<span style="float: right;">
						<?php			
						echo form_radio($data, 'male', age_show_me());
						echo form_radio($data, 'female', age_show_everyone());
						?>
						</span>
						<!--Display field errors-->
						<?php echo form_error('birth_year'); ?></p>
						
						
						
						

					<!--Field: City-->
						<p><?php echo form_label('City'); ?>
												<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function city_show_me()
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
						function city_show_everyone()
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
						<span style="float: right;">
						<?php			
						echo form_radio($data, 'male', city_show_me());
						echo form_radio($data, 'female', city_show_everyone());
						?>
						</span>
						<p><?php echo form_error('city'); ?></p>
						
						
						
						
					
					<!--Field: Occupation-->
						<p><?php echo form_label('Occupation'); ?>
						<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function occupation_show_me()
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
						function occupation_show_everyone()
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
						<span style="float: right;">
						<?php			
						echo form_radio($data, 'male', occupation_show_me());
						echo form_radio($data, 'female', occupation_show_everyone());
						?>
						</span>
						<!--Display field errors-->
						<?php echo form_error('occupation'); ?></p>

						
					<!--Field: Income-->
						<p><?php echo form_label('Income'); ?>
						
						<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function income_show_me()
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
						function income_show_everyone()
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
						<span style="float: right;">
						<?php			
						echo form_radio($data, 'male', income_show_me());
						echo form_radio($data, 'female', income_show_everyone());
						?>
						</span>
						<!--Display field errors-->
						<?php echo form_error('income'); ?></p>
						
						
						
						
						<br/>
						<br/>
						<p class="lead">Your economy information <span style="float: right;">Only me Everyone</span></p>
						
					<!--Field: Savings-->
						<p><?php echo form_label('Savings table'); ?>
												<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function savings_show_me()
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
						function savings_show_everyone()
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
						<span style="float: right;">
						<?php			
						echo form_radio($data, 'male', savings_show_me());
						echo form_radio($data, 'female', savings_show_everyone());
						?>
						</span>
						<!--Display field errors-->
						<?php echo form_error('income'); ?></p>
						
						</p>
						
					<!--Field: Liabilities-->
						<p><?php echo form_label('Liabilities table'); ?>
												<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function lias_show_me()
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
						function lias_show_everyone()
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
						<span style="float: right;">
						<?php			
						echo form_radio($data, 'male', lias_show_me());
						echo form_radio($data, 'female', lias_show_everyone());
						?>
						</span>
						<!--Display field errors-->
						<?php echo form_error('income'); ?></p>
						</p>
						
						
						
						<br/>
						<br/>
						<p class="lead">Other <span style="float: right;">Enabled</span></p>
					
					<!--Field: Following-->
						<p><?php echo form_label('People can follow me'); ?>
												<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function followers_enable()
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

						?>
						<span style="float: right;">
						<?php			
						echo form_checkbox($data, 'male', followers_enable());
						?>
						</span>
						<!--Display field errors-->
						<?php echo form_error('income'); ?></p>
						</p>
						
						
					<!--Field: Search-->
						<p><?php echo form_label('People can find me in search'); ?>
												<?php
						$data = array(
										'name'	=>	'gender',
										'style'	=>	'margin:10px;'
									);
						?>
						<?php
						function search_enable()
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

						?>
						<span style="float: right;">
						<?php			
						echo form_checkbox($data, 'male', search_enable());
						
						?>
						</span>
						<!--Display field errors-->
						<?php echo form_error('income'); ?></p></p>
						
						
						<br/>
						<br/>
						<br/>
						
						
						
						
						<?php echo '<strong>Enter your password to continue</strong>';?>
						
						<br/>
						<br/>
						<br/>
																			
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
						</div>
					</div><!-- /.col-md-6 -->
					
					<div class="col-md-6">

						
					</div>
			    </div><!-- /.row -->
			</div><!-- /.page-content inset -->
		</div><!-- /.page-content-wrapper --> 
		</div>
		</div>