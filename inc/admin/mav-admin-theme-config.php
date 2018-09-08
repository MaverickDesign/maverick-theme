<?php
/**
 * @package mavericktheme
 */


printf('<div class="mav-admin-page-wrapper">');
    printf( '<h1>%1$s</h1>', __( 'Cấu hình Maverick Theme', 'mavericktheme' ) );
    printf( '<p class="mav-desc">%1$s</p>', __( 'Tùy chỉnh các chức năng', 'mavericktheme' ) );

    // WordPress Settings errors
    settings_errors();

    printf('<div class="mav-admin-page-container">');
        printf('<form action="options.php" method="POST">');
            settings_fields('mavog_theme_config');
            do_settings_sections('mav_admin_page_theme_config');
            submit_button( __( 'Lưu các thay đổi', 'mavericktheme' ), 'primary', 'mavb_submit');
        echo '</form>';
    echo '</div>';
echo '</div>';