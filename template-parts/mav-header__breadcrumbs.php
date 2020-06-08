<?php
/**
 * @package mavericktheme
 * Breadcrumb Section
 */

$mav_breadcrumbs = get_option( 'mav_setting_breadcrumbs' );

if ( isset( $mav_breadcrumbs['header'] ) && !is_front_page() && !is_home() && !is_attachment() && function_exists( 'mavf_breadcrumbs' ) ) :
    printf('<section class="mav-breadcrumbs__wrp">');
        printf('<div class="mav-breadcrumbs__ctn">');
            mavf_breadcrumbs('mavid-header-breadcrumbs');
        echo '</div>';
    echo '</section>';
endif;