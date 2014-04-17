<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<?php $economy = get_object_vars($economy_info);?>
	<ul>
        <div class="panel panel-default">
            <div class="panel-heading">
                Liabilities
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Liability Type</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Housing loan</td>
                                <td><?php echo $economy['housing_loan']; ?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Construction loan</td>
                                <td><?php echo $economy['construction_loan']; ?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Private loan</td>
                                <td><?php echo $economy['private_loan']; ?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Student loan</td>
                                <td><?php echo $economy['student_loan']; ?></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Senior loan</td>
                                <td><?php echo $economy['senior_loan']; ?></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Other loan</td>
                                <td><?php echo $economy['other_liabilities']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </ul>
                <!-- /.table-responsive -->

