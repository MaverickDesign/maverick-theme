<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec_site_setting_social_sharing',
    __( 'Chia sẻ Mạng Xã Hội', 'mavericktheme' ),
    'mavf_site_setting_sec_social_sharing',
    'mav_admin_page_site_setting'
);

function mavf_site_setting_sec_social_sharing()
{
    _e( 'Thiết lập chia sẻ Mạng Xã Hội', 'mavericktheme' );
}

