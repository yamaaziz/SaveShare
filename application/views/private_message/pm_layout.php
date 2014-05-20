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
							<div class="input-group" id="new_message_input_group">
		                    <input name="message_search" id="message_search" type="text" class="form-control-custom input-sm"								placeholder="Username" autocomplete="off" onkeyup="ajaxSearchMessage();" 												onmousedown="redisplaySearchMessage();" 																				onmouseup="redisplaySearchMessage();" 																					onclick="redisplaySearchMessage();">
									<div id="suggestionsMessage">
										<div id="autoSuggestionsListMessage" onclick="selectUsername();">
										</div>
									</div>
	                            <span class="input-group-btn">
	                                <button class="btn btn-primary btn-sm" id="new_message_button" 															onclick="newMessage();">
	                                <i class="fa fa-plus">
	                                  New Message
	                                </i></button>
	                            </span>
	                        </div>
                    </div>
                    
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="conversation" id='conversation_list'>
                        </ul>
                    </div>
                    <!-- /.panel-body -->
                    <div class="panel-footer">
                    </div>
                    <!-- /.panel-footer -->
                </div>
                <!-- /.panel .chat-panel -->
            </div>
            <div class="col-lg-8" id="message_body">

            </div>
        </div>

    </div><!-- /.page-content inset -->
</div><!-- /.page-content-wrapper --> 
