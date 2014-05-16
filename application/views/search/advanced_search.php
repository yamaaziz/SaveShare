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
            <div class="col-sm-3">
                <p class="lead">Enter your search</p>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <?php $attributes = array('id' => 'search_form', 'class' => 'form-horizontal'); ?>
                <?php echo form_open('search/validate_advanced_search', $attributes); ?>
                <!--Field: Total savings-->
                <p>
                    <?php echo form_label('Username'); ?>
                    <?php
                    $data = array(
                        'name' => 'username',
                        'placeholder' => 'Username',
                        'style' => 'width:100%',
                        'value' => set_value('username')
                    );
                    ?>
                    <?php echo form_input($data); ?>

                    <!--Display field errors-->
                    <?php echo form_error('username'); ?>
                </p>
                <!--Field: Gender-->
                <p>
                    <?php echo form_label('Gender'); ?>
                    <?php
                    $data = array(
                        'name' => 'gender',
                        'style' => 'margin:10px;'
                    );
                    ?>
                    <?php echo form_radio($data, 'male'); ?>
                    <?php echo 'Male' ?>
                    <?php echo form_radio($data, 'female'); ?>
                    <?php echo 'Female' ?>

                    <!--Display field errors-->
                    <?php echo form_error('gender'); ?>
                </p>
                <!--Field: Commodities-->
                <p>
                    <?php echo form_label('Birth year'); ?>
                    <?php
                    $data = array(
                        'name' => 'birth_year',
                        'placeholder' => 'Birth year',
                        'style' => 'width:100%',
                        'value' => set_value('birth_year')
                    );
                    ?>
                    <?php
                    $data = array(
                        '' => '',
                        '15-20' => '15-20',
                        '21-25' => '21-25',
                        '26-30' => '26-30',
                        '31-35' => '31-35',
                        '36-40' => '36-40',
                        '41-45' => '41-45',
                        '46-50' => '46-50',
                        '51-55' => '51-55',
                        '56-60' => '56-60',
                        '61-65' => '61-65',
                        '66-70' => '66-70',
                        '71-75' => '71-75',
                    );


                    echo form_dropdown('birth_year', $data);
                    ?>


                    <!--Display field errors-->
                    <?php echo form_error('birth_year'); ?>
                </p>
                <!--Field: City-->
                <p>
                    <?php echo form_label('City'); ?>
                    <?php
                    $data = array(
                        'name' => 'city',
                        'placeholder' => 'City',
                        'style' => 'width:100%',
                        'value' => set_value('city')
                    );
                    ?>
                    <?php echo form_input($data); ?>

                    <!--Display field errors-->
                    <?php echo form_error('city'); ?>
                </p>
                <!--Field: Occupation-->
                <p>
                    <?php echo form_label('Occupation'); ?>
                    <?php
                    $data = array(
                        'name' => 'occupation',
                        'placeholder' => 'Occupation',
                        'style' => 'width:100%',
                        'value' => set_value('occupation')
                    );
                    ?>
                    <?php echo form_input($data); ?>

                    <!--Display field errors-->
                    <?php echo form_error('occupation'); ?>
                </p>	

                <!--Submit Buttons-->
                <?php
                $data = array(
                    "value" => "Search",
                    "name" => "submit",
                    "class" => "btn btn-primary"
                );
                ?>
                </br>
                <?php echo form_submit($data); ?>
                </p>
                <?php echo form_close(); ?>
            </div><!--./col-md-6 -->
        </div><!--./row -->
    </div><!-- /.page-content inset -->
</div><!-- /.page-content-wrapper --> 