<?php

/**
 * 
 * @file example_shortcode.php
 * @description Example shortcode outpub
 * 
 * */
// Security Check
if (!defined('ABSPATH'))
    die();

global $gb_mega_testimonial;

// Assets loading
wp_enqueue_style('wpb-bootstrap-main-style');
wp_enqueue_style('wpb-frontend-style');
wp_enqueue_script('wpb-bootstrap-main-script');
wp_enqueue_script('wpb-frontend-script');

ob_start();

if (empty($gb_mega_testimonial->shortcode_data)) {

    if (isset($gb_mega_testimonial->options['general-themes']['general-testimonials']['gn_slide'])) {

        include $gb_mega_testimonial->path . 'views' . DS . 'templates' . DS . 'basic_slide' . DS . 'basic_slide.php';
    } elseif (isset($gb_mega_testimonial->options['general-themes']['general-testimonials']['gn_fade'])) {

        include $gb_mega_testimonial->path . 'views' . DS . 'templates' . DS . 'fade_slide' . DS . 'fade_slide.php';
    } else {

        include $gb_mega_testimonial->path . 'views' . DS . 'templates' . DS . 'basic_slide' . DS . 'basic_slide.php';
    }
}

if (isset($gb_mega_testimonial->shortcode_data['id'])) {

    include $gb_mega_testimonial->path . 'views' . DS . 'templates' . DS . 'starter' . DS . 'starter.php';
}

if (isset($gb_mega_testimonial->shortcode_data['group_id'])) {

    if (isset($gb_mega_testimonial->options['general-themes']['group-testimonials']['gr_slide'])) {

        include $gb_mega_testimonial->path . 'views' . DS . 'templates' . DS . 'group_basic_slide' . DS . 'group_basic_slide.php';
    } elseif (isset($gb_mega_testimonial->options['general-themes']['group-testimonials']['gr_fade'])) {

        include $gb_mega_testimonial->path . 'views' . DS . 'templates' . DS . 'group_fade_slide' . DS . 'group_fade_slide.php';
    } else {

        include $gb_mega_testimonial->path . 'views' . DS . 'templates' . DS . 'group_basic_slide' . DS . 'group_basic_slide.php';
    }
}
?>
<?php

$gb_mega_testimonial->shortcode_html = ob_get_contents();
ob_end_clean();
?>
