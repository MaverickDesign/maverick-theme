<?php
/**
 * @package maverick-theme
 */

function mavf_post_modal($mavArgs){

    $mavHeaderClass = isset($mavArgs['header_class'])   ? $mavArgs['header_class']  : 'mav-modal-header';
    $mavBodyClass   = isset($mavArgs['body_class'])     ? $mavArgs['body_class']    : 'mav-modal-body mav-post-content';
    $mavFooterClass = isset($mavArgs['footer_class'])   ? $mavArgs['footer_class']  : 'mav-modal-footer';
    $mavFooterClass = isset($mavArgs['footer'])         ? $mavArgs['footer']        : '';

    if (function_exists('mavf_unique')) {
        $mavUniqueNumber = mavf_unique(rand(6,12));
    } else {
        $mavUniqueNumber = wp_create_nonce(time());
    }

    $mavQueryArgs = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'posts_per_page'        => 1,
        'ignore_sticky_posts'   => true,
        'post__not_in'          => get_option('sticky_posts'),
        'category__in'          => array(5),
        'post_in'               => array(129),
    );

    $mavQuery = new WP_Query($mavQueryArgs);

    if ($mavQuery->have_posts()):
        while ($mavQuery->have_posts()):
            $mavQuery->the_post();
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