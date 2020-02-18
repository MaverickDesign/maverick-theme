<?php
/**
 * @package mavericktheme
 */

/**
 * Footer Breadcrumb Section
 **/

$mav_breadcrumbs = get_option( 'mav_setting_breadcrumbs' );

if ( isset( $mav_breadcrumbs['footer'] ) && ! is_front_page() && ! is_home() && ! is_attachment() && function_exists( 'mavf_breadcrumbs') ) :
    printf('<section class="mav-breadcrumbs__wrp">');
        printf('<div class="mav-breadcrumbs__ctn">');
            /* Breadcrumbs */
            mavf_breadcrumbs('mavid-footer-breadcrumbs');
        echo '</div>';
    echo '</section>';
endif;

/**
 * Footer section
 **/

printf('<footer id="mavid-page-footer" class="mav-pg-footer mav-pg__footer">');

    /* Footer Socials */
    if ( function_exists( 'mavf_social_links' ) && ! empty( mavf_check_social_accounts() ) ) :
        include_once TEMPLATE_DIR . '/template-parts/mav-footer_social-links.php';
    endif;

    /* Footer Menu section*/
    if ( current_theme_supports( 'menus' ) && has_nav_menu( 'secondary_menu' ) ) :
        printf('<section id="mavid-sec-footer-menu" class="mav-pg__ctn mav-footer__menu--wrp mav-hide__on--phone">');
            printf('<div class="mav-footer__menu--ctn">');

                /* Footer menu */
                printf('<nav id="mavid-footer-menu" class="mav-footer__menu">');
                    /**
                     * Displays a navigation menu
                     *
                     * @param array $args Arguments
                     */
                    $args = array(
                        'theme_location'    => 'secondary_menu',
                        'menu'              => '',
                        'container'         => false,
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => '',
                        'menu_id'           => '',
                        'echo'              => true,
                        'fallback_cb'       => 'wp_page_menu',
                        'before'            => '',
                        'after'             => '',
                        'link_before'       => '',
                        'link_after'        => '',
                        'items_wrap'        => '<ul>%3$s</ul>',
                        'depth'             => 0,
                        'walker'            => ''
                    );
                    wp_nav_menu( $args );
                echo '</nav>';

            echo '</div>';
        echo '</section>';
    endif;

    /* Copyright section */
    include_once TEMPLATE_DIR . '/template-parts/mav-footer_copyright.php';
echo '</footer>';

/**
 * Wordpress Footer Functions
 */
wp_footer();

    echo '</body>';
echo '</html>';
?>