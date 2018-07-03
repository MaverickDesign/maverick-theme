<?php
/**
 * @package mavericktheme
 */
?>
        <footer id="mavid-page-footer" class="mav-pg-footer">
            <?php if(function_exists('mavf_social_links')): ?>
            <!-- Footer Socials -->
            <section id="mavid-sec-footer-social" class="mav-footer-socials-wrapper">
                <div class="mav-pg-ctn mav-footer-socials-ctn">
                    <?php
                        printf('<span class="mav-h3"><strong>%1$s</strong> %2$s</span>',
                            get_bloginfo( 'name' ),__('trên mạng&nbsp;xã&nbsp;hội','mavericktheme')
                        );
                        mavf_social_links();
                    ?>
                </div>
            </section>
            <?php endif; ?>
            <!-- Footer Menu -->
            <section id="mavid-sec-footer-menu" class="mav-pg-ctn mav-footer-menu-wrapper mav-hide-on-mobile">
                <div class="mav-footer-menu-ctn">
                    <nav id="mavid-footer-menu" class="mav-footer-menu">
                        <?php
                            /**
                            * Displays a navigation menu
                            * @param array $args Arguments
                            */
                            $args = array(
                                'theme_location' => 'secondary_menu',
                                'menu' => '',
                                'container' => false,
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => '',
                                'menu_id' => '',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul>%3$s</ul>',
                                'depth' => 0,
                                'walker' => ''
                            );
                            wp_nav_menu( $args );
                        ?>
                    </nav>
                </div>
            </section>
            <!-- Copyright section -->
            <section id="mavid-sec-footer-copyright" class="mav-footer-copyright-wrapper">
                <div class="mav-pg-ctn">
                    <div class="mav-font-sm mav-margin-bottom-sm">
                        <?php _e('Bản quyền','mavericktheme');?> &copy; <strong><?php echo get_the_date('Y'); ?></strong> <?php _e('của','mavericktheme'); ?> <a href="<?php bloginfo( 'url' );?>" target="_blank"><strong><?php bloginfo('title'); ?></strong></a>. <?php _e('Bảo lưu mọi quyền hạn.','mavericktheme'); ?>
                        </div>
                    <div class="mav-font-sm"><?php _e('Website xây dựng bằng','mavericktheme'); ?> <a href="http://www.maverick.vn/maverick-theme/" target="_blank"><strong>Maverick Theme</strong></a> <?php _e('phát triển bởi','mavericktheme'); ?> <a href="http://www.maverick.vn" target="_blank"><strong>Maverick Design</strong></a>.</div>
                </div>
            </section>
        </footer>

    <?php
        /* Wordpress Footer Functions */
        wp_footer();
    ?>
    </body>
</html>