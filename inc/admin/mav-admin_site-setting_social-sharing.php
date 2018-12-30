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
    _e( 'Thiết lập chia sẻ Mạng Xã Hội - Social Sharing', 'mavericktheme' );
}

register_setting(
    'mavog_site_setting',
    'mav_setting_social_sharing'
);

add_settings_field(
    'mavid_site_setting_social_sharing',
    __( 'Chia sẻ Mạng Xã Hội', 'mavericktheme' ),
    'mavf_site_setting_social_sharing',
    'mav_admin_page_site_setting',
    'mavsec_site_setting_social_sharing'
);

function mavf_site_setting_social_sharing()
{
    $mav_saved_value = get_option( 'mav_setting_social_sharing' );

    $mav_socials_sharing = array(
        'facebook',
        'twitter'
    );

    echo '<div class="mav-grid" data-grid-gap>';
        $mavOutput = '';

        foreach ( $mav_socials_sharing as $mav_social_sharing ) {
            $mavChecked = ( @$mav_saved_value[$mav_social_sharing] == 1 ? 'checked' : '' );

            $mavOutput .= '<label><input type="checkbox" id="mavid-social-sharing-'.$mav_social_sharing.'" name="mav_setting_social_sharing['.$mav_social_sharing.']" value="1" '.$mavChecked.'/> '.ucfirst($mav_social_sharing).'</label>';
        }

        echo $mavOutput;
    echo '</div>';
}