<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Save Share 2014 -->
<!-- PHP Code Here -->
<!-- HOME PAGE -->
<!-- Page content -->
<div id="page-content-wrapper">
    <div class="content-header">
        <h1>
            <a id="menu-toggle" href="#" class="btn btn-default"> </a>
            Home
        </h1>	            
    </div><!-- content-header-->
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <?php
                //Sign in success
                if ($this->session->flashdata('sign_in_succeeded')) {
                    echo '<div class="alert alert-success alert-dismissable">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<strong>' . $this->session->flashdata('sign_in_succeeded') . '</strong>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Hello!</h1>
                    <p>Start save for your future! Keep track of your money and start learning how others save. Add your economy and see how your assets are divided. Discuss with others about economy! </p>
                  <!--  <p><a class="btn btn-primary btn-lg" role="button">Learn more</a> -->
                    </p>
                </div>
            </div>
            <!-- /.col-lg-12 -->
            <!-- /.row -->
            <!-- Feedzilla Widget BEGIN -->
            <div class="col-md-6">
                <div class="feedzilla-news-widget feedzilla-6631863799411803" style="width:250px; padding: 0; text-align: center; font-size: 15px; border: 0;">
                    <script type="text/javascript" src="http://widgets.feedzilla.com/news/iframe/js/widget.js"></script>
                    <script type="text/javascript">
                        new FEEDZILLA.Widget({
                            style: 'slide-top-to-bottom',
                            culture_code: 'en_us',
                            c: '22',
                            sc: '-',
                            contentLinkColor: '#2e282e',
                            title: 'Business',
                            caption: 'All',
                            order: 'relevance',
                            count: '20',
                            w: '500',
                            h: '400',
                            timestamp: 'true',
                            scrollbar: 'true',
                            theme: 'start',
                            className: 'feedzilla-6631863799411803'
                        });
                    </script><br />
                </div>
            </div><!-- /.col-lg-6 -->
            <!-- Feedzilla Widget END -->
        </div><!--./row -->
    </div><!-- /.page-content inset -->
</div><!-- /.page-content wrapper -->