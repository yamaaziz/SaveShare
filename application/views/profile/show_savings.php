<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<?php $economy = get_object_vars($economy_info);?>
	<ul>
        <div class="panel panel-default">
            <div class="panel-heading">
                Savings
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Savings Type</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Funds</td>
                                <td><?php echo $economy['funds']; ?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Shares</td>
                                <td><?php echo $economy['shares']; ?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Commodities</td>
                                <td><?php echo $economy['commodities']; ?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Saving Account</td>
                                <td><?php echo $economy['saving_account']; ?></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Properties</td>
                                <td><?php echo $economy['properties']; ?></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Other Savings</td>
                                <td><?php echo $economy['other_savings']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </ul>
