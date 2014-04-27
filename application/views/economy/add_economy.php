<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!-- PHP Code Here -->
	<!-- START PAGE -->
	<?php if(isset($economy_data)){$economy_data_ = get_object_vars($economy_data);}?>
	<?php $attributes = array('id' =>'submit_economy_form','class' => 'form-horizontal'); ?>						
		<!-- Page content -->
		<div id="page-content-wrapper">
			<div class="content-header">
				<h1>
					<a id="menu-toggle" href="#" class="btn btn-default"> </a>
					Economy
				</h1>
			</div><!-- content-header-->
			<!-- Keep all page content within the page-content inset div! -->
			<div class="page-content inset">
				<div class="row">
					<div class="col-lg-6">
						<h2>Savings</h2>
						<?php echo form_open('economy/submit_economy', $attributes); ?>
							<!--Field: Funds-->
							<p>
							<?php echo form_label('Funds'); ?>
							<?php
							$data = array(
											'name' 			=>'funds',
											'placeholder' 	=> 'SEK',
											'style' 		=> 'width:100%'			
										);
							?>
							
							<?php 
							
							if(isset($economy_data)){
							$value = array(
											'value'	=>	set_value('funds',$economy_data_['funds'])
										   );
													
													
							$data2 = $data+$value;
							
							echo form_input($data2);
							}
							else{
							echo form_input($data);
							}
							
							?>
							
							<!--Display field errors-->
							<?php echo form_error('funds'); ?>
							</p>                
							
							
							<!--Field: Shares-->
							<p>
							<?php echo form_label('Shares'); ?>
							<?php
							$data = array(
											'name' 			=>'shares',
											'placeholder' 	=> 'SEK',
											'style' 		=> 'width:100%'				
										 );
							?>
							
							<?php 
							
							if(isset($economy_data)){
							$value = array(
											'value'	=>	set_value('shares', $economy_data_['shares'])
										  );
													
													
							$data2 = $data+$value;
							
							echo form_input($data2);
							}
							else{
							echo form_input($data);
							}
							
							?>
							
							<!--Display field errors-->
							<?php echo form_error('shares'); ?>
							</p>
	                     
							
							<!--Field: Bonds-->
							<p>
							<?php echo form_label('Bonds'); ?>
							<?php
							$data = array(
											'name' 			=> 'bonds',
											'placeholder' 	=> 'SEK',
											'style' 		=> 'width:100%'				
										);
							?>
							
							<?php 
							
							if(isset($economy_data)){
							$value = array(
											'value'	=>	set_value('bonds', $economy_data_['bonds'])
										  );
																	
							$data2 = $data+$value;
							
							echo form_input($data2);
							}
							else{
							echo form_input($data);
							}
							
							?>
							
							<!--Display field errors-->
							<?php echo form_error('bonds'); ?>
							</p>		                                       
									                                     	                                       
									
							
							<!--Field: Commodities-->
							<p>
							<?php echo form_label('Commodities'); ?>
							<?php
							$data = array(
											'name' 			=> 'commodities',
											'placeholder' 	=> 'SEK',
											'style' 		=> 'width:100%'
										);
							?>
							<?php 
							
							if(isset($economy_data)){
							$value = array(
											'value'	=>	set_value('commodities', $economy_data_['commodities'])
										  );
																	
							$data2 = $data+$value;
							
							echo form_input($data2);
							}
							else{
							echo form_input($data);
							}
							
							?>
							
							
							<!--Display field errors-->
							<?php echo form_error('commodities'); ?>
							</p>
							
							<!--Field: Properties-->
							<p>
							<?php echo form_label('Properties'); ?>
							<?php
							$data = array(
											'name' 			=> 'properties',
											'placeholder' 	=> 'SEK',
											'style' 		=> 'width:100%'
										);
							?>
							<?php 
							
							if(isset($economy_data)){
							$value = array(
											'value'	=>	set_value('properties', $economy_data_['properties'])
										  );
																	
							$data2 = $data+$value;
							
							echo form_input($data2);
							}
							else{
							echo form_input($data);
							}
							
							?>
							
							
							<!--Display field errors-->
							<?php echo form_error('properties'); ?>
							</p>	
							
							<!--Field: Saving account-->
							<p>
							<?php echo form_label('Saving account'); ?>
							<?php
							$data = array(
											'name' 			=>'saving_account',
											'placeholder' 	=> 'SEK',
											'style' 		=> 'width:100%'
										);
							?>
							<?php 
							
							if(isset($economy_data)){
							$value = array(
											'value'	=>	set_value('saving_account', $economy_data_['saving_account'])
										  );
																	
							$data2 = $data+$value;
							
							echo form_input($data2);
							}
							else{
							echo form_input($data);
							}
							
							?>
							
							<!--Display field errors-->
							<?php echo form_error('saving_account'); ?>
							</p>
							
							
							<!--Field: Other savings-->
							<p>
							<?php echo form_label('Other savings'); ?>
							<?php
							$data = array(
											'name' 			=> 'other_savings',
											'placeholder' 	=> 'SEK',
											'style' 		=> 'width:100%'
										);
							?>
							
							<?php 
							
							if(isset($economy_data)){
							$value = array(
											'value'	=>	set_value('other_savings',$economy_data_['other_savings'])
										  );
																	
							$data2 = $data+$value;
							
							echo form_input($data2);
							}
							else{
							echo form_input($data);
							}
							
							?>
							
							<!--Display field errors-->
							<?php echo form_error('other_savings'); ?>
							</p>
					</div><!--./col-lg-6-->
					
					<div class="col-lg-6">
						<h2>Liabilities</h2>
						<!--Field: Housing loan-->
						<p>
						<?php echo form_label('Housing loan'); ?>
						<?php
						$data = array(
										'name' 			=>'housing_loan',
										'placeholder' 	=> 'SEK',
										'style' 		=> 'width:100%'
									);
						?>
						<?php 
						
						if(isset($economy_data)){
						$value = array(
										'value'	=>	set_value('housing_loan',$economy_data_['housing_loan'])
									  );
																
						$data2 = $data+$value;
						
						echo form_input($data2);
						}
						else{
						echo form_input($data);
						}
						
						?>
						
						
						<!--Display field errors-->
						<?php echo form_error('housing_loan'); ?>
						</p>                
						
						
						<!--Field: Construction loan-->
						<p>
						<?php echo form_label('Construction loan'); ?>
						<?php
						$data = array(
										'name' 			=>'construction_loan',
										'placeholder' 	=> 'SEK',
										'style' 		=> 'width:100%'
									);
						?>
						<?php 
						
						if(isset($economy_data)){
						$value = array(
										'value'	=>	set_value('construction_loan',$economy_data_['construction_loan'])
									  );
																
						$data2 = $data+$value;
						
						echo form_input($data2);
						}
						else{
						echo form_input($data);
						}
						
						?>
						
						<!--Display field errors-->
						<?php echo form_error('construction_loan'); ?>
						</p>
						                                  
						
						<!--Field: Private loan-->
						<p>
						<?php echo form_label('Private loan'); ?>
						<?php
						$data = array(
										'name' 			=> 'private_loan',
										'placeholder' 	=> 'SEK',
										'style' 		=> 'width:100%'
									);
						?>
						<?php 
						
						if(isset($economy_data)){
						$value = array(
										'value'	=>	set_value('private_loan',$economy_data_['private_loan'])
									  );
																
						$data2 = $data+$value;
						
						echo form_input($data2);
						}
						else{
						echo form_input($data);
						}
						
						?>
						
						<!--Display field errors-->
						<?php echo form_error('private_loan'); ?>
						</p>		                                       
								                                     	                                       
								
						
						<!--Field: Student loan-->
						<p>
						<?php echo form_label('Student loan'); ?>
						<?php
						$data = array(
										'name' 			=> 'student_loan',
										'placeholder' 	=> 'SEK',
										'style' 		=> 'width:100%'
									);
						?>
						<?php 
						
						if(isset($economy_data)){
						$value = array(
										'value'	=>	set_value('student_loan',$economy_data_['student_loan'])
									  );
																
						$data2 = $data+$value;
						
						echo form_input($data2);
						}
						else{
						echo form_input($data);
						}
						
						?>
						
						<!--Display field errors-->
						<?php echo form_error('student_loan'); ?>
						</p>
						
						<!--Field: Senior loan-->
						<p>
						<?php echo form_label('Senior loan'); ?>
						<?php
						$data = array(
										'name' 			=> 'senior_loan',
										'placeholder' 	=> 'SEK',
										'style' 		=> 'width:100%'
									);
						?>
						<?php 
						
						if(isset($economy_data)){
						$value = array(
										'value'	=>	set_value('senior_loan',$economy_data_['senior_loan'])
									  );
																
						$data2 = $data+$value;
						
						echo form_input($data2);
						}
						else{
						echo form_input($data);
						}
						
						?>
						
						<!--Display field errors-->
						<?php echo form_error('senior_loan'); ?>
						</p>																																								
						
						<!--Field: other loan-->
						<p>
						<?php echo form_label('Other loan'); ?>
						<?php
						$data = array(
										'name' 			=> 'other_loan',
										'placeholder' 	=> 'SEK',
										'style' 		=> 'width:100%'
									);
						?>
						<?php 
						
						if(isset($economy_data)){
						$value = array(
										'value'	=>	set_value('other_loan',$economy_data_['other_loan'])
									  );
																
						$data2 = $data+$value;
						
						echo form_input($data2);
						}
						else{
						echo form_input($data);
						}
						
						?>
						
						<!--Display field errors-->
						<?php echo form_error('other_loan'); ?>
						</p>
					</div><!--./col-lg-6-->
				</div><!-- /.row -->
				<!--Submit Buttons-->
					<?php $data = array(
										"value" => "Save",
										"name"	=> "submit", 
										"class"	=> "btn btn-success"
										);
					?>
					</br>
					<?php echo form_submit($data); ?>
					<?php echo form_close(); ?>
			</div><!-- /.page-content inset -->
		</div><!-- /.page-content-wrapper --> 