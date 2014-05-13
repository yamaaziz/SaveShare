<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<?php $var = get_object_vars($user_info);?>
	<?php $privacy = get_object_vars($privacy);?>
	<?php $id = $this->session->userdata('user_id'); ?>

	<ul class="list-group" >
	
	<!--Conditions for showing gender. The first condition is if someone else is looking 
	at the profile and the user has put the information public. The second condition is if
	you are looking at your own profile-->
		<?php if ($privacy['p_id'] != $id && $privacy['p_gender'] == 2) { ?>
		<?php if (!empty ($var['gender'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-user"></span> Gender <span style="float: right;" ><?php echo ucfirst($var['gender']); ?></span></li>
		<?php } ?>
		<?php } ?>
		<?php if ($privacy['p_id'] == $id) { ?>
		<?php if (!empty ($var['gender'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-user"></span> Gender <span style="float: right;" ><?php echo ucfirst($var['gender']); ?></span></li>
		<?php } ?>
		<?php } ?>
	
	<!--Conditions for showing age-->
		<?php if ($privacy['p_id'] != $id && $privacy['p_age'] == 2) { ?>
		<?php if (!empty ($var['birth_year'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span> Age <span style="float: right;" ><?php echo (date("Y")-$var['birth_year']); ?></span></li>
		<?php } ?>
		<?php } ?>
		<?php if ($privacy['p_id'] == $id) { ?>
		<?php if (!empty ($var['birth_year'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span> Age <span style="float: right;" ><?php echo (date("Y")-$var['birth_year']); ?></span></li>
		<?php } ?>
		<?php } ?>

	<!--Conditions for showing city-->
		<?php if ($privacy['p_id'] != $id && $privacy['p_city'] == 2) { ?>
		<?php if (!empty ($var['city'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-map-marker"></span> City <span style="float: right;" ><?php echo ucfirst($var['city']); ?></span></li>
		<?php } ?>
		<?php } ?>
		<?php if ($privacy['p_id'] == $id) { ?>
		<?php if (!empty ($var['city'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-map-marker"></span> City <span style="float: right;" ><?php echo ucfirst($var['city']); ?></span></li>
		<?php } ?>
		<?php } ?>
		
	<!--Conditions for showing occupation-->
		<?php if ($privacy['p_id'] != $id && $privacy['p_occupation'] == 2) { ?>
		<?php if (!empty ($var['occupation'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> Occupation <span style="float: right;" ><?php echo ucfirst($var['occupation']); ?></span></li>
		<?php } ?>
		<?php } ?>
		<?php if ($privacy['p_id'] == $id) { ?>
		<?php if (!empty ($var['occupation'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> Occupation <span style="float: right;" ><?php echo ucfirst($var['occupation']); ?></span></li>
		<?php } ?>
		<?php } ?>
		
	<!--Conditions for showing income-->
		<?php if ($privacy['p_id'] != $id && $privacy['p_income'] == 2) { ?>
		<?php if (!empty ($var['income'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Income<span style="float: right;" ><?php echo $var['income']; ?></span></li>
		<?php } ?>
		<?php } ?>
		<?php if ($privacy['p_id'] == $id) { ?>
		<?php if (!empty ($var['income'])) {?>
			<li class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Income<span style="float: right;" ><?php echo $var['income']; ?></span></li>
		<?php } ?>
		<?php } ?>
	</ul>
</html>