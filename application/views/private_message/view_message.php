<div class="chat-panel panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-comments fa-fw"></i>
        Messages
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="chat">
        <?php $me = $this->session->userdata('user_id'); ?>
        <?php foreach ($messages->result() as $row): ?>
        	<?php if(($row->sender) == $me){ ?>
				<li class="right clearfix">
		                <span class="chat-img pull-right">
		                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
		                </span>
		                <div class="chat-body clearfix">
		                    <div class="header">
		                    	<small class="text-muted">
		                            <i class="fa fa-clock-o fa-fw"></i> <?php echo ($row->date_posted) ?>
		                        </small>
		                        <strong class="pull-right primary-font"><?php echo ucfirst($this->account_model->get_username($row->sender)); ?></strong> 
		                    </div>
		                    <p>
		                    <?php echo $row->content; ?>
		                    </p>
		                </div>
		            </li>
			<?php }
				else{ ?>
					<li class="left clearfix">
		                <span class="chat-img pull-left">
		                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
		                </span>
		                <div class="chat-body clearfix">
		                    <div class="header">
		                        <strong class="primary-font"><?php echo ucfirst($this->account_model->get_username($row->sender)); ?></strong> 
		                        <small class="pull-right text-muted">
		                            <i class="fa fa-clock-o fa-fw"></i> <?php echo ($row->date_posted) ?>
		                        </small>
		                    </div>
		                    <p>
		                    <?php echo $row->content; ?>
		                    </p>
		                </div>
		            </li>
			 <?php } ?>
			
            <?php endforeach; ?>
		</ul>
    </div>
    <!-- /.panel-body -->
    <div class="panel-footer">
        <div class="input-group">
            <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
            <span class="input-group-btn">
                <button class="btn btn-warning btn-sm" id="btn-send">
                    Send
                </button>
            </span>
        </div>
    </div>
    <!-- /.panel-footer -->
</div>
<!-- /.panel .chat-panel -->