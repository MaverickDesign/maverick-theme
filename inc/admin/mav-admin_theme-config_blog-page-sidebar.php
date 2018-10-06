<?php
/**
 * @package mavericktheme
 */

// // Blog Page - Display sidebar
// register_setting(
//     'mavog_theme_config',
//     'mav_setting_blog_page_sidebar'
// );

// add_settings_field(
//     'mavid_theme_setting_blog_page_sidebar',
//     __( 'Hiển thị thanh Sidebar', 'mavericktheme' ),
//     'mavf_theme_config_blog_page_sidebar',
//     'mav_admin_page_theme_config',
//     'mavsec_theme_config_theme_setting'
// );

// function mavf_theme_config_blog_page_sidebar()
// {
//     $mav_saved_value = esc_attr( get_option( 'mav_setting_blog_page_sidebar' ) );
//     $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
//     printf(
//         '<label><input id="mavid-blog-page-sidebar" type="checkbox" name="mav_setting_blog_page_sidebar" value="1" %1$s/></label>',
//         $mav_checked
//     );
// }

// /**
//  * Post display style
//  * Default: card
//  */

// register_setting(
//     'mavog_theme_config',
//     'mav_setting_blog_page_display_style'
// );

// add_settings_field(
//     'mavid_theme_setting_blog_display_style',
//     __( 'Hiển thị theo dạng', 'mavericktheme' ),
//     'mavf_theme_config_blog_page_display_style',
//     'mav_admin_page_theme_config',
//     'mavsec_theme_config_theme_setting'
// );

// function mavf_theme_config_blog_page_display_style()
// {
//     $mav_saved_value = esc_attr( get_option( 'mav_setting_blog_page_display_style' ) );

//     $mavOptions = ['card','list'];

//     echo '<fieldset class="mav-grid">';
//         foreach ( $mavOptions as $mavOption ) {
//             $mavChecked = ( @$mav_saved_value == $mavOption ) ? 'checked' : '';
//             switch ($mavOption) {
//                 case 'list' :
//                     $mavDispplayName = 'Dạng danh sách';
//                     break;
//                 case 'card' :
//                     $mavDispplayName = 'Dạng thẻ';
//                     break;
//             }
//             printf(
//                 '<label><input type="radio" name="mav_setting_blog_page_display_style" value="%1$s" %2$s>%3$s</label>',
//                 $mavOption, $mavChecked, $mavDispplayName
//             );
//         }
//     echo '</fieldset>';

//     printf( '<span class="mav-admin-desc">%1$s</span>', __( 'Mặc định khi chưa thiết lập tùy chọn là dạng thẻ', 'mavericktheme' ) );
// }