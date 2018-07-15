<?php
/**
 * @package maverick-theme
 */

 $mavTestimonialLabels = array(
    'name'              => __('Testimonial','maverick-theme'),
    'singular_name'     => __('Testimonial','maverick-theme')
);

$mavTestimonialArgs = array(
    'labels'        => $mavTestimonialLabels,
    'public'        => true,
    'has_archive'   => true
);

register_post_type( 'mav_testimonial', $mavTestimonialArgs );