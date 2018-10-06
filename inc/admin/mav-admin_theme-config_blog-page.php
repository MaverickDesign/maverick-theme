<?php
/**
 * @package mavericktheme
 */

/**
 * Theme Settings - Blog Page Section
 * ==================================
 */

add_settings_section(
    'mavsec_theme_config_theme_setting',
    __( 'Trang Blog', 'mavericktheme' ),
    'mavf_theme_config_theme_setting',
    'mav_admin_page_theme_config'
);

function mavf_theme_config_theme_setting()
{
    printf( '<p class="mav-sec-intro">%1$s</p>', __( 'Các thiết lập cho trang Blog', 'mavericktheme' ) );
}

//  Blog Page - Load more posts with AJAX
register_setting(
    'mavog_theme_config',
    'mav_setting_ajax_load_posts'
);

add_settings_field(
    'mavid_theme_setting_ajax_load_posts',
    __( 'Tải thêm bài viết dạng AJAX', 'mavericktheme' ),
    'mavf_theme_config_ajax_load_posts',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_setting'
);

function mavf_theme_config_ajax_load_posts()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_ajax_load_posts' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    printf(
        '<input id="mavid-ajax-load-posts" type="checkbox" name="mav_setting_ajax_load_posts" value="1" %1$s/>',
        $mav_checked
    );
}

// Blog Page - Display sidebar
register_setting(
    'mavog_theme_config',
    'mav_setting_blog_page_sidebar'
);

add_settings_field(
    'mavid_theme_setting_blog_page_sidebar',
    __( 'Không hiển thị thanh Sidebar', 'mavericktheme' ),
    'mavf_theme_config_blog_page_sidebar',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_setting'
);

function mavf_theme_config_blog_page_sidebar()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_blog_page_sidebar' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    printf(
        '<label><input id="mavid-blog-page-sidebar" type="checkbox" name="mav_setting_blog_page_sidebar" value="1" %1$s/></label>',
        $mav_checked
    );
}

/**
 * Post display style
 * Default: card
 */

register_setting(
    'mavog_theme_config',
    'mav_setting_blog_page_display_style'
);

add_settings_field(
    'mavid_theme_setting_blog_display_style',
    __( 'Hiển thị theo dạng', 'mavericktheme' ),
    'mavf_theme_config_blog_page_display_style',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_setting'
);

function mavf_theme_config_blog_page_display_style()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_blog_page_display_style' ) );

    $mavOptions = ['card','list'];

    echo '<fieldset class="mav-grid">';
        foreach ( $mavOptions as $mavOption ) {
            $mavChecked = ( @$mav_saved_value == $mavOption ) ? 'checked' : '';
            switch ($mavOption) {
                case 'list' :
                    $mavDispplayName = 'Dạng danh sách';
                    break;
                case 'card' :
                    $mavDispplayName = 'Dạng thẻ';
                    break;
            }
            printf(
                '<label><input type="radio" name="mav_setting_blog_page_display_style" value="%1$s" %2$s>%3$s</label>',
                $mavOption, $mavChecked, $mavDispplayName
            );
        }
    echo '</fieldset>';

    printf( '<span class="mav-admin-desc">%1$s</span>', __( 'Mặc định khi chưa thiết lập tùy chọn là dạng thẻ', 'mavericktheme' ) );
}

// Blog Page - Number of columns display
register_setting(
    'mavog_theme_config',
    'mav_setting_blog_page_columns'
);

add_settings_field(
    'mavid_theme_setting_blog_page_columns',
    __( 'Số cột hiển thị', 'mavericktheme' ),
    'mavf_theme_config_blog_page_columns',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_setting'
);

function mavf_theme_config_blog_page_columns()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_blog_page_columns' ) );

    printf('
        <input type="range" name="mav_setting_blog_page_columns" value="%1$d" min="1" max="4"/>',
        $mav_saved_value
    );

    echo '
        <ul class="mav-range-slider-ctn">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>
    ';

    printf(
        '<span class="mav-admin-desc"><p>%1$s</p></span>',
        __( 'Tùy chọn này giới hạn từ 1 đến 4 để đảm bảo tính mỹ thuật cho bố cục website.', 'mavericktheme')
    );
}

// Display Sticky Posts Section
register_setting(
    'mavog_theme_config',
    'mav_setting_blog_page_sticky_post_section'
);

add_settings_field(
    'mavid_theme_setting_blog_page_sticky_post_section',
    __( 'Không hiển thị mục Sticky Post', 'mavericktheme' ),
    'mavf_theme_config_blog_page_sticky_post_section',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_setting'
);

function mavf_theme_config_blog_page_sticky_post_section()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_blog_page_sticky_post_section' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    printf(
        '<label><input id="mavid-blog-page-sticky-post-section" type="checkbox" name="mav_setting_blog_page_sticky_post_section" value="1" %1$s/></label>',
        $mav_checked
    );
}

// Display card style change buttons
register_setting(
    'mavog_theme_config',
    'mav_setting_blog_page_card_style_change'
);

add_settings_field(
    'mavid_theme_setting_blog_page_card_style_change',
    __( 'Nút thay đổi kiểu hiển thị bài viết', 'mavericktheme' ),
    'mavf_theme_config_blog_page_card_style_change',
    'mav_admin_page_theme_config',
    'mavsec_theme_config_theme_setting'
);

function mavf_theme_config_blog_page_card_style_change()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_blog_page_card_style_change' ) );
    $mav_checked = ( @$mav_saved_value == 1 ? 'checked' : '' );
    printf(
        '<label><input id="mavid-blog-page-card-style-change" type="checkbox" name="mav_setting_blog_page_card_style_change" value="1" %1$s/></label>',
        $mav_checked
    );
}