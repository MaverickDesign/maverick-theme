<?php
/**
 * @package maverick-theme
 */

echo '<section class="mav-admin-page-wrapper">';
    printf('<h1>%1$s</h1>',__('Theme Config','maverick-theme'));
    printf('<p>%1$s</p>',__('Customize Theme Config','maverick-theme'));

    settings_errors();

    echo('<form action="options.php" method="POST">');
        // Options Group
        settings_fields('mavog_theme_config');
        do_settings_sections('mav_admin_page_theme_config');
        submit_button( __('Save changes','maverick-theme'), 'primary', 'mavb_submit' );
    echo '</form>';
echo '</section>';