<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
<!-- START PAGE -->	  
<footer>
	<div id="footer">
		<hr>
		<p><a href="<?php echo base_url(); ?>contact">Contact</a></p>
	</div>
</footer>
</div> <!-- /.wrapper -->		

<!-- JavaScript -->
<!--<script src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>-->
<!--<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>-->
<!-- Latest compiled and minified jQuery -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script>window.jQuery || document.write('\x3Cscript src="<?php echo base_url(); ?>js/jquery-1.10.2.js">\x3C/script>');</script>

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!-- Custom JavaScript for the Menu Toggle -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
</script>
<!-- Custom JavaScript for Alert messages -->
<script>
    window.setTimeout(function()
    {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
<!-- Custom JavaScript for Live Search -->
<script type="text/javascript">
    function ajaxSearch() {
        var input_data = $('#search_data').val();
        if (input_data.length === 0) {
            $('#suggestions').hide();
        } else {

            var post_data = {
                'search_data': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>':
                        '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>search/autocomplete/",
                data: post_data,
                success: function(data) {
                    // return success
                    if (data.length > 0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').addClass('auto_list');
                        $('#autoSuggestionsList').html(data);
                    }
                }
            });

        }
    }
    function ajaxSearchMessage() {
        var input_data = $('#message_search').val();
        if (input_data.length === 0) {
            $('#suggestionsMessage').hide();
        } else {
            var post_data = {
                'message_search': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>':
                        '<?php echo $this->security->get_csrf_hash(); ?>'
            };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>search/autocompleteMessage/",
                data: post_data,
                success: function(data) {
                    // return success
                    if (data.length > 0) {
                        $('#suggestionsMessage').show();
                        $('#autoSuggestionsListMessage').addClass('auto_list_message');
                        $('#autoSuggestionsListMessage').html(data);
                    }
                }
            });
        }
    }
    function redisplaySearch() {
        var input_data = $('#search_data').val();
        if (input_data.length > 0) {
            $('#suggestions').show();
        }
    }
    function redisplaySearchMessage() {
        var input_data = $('#message_search').val();
        if (input_data.length > 0) {
            $('#suggestionsMessage').show();
        }
    }
    $(document).mouseup(function(e)
    {
        var container = $("#suggestions");

        if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0) // ... nor a descendant of the container
        {
            container.hide();
        }

        var containerMessage = $("#suggestionsMessage");

        if (!containerMessage.is(e.target) // if the target of the click isn't the container...
                && containerMessage.has(e.target).length === 0) // ... nor a descendant of the container
        {
            containerMessage.hide();
        }
    });
</script>
<!-- Custom JavaScript for Loading Conversations -->
<script type="text/javascript">
    $(document).ready(function() {
        var error_log = 'The DOM is now loaded and can be manipulated.';
        console.log(error_log);

        ajaxGetConversations();	//Will occure at document load
    });

    function ajaxGetConversations() {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>private_message/view_conversation",
            complete: function(){
            	getLastMessage()
            },
            success: function(data) {
                //console.log( data); //spionutskrift ta bort sen
                $('#conversation_list').append(data);
                //console.log(data);
            }
        });
	
	}
	function getLastMessage(){
		$( "div.header a" ).each(function( index )
        {
        	console.log( 'Username' + ": " + $( this ).text() + ' c_id = ' + $(this).data('c_id') + ' user_id = ' + $				(this).data('user_id') );
		});
	};
</script>
<!-- Custom JavaScript for Selecting Username in PM -->
<script type="text/javascript">
    function selectUsername() {
        $(document).ready(function() {
            $('#autoSuggestionsListMessage li a').click(function() {
                var username = $(this).html();
                var input = $('#message_search');
                var c_id = $(this).data('c_id');
                input.val(username);
                $("#suggestionsMessage").hide();
                var message_search = $("#message_search")[ 0 ];

                jQuery.data(message_search, "username", username);
                //console.log(username);
            });
        });
    }
</script>
<!-- Custom JavaScript for Getting Private Messages -->
<script type="text/javascript">
        $(document).on("click", '.conversation-body .header a', function(event) {
            //$( "#message_body" ).load( "<?php echo base_url() . 'private_message/view_message' ?>" );
            //var participant_b = $(this).html(); //name
            var c_id = $(this).data('c_id');  //userid
            var user_id = $(this).data('user_id');
            //console.log(participant_b);
            jQuery.data(document.body, "c_id", c_id);
            //console.log(c_id);
            jQuery.data(document.body, "user_id", user_id);
            ajaxIncomingMessage();
        });
        $(document).on('click','#btn-send', function(event){
        	ajaxOutgoingMessage();
        });
        $(document).keypress(function(e) {
        	
        	if(e.which == 13) {
        		var send_input = $('#btn-input').val();
        		if (typeof(send_input) != "undefined" && send_input !== null){
        			if(send_input.length > 0){
        				ajaxOutgoingMessage();
						//scrollDown();
        			}
				}
			}
		});
    function ajaxIncomingMessage() {
        //var error_log = 'view message on load';
        //console.log(error_log);

        var url_controller = document.location.href + '/view_message';
        var c_id = jQuery.data(document.body, 'c_id');

        $.ajax({
            type: 'POST',
            url: url_controller,
            data: {c_id: c_id
            },
            complete: function(){
	             scrollDown();
            },
            success: function(data) {
                $("#message_body").html(data);
                //console.log(data);
                //$("#chat_body").append('message');
            }

        });
    }
    ;
    function ajaxOutgoingMessage() {
		var url_controller = document.location.href + '/send_message';
		var content = $('#btn-input').val();
		var c_id = jQuery.data(document.body, 'c_id');
		var recipient = jQuery.data(document.body, 'user_id');
		//console.log(messageOut);
		//console.log(participant_b);
        $.ajax({
            type: 'POST',
            url: url_controller,
            data: {content: content,
            	   c_id: c_id,
            	   recipient:recipient
            },
            complete: function(){
	            	ajaxIncomingMessage();
            },
            success: function(data) {
                //console.log(data);
                //$("#chat_body").append(data);
                //console.log(data);
            }
            

        });
    }
    function scrollDown(){
    	var window = document.getElementsByClassName("panel-body")[1];
        window.scrollTop = window.scrollHeight;
        //console.log(window)
			
    }
    ;
</script>
<!-- Custom JavaScript for New Message Button in PM -->
<script type="text/javascript">
    function newMessage() {
        $(document).ready(function() {
            var username = jQuery.data(message_search, 'username');
            var c_id = jQuery.data(document.body, 'c_id');
            var url_controller = document.location.href + '/initiate_conversation'

            $.ajax({
                type: 'POST',
                url: url_controller,
                data: {
                    participant_b: username
                },
                success: function(data) {
                    //console.log(data); //spionutskrift. ta bort sen.

                    $('#conversation_list').append(data);
                }
            });
        });
    }
</script>

</body>
</html>