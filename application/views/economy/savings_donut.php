<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<?php $economy = get_object_vars($economy_info); ?>

						<p class="lead" >Savings Chart</p>		
							<div id="savings_chart" style="height: 350px;"></div>
							<?php 
							if(isset($economy_info))
							{
							$total_savings = $economy['funds']+
							$economy['shares']+$economy['bonds']+$economy['commodities']+
							$economy['saving_account']+$economy['properties']+$economy['other_savings'];
							}
							?>
							<script>
								new Morris.Donut({
									element: 'savings_chart',
									data: [
										<?php if (!empty ($economy['funds'])) {?>
										{
											label: "Funds",
											value: <?php echo round(($economy['funds']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['shares'])) {?>
										{
											label: "Shares",
											value: <?php echo round(($economy['shares']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['bonds'])) {?>
										{
											label: "Bonds",
											value: <?php echo round(($economy['bonds']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['commodities'])) {?>
										{
											label: "Commodities",
											value: <?php echo round(($economy['commodities']/$total_savings)*100); ?>
											},
										<?php } ?>
										<?php if (!empty ($economy['saving_account'])) {?>
										{
											label: "Saving Account",
											value: <?php echo round(($economy['saving_account']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['properties'])) {?>
										{
											label: "Properties",
											value: <?php echo round(($economy['properties']/$total_savings)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['other_savings'])) {?>
										{
											label: "Other Savings",
											value: <?php echo round(($economy['other_savings']/$total_savings)*100); ?>
										}
										<?php } ?>
										],
										resize: true,
										formatter: function (x, data) { return x + "%"; }
									});
							</script>