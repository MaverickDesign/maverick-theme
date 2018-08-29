<?php
/**
 * @package maverick-theme
 */

function mavf_post_grid($mav_args)
{
    if (function_exists('mavf_unique')) {
        $mav_unique_number = mavf_unique(rand(4, 16));
    } else {
        $mav_unique_number = wp_create_nonce(time());
    }

    $mav_post_type        = isset($mav_args['post_type'])                  ? $mav_args['post_type']                 : 'post';
    $mavNumberOfPosts   = isset($mav_args['number_of_posts'])            ? $mav_args['number_of_posts']           : 6;
    // Specific post ids
    $mavPostIn          = isset($mav_args['post_in'])                    ? $mav_args['post_in']                   : '';
    $mav_categories      = isset($mav_args['categories'])                 ? $mav_args['categories']                : '';
    $mavPostDisplay     = isset($mav_args['posts_display'])              ? $mav_args['posts_display']             : 6;
    $mavTemplate        = isset($mav_args['template'])                   ? $mav_args['template']                  : 'template-parts/content';

    $mavWrapper         = isset($mav_args['wrapper_class'])              ? $mav_args['wrapper_class']             : 'mav-post-grid-wrapper';
    $mavContainer       = isset($mav_args['container_class'])            ? $mav_args['container_class']           : 'mav-post-grid-ctn';

    $mav_query_args = array(
        'post_type'                 => $mav_post_type,
        'posts_per_page'            => $mavNumberOfPosts,
        'ignore_sticky_posts'       => true,
        'post__in'                  => $mavPostIn,
        'category__in'              => $mav_categories,
    );

    $mav_query = new WP_Query($mav_query_args);

    // The loop
    if ($mav_query->have_posts()) :
        printf('<div class="%1$s">', $mavWrapper);
            printf(
                '<div class="%1$s" style="grid-template-columns: repeat(%2$s,1fr);">',
                $mavContainer, $mavPostDisplay
            );
                while ($mav_query->have_posts()) :
                    $mav_query->the_post();
                    get_template_part($mavTemplate, get_post_format());
                endwhile;
                // Reset post data
                wp_reset_query();
            echo '</div>';
        echo '</div>';
    endif;
}