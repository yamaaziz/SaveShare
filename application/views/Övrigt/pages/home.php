	<!-- Keep all page content within the page-content inset div! -->
	<div class="page-content inset">
	    <div class="row">
	        <div class="col-md-12">
	            <p class="lead">The Home Page</p>
	        </div>
	        <div class="col-md-6">
	            <p class="well">The template still uses the default Bootstrap rows and columns.</p>
	            	<canvas id="canvas" height="300" width="300"></canvas>
						<script>
					
							var pieData = [
									{
										value: 30,
										color:"#F38630"
									},
									{
										value : 50,
										color : "#E0E4CC"
									},
									{
										value : 100,
										color : "#69D2E7"
									}
								
								];
					
							var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
						
						</script>
	
	        </div>
	        <div class="col-md-6">
	            <p class="well">But the full-width layout means that you wont be using containers.</p>
	        </div>
	        <div class="col-md-4">
	            <p class="well">Three Column Example</p>
	        </div>
	        <div class="col-md-4">
	            <p class="well">Three Column Example</p>
	        </div>
	        <div class="col-md-4">
	            <p class="well">You get the idea! Do whatever you want in the page content area!</p>
	        </div>
	    </div><!-- /.row -->
	</div><!-- /.page-content inset -->
	</div><!-- /.page-content-wrapper -->     
	
