<?php
/**
 * @file group_fade.php
 * 
 * @description Group fade slide
 * 
 *  */
// Security Check
if (!defined('ABSPATH')) die();

wp_enqueue_style('wpb-fade-style');
wp_enqueue_script('wpb-fade-script');

global $gb_mega_testimonial;
$group_id = $gb_mega_testimonial->shortcode_data['group_id'];
?>

<div class="container-fluid">
    <!-- Basic Slider Design -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
            <!-- Basic Slider Design -->
            <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="5000">
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
                            <div class="active item">
                                <div class="profile-circle">
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_fimage'])) echo the_post_thumbnail('thumbnail') ?>
                                </div>
                                <blockquote>
                                    <p style="text-align: center;margin-top: 5px" class="text-brand lead no-margin"><?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_title'])) the_title() ?></p>
                                    <p><?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_desc'])) echo '<span class="glyphicon glyphicon-thumbs-up"></span> ' . get_the_content() ?></p>
                                </blockquote>
                                <div style="margin-top: -20px">
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_author'])) echo '<h3 style="text-align:center"><strong>' . get_post_meta($postID, 'profile_name', true) . '</strong></h3>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_job'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-briefcase"></i> ' . get_post_meta($postID, 'profile_job_desc', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_company'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-list-alt"></i> ' . get_post_meta($postID, 'profile_company', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_location'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i> ' . get_post_meta($postID, 'profile_location', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_email'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-envelope"></i> ' . get_post_meta($postID, 'profile_email', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_url'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-link"></i> ' . get_post_meta($postID, 'profile_url', true) . '</city></small></h4>'; ?> 
                                </div> 
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div style="max-width: 80%; margin: 0 auto" class="alert alert-warning">
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
                                <div class="profile-circle">
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_fimage'])) echo the_post_thumbnail('thumbnail') ?>
                                </div>
                                <blockquote>
                                    <p style="text-align: center;margin-top: 5px" class="text-brand lead no-margin"><?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_title'])) the_title() ?></p>
                                    <p><?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_desc'])) echo '<span class="glyphicon glyphicon-thumbs-up"></span> ' . get_the_content() ?></p>
                                </blockquote>
                                <div style="margin-top: -20px">
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_author'])) echo '<h3 style="text-align:center"><strong>' . get_post_meta($postID, 'profile_name', true) . '</strong></h3>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_job'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-briefcase"></i> ' . get_post_meta($postID, 'profile_job_desc', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_company'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-list-alt"></i> ' . get_post_meta($postID, 'profile_company', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_location'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i> ' . get_post_meta($postID, 'profile_location', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_email'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-envelope"></i> ' . get_post_meta($postID, 'profile_email', true) . '</city></small></h4>'; ?>
                                    <?php if (isset($gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_url'])) echo '<h4 style="text-align:center"><small><cite title="Source Title"><i class="glyphicon glyphicon-link"></i> ' . get_post_meta($postID, 'profile_url', true) . '</city></small></h4>'; ?> 
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
</div>
