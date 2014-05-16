<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!-- PHP Code Here -->
<!-- START PAGE -->
<!-- Page content -->
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
                            <?php foreach ($user_info as $row): ?>
                                <tr> 
                                    <td><a href="<?php echo base_url() . 'profile/' . $row['username']; ?>" >
                                            <?php echo $row['username']; ?>
                                        </a></td>
                                    <?php if (empty($row['birth_year'])) { ?>
                                        <td></td>
                                    <?php } else { ?>
                                        <td><?php echo date("Y") - $row['birth_year']; ?></td>
                                    <?php } ?>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['occupation']; ?></td>
                                    <td><?php echo $row['income']; ?></td>
                                </tr>
                            <?php endforeach ?>
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