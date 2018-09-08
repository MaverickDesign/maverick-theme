<?php
/**
 * @package mavericktheme
 */

// WordPress Setting Errors
settings_errors();

printf('<div class="mav-admin-page-wrapper">');
    printf('<header class="">');
        printf( '<h1>%1$s</h1>', __('Thiết lập Website', 'mavericktheme') );
        printf( '<p>%1$s</p>', __('Các thiết lập cho website', 'mavericktheme') );
    echo '</header>';
    printf('<div class="mav-admin-page-container">');
        printf('<form id="mavid-form-site-setting" action="options.php" method="POST">');
                settings_fields('mavog_site_setting');
                do_settings_sections('mav_admin_page_site_setting');
                submit_button( __('Lưu các thay đổi', 'mavericktheme'), 'primary', 'mavb_submit' );
        echo '</form>';
    echo '</div>';
echo '</div>';