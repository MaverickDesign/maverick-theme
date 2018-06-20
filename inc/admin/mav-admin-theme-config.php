<?php
/*
    @package mavericktheme
*/
echo '<section class="mav-admin-wrapper">';
    printf('<h1>%1$s</h1>',__('Theme Config','mavericktheme'));
    printf('<p>%1$s</p>',__('Customize Theme Config','mavericktheme'));

    settings_errors();

    printf('<form action="options.php" method="POST">');

        settings_fields( 'mavog_theme_config' );
        do_settings_sections( 'mav_admin_page_theme_config' );

        submit_button( __('Save changes','mavericktheme'), 'primary', 'mavb_submit' );
    echo '</form>';
echo '</section>';