<?php
/**
 * @package mavericktheme
 */

// Website maintenance section
add_settings_section(
    'mavsec_site_setting_maintenance',
    __( 'Bảo trì website', 'mavericktheme' ),
    'mavf_site_setting_sec_maintenance',
    'mav_admin_page_site_setting'
);

function mavf_site_setting_sec_maintenance() {
    _e( 'Thiết lập bảo trì website', 'mavericktheme' );
}

// Eneable maintenance mode
register_setting(
    'mavog_site_setting',
    'mav_setting_maintenance'
);
add_settings_field(
    'mavid_site_setting_maintenance',
    __( 'Kích hoạt chế độ bảo trì', 'mavericktheme' ),
    'mavf_site_setting_maintenance',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_maintenance'
);

function mavf_site_setting_maintenance() {
    $mav_saved_value = esc_attr( get_option( 'mav_setting_maintenance' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    printf(
        '<label><input id="mavid-maintenance" type="checkbox" name="mav_setting_maintenance" value="1" %1$s/></label>', $mav_checked
    );
}

// Display logo
register_setting( 'mavog_site_setting', 'mav_setting_maintenance_display_logo' );
add_settings_field(
    'mavid_site_setting_maintenance_display_logo',
    __( 'Không hiển thị logo', 'mavericktheme' ),
    'mavf_site_setting_maintenance_display_logo',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_maintenance',
    array(
        'label_for' => 'mavid-maintenance-display-logo'
    )
);

function mavf_site_setting_maintenance_display_logo() {
    $mav_saved_value = esc_attr( get_option('mav_setting_maintenance_display_logo') );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '');
    printf('<input id="mavid-maintenance-display-logo" type="checkbox" name="mav_setting_maintenance_display_logo" value="1" %1$s/>',$mav_checked);
}

// Display social links
register_setting(
    'mavog_site_setting',
    'mav_setting_maintenance_display_social'
);
add_settings_field(
    'mavid_site_setting_maintenance_display_social',
    __( 'Không hiển thị liên kết MXH', 'mavericktheme' ),
    'mavf_site_setting_maintenance_display_social',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_maintenance',
    array(
        'label_for' => 'mavid-maintenance-display-social'
    )
);

function mavf_site_setting_maintenance_display_social() {
    $mav_saved_value = esc_attr( get_option( 'mav_setting_maintenance_display_social' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '');
    printf(
        '<input id="mavid-maintenance-display-social" type="checkbox" name="mav_setting_maintenance_display_social" value="1" %1$s/>',
        $mav_checked
    );
}

// Maintenance time
register_setting(
    'mavog_site_setting',
    'mav_setting_maintenance_time'
);

add_settings_field(
    'mavid_site_setting_maintenance_time',
    __( 'Ngày kết thúc bảo trì', 'mavericktheme' ),
    'mavf_site_setting_maintenance_time',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_maintenance'
);

function mavf_site_setting_maintenance_time() {
    $mav_saved_value = esc_attr( get_option( 'mav_setting_maintenance_time' ) );
    printf( '<input id="mavid-maintenance-time" type="date" name="mav_setting_maintenance_time" value="%1$s" placeholder="dd/mm/yyyy" data-visual="short"/>', $mav_saved_value );
}