<?php
/**
 * @package mavericktheme
 */

// Redirect to homepage when in maintenace mode
if ( !is_home() && get_option( 'mav_setting_maintenance' ) ) {
    wp_redirect( home_url() );
    exit;
}