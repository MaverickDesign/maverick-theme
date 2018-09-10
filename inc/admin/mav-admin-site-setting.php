<?php
/**
 * @package mavericktheme
 */

printf('<div class="mav-admin-page-wrapper">');
    printf('<header>');
        printf( '<h1>%1$s</h1>', __( 'Thiết lập Website', 'mavericktheme' ) );
        printf( '<p class="mav-desc">%1$s</p>', __( 'Các thiết lập cho website', 'mavericktheme' ) );
    echo '</header>';

    // WordPress Setting Errors
    settings_errors();

    printf('<div class="mav-admin-page-container">');
        /* The Form */
        printf('<form id="mavid-form-site-setting" action="options.php" method="POST">');
            // Option Group
            settings_fields( 'mavog_site_setting' );
            // Sections
            do_settings_sections( 'mav_admin_page_site_setting' );
            // Submit Button
            submit_button( __( 'Lưu các thay đổi', 'mavericktheme' ), 'primary', 'mavb_submit' );
        echo '</form>';
        // Theme Info
        include_once TEMPLATE_DIR.'/inc/admin/admin-parts/mav-admin__part--theme-info.php';
    echo '</div>';
echo '</div>';