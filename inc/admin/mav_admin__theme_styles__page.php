<?php
/**
 * @package mavericktheme
 */

printf('<div class="mav-admin-page-wrapper mav-admin__page--wrp">');
    printf('<header>');
        printf( '<h1>%1$s</h1>', __( 'Maverick Theme Styles', 'mavericktheme' ) );
        printf( '<p class="mav-desc">%1$s</p>', __( 'Maverick Theme Styles', 'mavericktheme' ) );
    echo '</header>';

    // WordPress Settings errors
    settings_errors();

    printf('<div class="mav-admin-page-container mav-admin__page--ctn">');
        printf('<form id="mavid-form-theme-styles" action="options.php" method="POST">');
            // Option Group
            settings_fields( 'mavog_theme_styles' );
            // Sections
            do_settings_sections( 'mav_admin__setting_section__theme_styles' );
            // Submit Button
            submit_button( __( 'Lưu các thay đổi', 'mavericktheme' ), 'primary', 'mavb_submit');
        echo '</form>';
        // Theme Info
        include_once TEMPLATE_DIR.'/inc/admin/admin-parts/mav-admin__part--theme-info.php';
    echo '</div>';
echo '</div>';