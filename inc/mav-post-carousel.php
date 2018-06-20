<?php
/*
 * @package mavericktheme
 */
function mavf_post_carousel($mavArgs) {
        /*
         * Default values
         */
        $mavPostType        = isset($mavArgs['post_type'])                  ? $mavArgs['post_type']                 : 'post';
        $mavNumberOfPosts   = isset($mavArgs['number_of_posts'])            ? $mavArgs['number_of_posts']           : 5;
        $mavDisplay         = isset($mavArgs['number_of_posts_display'])    ? $mavArgs['number_of_posts_display']   : 3;
        $mavItemWidth       = isset($mavArgs['item_width'])                 ? $mavArgs['item_width']                : 300;
        $mavGutter          = isset($mavArgs['gutter'])                     ? $mavArgs['gutter']                    : 20;
        $mavCarouselClass   = isset($mavArgs['carousel_class'])             ? $mavArgs['carousel_class']            : 'mav-post-carousel';
        $mavPostTemplate    = isset($mavArgs['post_template'])              ? $mavArgs['post_template']             : 'template-parts/content';
        $mavCategories      = isset($mavArgs['categories'])                 ? $mavArgs['categories']                : '';
        $mavInterval        = isset($mavArgs['interval'])                   ? $mavArgs['categories']                : 4000;
        $mavSlider          = isset($mavArgs['slider'])                     ? $mavArgs['slider']                    : 'true';

        $mavQueryArgs = array(
        'post_type'         => $mavPostType,
        'post_status'       => 'publish',
        'posts_per_page'    => $mavNumberOfPosts,
        'post__not_in'      => get_option("sticky_posts"),
        'category__in'      => $mavCategories,
    );

    $mavQuery = new WP_Query($mavQueryArgs);

    if ($mavQuery->have_posts()):
        printf(sprintf('<section class="%5$s mav-post-carousel-wrapper" data-items="%1$s" data-display="%2$s" data-item-width="%3$s" data-gutter="%4$s" data-interval="%6$s" data-slider="%7$s" data-direction="prev">',$mavNumberOfPosts,$mavDisplay,$mavItemWidth,$mavGutter,$mavCarouselClass,$mavInterval,$mavSlider));
            // Navigation container
            echo '<div class="mav-post-carousel-nav-ctn">';
                // Nav element
                echo '<span class="mav-post-carousel-nav mav-post-carousel-prev show" data-number="0" data-element="nav" data-direction="prev"></span>';
                echo '<div class="mav-post-carousel-outer">';
                    printf(sprintf('<div class="mav-post-carousel-ctn" style="grid-template-columns: repeat(%1$s,auto);">',$mavNumberOfPosts));
                        // Post loop
                        while ($mavQuery->have_posts()):
                            $mavQuery->the_post();
                            // Post template
                            get_template_part( $mavPostTemplate, get_post_format() );
                        endwhile;
                        // End post loop
                    echo '</div>';
                echo '</div>';
                // Nav element
                echo '<span class="mav-post-carousel-nav mav-post-carousel-next" data-number="0" data-element="nav" data-direction="next"></span>';
            echo '</div>';
        echo '</section>';
    endif;
    // Reset post data
    wp_reset_postdata();
}