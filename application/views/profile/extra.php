<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

	<?php $var = get_object_vars($user_info);?>
	<?php $followers = $followers_name; ?>
	<?php $following = $following_name; ?>

	<div align = "center" >
	<div class="btn-group">

	<?php $index = 0; ?>
	<?php if (count($following) == 0) { ?>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>profile/follow"><i class="fa fa-heart"></i> Follow </a>
	<?php } ?>
	<?php if (count($following) != 0) { ?>
		<?php foreach (range(0, count($following)-1) as $whatever) { ?>
			<?php if (array_values(array_values(array_values($following)[$index])[0])[0] != $var['username']) { ?>
				<a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>profile/follow"><i class="fa fa-heart"></i> Follow </a>
			<?php } ?>
			<?php if (array_values(array_values(array_values($following)[$index])[0])[0] == $var['username']) { ?>
				<a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>profile/unfollow"><i class="fa fa-heart"></i> Unfollow </a>
			<?php } ?>
			<?php $index = $index + 1;?> <!--kolla var denna ska ligga, förmodligen här-->
		<?php } ?>
	<?php } ?>
		<a class="btn btn-info btn-lg" href="<?php echo base_url(); ?>profile/follow"><i class="glyphicon glyphicon-envelope"></i> Send message </a>
	</div>
</div>
