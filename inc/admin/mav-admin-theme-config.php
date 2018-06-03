<?php
/*
    @package mavericktheme
*/
?>

<h1>Theme Config</h1>
<p>Customize Theme Config</p>

<?php settings_errors(); ?>

<form action="options.php" method="POST">
    <?php
        // option group name
        settings_fields( 'mavog_theme_config' );
        // which admin page
        do_settings_sections( 'mav_admin_page_theme_config' );
        submit_button( 'Save Changes', 'primary', 'mavb_submit' );
    ?>
</form>