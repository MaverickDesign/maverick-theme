<?php
/**
 * @package mavericktheme
 */

printf('<div class="mav-admin-page-wrapper">');
    printf('<header>');
        printf( '<h1>%1$s</h1>', __( 'Cấu hình Maverick Theme', 'mavericktheme' ) );
        printf( '<p class="mav-desc">%1$s</p>', __( 'Tùy chỉnh các chức năng', 'mavericktheme' ) );
    echo '</header>';

    // WordPress Settings errors
    settings_errors();

    printf('<div class="mav-admin-page-container">');
        printf('<form id="mavid-form-theme-config" action="options.php" method="POST">');
            // Option Group
            settings_fields( 'mavog_theme_config' );
            // Sections
            do_settings_sections( 'mav_admin_page_theme_config' );
            // Submit Button
            submit_button( __( 'Lưu các thay đổi', 'mavericktheme' ), 'primary', 'mavb_submit');
        echo '</form>';
    echo '</div>';
echo '</div>';