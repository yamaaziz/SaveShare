<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
	<?php $var = get_object_vars($user_info);?>
	<div class="btn-group">
		<button type="button" class="btn btn-warning btn-lg" data-toggle="button">
			<span class="glyphicon glyphicon-star"></span> Follow
		</button>
		<button type="button" class="btn btn-info btn-lg">
			<span class="glyphicon glyphicon-pencil"></span> Send message
		</button>
	</div>