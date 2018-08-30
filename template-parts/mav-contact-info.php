<?php
/**
 * @package mavericktheme
 */

// Get address setting
$mavAdress  = esc_attr(get_option('mav_setting_brand_address'));
// Get phone setting
$mavPhone   = esc_attr(get_option('mav_setting_brand_phone'));
// Get email setting
$mavEmail   = esc_attr(get_option('mav_setting_brand_email'));

printf('<address class="mav-contact-info-wrapper mav-padding-top-bottom">');
    printf('<ul class="mav-contact-info-ctn">');
        // Address
        if (!empty($mavAdress)) {
            printf(
                '<li class="mav-contact-info" data-type="address">%1$s</li>',
                $mavAdress
            );
        }
        // Phone
        if (!empty($mavPhone)) {
            printf(
                '<li class="mav-contact-info" data-type="phone"><a href="tel:+84%1$s" title="%2$s%1$s">%1$s</a></li>',
                $mavPhone, __('Gọi cho số ', 'mavericktheme')
            );
        }
        // Email
        if (!empty($mavEmail)) {
            printf(
                '<li class="mav-contact-info" data-type="email"><a href="mailto:%1$s" title="%2$s%1$s">%1$s</a></li>',
                $mavEmail, __('Gửi email đến ', 'mavericktheme')
            );
        }
    echo '</ul>';
echo '</address>';