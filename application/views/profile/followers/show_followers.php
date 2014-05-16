<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
<!-- START PAGE -->
<?php $followers = $followers_name; ?>
<?php $following = $following_name; ?>

<div id="page-content-wrapper">
    <div class="content-header">
        <h1>
            <a id="menu-toggle" href="#" class="btn btn-default"> </a>
            Followers
        </h1>	            
    </div><!-- content-header-->
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <div class="row">
            <div class="col-lg-12">
                <p class="lead">Your current follow relationships</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php if (count($following) == 1) { ?>
                            <?php
                            echo 'You are following ';
                            echo count($following);
                            echo ' person';
                            ?>
                        <?php } else { ?>
                            <?php
                            echo 'You are following ';
                            echo count($following);
                            echo ' people';
                            ?>
                        <?php } ?>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php $index = 0; ?>
                            <?php if (count($following) != 0) { ?>
                                <?php foreach (range(0, count($following) - 1) as $whatever) { ?>
                                    <?php $username = array_values(array_values(array_values($following)[$index])[0])[0]; ?>
                                    <li class="list-group-item"><a href="<?php echo base_url(); ?>profile/<?php echo $username; ?>"><?php echo ucfirst(array_values(array_values(array_values($following)[$index])[0])[0]); ?></a></li>
                                    <?php $index = $index + 1; ?>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel-heading -->
            </div>
            <!-- /.panel-default -->
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php if (count($followers) == 1) { ?>
                            <?php
                            echo 'There is ';
                            echo count($followers);
                            echo ' person following you';
                            ?>
                        <?php } else { ?>
                            <?php
                            echo 'There are ';
                            echo count($followers);
                            echo ' people following you';
                            ?>
                        <?php } ?>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php $index2 = 0; ?>
                            <?php if (count($followers) != 0) { ?>
                                <?php foreach (range(0, count($followers) - 1) as $whatever) { ?>  
                                    <?php $username = array_values(array_values(array_values($followers)[$index2])[0])[0]; ?>
                                    <li class="list-group-item"><a href="<?php echo base_url(); ?>profile/<?php echo $username; ?>"><?php echo ucfirst(array_values(array_values(array_values($followers)[$index2])[0])[0]); ?></a></li>
                                        <?php $index2 = $index2 + 1; ?>
                                    <?php } ?>	
                                <?php } ?>										
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>