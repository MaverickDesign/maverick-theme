<?php
/**
 * @package maverick-theme
 */

add_settings_section( 'mavsec_site_setting_brand', __('Thông tin thương hiệu','maverick-theme'), 'mavf_site_setting_brand', 'mav_admin_page_site_setting' );

function mavf_site_setting_brand() {
    _e('Thiết lập thông tin thương hiệu','maverick-theme');
}

// Brand Logo
register_setting('mavog_site_setting','mav_setting_brand_logo');
add_settings_field(
    'mavid_site_setting_brand_logo',
    __('Biểu tượng thương hiệu','maverick-theme'),
    'mavf_site_setting_brand_logo',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_logo() {
    $mavSavedValue = esc_attr(get_option('mav_setting_brand_logo'));
	if (empty($mavSavedValue)) {
		printf('<input id="mavid-btn-upload-brand-logo" type="button" value="%1$s">',__('Upload Brand logo','maverick-theme'));
		echo '<input id="mavid-brand-logo" type="hidden" name="mav_setting_brand_logo" value="">';
	} else {
        printf('<input id="mavid-btn-upload-brand-logo" type="button" value="%1$s">',__('Thay đổi','maverick-theme'));
		printf('<input id="mavid-btn-remove-brand-logo" type="button" value="%1$s">',__('Gỡ bỏ','maverick-theme'));
        printf('<input id="mavid-brand-logo" type="hidden" name="mav_setting_brand_logo" value="%1$s">',$mavSavedValue);
	}
}

// Brand Name
register_setting('mavog_site_setting','mav_setting_brand_name');
add_settings_field(
    'mavid_site_setting_brand_name',
    __('Tên thương hiệu','maverick-theme'),
    'mavf_site_setting_brand_name',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_name() {
    $mavSavedValue = esc_attr(get_option('mav_setting_brand_name'));

    if(empty($mavSavedValue)):
        $mavSavedValue = get_bloginfo('name');
    endif;

    printf('<input type="text" name="mav_setting_brand_name" value="%1$s" placeholder="%2$s"/>', $mavSavedValue,__('Brand name','maverick-theme'));
}

// Tagline
register_setting('mavog_site_setting','mav_setting_brand_tagline');
add_settings_field(
    'mavid_site_setting_brand_tagline',
    __('Biểu ngữ thương hiệu','maverick-theme'),
    'mavf_site_setting_brand_tagline',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_tagline() {
    $mavSavedValue = esc_attr(get_option('mav_setting_brand_tagline'));

    if(empty($mavSavedValue)):
        $mavSavedValue = get_bloginfo('description');
    endif;

    printf(
        '<input type="text" name="mav_setting_brand_tagline" value="%1$s" placeholder="%2$s"/>',
        $mavSavedValue,__('e.g., Professional Design Services','maverick-theme')
    );
}

// Address
register_setting('mavog_site_setting','mav_setting_brand_address');
add_settings_field(
    'mavid_site_setting_brand_address',
    __('Địa chỉ liên hệ','maverick-theme'),
    'mavf_site_setting_brand_address',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_address() {
    $mavSavedValue = esc_attr(get_option('mav_setting_brand_address'));
    printf(
        '<input type="text" name="mav_setting_brand_address" value="%1$s" placeholder="%2$s"/>',
        $mavSavedValue, __('e.g., 121 Đinh Tiên Hoàng, Đakao, Q.1, TP.HCM','maverick-theme')
    );
}

// Phone
register_setting('mavog_site_setting','mav_setting_brand_phone');
add_settings_field(
    'mavid_site_setting_brand_phone',
    __('Số điện thoại','maverick-theme'),
    'mavf_site_setting_brand_phone',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_phone() {
    $mavSavedValue = esc_attr(get_option('mav_setting_brand_phone'));
    printf(
        '<input type="text" name="mav_setting_brand_phone" value="%1$s" placeholder="%2$s"/>',
        $mavSavedValue, __('e.g., 090-909-6464','maverick-theme')
    );
}

// Hotline
register_setting('mavog_site_setting','mav_setting_brand_hotline');
add_settings_field(
    'mavid_site_setting_brand_hotline',
    __('Hotline','maverick-theme'),
    'mavf_site_setting_brand_hotline',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_hotline() {
    $mavSavedValue = esc_attr(get_option('mav_setting_brand_hotline'));
    printf(
        '<input type="text" name="mav_setting_brand_hotline" value="%1$s" placeholder="%2$s"/>',
        $mavSavedValue, __('e.g., 090-909-6464','maverick-theme')
    );
}

// Email
register_setting( 'mavog_site_setting', 'mav_setting_brand_email' );
add_settings_field(
    'mavid_site_setting_brand_email',
    __('Địa chỉ Email','maverick-theme'),
    'mavf_site_setting_brand_email',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_email() {
    $mavSavedValue = esc_attr( get_option('mav_setting_brand_email') );
    printf(
        '<input type="text" name="mav_setting_brand_email" value="%1$s" placeholder="%2$s"/>',
        $mavSavedValue, __('e.g., johndoe@email.com','maverick-theme')
    );
}

// Website
register_setting( 'mavog_site_setting', 'mav_setting_brand_website' );
add_settings_field(
    'mavid_site_setting_brand_website',
    __('Địa chỉ website','maverick-theme'),
    'mavf_site_setting_brand_website',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_website() {
    $mavSavedValue = esc_attr( get_option('mav_setting_brand_website') );
    if( empty($mavSavedValue) ):
        $mavSavedValue = get_bloginfo( 'url' );
    endif;
    printf(
        '<input type="text" name="mav_setting_brand_website" value="%1$s" placeholder="%2$s"/>',
        $mavSavedValue, __('e.g., http://www.maverick.vn','maverick-theme')
    );
}