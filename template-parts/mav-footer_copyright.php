<?php
/**
 * @package mavericktheme
 */
?>

<section id="mavid-sec-footer-copyright" class="mav-footer-copyright-wrapper">
    <div class="mav-footer-copyright-ctn">
        <!-- Copyright -->
        <div>
            <?php _e('Bản quyền', 'mavericktheme');?> &copy; <strong><?php echo get_the_date( 'Y' ); ?></strong> <?php _e( 'của', 'mavericktheme' ); ?> <a href="<?php bloginfo( 'url' );?>" target="_blank" class="mav-link"><strong><?php bloginfo( 'title' ); ?></strong></a>. <?php _e( 'Bảo lưu mọi quyền hạn.', 'mavericktheme' ); ?>
        </div>
        <!-- Theme info -->
        <div class="<?php if ( get_option( 'mav_setting_theme_info' ) ) { echo 'mav-hide'; } ?>">
            <?php _e( 'Website xây dựng bằng', 'mavericktheme' ); ?> <a href="http://www.maverick.vn/mavericktheme/" target="_blank" class="mav-link"><strong>Maverick Theme</strong></a> <?php _e( 'phát triển bởi', 'mavericktheme' ); ?> <a href="http://www.maverick.vn" target="_blank" class="mav-link"><strong>Maverick Design</strong></a>.
        </div>
    </div>
</section>