<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec_site_setting_terms',
    __( 'Thỏa thuận với người dùng', 'mavericktheme' ),
    'mavf_site_setting_sec_terms',
    'mav_admin_page_site_setting'
);

function mavf_site_setting_sec_terms()
{
    _e( 'Thiết lập thỏa thuận người dùng', 'mavericktheme' );
}

register_setting(
    'mavog_site_setting',
    'mav_setting_enable_terms'
);

add_settings_field(
    'mavid_site_setting_enable_terms',
    __('Kích hoạt thỏa thuận người dùng', 'mavericktheme'),
    'mavf_site_setting_enable_terms',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_terms'
);

function mavf_site_setting_enable_terms()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_enable_terms'));
    $mavChecked = (@$mav_saved_value == 1 ? 'checked' : '' );
    printf('<input id="mavid-enable-terms" type="checkbox" name="mav_setting_enable_terms" value="1" %1$s/>', $mavChecked);
}

register_setting('mavog_site_setting', 'mav_setting_terms_page_term');
add_settings_field(
    'mavid_site_setting_page_term',
    __('Trang Điều Khoản', 'mavericktheme'),
    'mavf_site_setting_terms_page_term',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_terms'
);

function mavf_site_setting_terms_page_term()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_terms_page_term'));
    printf(
        '<input type="text" name="mav_setting_terms_page_term" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __('E.g. '.rand(100, 200).'', 'mavericktheme')
    );
    printf('<span class="mav-admin-desc">%1$s</a>', __('ID trang Điều Khoản', 'mavericktheme'));
}

register_setting('mavog_site_setting', 'mav_setting_terms_page_condition');
add_settings_field(
    'mavid_site_setting_page_condition',
    __('Trang Điều Kiện', 'mavericktheme'),
    'mavf_site_setting_terms_page_condition',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_terms'
);

function mavf_site_setting_terms_page_condition()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_terms_page_condition'));
    printf(
        '<input type="text" name="mav_setting_terms_page_condition" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __('E.g. '.rand(100, 200).'', 'mavericktheme')
    );
    printf('<span class="mav-admin-desc">%1$s</a>', __('ID trang Điều Kiện', 'mavericktheme'));
}

register_setting('mavog_site_setting', 'mav_setting_terms_page_policy');
add_settings_field(
    'mavid_site_setting_page_policy',
    __('Trang Chính Sách', 'mavericktheme'),
    'mavf_site_setting_terms_page_policy',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_terms'
);

function mavf_site_setting_terms_page_policy()
{
    $mav_saved_value = esc_attr(get_option('mav_setting_terms_page_policy'));
    printf(
        '<input type="text" name="mav_setting_terms_page_policy" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __('E.g. '.rand(100, 200).'', 'mavericktheme')
    );
    printf('<span class="mav-admin-desc">%1$s</a>', __('ID trang Chính Sách', 'mavericktheme'));
}