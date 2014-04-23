<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- SaveShare 2014 -->
<!--Start form-->
<?php $attributes = array('id' =>'sign_in_form',
						  'class' => 'form-horizontal'); ?>
<?php echo form_open('users/sign_in', $attributes); ?>

<!--Field: Username-->
<p>
<?php echo form_label('Username'); ?>
<?php
$data = array(
				'name' 			=>'username_',
				'placeholder' 	=> 'Enter Username',
				'style' 		=> 'width:100%',
				'value'			=> set_value('username')
				
			);
?>
<?php echo form_input($data); ?>

<!--Display field errors-->
<?php echo form_error('username_'); ?>
</p>

<!--Field: Password-->
<p>
<?php echo form_label('Password'); ?>
<?php
$data = array(
				'name'			=> 'password_',
				'placeholder' 	=> 'Enter Password',
				'style' 		=> 'width:100%',
				'value'			=> set_value('password') //ta bort sen
			);
?>
<?php echo form_password($data); ?>

<!--Display field errors-->
<?php echo form_error('password_'); ?>

</p>

<br/>

<p>
<!--Submit Buttons-->
<?php $data = array(
						"value" => "Login",
						"name"	=> "submit", //kanske ändra till login
						"class"	=> "btn btn-primary"
					);
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>