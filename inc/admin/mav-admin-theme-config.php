<?php
/**
 * @package maverick-theme
 */

echo '<section class="mav-admin-page-wrapper">';
    printf( '<h1>%1$s</h1>', __( 'Cấu hình Maverick Theme' , 'maverick-theme' ) );
    printf( '<p>%1$s</p>', __( 'Tùy chỉnh các chức năng' , 'maverick-theme' ) );

    settings_errors();

    echo('<form action="options.php" method="POST">');
        // Options Group
        settings_fields('mavog_theme_config');
        do_settings_sections('mav_admin_page_theme_config');
        submit_button( __('Save changes','maverick-theme'), 'primary', 'mavb_submit' );
    echo '</form>';
echo '</section>';