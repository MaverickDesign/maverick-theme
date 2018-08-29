<?php
/**
 * @package maverick-theme
 */

printf('<div class="mav-btn-ctn" data-columns="2">');
    mavf_button(
        __('Quay lại trang trước', 'maverick-theme'),
        'javascript:history.go(-1)',
        'mav-btn-secondary-lg'
    );
    mavf_button(
        __('Quay lại trang chủ', 'maverick-theme'),
        get_bloginfo('url'),
        'mav-btn-primary-lg'
    );
echo '</div>';