<?php
/**
 * @file basic_slide.php
 * 
 * @description Template file for testimonial
 * 
 * */
// Security Check
if (!defined('ABSPATH')) die();

wp_enqueue_style('wpb-transitional-style');
wp_enqueue_script('wpb-transitional-script');

global $gb_mega_testimonial;

?>

<div class="container-fluid">

    <!-- Basic Slider Design -->
    <div class="row">
        <div id="tcb-testimonial-carousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                $args = array(
                    'post_type' => 'custom_posts',
                    'posts_per_page' => 1
                );
                $testgimonials = new WP_Query($args);

                if ($testgimonials->have_posts()) {
                    while ($testgimonials->have_posts()) {
                        $testgimonials->the_post();
                        $postID = $testgimonials->post->ID;
                        $count = $testgimonials->post_count;
                        ?>
                        <div class="item active">
                            <div class="row">
                                <div class="col-xs-12">
                                    <figure class="clearfix">
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                           <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_fimage'])) echo the_post_thumbnail() ?>
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <figcaption class="caption">
                                                <p class="text-brand lead no-margin"><?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_title'])) the_title() ?></p>
                                                <p><?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_desc'])) echo '<span class="glyphicon glyphicon-thumbs-up"></span> '. get_the_content() ?></p>
                                                <blockquote class="no-margin">
                                                    <p><?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_author'])) echo get_post_meta($postID, 'profile_name', true); ?></p>
                                                </blockquote>
                                                <blockquote class="no-margin">
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_job'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-briefcase"></i> '. get_post_meta($postID, 'profile_job_desc', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_company'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-list-alt"></i> '.get_post_meta($postID, 'profile_company', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_location'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i> '. get_post_meta($postID, 'profile_location', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_email'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-envelope"></i> '. get_post_meta($postID, 'profile_email', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_url'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-link"></i> '. get_post_meta($postID, 'profile_url', true) .'</cite></small></h5>'; ?>
                                                </blockquote>
                                            </figcaption>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div style="max-width: 50%; margin: 0 auto" class="alert alert-warning">
                        <i class="fa fa-info-circle"></i> <strong>Sorry!</strong> No Testimonial Has Been Created Yet. Please 
                        Create Your Testimonials From The Admin Panel First ! 
                    </div>
                    <?php
                }
                wp_reset_query();
                ?>
                <?php
                $count = count(get_posts('custom_posts'));
                $args = array(
                    'post_type' => 'custom_posts',
                    'posts_per_page' => $count,
                    'offset' => 1
                );
                $testgimonials = new WP_Query($args);

                if ($testgimonials->have_posts()) {
                    while ($testgimonials->have_posts()) {
                        $testgimonials->the_post();
                        $postID = $testgimonials->post->ID;
                        ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12">
                                    <figure class="clearfix">
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_fimage'])) echo the_post_thumbnail() ?>
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <figcaption class="caption">
                                                <p class="text-brand lead no-margin"><?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_title'])) the_title()  ?></p>
                                                <p><?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_desc'])) echo '<span class="glyphicon glyphicon-thumbs-up"></span> '. get_the_content() ?></p>
                                                <blockquote class="no-margin">
                                                    <p><?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_author'])) echo get_post_meta($postID, 'profile_name', true); ?></p>
                                                </blockquote>
                                                <blockquote class="no-margin">
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_job'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-briefcase"></i> '. get_post_meta($postID, 'profile_job_desc', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_company'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-list-alt"></i> '. get_post_meta($postID, 'profile_company', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_location'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i> '. get_post_meta($postID, 'profile_location', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_email'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-envelope"></i> '. get_post_meta($postID, 'profile_email', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_url'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-link"></i> '. get_post_meta($postID, 'profile_url', true) .'</cite></small></h5>'; ?>
                                                </blockquote>
                                            </figcaption>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                wp_reset_query();
                ?>

            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#tcb-testimonial-carousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
            <a class="right carousel-control" href="#tcb-testimonial-carousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
        </div>
    </div>
    <!-- Basic Slider Design End-->
</div>

<script>
    < script type = "text/javascript" >
            jQuery(document).ready(function ($) {
        $('.carousel').carousel({
            interval: 2000
        })
    });
</script>
