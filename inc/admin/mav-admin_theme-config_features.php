<?php
/**
 * @package mavericktheme
 */

add_settings_section(
    'mavsec_theme_config_theme_features',
    __( 'Các tính năng nâng cao', 'mavericktheme' ),
    'mavf_theme_config_sec_theme_features',
    'mav_admin_page_theme_config'
);

function mavf_theme_config_sec_theme_features()
{
    printf( '<p>%1$s</p>', __( 'Sử dụng các tính năng nâng cao', 'mavericktheme' ) );
}

register_setting(
    'mavog_theme_config',
    'mav_setting_theme_features'
);

add_settings_field(
    'mavid_theme_config_theme_features',
    __( 'Các tính năng nâng cao', 'mavericktheme' ),
    'mavf_theme_config_theme_features',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_features'
);

function mavf_theme_config_theme_features()
{
    $mav_saved_value = get_option( 'mav_setting_theme_features' );

    $mav_theme_features = array(
        'post-carousel' => 'Post Carousel',
        'post-featured' => 'Featured Post',
        'post-grid' => 'Post Grid',
        'countdown-timer' => 'Countdown Timer',
        'modal-box' => 'Modal Box',
        'post-accordion' => 'Post Accordion',
        'post-tab-view' => 'Post Tab View',
        'message-box' => 'Message Box',
        'content-modifier' => 'Content Modifier',
        'slider' => "Post Slider",
        'uni-slider' => 'Uni Slider'
    );

    echo '<div class="mav-grid" data-grid-gap>';
        $mav_output = '';
        foreach ( $mav_theme_features as $slug=>$mav_theme_feature ) {

            $mav_checked = ( @$mav_saved_value[$slug] == 1 ? 'checked' : '' );

            $mav_output .= '<label><input type="checkbox" id="mavid-theme-feature-'.$slug.'" name="mav_setting_theme_features['.$slug.']" value="1" '.$mav_checked.'/> '.ucfirst($mav_theme_feature).'</label>';

        }
        echo $mav_output;
    echo '</div>';
}