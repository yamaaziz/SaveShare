<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
	
<!DOCTYPE html>
<html lang="en">
	<?php 
	if(isset($economy_info)){
	$economy = get_object_vars($economy_info);
	}?>
	<ul>
        <div class="panel panel-default">
            <div class="panel-heading"> Liabilities </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Liability Type</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if (!empty ($economy['housing_loan'])) {?>
                            	<tr>
                                	<td></td>
                                	<td>Housing Loan</td>
                                	<td><?php echo $economy['housing_loan']; ?></td>
                            	</tr>
                            <?php } ?>
                            <?php if (!empty ($economy['construction_loan'])) {?>
                            	<tr>
                                	<td></td>
                                	<td>Construction Loan</td>
                                	<td><?php echo $economy['construction_loan']; ?></td>
                            	</tr>
                            <?php } ?>
                            <?php if (!empty ($economy['private_loan'])) {?>
                            	<tr>
                                	<td></td>
                                	<td>Private Loan</td>
                                	<td><?php echo $economy['private_loan']; ?></td>
                            	</tr>
                            <?php } ?>
                            <?php if (!empty ($economy['student_loan'])) {?>
                            	<tr>
                                	<td></td>
                                	<td>Student Loan</td>
                                	<td><?php echo $economy['student_loan']; ?></td>
                            	</tr>
                            <?php } ?>
                            <?php if (!empty ($economy['senior_loan'])) {?>
                            	<tr>
                                	<td></td>
                                	<td>Senior Loan</td>
                                	<td><?php echo $economy['senior_loan']; ?></td>
                            	</tr>
                            <?php } ?>
                            <?php if (!empty ($economy['other_loan'])) {?>
                            	<tr>
                                	<td></td>
                                	<td>Other Loan</td>
                                	<td><?php echo $economy['other_loan']; ?></td>
                            	</tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </ul>
                <!-- /.table-responsive -->

