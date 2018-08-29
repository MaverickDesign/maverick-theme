<?php
/**
 * @package maverick-theme
 */

/**
 * Tabbed Post
 *
 * @param [type] $mav_args
 * @return void
 */

function mavf_tabbed_posts($mav_args)
{
    $mav_query_args = isset($mav_args['query_args']) ? $mav_args['query_args'] : array();

    if (empty($mav_query_args)) {
        return;
    }

    $mav_vertical       = isset($mav_args['vertical'])                       ? 'data-vertical'                           : '';
    $mav_plain          = isset($mav_args['plain']) && empty($mav_vertical)   ? 'data-plain'                              : '';
    $mav_number_of_post = isset($mav_args['query_args']['posts_per_page'])   ? $mav_args['query_args']['posts_per_page']  : 5;

    $mavAreas = '';

    if (empty($mav_vertical)) {
        // Horizontal layout
        $mavTrigger = array();
        $mavBody    = array();

        for ($i = 1; $i <= $mav_number_of_post; $i++) {
            array_push($mavTrigger, 'trigger');
            array_push($mavBody, 'content');
        }
        $mavAreas = "'".implode($mavTrigger, " ")."' '".implode($mavBody, " ")."'";
    } else {
        // Vertical layout
        for ($i = 1; $i <= $mav_number_of_post; $i++) {
            $mavAreas .= "'trigger content' ";
        }
    }

    $mav_query = new WP_Query($mav_query_args);
    if ($mav_query->have_posts()) :
        printf('<div class="mav-tab-wrapper" %1$s>', $mav_plain);
            printf('<div class="mav-tab-ctn" style="grid-template-areas: %1$s" %2$s>', $mavAreas, $mav_vertical);
                $mavState = 'data-state="active"';
                while ($mav_query->have_posts()) :
                    $mav_query->the_post();
                    // Trigger
                    printf('<div class="mav-tab-trigger" %1$s>', $mavState);
                        printf('<span class="mav-tab-trigger-title">%1$s</span>', get_the_title());
                    echo '</div>';
                    // Content
                    printf('<div class="mav-tab-content-wrapper" %1$s>', $mavState);
                        printf('<div class="mav-tab-content-ctn mav-post-content">');
                            the_content();
                        echo '</div>';
                    echo '</div>';
                    $mavState = 'data-state="inactive"';
                endwhile;
                wp_reset_query();
            echo '</div>';
        echo '</div>';
    endif;
}
