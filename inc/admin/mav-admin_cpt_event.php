<?php
/**
 * @package mavericktheme
 */

/**
 * Custom Post Type - Event
 * Name:
 * Slug: event
 */

$mav_labels = array(
    'name'               => _x( 'Sự kiện', 'post type general name', 'mavericktheme' ),
    'singular_name'      => _x( 'Sự kiện', 'post type singular name', 'mavericktheme' ),
    'menu_name'          => _x( 'Sự kiện', 'admin menu', 'mavericktheme' ),
    'name_admin_bar'     => _x( 'Sự kiện', 'add new on admin bar', 'mavericktheme' ),
    'add_new'            => _x( 'Thêm mới', 'mavericktheme' ),
    'add_new_item'       => __( 'Thêm Sự kiện mới', 'mavericktheme' ),
    'new_item'           => __( 'Sự kiện mới', 'mavericktheme' ),
    'edit_item'          => __( 'Chỉnh sửa Sự kiện', 'mavericktheme' ),
    'view_item'          => __( 'Xem Sự kiện', 'mavericktheme' ),
    'all_items'          => __( 'Tất cả Sự kiện', 'mavericktheme' ),
    'search_items'       => __( 'Tìm kiếm Sự kiện', 'mavericktheme' ),
    'parent_item_colon'  => __( 'Sự kiện trước', 'mavericktheme' ),
    'not_found'          => __( 'Không tìm thấy Sự kiện nào.', 'mavericktheme' ),
    'not_found_in_trash' => __( 'Không tìm thấy Sự kiện nào trong thùng rác.', 'mavericktheme' )
);

$mav_args = array(
    'labels'                => $mav_labels,
    'description'           => __( 'Sự kiện', 'mavericktheme' ),
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'has_archive'           => true,
    'hierarchical'          => true,
    'capability_type'       => 'post',
    'supports'              => array(
        'title', 'editor' , 'page-attributes'  , 'thumbnail' , 'custom-fields'
    ),
    'taxonomies'            => array(
        'post_tag',
    ),
    'rewrite'               => array(
        'slug' => __( 'event', 'mavericktheme' )
    ),
);

register_post_type( 'mav_cpt_event', $mav_args );