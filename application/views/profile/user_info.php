<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<?php $var = get_object_vars($user_info);?>

	<ul class="list-group" >
		<li class="list-group-item"><span class="glyphicon glyphicon-user"></span> Gender <span style="float: right;" ><?php echo ucfirst($var['gender']); ?></span></li>
		<li class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span> Age <span style="float: right;" ><?php echo (date("Y")-$var['birth_year']); ?></span></li>
		<li class="list-group-item"><span class="glyphicon glyphicon-map-marker"></span> City <span style="float: right;" ><?php echo ucfirst($var['city']); ?></span></li>
		<li class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> Occupation <span style="float: right;" ><?php echo ucfirst($var['occupation']); ?></span></li>
		<li class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Income<span style="float: right;" ><?php echo $var['income']; ?></span></li>
	</ul>
</html>