<?php
/**
 * @package maverick-theme
 */

function mavf_tab_posts($mavArgs) {

    $mavNumberOfPost = isset($mavArgs['number_of_post']) ? $mavArgs['number_of_post'] : '3';

    $mavQueryArgs = array (
        'post_type'             => 'post',
        'posts_per_page'        => $mavNumberOfPost,
        'post__not_in'          => get_option("sticky_posts"),
        'ignore_sticky_posts'   => true,
        'category__in'          => array(5)
    );

    $mavTrigger = array();
    $mavBody = array();

    for ($i = 1; $i <= $mavNumberOfPost; $i++) {
        array_push($mavTrigger,'trigger');
        array_push($mavBody,'content');
    }

    $mavAreas = "'".implode($mavTrigger," ")."' '".implode($mavBody," ")."'";

    $mavQuery = new WP_Query( $mavQueryArgs );

    if ($mavQuery->have_posts()):
        $mavFirst = true;
        echo '<div class="mav-tab-wrapper">';
            echo '<div class="mav-tab-ctn" style="grid-template-areas: '.$mavAreas.';">';
                $i = 1;
                while ($mavQuery->have_posts()):
                    $mavQuery->the_post();
                    $mavActive      = $mavFirst ? 'active' : 'inactive';
                    $mavFirstItemBorder = $mavFirst ? 'style="border-left-color: transparent;"' : '';
                    printf(
                        '<div id="mavid-tab-trigger-%4$s" class="mav-tab-trigger" data-state="%2$s" %3$s>%1$s</div>',
                        get_the_title(),$mavActive,$mavFirstItemBorder,$i
                    );
                    echo '<div class="mav-tab-content-wrapper">';
                        echo '<div class="mav-tab-content-ctn mav-post-content">';
                            the_content();
                        echo '</div>';
                    echo '</div>';
                    $mavFirst = false;
                    $i++;
                endwhile;
            echo '</div>';
        echo '</div>';
        wp_reset_query();
    endif;
}