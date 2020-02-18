<?php
/**
 * @package mavericktheme
 */

printf('<section id="mavid-sec-footer-copyright" class="mav-footer__copyright--wrp">');
    printf('<div class="mav-footer__copyright--ctn">');
        /**
         * Copyright info
         */
        echo '<div>';
            printf(
                '%1$s &copy; <strong>%2$s</strong> %3$s <a href="%4$s" target="_blank" class="mav-link--dark"><strong>%5$s</strong></a>. %6$s',
                __('Bản quyền','mavericktheme'), get_the_date( 'Y' ), __('của', 'mavericktheme'), get_bloginfo('url'), get_bloginfo('title'), __('Bảo lưu mọi quyền hạn.','mavericktheme')
            );
        echo '</div>';

        /**
         * Theme info
         */
        if ( ! get_option( 'mav_setting_theme_info' ) ) {
            printf('<div>');
                printf(
                    '%1$s <a href="http://www.maverick.vn/maverick-theme/" target="_blank" class="mav-link--dark" title="%3$s"><strong>Maverick Theme</strong></a> %2$s <a href="http://www.maverick.vn/" target="_blank" class="mav-link--dark" title="%4$s"><strong>Maverick Design</strong>.</a>',
                    __( 'Website được xây dựng bằng', 'mavericktheme' ), __( 'phát triển bởi', 'mavericktheme' ), __( 'Đến trang Maverick Theme của Maverick Design', 'mavericktheme' ), __( 'Đến trang Maverick Design', 'mavericktheme' )
                );
            echo '</div>';
        }

    echo '</div>';
echo '</section>';