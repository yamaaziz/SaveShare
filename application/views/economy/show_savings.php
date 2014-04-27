<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!-- PHP Code Here -->
	<!-- START PAGE -->
	<?php
	if(isset($economy_info)){
	$economy = get_object_vars($economy_info);
	}?>
	<ul>
		<div class="panel panel-default">
			<div class="panel-heading">Savings</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th></th>
								<th>Savings Type</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty ($economy['funds'])) {?>
								<tr>
									<td></td>
									<td>Funds</td>
									<td><?php echo $economy['funds']; ?></td>
								</tr>
							<?php } ?>
							<?php if (!empty ($economy['shares'])) {?>
								<tr>
									<td></td>
									<td>Shares</td>
									<td><?php echo $economy['shares']; ?></td>
								</tr>
							<?php } ?>
							<?php if (!empty ($economy['bonds'])) {?>
								<tr>
									<td></td>
									<td>Bonds</td>
									<td><?php echo $economy['bonds']; ?></td>
								</tr>
							<?php } ?>
							<?php if (!empty ($economy['commodities'])) {?>
								<tr>
									<td></td>
									<td>Commodities</td>
									<td><?php echo $economy['commodities']; ?></td>
								</tr>
							<?php } ?>
							<?php if (!empty ($economy['saving_account'])) {?>
								<tr>
									<td></td>
									<td>Saving Account</td>
									<td><?php echo $economy['saving_account']; ?></td>
								</tr>
							<?php } ?>
							<?php if (!empty ($economy['properties'])) {?>
								<tr>
									<td></td>
									<td>Properties</td>
									<td><?php echo $economy['properties']; ?></td>
									</tr>
							<?php } ?>
							<?php if (!empty ($economy['other_savings'])) {?>
								<tr>
									<td></td>
									<td>Other Savings</td>
									<td><?php echo $economy['other_savings']; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div><!-- ./table-responsive -->	
			</div><!-- ./panel-body -->		
		</div><!--- ./panel-default -->	
	</ul>