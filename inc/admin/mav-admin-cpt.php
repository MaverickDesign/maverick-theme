<?php
/**
 * @package maverick-theme
 */

/**
 * Maverick Theme Custom Post Types
 */

function mavf_cpt(){

    // Get option for CPTs in Theme Config
    $mavCPTs = get_option('mav_setting_custom_post_type');

    /**
     * Testimonial Post Type
     */
	if (@$mavCPTs['testimonial']) {
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
    }

    /**
     * Subscriber Post Type
     */
    if (@$mavCPTs['subscriber']) {
        $mavSubscriberLabels = array(
            'name'              => __('Subsciber','maverick-theme'),
            'singular_name'     => __('Subsciber','maverick-theme')
        );
        $mavSubscriberArgs = array(
            'labels'            => $mavSubscriberLabels,
            'public'            => true,
            'has_archive'       => false
        );
        register_post_type( 'mav_subscriber', $mavSubscriberArgs );
    }

    /**
     * Portfolio Post Type
     */
	if (@$mavCPTs['portfolio']) {
        $mavPortfolioLabels = array(
            'name'              => __('Portfolio','maverick-theme'),
            'singular_name'     => __('Portfolio','maverick-theme')
        );
        $mavPortfolioArgs = array(
            'labels'        => $mavPortfolioLabels,
            'public'        => true,
            'has_archive'   => true
        );
        register_post_type( 'mav_portfolio', $mavPortfolioArgs );
    }

    // Member Post Type
}

add_action('init', 'mavf_cpt');