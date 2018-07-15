<?php
/**
 * @package maverick-theme
 */

function mavf_admin_theme_config_options() {

	/**
	 * Section: Theme Supports
	 */
	require_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_theme-supports.php';


	// Post formats
	require_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_post-format.php';

	// Custom Post Types
	require_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_cpt.php';

	// Grid system
	require_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_grid-system.php';

	// Theme language
	// require_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_language.php';

	/**
	 * Section: Theme Settings
	 */
    add_settings_section(
		'mavsec_theme_config_theme_setting',
		__('Trang Blog','maverick-theme'),
		'mavf_theme_config_theme_setting',
		'mav_admin_page_theme_config'
	);

	// Load more post via Ajax
	require_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_ajax-load-posts.php';

	// Show sidebar
	require_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_blog-page-sidebar.php';

	// Blog page columns
	require_once TEMPLATE_DIR.'/inc/admin/mav-admin_theme-config_blog-page-columns.php';
}

add_action( 'admin_init' , 'mavf_admin_theme_config_options' );

// Create admin page for Theme Config
function mavf_admin_page_theme_config() {
    require_once TEMPLATE_DIR.'/inc/admin/mav-admin-theme-config.php';
}

function mavf_theme_config_theme_setting() {
	_e('Các thiết lập cho trang Blog','maverick-theme');
}