<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

	<?php $var = get_object_vars($user_info);?>
	<?php $followers = $followers_name; ?>
	<?php $following = $following_name; ?>

	<div align = "center" >
	<div class="btn-group">

	<?php $index = 0; ?>
	<?php $antal_icke_true = 0; ?>
	<?php if (count($following) == 0) { ?> <!--of the user is not following anyone-->
			<a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>profile/follow"><i class="fa fa-heart"></i> Follow </a>
	<?php } ?>
	<?php if (count($following) != 0) { ?> <!--if the user is following anyone-->
		<?php foreach (range(0, count($following)-1) as $whatever) { ?> <!--go through the list of followers-->
			<?php if (array_values(array_values(array_values($following)[$index])[0])[0] != $var['username']) { ?> <!--if the username of the profile is in my followers list -->
				<?php $antal_icke_true = $antal_icke_true + 1; ?>	
			<?php } ?>
			<?php $index = $index + 1;?> 
		<?php } ?>
		<?php if (count($following) == $antal_icke_true) { ?> <!--if not in the list-->
			<a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>profile/follow"><i class="fa fa-heart"></i> Follow </a>
		<?php } ?>
		<?php if (count($following) != $antal_icke_true) { ?> <!--if in the list-->
			<a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>profile/unfollow"><i class="fa fa-heart"></i> Unfollow </a>
		<?php } ?>
	<?php } ?>
		<!-- <a class="btn btn-info btn-lg" href="<?php echo base_url(); ?>profile/send_message"><i class="glyphicon glyphicon-envelope"></i> Send message </a> -->
	</div>
</div>
