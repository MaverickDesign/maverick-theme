<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec_site_setting_brand',
    __( 'Thông tin thương hiệu', 'mavericktheme' ),
    'mavf_site_setting_brand',
    'mav_admin_page_site_setting'
);

function mavf_site_setting_brand()
{
    _e( 'Thiết lập thông tin thương hiệu', 'mavericktheme' );
}

// Brand Logo
register_setting( 'mavog_site_setting', 'mav_setting_brand_logo' );
add_settings_field(
    'mavid_site_setting_brand_logo',
    __( 'Biểu tượng thương hiệu', 'mavericktheme' ),
    'mavf_site_setting_brand_logo',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_logo()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_brand_logo' ) );
    if ( empty( $mav_saved_value ) ) {
        printf(
            '<input id="mavid-btn-upload-brand-logo" type="button" value="%1$s">',
            __('Upload Brand logo', 'mavericktheme')
        );
        echo '<input id="mavid-brand-logo" type="hidden" name="mav_setting_brand_logo" value="">';
    } else {
        printf( '<input id="mavid-btn-upload-brand-logo" type="button" value="%1$s">', __( 'Thay đổi', 'mavericktheme' ) );
        printf('<input id="mavid-btn-remove-brand-logo" type="button" value="%1$s">', __('Gỡ bỏ', 'mavericktheme'));
        printf('<input id="mavid-brand-logo" type="hidden" name="mav_setting_brand_logo" value="%1$s">', $mav_saved_value);
    }
}

// Brand Name
register_setting( 'mavog_site_setting', 'mav_setting_brand_name' );
add_settings_field(
    'mavid_site_setting_brand_name',
    __( 'Tên thương hiệu', 'mavericktheme' ),
    'mavf_site_setting_brand_name',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_name()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_brand_name' ) );

    if(empty($mav_saved_value)) :
        $mav_saved_value = get_bloginfo( 'name' );
    endif;

    printf(
        '<input type="text" name="mav_setting_brand_name" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'Brand name', 'mavericktheme' )
    );
}

// Tagline
register_setting( 'mavog_site_setting', 'mav_setting_brand_tagline' );
add_settings_field(
    'mavid_site_setting_brand_tagline',
    __( 'Biểu ngữ thương hiệu', 'mavericktheme' ),
    'mavf_site_setting_brand_tagline',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_tagline()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_brand_tagline' ) );

    if ( empty( $mav_saved_value ) ) :
        $mav_saved_value = get_bloginfo( 'description' );
    endif;

    printf(
        '<input type="text" name="mav_setting_brand_tagline" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'E.g., Professional Design Services', 'mavericktheme' )
    );
}

// Address
register_setting( 'mavog_site_setting', 'mav_setting_brand_address' );
add_settings_field(
    'mavid_site_setting_brand_address',
    __( 'Địa chỉ liên hệ', 'mavericktheme' ),
    'mavf_site_setting_brand_address',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_address()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_brand_address' ) );
    printf(
        '<input type="text" name="mav_setting_brand_address" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'E.g., 121 Đinh Tiên Hoàng, Đakao, Q.1, TP.HCM', 'mavericktheme' )
    );
}

// Phone
register_setting( 'mavog_site_setting', 'mav_setting_brand_phone' );
add_settings_field(
    'mavid_site_setting_brand_phone',
    __( 'Số điện thoại', 'mavericktheme' ),
    'mavf_site_setting_brand_phone',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_phone()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_brand_phone' ) );
    printf(
        '<input type="text" name="mav_setting_brand_phone" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'E.g., 090-909-6464', 'mavericktheme' )
    );
}

// Hotline
register_setting( 'mavog_site_setting', 'mav_setting_brand_hotline' );
add_settings_field(
    'mavid_site_setting_brand_hotline',
    __( 'Hotline', 'mavericktheme' ),
    'mavf_site_setting_brand_hotline',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_hotline()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_brand_hotline' ) );
    printf(
        '<input type="text" name="mav_setting_brand_hotline" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'E.g., 090-909-6464', 'mavericktheme' )
    );
}

// Email
register_setting( 'mavog_site_setting', 'mav_setting_brand_email' );
add_settings_field(
    'mavid_site_setting_brand_email',
    __( 'Địa chỉ Email', 'mavericktheme' ),
    'mavf_site_setting_brand_email',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_email()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_brand_email' ) );
    printf(
        '<input type="text" name="mav_setting_brand_email" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'E.g., info@maverick.vn', 'mavericktheme' )
    );
}

// Website
register_setting( 'mavog_site_setting', 'mav_setting_brand_website' );
add_settings_field(
    'mavid_site_setting_brand_website',
    __( 'Địa chỉ website', 'mavericktheme' ),
    'mavf_site_setting_brand_website',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_brand'
);

function mavf_site_setting_brand_website()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_brand_website' ) );
    if ( empty( $mav_saved_value ) ) :
        $mav_saved_value = get_bloginfo( 'url' );
    endif;
    printf(
        '<input type="text" name="mav_setting_brand_website" value="%1$s" placeholder="%2$s"/>',
        $mav_saved_value, __( 'E.g., http://www.maverick.vn', 'mavericktheme' )
    );
}
