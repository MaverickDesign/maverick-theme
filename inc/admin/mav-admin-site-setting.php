<?php
/*
    @package mavericktheme
*/
?>

<h1>Site Settings</h1>
<p>Customize Site Settings</p>

<?php settings_errors(); ?>

<div>
    <form id="mavid-form-site-setting" action="options.php" method="POST">
        <?php
            settings_fields( 'mavog_site_setting' );
            do_settings_sections( 'mav_admin_page_site_setting' );
            submit_button( 'Save Changes', 'primary', 'mavb_submit' );
        ?>
    </form>
    <div id="mavid-settings-preview">
        <h2>Setting Preview</h2>
        <?php
			$mavBrandLogo = esc_attr( get_option('mav_setting_brand_logo') );
		 ?>
        <img id="mavid-preview-brand-logo" src="<?php print $mavBrandLogo; ?>" alt="">
    </div>
</div>