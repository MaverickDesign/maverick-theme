<?php
/*
 * @package mavericktheme
 */

// For normal users
add_action('wp_ajax_nopriv_mavf_ajax_load_posts' , 'mavf_ajax_load_posts');
// For login users
add_action('wp_ajax_mavf_ajax_load_posts' , 'mavf_ajax_load_posts');

function mavf_ajax_load_posts(){
    if (isset($_POST['page'])) {
        $mavNewPage = $_POST['page'] + 1;
    }
    $mavArgs = array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'paged'         => $mavNewPage,
    );

    $mavQuery = new WP_Query( $mavArgs );

    if ($mavQuery->have_posts()) {
        while ($mavQuery->have_posts()) {
            $mavQuery->the_post();
            get_template_part( 'template-parts/content', get_post_format() );
        }
        wp_reset_query();
    } else {
        return;
    }
    die();
}