<?php
/**
 * @file starter.php
 * 
 * @description Template file for testimonial
 * 
 *  */
// Security Check
if (!defined('ABSPATH')) die();

wp_enqueue_style('wpb-transitional-style');
wp_enqueue_script('wpb-transitional-script');

global $gb_mega_testimonial;
$group_id = $gb_mega_testimonial->shortcode_data['group_id'];
?>

<div class="container-fluid">
    <div class="row">
        <!-- Basic Slider Design -->

        <div id="tcb-testimonial-carousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                $args = array(
                    'post_type' => 'custom_posts',
                    'posts_per_page' => 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'group',
                            'terms' => $group_id
                        ),
                    ),
                );
                $group_query = new WP_Query($args);
                if ($group_query->have_posts()) {
                    while ($group_query->have_posts()) {
                        $group_query->the_post();
                        $postID = $group_query->post->ID;
                        ?>
                        <div class="item active">
                            <div class="row">
                                <div class="col-xs-12">
                                    <figure class="clearfix">
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_fimage'])) echo the_post_thumbnail() ?>
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <figcaption class="caption">
                                                <p class="text-brand lead no-margin"><?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_title'])) the_title()  ?></p>
                                                <p><?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_desc'])) echo '<span class="glyphicon glyphicon-thumbs-up"></span> '. get_the_content() ?></p>
                                                <blockquote class="no-margin">
                                                    <p><?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_author'])) echo get_post_meta($postID, 'profile_name', true); ?></p>
                                                </blockquote>
                                                <blockquote class="no-margin">
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_job'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-briefcase"></i> '. get_post_meta($postID, 'profile_job_desc', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_company'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-list-alt"></i> '. get_post_meta($postID, 'profile_company', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_location'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i> '. get_post_meta($postID, 'profile_location', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_email'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-envelope"></i> '. get_post_meta($postID, 'profile_email', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_url'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-link"></i> '. get_post_meta($postID, 'profile_url', true) .'</cite></small></h5>'; ?>
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
                        <i class="fa fa-info-circle"></i> <strong>Sorry!</strong> No Group Has Been Created Or No Testimonial Has Been Assigned to Any of the Group. Please 
                        Create Your Testimonial Group First Or Assign Testimonials To The Groups ! 
                    </div>
                    <?php
                }
                wp_reset_query();
                ?>
                <?php
                $post_count = $group_query->post_count;
                $args = array(
                    'post_type' => 'custom_posts',
                    'posts_per_page' => $post_count,
                    'nopaging' => true,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'group',
                            'terms' => $group_id
                        ),
                    ),
                );
                $group_query = new WP_Query($args);
                if ($group_query->have_posts()) {
                    while ($group_query->have_posts()) {
                        $group_query->the_post();
                        $postID = $group_query->post->ID;
                        ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12">
                                    <figure class="clearfix">
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_fimage'])) echo the_post_thumbnail() ?>
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <figcaption class="caption">
                                                <p class="text-brand lead no-margin"><?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_title'])) the_title()  ?></p>
                                                <p><?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_desc'])) echo '<span class="glyphicon glyphicon-thumbs-up"></span> '. get_the_content() ?></p>
                                                <blockquote class="no-margin">
                                                    <p><?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_author'])) echo get_post_meta($postID, 'profile_name', true); ?></p>
                                                </blockquote>
                                                <blockquote class="no-margin">
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_job'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-briefcase"></i> '. get_post_meta($postID, 'profile_job_desc', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_company'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-list-alt"></i> '. get_post_meta($postID, 'profile_company', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_location'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i> '. get_post_meta($postID, 'profile_location', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_email'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-envelope"></i> '. get_post_meta($postID, 'profile_email', true) .'</cite></small></h5>'; ?>
                                                    <?php if(isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_url'])) echo '<h5><small><cite title="Source Title"><i class="glyphicon glyphicon-link"></i> '. get_post_meta($postID, 'profile_url', true) .'</cite></small></h5>'; ?>
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
        </div>
    </div>
</div>
