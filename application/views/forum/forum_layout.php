<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?><!-- Save Share 2014 -->
<!-- PHP Code Here -->
<!-- START PAGE -->
<!-- Page content -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<div id="page-content-wrapper">
    <div class="content-header">
        <h1><a id="menu-toggle" href="#" class="btn btn-default"></a> Forum</h1>
    </div><!-- content-header-->
    <!-- Keep all page content within the page-content inset div! -->

    <div class="page-content inset">
        <div class="row">
            <div class="col-lg-12">
                <p class="lead">Start your own discussion about saving money!</p>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Threads</h3>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>Topic</th>

                                                <th>Creator</th>

                                                <th>Start date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($thread as $thread_item): ?>

                                                <tr>
                                                    <td><?php echo $thread_item['t_id'] ?></td>

                                                    <td><a href="forum/<?php echo $thread_item['slug'] ?>"><?php echo $thread_item['topic'] ?></a></td>

                                                    <td><a href="#"><?php echo $thread_item['creator_name'] ?></a></td>

                                                    <td><?php echo $thread_item['date_started'] ?></td>
                                                </tr><?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="lead">Start your own topic!</p><!--Field: Topic-->
                <?php $attributes = array('id' => 'forum_form', 'class' => 'form-horizontal'); ?><?php echo form_open('forum/validate_forum', $attributes); ?>
                <p><?php echo form_label('Topic'); ?> <?php
                    $data = array(
                        'name' => 'topic',
                        'placeholder' => 'Topic',
                        'style' => 'width:100%',
                        'value' => set_value('topic')
                    );
                    ?> <?php echo form_input($data); ?> <!--Display field errors-->
                    <?php echo form_error('topic'); ?></p><!--Field: Question-->

                <p><?php echo form_label('Your question'); ?> <?php
                    $data = array(
                        'name' => 'message',
                        'placeholder' => 'Type your question here',
                        'style' => 'width:100%',
                        'rows' => '5',
                        'value' => set_value('message')
                    );
                    ?> <?php echo form_textarea($data); ?> <!--Display field errors-->
                    <?php echo form_error('message'); ?></p><!--Submit Buttons-->
                <?php
                $data = array(
                    "value" => "Start thread",
                    "name" => "submit",
                    "class" => "btn btn-primary"
                );
                ?>
                <br>
                <?php echo form_submit($data); ?>
                <?php echo form_close(); ?>
            </div><!--./col-md-6 -->
        </div>
    </div><!-- /.page-content-inset -->
</div><!-- /.page-content-wrapper -->

