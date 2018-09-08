<?php
/**
 * @package mavericktheme
 */
?>

<?php
    printf('<div class="mav-admin-page-wrapper">')
?>

<?php
    printf('<h1>%1$s</h1>', __('Thiết lập Website', 'mavericktheme'));
    printf('<p>%1$s</p>', __('Các thiết lập cho website', 'mavericktheme'));

    // WordPress Setting Errors
    settings_errors();
?>

<div class="mav-admin-site-settings-wrapper">
    <form id="mavid-form-site-setting" action="options.php" method="POST">
        <?php
            settings_fields('mavog_site_setting');
            do_settings_sections('mav_admin_page_site_setting');
            submit_button(__('Lưu các thay đổi', 'mavericktheme'), 'primary', 'mavb_submit');
        ?>
    </form>

    <!-- Settings Preview -->
    <div id="mavid-settings-preview" class="mav-hide-on-phone">
        <h2><?php _e('Các thông tin đã thiết lập', 'mavericktheme'); ?></h2>
        <?php
            $mavBrandLogo = esc_attr(get_option('mav_setting_brand_logo'));
        ?>
        <img id="mavid-preview-brand-logo" src="<?php print $mavBrandLogo; ?>" title="<?php bloginfo('name'); ?>" alt="">
    </div>
</div>

<?php
    echo '</div>';
?>