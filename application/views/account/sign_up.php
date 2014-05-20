<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!--Start form-->
<?php $attributes = array('id' =>'sign_up_form',
						  'class' => 'form-horizontal'); ?>
<?php echo form_open('account/sign_up', $attributes); ?>

<!--Field: Username-->
<p>
<?php echo form_label('Username *'); ?>
<?php
$data = array(
				'name' 			=>'username',
				'placeholder' 	=> 'Enter Username',
				'style' 		=> 'width:100%',
				'value'			=> set_value('username')
				
			);
?>
<?php echo form_input($data); ?>

<!--Display field errors-->
<?php echo form_error('username'); ?>
</p>

<!--Field: Password-->
<p>
<?php echo form_label('Password *'); ?>
<?php
$data = array(
				'name'			=> 'password',
				'placeholder' 	=> 'Enter Password',
				'style' 		=> 'width:100%',
				'value'			=> set_value('password') //ta bort sen
			);
?>
<?php echo form_password($data); ?>



<!--Display field errors-->
<?php echo form_error('password'); ?>
</p>
<p>
<em> Password must be at least 4 characters</em>
</p>
<!--Field: Confirm password-->
<p>
<?php echo form_label('Password confirmation *'); ?>
<?php
$data = array(
				'name'			=> 'password_confirmation',
				'placeholder' 	=> 'Confirm Password',
				'style' 		=> 'width:100%',
				'value'			=> set_value('password_confirmation') //ta bort sen
			);
?>
<?php echo form_password($data); ?>


<!--Display field errors-->
<?php echo form_error('password_confirmation'); ?>
</p>



<!--Field: Email-->
<p>
<?php echo form_label('Email *'); ?>
<?php
$data = array(
				'name'			=> 'email',
				'placeholder' 	=> 'Enter Email',
				'style' 		=> 'width:100%',
				'value'			=> set_value('email') //ta bort sen
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
				'value'			=> set_value('birth_year')
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

echo form_dropdown('birth_year', $data);
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
<?php echo form_radio($data, 'male'); ?>
<?php echo 'Male' ?>
<?php echo form_radio($data, 'female'); ?>
<?php echo 'Female' ?>

<!--Display field errors-->
<?php echo form_error('gender'); ?>
</p>

<!--Field: City-->
<p>
<?php echo form_label('City'); ?>
<?php
$data = array(
				'name' 			=>'city',
				'placeholder' 	=> 'Enter City',
				'style' 		=> 'width:100%',
				'value'			=> set_value('city')
				
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
				'name' 			=>'occupation',
				'placeholder' 	=> 'Enter Occupation',
				'style' 		=> 'width:100%',
				'value'			=> set_value('occupation')
				
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
				'name' 			=>'income',
				'placeholder' 	=> 'Enter Income',
				'style' 		=> 'width:100%',
				'value'			=> set_value('income')
				
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
<!--Submit Buttons-->
<?php $data = array(
						"value" => "Register",
						"name"	=> "submit", //kanske ändra till login
						"class"	=> "btn btn-primary"
					);
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>