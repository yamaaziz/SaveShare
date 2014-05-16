<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
<!-- START PAGE -->
<!-- Page content -->
<div id="page-content-wrapper">
    <div class="content-header">
        <h1>
            <a id="menu-toggle" href="#" class="btn btn-default"> </a>
            Private Message
        </h1>	            
    </div><!-- content-header-->
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <div class="row">
            <div class="col-lg-12">
                <p class="lead">Your Private Messages</p>
            </div>
        </div>
        <div class ="row">
            <div class="col-lg-4">
                <div class="conversation-panel panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-comments fa-fw"></i>
                        Conversations
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="conversation">
                            <li class="left clearfix">
                                <div class="conversation-body clearfix">
                                    <div class="header">
                                        <a href="#" id="jack"><strong class="primary-font">Jack Sparrow</strong></a> 
                                        <small class="pull-right text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                        </small>
                                    </div>
                                    text
                                </div>
                            </li>
                            <li class="right clearfix">
                                <div class="conversation-body clearfix">
                                    <div class="header">
                                    <strong class="primary-font">Bhaumik Patel</strong>
                                        <small class="pull-right text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>  
                                    </div>
                                    <p>text2</p>
                                </div>
                            </li>
                            <li class="left clearfix">
                                <div class="conversation-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Jack Sparrow</strong> 
                                        <small class="pull-right text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                    </div>
                                    <p>text 3 </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <div class="conversation-body clearfix">
                                    <div class="header">
                                    	<strong class="primary-font">Bhaumik Patel</strong>
                                        <small class="pull-right text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                    </div>
                                    <p>text 4</p>
                                </div>
                            </li>
							<li class="right clearfix">
                                <div class="conversation-body clearfix">
                                    <div class="header">
                                    	<strong class="primary-font">Bhaumik Patel</strong>
                                        <small class="pull-right text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                    </div>
                                    <p>text 4</p>
                                </div>
                            </li>
							<li class="right clearfix">
                                <div class="conversation-body clearfix">
                                    <div class="header">
                                    	<strong class="primary-font">Bhaumik Patel</strong>
                                        <small class="pull-right text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                    </div>
                                    <p>text 4</p>
                                </div>
                            </li>
							<li class="right clearfix">
                                <div class="conversation-body clearfix">
                                    <div class="header">
                                    	<strong class="primary-font">Bhaumik Patel</strong>
                                        <small class="pull-right text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                    </div>
                                    <p>text 4</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.panel-body -->
                    <div class="panel-footer">
                    </div>
                    <!-- /.panel-footer -->
                </div>
                <!-- /.panel .chat-panel -->
            </div>
            <div class="col-lg-8">
                <div class="chat-panel panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-comments fa-fw"></i>
                        Messages
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="chat" id="chat_body">
						</ul>
                    </div>
                    <!-- /.panel-body -->
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                            <span class="input-group-btn">
                                <button class="btn btn-warning btn-sm" id="btn-chat">
                                    Send
                                </button>
                            </span>
                        </div>
                    </div>
                    <!-- /.panel-footer -->
                </div>
                <!-- /.panel .chat-panel -->
            </div>
        </div>

    </div><!-- /.page-content inset -->
</div><!-- /.page-content-wrapper --> 
