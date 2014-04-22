<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- PHP Code Here -->
	<!-- START PAGE -->	  
		<footer>
			<div id="footer">
				<hr>
				<h6><a href="<?php echo base_url();?>about">About</a>
				<a href="<?php echo base_url();?>contact">Contact</a></h6>
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
	</body>
	
</html>