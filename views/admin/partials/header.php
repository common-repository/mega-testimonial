<?php
/**
 * 
 * @file header.php
 * @description Header section for the admin page
 * */
// Security Check
if (!defined('ABSPATH'))
    die();

global $gb_mega_testimonial;

wp_enqueue_style('wpb-admin-style');
wp_enqueue_style('wpb-bootstrap-material-theme-style');
wp_enqueue_script('wpb-admin-script');
wp_enqueue_script('wpb-mbd-main-script');
wp_enqueue_script('wpb-tether-main-script');
?>
<div style="margin-top: -30px;margin-bottom: 20px" class='col-md-12'>
    <div class="row">
        <div class="col-md-6">
            <h3><strong>Testimonial Settings</strong></h3>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
    
</div>
