<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

	<?php $var = get_object_vars($user_info);?>
	<?php $followers = $followers_name; ?>
	<?php $following = $following_name; ?>
	<div align = "center" >
	<div class="btn-group">

	<?php $index = 0; ?>
	<?php if (count($following) != 0) { ?>
		<?php foreach (range(0, count($following)-1) as $whatever) { ?>
			<?php if (array_values(array_values(array_values($following)[$index])[0])[0] != $var['username']) { ?>
				<button type="button" class="btn btn-primary btn-lg" data-toggle="button">
				<span class="fa fa-heart"></span> Follow
				</button>
				<?php $index = $index + 1;?>
			<?php } else { ?>
				<button type="button" class="btn btn-primary btn-lg" data-toggle="button">
				<span class="fa fa-heart"></span> Unfollow
				</button>
				<?php $index = $index + 1;?>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	<?php if (count($following) == 0) { ?>
		<button type="button" class="btn btn-primary btn-lg" data-toggle="button">
		<span class="fa fa-heart"></span> Follow
		</button>
	<?php } ?>

		<button type="button" class="btn btn-info btn-lg">
			<span class="glyphicon glyphicon-envelope"></span> Send message
		</button>
	</div>
</div>
	

