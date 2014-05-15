  <div id="page-content-wrapper">
	        <div class="content-header">
<<<<<<< HEAD
				<?php
				echo '<h2>'.$news_item['topic'].'</h2>';
				//echo $news_item['creator_id'];
				$topic_id = $news_item['t_id'];
				//echo $slug;
				?>
	        </div>     	
  </div>
  <?php foreach ($messages as $message): ?>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?php echo $message['sender'] ?></h3>
	       <h1 class="panel-title"><?php echo $message['date_posted'] ?></h1>
	  </div>
	  <div class="panel-body">
	    <?php echo $message['content'] ?>
	  </div>
	</div>
   <?php endforeach ?>  
	         <div class="col-md-6">
					<?php $attributes = array('id' =>'message_form','class' => 'form-horizontal'); ?>
					<?php echo form_open('forum/validate_message', $attributes); ?>
		<p>
		</p>
=======
<?php
echo '<h2>'.$thread_item['topic'].'</h2>';
//echo $news_item['creator_id'];
$topic_id = $thread_item['t_id'];
//echo $slug;
?>

	        </div>    	        	
   </div>
   
   
   <div class="col-md-6">
                 <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Thread
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                   </div>      
 <!  <div class="col-md-6">
		
                       
		
		  <div class="panel-body">
                            <ul class="chat">
                               <?php foreach ($messages as $message): ?>
                                 		 <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="<?php echo base_url();?>assets/img/donut.png"> <alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?php echo $message['date_posted']?></small>
                                            <strong class="pull-left primary-font"><?php echo $message['sender_name']?> </strong>
                                        </div>
                                        <p>
                                        </p>
                                        <p>
                                            <?php echo $message['content'] ?> 
                                   </p>
                                    </div>
                                </li>
                                   <?php endforeach ?>  
                            </ul>
		  </div>
		
		<! <div class="panel panel-info">
                               
		<!--  <div class="panel-heading"> <h3 class="panel-title" id = "message" > User: <?php echo $message['sender']?> Posted: <?php echo $message['date_posted']?></h3>
		   
		  </div>
		  <div class="panel-body">
		    <?php echo $message['content'] ?> -->
		  </div> 
		</div>
   </div>
		
			    
		
	        
	        
	         <div class="col-md-4">
					<?php $attributes = array('id' =>'message_form','class' => 'form-horizontal'); ?>
					<?php echo form_open('forum/validate_message', $attributes); ?>
		
	         </div>
		
	         </div>
>>>>>>> origin/Sofias-gren-4
		<div class="row">
		        <div class="col-md-4">
		            <p class="lead">Answer on this thread</p>
		            
<<<<<<< HEAD
		        </div>
		    </div>

=======
	
		
>>>>>>> origin/Sofias-gren-4
					<!--Field: Topic-->
					<p>
					<?php echo form_label('Answer'); ?>
					<?php
					$data = array(
									'name' 			=> 'answer',
									'placeholder' 	=> 'Type your answer here',
									'style' 		=> 'width:100%',
									'rows'			=>	'5',
									'value'			=> set_value('topic')
									
								);
					?>
					<?php echo form_textarea($data); ?>
					
					<!--Display field errors-->
					<?php echo form_error('answer'); ?>
					</p>	
					
					<!-- -->
					<p>
					<?php echo form_hidden('slug', $slug); ?>
					</p>
								
								
								
					<!--Submit Buttons-->
					<?php $data = array(
											"value" => "Send",
											"name"	=> "submit", 
											"class"	=> "btn btn-primary"
										);
					?>
					</br>
					<?php echo form_submit($data); ?>
					</p>
					<?php echo form_close(); ?>
				</div><!--./col-md-6 -->                
	      
		    </div>
			
	        