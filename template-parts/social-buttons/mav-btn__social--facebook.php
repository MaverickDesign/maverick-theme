<?php
/**
 * @package mavericktheme
 */

// Facebook Share Button
$mav_efa  = esc_attr( get_option( 'mav_setting_enable_facebook_app' ) );
$mav_faid = esc_attr( get_option( 'mav_setting_facebook_app_id' ) );
if ( ! empty( $mav_efa ) && ! empty( $mav_faid ) ) :
    echo '<li class="mav-social__btn" title="'.__( 'Chia sẻ Facebook', 'mavericktheme' ).'" data-facebook><a target="_blank" href="https://www.facebook.com/dialog/share?app_id='.$mav_faid.'&amp;display=popup&amp;href='.get_the_permalink().'"><i class="fab fa-facebook-f"></i></a></li>';
endif;