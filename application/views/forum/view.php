  <div id="page-content-wrapper">
	        <div class="content-header">
<?php
echo '<h2>'.$news_item['topic'].'</h2>';
//echo $news_item['creator_id'];
$topic_id = $news_item['t_id'];
//echo $slug;
?>

	        </div>    	        	
  </div>
  
		 <?php foreach ($messages as $message): ?>
		
		<div class="panel panel-info">
		  <div class="panel-heading"> <h3 class="panel-title" id = "message" > User: <?php echo $message['sender'] ?> Date posted: <?php echo $message['date_posted']?></h3>
		   
		  </div>
		  <div class="panel-body">
		    <?php echo $message['content'] ?>
		  </div>
		</div>
			    
		   <?php endforeach ?>  
	        
	        
	         <div class="col-md-6">
					<?php $attributes = array('id' =>'message_form','class' => 'form-horizontal'); ?>
					<?php echo form_open('forum/validate_message', $attributes); ?>
		
	
		
		
		<div class="row">
		        <div class="col-md-6">
		            <p class="lead">Answer on this thread</p>
		            
		        </div>
		    </div>
			
		
					<!--Field: Topic-->
					<p>
					<?php echo form_label('Answer'); ?>
					<?php
					$data = array(
									'name' 			=> 'answer',
									'placeholder' 	=> 'Type your answer here...',
									'style' 		=> 'width:100%',
									'value'			=> set_value('topic')
								);
					?>
					<?php echo form_input($data); ?>
					
					<!--Display field errors-->
					<?php echo form_error('answer'); ?>
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

	        