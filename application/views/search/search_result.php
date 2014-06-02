<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!-- PHP Code Here -->
<!-- START PAGE -->
<!-- Page content -->
<?php $session_data = $this->session->all_userdata(); ?>
<div id="page-content-wrapper">
    <div class="content-header">
        <h1>
            <a id="menu-toggle" href="#" class="btn btn-default"> </a>
            Advanced Search
        </h1>	            
    </div><!-- content-header-->
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-6">
                <p class="lead">Search Results</p>     
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Occupation</th>
                                <th>Income</th>
                            </tr>
                        </thead>
                        <tbody>
                        
					<!--Load all privacy arrays and put them in one array-->
                        	<?php $privacy_combination = array(); ?>
                        	<?php $index = 0; ?>
                			<?php foreach (range(0, count($user_info)-1) as $whatever) { ?>
                			<?php $privacy_y = 'privacy'. $index; ?>
                			<?php $index = $index + 1; ?>
                			<?php array_push($privacy_combination, get_object_vars($$privacy_y)); ?>
                			<?php } ?>
                			
                	<!--Merge the privacy info with the user info about the hits from the search-->
                			<?php $result = array_merge($user_info, $privacy_combination); ?>
                			
                	<!--Display search results-->
                        	<?php $index_users = 0; ?>
                        	<?php $index_privacy = count($result)/2; ?>
                            <?php foreach (range(0, count($result)/2-1) as $row) { ?>
                                <tr>
                                
                            <!--Conditions for only showing those that have chosen to display their information -->
                                <?php if ($result[$index_users]['birth_year'] != 'hide' && $result[$index_users]['gender'] != 'hide' && $result[$index_users]['city'] != 'hide' && $result[$index_users]['occupation'] != 'hide' && $result[$index_users]['income'] != 'hide') { ?>
                                    <td><a href="<?php echo base_url() . 'profile/' . $row['username']; ?>" >
                                            <?php echo ucfirst($result[$index_users]['username']); ?>
                                        </a></td>
                                        
                                <!--Conditions for showing age-->
                                    <?php if (empty($result[$index_users]['birth_year'])) { ?>
                                        <td></td>
                                    <?php } else { ?>
                                    	<?php if ($result[$index_privacy]['p_age'] == 2) { ?>
                                        <td><?php echo date("Y") - $result[$index_users]['birth_year']; ?></td>
                                         <?php } elseif ($result[$index_privacy]['p_age'] == 1) { ?>
                                         <td></td>
                                         <?php } else { ?>
                                         <td></td>
                                    	<?php } ?>
                                    <?php } ?>
                                    
                                <!--Conditions for showing gender-->
                                    <?php if ($result[$index_privacy]['p_gender'] == 2) { ?>
                                    <td><?php echo ucfirst($result[$index_users]['gender']); ?></td>
                                    <?php } elseif ($result[$index_privacy]['p_gender'] == 1) { ?>
                                    <td></td>
                                    <?php } ?>
                
                                <!--Conditions for showing city-->
                                    <?php if ($result[$index_privacy]['p_city'] == 2) { ?>
                                    <td><?php echo ucfirst($result[$index_users]['city']); ?></td>
                                    <?php } elseif ($result[$index_privacy]['p_city'] == 1) { ?>
                                    <td></td>
                                    <?php } ?>
                
                                <!--Conditions for showing occupation-->
                                    <?php if ($result[$index_privacy]['p_occupation'] == 2) { ?>
                                    <td><?php echo ucfirst($result[$index_users]['occupation']); ?></td>
                                    <?php } elseif ($result[$index_privacy]['p_occupation'] == 1) { ?>
                                    <td></td>
                                    <?php } ?>
                
                                 <!--Conditions for showing income-->
                                    <?php if ($result[$index_privacy]['p_income'] == 2) { ?>
                                    <td><?php echo ucfirst($result[$index_users]['income']); ?></td>
                                    <?php } elseif ($result[$index_privacy]['p_income'] == 1) { ?>
                                    <td></td>
                                    <?php } ?>
                                </tr>
                            	<?php } ?>
                            	<?php $index_users = $index_users + 1; ?>
                            	<?php $index_privacy = $index_privacy + 1; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->	   

        <div class = "row">
            <div class="col-lg-6" >
                <p>
                    <a href="<?php echo base_url(); ?>search/advanced_search">
                        <large><em>Search again</em></large> <i class="fa fa-angle-right"></i>
                    </a></p>
            </div>
        </div>
    </div><!-- /.page-content inset -->
</div>