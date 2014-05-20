<div class="chat-panel panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-comments fa-fw"></i>
        Username
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="chat">
        <?php $me = $this->session->userdata('user_id)'); ?>
        <?php foreach ($messages->result() as $row): ?>
        	<?php if($me == ($row->sender)){ ?>
				<li class="right clearfix">
		                <span class="chat-img pull-right">
		                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
		                </span>
		                <div class="chat-body clearfix">
		                    <div class="header">
		                        <strong class="primary-font">Jack Sparrow</strong> 
		                        <small class="pull-left text-muted">
		                            <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
		                        </small>
		                    </div>
		                    <p>
		                    <?php echo $row->content; ?>
		                    </p>
		                </div>
		            </li>
			<?php } ?>
			<?php echo var_dump($messages->result()) ?>
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