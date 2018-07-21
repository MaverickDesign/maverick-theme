<?php
/**
 * @package maverick-theme
 */
?>
        <footer id="mavid-page-footer" class="mav-pg-footer">
            <?php if(function_exists('mavf_social_links') && !empty(mavf_check_social_accounts())): ?>
            <!-- Footer Socials -->
            <section id="mavid-sec-footer-social" class="mav-footer-socials-wrapper">
                <div class="mav-footer-socials-ctn">
                    <?php
                        printf('<span class="mav-h3"><strong>%1$s</strong> %2$s</span>',
                            get_bloginfo( 'name' ),__('trên mạng&nbsp;xã&nbsp;hội','maverick-theme')
                        );
                        mavf_social_links();
                    ?>
                </div>
            </section>
            <?php endif; ?>
            <!-- Footer Menu -->
            <?php
                if (current_theme_supports('menus') && has_nav_menu( 'secondary_menu')): ?>
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
                <?php endif;
            ?>
            <!-- Copyright section -->
            <section id="mavid-sec-footer-copyright" class="mav-footer-copyright-wrapper">
                <div class="mav-footer-copyright-ctn">
                    <div>
                        <?php _e('Bản quyền','maverick-theme');?> &copy; <strong><?php echo get_the_date('Y'); ?></strong> <?php _e('của','maverick-theme'); ?> <a href="<?php bloginfo('url');?>" target="_blank"><strong><?php bloginfo('title'); ?></strong></a>. <?php _e('Bảo lưu mọi quyền hạn.','maverick-theme'); ?>
                    </div>
                    <div>
                        <?php _e('Website xây dựng bằng','maverick-theme'); ?> <a href="http://www.maverick.vn/maverick-theme/" target="_blank"><strong>Maverick Theme</strong></a> <?php _e('phát triển bởi','maverick-theme'); ?> <a href="http://www.maverick.vn" target="_blank"><strong>Maverick Design</strong></a>.
                    </div>
                </div>
            </section>
        </footer>

    <?php
        /* Wordpress Footer Functions */
        wp_footer();
    ?>
    <?php
        /* For Debug Only */
        printf(
            '<div id="mavid-session-info" data-id="%1$s" data-start="%2$s" class="mav-hide">',
            $_SESSION['mavs_id'], $_SESSION['mavs_start']
        );
            printf('<p>Session ID: %1$s</p>', $_SESSION['mavs_id']);
            printf('<p>Session start: %1$s</p>', date('Y/m/d H:i:s',$_SESSION['mavs_start']));
            echo 'Now is: '.date('Y/m/d H:i:s',$_SERVER['REQUEST_TIME']);
            echo '<br>';
            $mavDuration = $_SERVER['REQUEST_TIME'] - $_SESSION['mavs_start'];
            echo 'Session last: '.date('H:i:s',$mavDuration);
        echo '</div>';
    ?>
    </body>
</html>