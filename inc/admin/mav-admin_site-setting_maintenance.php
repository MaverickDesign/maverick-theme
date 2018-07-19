<?php
/**
 * @package maverick-theme
 */

// Website maintenance section
add_settings_section( 'mavsec_site_setting_maintenance' , __('Bảo trì website','maverick-theme') , 'mavf_site_setting_sec_maintenance' , 'mav_admin_page_site_setting' );

function mavf_site_setting_sec_maintenance() {
    _e('Thiết lập bảo trì website','maverick-theme');
}

// Eneable maintenance mode
register_setting('mavog_site_setting','mav_setting_maintenance');
add_settings_field(
    'mavid_site_setting_maintenance',
    __('Kích hoạt chế độ bảo trì','maverick-theme'),
    'mavf_site_setting_maintenance',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_maintenance'
);

function mavf_site_setting_maintenance() {
    $mavSavedValue = esc_attr( get_option('mav_setting_maintenance') );
    $mavChecked = ( @$mavSavedValue == 1 ? 'checked' : '');
    printf('<label><input id="mavid-maintenance" type="checkbox" name="mav_setting_maintenance" value="1" %1$s/></label>',$mavChecked);
}

// Maintenance time
register_setting('mavog_site_setting','mav_setting_maintenance_time');
add_settings_field(
    'mavid_site_setting_maintenance_time',
    __('Ngày kết thúc bảo trì','maverick-theme'),
    'mavf_site_setting_maintenance_time',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_maintenance'
);

function mavf_site_setting_maintenance_time(){
    $mavSavedValue = esc_attr( get_option('mav_setting_maintenance_time') );
    printf( '<input id="mavid-maintenance-time" type="date" name="mav_setting_maintenance_time" value="%1$s" placeholder="dd/mm/yyyy" data-visual="short"/>', $mavSavedValue );
}