<?php
/**
 * @file fade_slide.php
 * 
 * @description Template file for testimonial
 * 
 *  */
// Security Check
if (!defined('ABSPATH')) die();

wp_enqueue_style('wpb-fade-style');
wp_enqueue_script('wpb-fade-script');

global $gb_mega_testimonial;
?>

<div class="container-fluid">
    <!-- Basic Slider Design -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
            <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="5000">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php
                    $args = array(
                        'post_type' => 'custom_posts',
                        'posts_per_page' => 1
                    );
                    $products = new WP_Query($args);

                    if ($products->have_posts()) {
                        while ($products->have_posts()) {
                            $products->the_post();
                            $postID = $products->post->ID;
                            $count = $products->post_count;
                            ?>
                            <div class="active item">
                                <div class="profile-circle">
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_fimage'])) echo the_post_thumbnail('thumbnail') ?>
                                </div>
                                <blockquote>
                                    <p style="text-align: center;margin-top: 5px" class="text-brand lead no-margin"><?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_title'])) the_title() ?></p>
                                    <p><?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_desc'])) echo '<span class="glyphicon glyphicon-thumbs-up"></span> ' . get_the_content() ?></p>
                                </blockquote>
                                <div style="margin-top: -20px">
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_author'])) echo '<h3 style="text-align:center"><strong> ' . get_post_meta($postID, 'profile_name', true) . '</strong></h3>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_job'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-briefcase"></i> ' . get_post_meta($postID, 'profile_job_desc', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_company'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-list-alt"></i> ' . get_post_meta($postID, 'profile_company', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_location'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i> ' . get_post_meta($postID, 'profile_location', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_email'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-envelope"></i> ' . get_post_meta($postID, 'profile_email', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_url'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-link"></i> ' . get_post_meta($postID, 'profile_url', true) . '</city></small></h4>'; ?>
                                </div>
                            </div>

                            <?php
                        }
                    } else {
                        ?>
                        <div style="max-width: 80%; margin: 0 auto" class="alert alert-warning">
                            <i class="fa fa-info-circle"></i> <strong>Sorry!</strong> No Testimonial Has Been Created Yet. Please 
                            Create Your Testimonials From The Admin Panel First !
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    $count = count(get_posts('custom_posts'));
                    $args = array(
                        'post_type' => 'custom_posts',
                        'posts_per_page' => $count,
                        'offset' => 1
                    );
                    $products = new WP_Query($args);

                    if ($products->have_posts()) {
                        while ($products->have_posts()) {
                            $products->the_post();
                            $postID = $products->post->ID;
                            ?>
                            <div class="item">
                                <div class="profile-circle">
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_fimage'])) echo the_post_thumbnail('thumbnail') ?>
                                </div>

                                <blockquote>
                                    <h3 style="text-align: center;margin-top: 5px" class="text-brand lead no-margin"><?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_title'])) the_title() ?></h3>
                                    <p><?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_desc'])) echo '<span class="glyphicon glyphicon-thumbs-up"></span> ' . get_the_content() ?></p>
                                </blockquote>
                                <div style="margin-top: -20px">
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_author'])) echo '<h3 style="text-align:center"><strong> ' . get_post_meta($postID, 'profile_name', true) . '</strong></h3>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_job'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-briefcase"></i> ' . get_post_meta($postID, 'profile_job_desc', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_company'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-list-alt"></i> ' . get_post_meta($postID, 'profile_company', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_location'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i> ' . get_post_meta($postID, 'profile_location', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_email'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-envelope"></i> ' . get_post_meta($postID, 'profile_email', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_url'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-link"></i> ' . get_post_meta($postID, 'profile_url', true) . '</city></small></h4>'; ?>
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
    <!-- Basic Slider Design End-->

</div>
