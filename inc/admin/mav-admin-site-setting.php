<?php
/**
 * @package mavericktheme
 */

printf('<div class="mav-admin-page-wrapper">');
    printf('<header>');
        printf( '<h1>%1$s</h1>', __( 'Thiết lập Website', 'mavericktheme' ) );
        printf( '<p class="mav-desc">%1$s</p>', __( 'Các thiết lập cho website', 'mavericktheme' ) );
    echo '</header>';

    // WordPress Setting Errors
    settings_errors();

    printf('<div class="mav-admin-page-container">');
        /* The Form */
        printf('<form id="mavid-form-site-setting" action="options.php" method="POST">');
            // Option Group
            settings_fields( 'mavog_site_setting' );
            // Sections
            do_settings_sections( 'mav_admin_page_site_setting' );
            // Submit Button
            submit_button( __( 'Lưu các thay đổi', 'mavericktheme' ), 'primary', 'mavb_submit' );
        echo '</form>';

        /* Theme Info */
        printf('<div class="mav-admin-theme-info-wrapper">');
            printf('<div class="mav-admin-theme-info-ctn">'); ?>
            <header>
                <div class="mav-admin-maverick-logo">
                    <img src="<?php echo get_template_directory_uri().'/assets/brand-logo.php?back=193,49,34,1&mark=255,255,255,1&typo=255,255,255,1'; ?>" alt="">
                </div>
                <div>
                    <p><strong><a href="http://www.maverick.vn/maverick-theme/" title="Đến trang Maverick Theme">Maverick WordPress Theme</a></strong></p>
                    <p>Bản quyền &copy; 2018 của <a href="http://www.maverick.vn" title="Đến trang maverick.vn">Maverick Design</a></p>
                    <p>Phát triển bởi: <strong>Đoàn Công Minh</strong></p>
                    <p><a href="mailto:minh@maverick.vn" title="Gửi email tới minh@maverick.vn">minh@maverick.vn</a> / <a href="tel:+84909096464" title="Gọi số 090-909-6464">090-909-MINH (6464)</a></p>
                </div>
            </header>
            <div>
                <p>Cám ơn bạn đã sử dụng <a href="http://www.maverick.vn/maverick-theme/" title="Đến trang Maverick Theme">Maverick Theme</a>. Để xem hướng dẫn sử dụng, vui lòng truy cập trang web của <a href="http://www.maverick.vn/maverick-theme/" title="Đến trang Maverick Theme">Maverick Theme</a>.</p>
                <p>Bạn có nhu cầu phát triển thêm các tính năng bổ sung cho website với <a href="http://www.maverick.vn/maverick-theme/" title="Đến trang Maverick Theme">Maverick Theme</a>, vui lòng liên hệ với <a href="http://www.maverick.vn" title="Đến trang maverick.vn">Maverick Design</a> để được hỗ trợ và tư vấn thêm.</p>
            </div>
            <div>
                <p>Với việc sử dụng <a href="http://www.maverick.vn/maverick-theme/" title="Đến trang Maverick Theme">Maverick Theme</a> cho website của bạn, đồng nghĩa với việc bạn đã đọc, hiểu rõ và chấp nhận các Điều khoản thỏa thuận và Điều kiện sử dụng của Maverick Design.</p>
                <p>Vui lòng không sử dụng <a href="http://www.maverick.vn/maverick-theme/" title="Đến trang Maverick Theme">Maverick Theme</a> nếu bạn không đồng ý với bất kỳ điều khoản, điều kiện nào của Maverick Design.</p>
            </div>
        <?php
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</div>';