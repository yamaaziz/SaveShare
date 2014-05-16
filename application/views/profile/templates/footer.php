<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->	  
		<footer>
			<div id="footer">
				<hr>
				<p><a href="#">Contact</a></p>
			</div>
		</footer>
		</div> <!-- /.wrapper -->		
	
	    <!-- JavaScript -->
	    <!--<script src="<?php echo base_url();?>js/jquery-1.10.2.js"></script>-->
	    <!--<script src="<?php echo base_url();?>js/bootstrap.js"></script>-->
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
	    	$(".alert").fadeTo(500, 0).slideUp(500, function(){
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
	        function redisplaySearch(){
	        	var input_data = $('#search_data').val();
	        	if (input_data.length > 0) {
		        	$('#suggestions').show();
	        	}
		        
	        }
			$(document).mouseup(function (e)
			{
			    var container = $("#suggestions");
			
			    if (!container.is(e.target) // if the target of the click isn't the container...
			        && container.has(e.target).length === 0) // ... nor a descendant of the container
			    {
			        container.hide();
			    }
			});
		</script>
		<!-- Custom JavaScript for Private Messages -->
		<script type="text/javascript">
		$(function(){
			$('#jack').click(function(){
				$( "#chat_body" ).load( "<?php echo site_url('private_message/view_message') ?>" );
			})
		})
		</script>
	</body>
</html>