<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<?php $economy = get_object_vars($economy_info); ?>

<p class="lead"> Liabilities Chart</p>
							<div id="liabilities_chart" style="height: 350px;"></div>
							<?php
							if(isset($economy_info))
							{
							$total_lias = $economy['housing_loan']+$economy['construction_loan']+
							$economy['private_loan']+$economy['student_loan']+$economy['senior_loan']+
							$economy['other_loan'];
							}
							?>
								<script>
									new Morris.Donut({
										element: 'liabilities_chart',
										data: [
										<?php if (!empty ($economy['housing_loan'])) {?>
										{
											label: "Housing Loan",
											value: <?php echo round(($economy['housing_loan']/$total_lias)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['construction_loan'])) {?>
										{
											label: "Construction Loan",
											value: <?php echo round(($economy['construction_loan']/$total_lias)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['private_loan'])) {?>
										{
											label: "Private Loan",
											value: <?php echo round(($economy['private_loan']/$total_lias)*100);?>
										},
										<?php } ?>
										<?php if (!empty ($economy['student_loan'])) {?>
										{
											label: "Student Loan",
											value: <?php echo round(($economy['student_loan']/$total_lias)*100); ?>
											},
										<?php } ?>
										<?php if (!empty ($economy['senior_loan'])) {?>
										{
											label: "Senior Loan",
											value: <?php echo round(($economy['senior_loan']/$total_lias)*100); ?>
										},
										<?php } ?>
										<?php if (!empty ($economy['other_loan'])) {?>
										{
											label: "Other Loan",
											value: <?php echo round(($economy['other_loan']/$total_lias)*100);?>
										}
										<?php } ?>
										],
										resize: true,
										formatter: function (x, data) { return x + "%"; }
									});
								</script>