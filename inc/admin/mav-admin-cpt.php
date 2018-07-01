<?php
/**
    @package mavericktheme
*/

function mavf_cpt(){

    // Get option for Testimonial CPT in Theme Config
    $mavTestimonialOption = get_option('mav_setting_custom_post_type');
	if (@$mavTestimonialOption['testimonial'] == 1) {
        $mavTestimonialLabels = array(
            'name'              => __('Testimonial','mavericktheme'),
            'singular_name'     => __('Testimonial','mavericktheme')
        );
        $mavTestimonialArgs = array(
            'labels'        => $mavTestimonialLabels,
            'public'        => true,
            'has_archive'   => true
        );
        register_post_type( 'mav_testimonial', $mavTestimonialArgs );
    }
}

add_action('init', 'mavf_cpt');