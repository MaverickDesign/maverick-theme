<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec_theme_config_sec_general',
    __( 'Các thiết lập chung', 'mavericktheme' ),
    'mavf_theme_config_sec_general',
    'mav_admin_page_theme_config'
);

function mavf_theme_config_sec_general() {
    _e( '<p>Các thiết lập chung cho website</p>', 'mavericktheme' );
}

// Breadcrumbs
register_setting(
    'mavog_theme_config',
    'mav_setting_breadcrumbs'
);

add_settings_field(
    'mavid_theme_setting_breadcrumbs',
    __( 'Kích hoạt Breadcrumbs', 'mavericktheme' ),
    'mavf_theme_config_breadcrumbs',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_sec_general'
);

function mavf_theme_config_breadcrumbs()
{
    $mav_saved_value = get_option( 'mav_setting_breadcrumbs' );

    $mav_positions = array(
        'header',
        'footer'
    );

    echo '<div class="mav-grid" data-grid-gap>';
        $mav_output = '';
        foreach ( $mav_positions as $mav_position ) {
            $mav_checked = ( @$mav_saved_value[$mav_position] == 1 ? 'checked' : '');
            $mav_output .= '<label><input type="checkbox" id="mavid-breadcrumbs-'.$mav_position.'" name="mav_setting_breadcrumbs['.$mav_position.']" value="1" '.$mav_checked.'/> '.ucfirst($mav_position).'</label>';
        }
        echo $mav_output;
    echo '</div>';
}

// Sticky logo
register_setting(
    'mavog_theme_config',
    'mav_setting_sticky_logo'
);

add_settings_field(
    'mavid_theme_setting_sticky_logo',
    __( 'Không hiển thị Sticky logo', 'mavericktheme' ),
    'mavf_theme_config_sticky_logo',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_sec_general'
);

function mavf_theme_config_sticky_logo()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_sticky_logo' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    printf(
        '<label><input id="mavid-blog-page-sticky-logo" type="checkbox" name="mav_setting_sticky_logo" value="1" %1$s/></label>',
        $mav_checked
    );
}