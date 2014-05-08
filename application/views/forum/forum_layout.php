<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!-- PHP Code Here -->

	<!-- START PAGE -->
	<!-- Page content -->
	<div id="page-content-wrapper">
		<div class="content-header">
			<h1>
				<a id="menu-toggle" href="#" class="btn btn-default"> </a>
				Forum
			</h1>	            
		</div><!-- content-header-->
		<!-- Keep all page content within the page-content inset div! -->
		<div class="page-content inset">
			<div class="row">
		        <div class="col-md-6">
		            <p class="lead">Start your own discussion about saving money!</p>
		            
		        </div>
		    </div>
    				
		<div class="col-lg-12"> 
		<div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comment-o"></i> Forum
                            <div class="pull-right">
                               
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Topic</th>
                                                    <th>Author</th>
                                                    <th>Start date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($thread as $news_item): ?>
                                                <tr>
                                                    <td><?php echo $news_item['t_id'] ?></td>
                                                    <td><a href="forum/<?php echo $news_item['slug'] ?>"> <?php echo $news_item['topic'] ?></a></td>
                                                    <td><?php echo $news_item['creator_id'] ?> </td>
                                                    <td> <?php echo $news_item['date_started'] ?></td>
                                                </tr>
                                                
                                                <?php endforeach ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        
        <div class="col-md-6">
					<?php $attributes = array('id' =>'forum_form','class' => 'form-horizontal'); ?>
					<?php echo form_open('forum/validate_forum', $attributes); ?>
		
		<p>
		
		</p>
		
		
		<div class="row">
		        <div class="col-md-6">
		            <p class="lead">Start your own topic!</p>
		            
		        </div>
		    </div>
			
		
					<!--Field: Topic-->
					<p>
					<?php echo form_label('Topic'); ?>
					<?php
					$data = array(
									'name' 			=> 'topic',
									'placeholder' 	=> 'Topic',
									'style' 		=> 'width:100%',
									'value'			=> set_value('topic')
								);
					?>
					<?php echo form_input($data); ?>
					
					<!--Display field errors-->
					<?php echo form_error('topic'); ?>
					</p>	
					
					<!--Field: Question-->
					<p>
					<?php echo form_label('Your message'); ?>
					<?php
					$data = array(
									'name' 			=> 'message',
									'placeholder' 	=> 'Message',
									'style' 		=> 'width:100%',
									'value'			=> set_value('message')
								);
					?>
					<?php echo form_input($data); ?>
					
					<!--Display field errors-->
					<?php echo form_error('message'); ?>
					</p>
					
					<!--Submit Buttons-->
					<?php $data = array(
											"value" => "Start thread",
											"name"	=> "submit", 
											"class"	=> "btn btn-primary"
										);
					?>
					</br>
					<?php echo form_submit($data); ?>
					</p>
					<?php echo form_close(); ?>
				</div><!--./col-md-6 -->                


	
	

	</div><!-- /.page-content-wrapper --> 