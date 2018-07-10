<?php
/**
 * @package maverick-theme
 */

function mavf_post_grid($mavArgs){

    if (function_exists('mavf_unique')) {
        $mavUniqueNumber = mavf_unique(rand(4,16));
    } else {
        $mavUniqueNumber = wp_create_nonce(time());
    }

    $mavPostType        = isset($mavArgs['post_type'])                  ? $mavArgs['post_type']                 : 'post';
    $mavNumberOfPosts   = isset($mavArgs['number_of_posts'])            ? $mavArgs['number_of_posts']           : 6;
    // Specific post ids
    $mavPostIn          = isset($mavArgs['post_in'])                    ? $mavArgs['post_in']                   : '';
    $mavCategories      = isset($mavArgs['categories'])                 ? $mavArgs['categories']                : '';
    $mavPostDisplay     = isset($mavArgs['posts_display'])              ? $mavArgs['posts_display']             : 6;
    $mavTemplate        = isset($mavArgs['template'])                   ? $mavArgs['template']                  : 'template-parts/content';

    $mavWrapper         = isset($mavArgs['wrapper_class'])              ? $mavArgs['wrapper_class']             : 'mav-post-grid-wrapper';
    $mavContainer       = isset($mavArgs['container_class'])            ? $mavArgs['container_class']           : 'mav-post-grid-ctn';

    $mavQueryArgs = array(
        'post_type'                 => $mavPostType,
        'posts_per_page'            => $mavNumberOfPosts,
        'ignore_sticky_posts'       => true,
        'post__in'                  => $mavPostIn,
        'category__in'              => $mavCategories,
    );

    $mavQuery = new WP_Query( $mavQueryArgs );

    if ($mavQuery->have_posts()):
        printf(
            sprintf('<div class="%1$s">',
            $mavWrapper)
        );
            printf(
                sprintf('<div class="%1$s" style="grid-template-columns: repeat(%2$s,1fr);">',
                $mavContainer,
                $mavPostDisplay)
            );
                // The loop
                while ($mavQuery->have_posts()):
                    $mavQuery->the_post();
                    get_template_part( $mavTemplate , get_post_format() );
                endwhile;
            echo '</div>';
        echo '</div>';
        // Reset post data
        wp_reset_query();
    endif;

}