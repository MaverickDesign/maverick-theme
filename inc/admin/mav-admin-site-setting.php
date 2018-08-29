<?php
/**
 * @package maverick-theme
 */
?>

<h1><?php _e('Site Settings', 'maverick-theme'); ?></h1>
<p><?php _e('Customize Site Settings', 'maverick-theme'); ?></p>

<?php settings_errors(); ?>

<div class="mav-admin-site-settings-wrapper">
    <form id="mavid-form-site-setting" action="options.php" method="POST">
        <?php
            settings_fields('mavog_site_setting');
            do_settings_sections('mav_admin_page_site_setting');
            submit_button('Save Changes', 'primary', 'mavb_submit');
        ?>
    </form>
    <div id="mavid-settings-preview" class="mav-hide-on-phone">
        <h2><?php _e('Setting Preview', 'maverick-theme'); ?></h2>
        <?php
            $mavBrandLogo = esc_attr(get_option('mav_setting_brand_logo'));
        ?>
        <img id="mavid-preview-brand-logo" src="<?php print $mavBrandLogo; ?>" title="<?php bloginfo('name'); ?>" alt="">
    </div>
</div>