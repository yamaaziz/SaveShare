<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!--Start form-->
<?php $attributes = array('id' =>'forgot_password_form',
						  'class' => 'form-horizontal'); ?>
<?php echo form_open('account/forgot_password', $attributes); ?>

<!--Field: Email-->
<p>
<?php echo form_label('Email'); ?>
<?php
$data = array(
				'name' 			=>'email_fp',
				'placeholder' 	=> 'Enter Email',
				'style' 		=> 'width:100%',
				'value'			=> set_value('email_fp')
				
			);
?>
<?php echo form_input($data); ?>
<!--Display field errors-->
<?php echo form_error('email_fp'); ?>
</p>
<br/>
<p>
<!--Submit Buttons-->
<?php $data = array(
						"value" => "Submit",
						"name"	=> "submit",
						"class"	=> "btn btn-primary"
					);
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>