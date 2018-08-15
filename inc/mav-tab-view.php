<?php
/**
 * @package maverick-theme
 */

function mavf_tabbed_posts($mavArgs) {

    $mavQueryArgs = isset($mavArgs['query_args']) ? $mavArgs['query_args'] : array();

    if (empty($mavQueryArgs)) {
        return;
    }

    $mavVertical        = isset($mavArgs['vertical'])                       ? 'data-vertical'                           : '';
    $mavPlain           = isset($mavArgs['plain']) && empty($mavVertical)   ? 'data-plain'                              : '';
    $mavNumberOfPost    = isset($mavArgs['query_args']['posts_per_page'])   ? $mavArgs['query_args']['posts_per_page']  : 5;

    $mavAreas = '';

    if (empty($mavVertical)) {
        // Horizontal layout
        $mavTrigger = array();
        $mavBody    = array();

        for ($i = 1; $i <= $mavNumberOfPost; $i++) {
            array_push($mavTrigger,'trigger');
            array_push($mavBody,'content');
        }
        $mavAreas = "'".implode($mavTrigger," ")."' '".implode($mavBody," ")."'";
    } else {
        // Vertical layout
        for ($i = 1; $i <= $mavNumberOfPost; $i++) {
            $mavAreas .= "'trigger content' ";
        }
    }

    $mavQuery = new WP_Query( $mavQueryArgs );
    if ($mavQuery->have_posts()):
        printf('<div class="mav-tab-wrapper" %1$s>', $mavPlain);
            printf('<div class="mav-tab-ctn" style="grid-template-areas: %1$s" %2$s>', $mavAreas, $mavVertical);
                $mavState = 'data-state="active"';
                while ($mavQuery->have_posts()):
                    $mavQuery->the_post();
                    // Trigger
                    printf('<div class="mav-tab-trigger" %1$s>',$mavState);
                        printf('<span class="mav-tab-trigger-title">%1$s</span>',get_the_title());
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