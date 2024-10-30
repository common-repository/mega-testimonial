<?php
/**
 * @file starter.php
 * 
 * @description Template file for testimonial
 * 
 *  */
// Security Check
if (!defined('ABSPATH')) die();

wp_enqueue_style('wpb-starter-style');
wp_enqueue_script('wpb-starter-script');

global $gb_mega_testimonial;
$post_id = $gb_mega_testimonial->shortcode_data['id'];
$data = get_post($post_id, 'custom_posts');
if (isset($data)) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="gb_testimonials">
                    <div class="active item">
                        <blockquote>
                            <p class="text-brand lead no-margin"><?php if(isset($gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_title'])) echo $data->post_title; ?></p>
                            <p><?php if(isset($gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_desc'])) echo $data->post_content; ?></p>
                        </blockquote>
                        <div class="carousel-info">
                            <p class="pull-left"><?php if(isset($gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_fimage'])) echo get_the_post_thumbnail($post_id, 'thumbnail'); ?></p>
                            <div class="pull-left">
                                <?php if(isset($gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_author'])) echo '<span class="testimonials-name">'. get_post_meta($post_id, 'profile_name', true). '</span>'; ?>
                                <?php if(isset($gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_job'])) echo '<span class="testimonials-post"><i class="glyphicon glyphicon-briefcase"></i> '. get_post_meta($post_id, 'profile_job_desc', true) .'</span>'; ?>
                                <?php if(isset($gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_location'])) echo '<span class="testimonials-post"><i class="glyphicon glyphicon-list-alt"></i> '. get_post_meta($post_id, 'profile_company', true) .'</span>'; ?>
                                <?php if(isset($gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_company'])) echo '<span class="testimonials-post"><i class="glyphicon glyphicon-globe"></i> '. get_post_meta($post_id, 'profile_location', true) .'</span>'; ?>
                                <?php if(isset($gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_email'])) echo '<span class="testimonials-post"><i class="glyphicon glyphicon-envelope"></i> '. get_post_meta($post_id, 'profile_email', true) .'</span>'; ?>
                                <?php if(isset($gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_url'])) echo '<span class="testimonials-post"><i class="glyphicon glyphicon-link"></i> '. get_post_meta($post_id, 'profile_url', true) .'</span>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div style="max-width: 50%; margin: 0 auto" class="alert alert-warning">
        <i class="fa fa-info-circle"></i> <strong>Sorry!</strong> No Testimonial Found of This Shortcode. Please Check The Shortcode Again !
    </div>
<?php } ?>
