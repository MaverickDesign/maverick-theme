<?php
/**
 * @package maverick-theme
 */

function mavf_post_modal($mav_args){

    $mavHeaderClass = isset($mav_args['header_class'])   ? $mav_args['header_class']  : 'mav-modal-header';
    $mavBodyClass   = isset($mav_args['body_class'])     ? $mav_args['body_class']    : 'mav-modal-body mav-post-content';
    $mavFooterClass = isset($mav_args['footer_class'])   ? $mav_args['footer_class']  : 'mav-modal-footer';
    $mavFooterClass = isset($mav_args['footer'])         ? $mav_args['footer']        : '';

    if (function_exists('mavf_unique')) {
        $mav_unique_number = mavf_unique(rand(6,12));
    } else {
        $mav_unique_number = wp_create_nonce(time());
    }

    $mav_query_args = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'posts_per_page'        => 1,
        'ignore_sticky_posts'   => true,
        'post__not_in'          => get_option('sticky_posts'),
        'category__in'          => array(5),
        'post_in'               => array(129),
    );

    $mav_query = new WP_Query($mav_query_args);

    if ($mav_query->have_posts()):
        while ($mav_query->have_posts()):
            $mav_query->the_post();
            printf('<div id="mavid-modal" class="mav-modal mavjs-close">');
                printf('<div class="mav-modal-box">');
                    printf('<header class="%1$s">',$mavHeaderClass);
                        the_title('<h4 class="mav-modal-title">','</h4>');
                        echo '<button class="mav-btn-close" title="'.__('Đóng','maverick-theme').'"></button>';
                    echo '</header>';
                    printf('<div class="%1$s">',$mavBodyClass);
                        the_content();
                    echo '</div>';
                    printf('<footer class="%1$s">',$mavFooterClass);
                    echo '</footer>';
                echo '</div>';
                echo '<span class="mav-modal-close mav-btn-close" title="Click to close"></span>';
            echo '</div>';
        endwhile;
        wp_reset_query();
    endif;

}