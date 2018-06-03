<?php
/*
 * @package mavericktheme
 */
?>
<footer id="mavid-page-footer" class="mav-pg-footer">
    <section class="mav-footer-socials-wrapper">
        <div id="mavid-footer-socials" class="mav-pg-ctn mav-footer-socials-ctn">
              <?php 
                printf(sprintf('<span><strong>%1$s</strong> %2$s</span>',get_bloginfo( 'name' ),__('trên mạng&nbsp;xã&nbsp;hội','mavericktheme')));
                mavf_social_links();
              ?>
        </div>
    </section>
    <section id="mavid-sec-footer-menu" class="mav-pg-ctn mav-footer-menu-ctn mav-hide-on-mobile">
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
    </section>
    <section id="mavid-sec-footer-copyright" class="mav-footer-copyright-wrapper">
        <div class="mav-pg-ctn">
            <?php 
                printf(sprintf('<aside class="mav-font-sm mav-margin-bottom-sm">Bản quyền &copy; <strong>%1$s</strong> của <a href="%3$s" target="_blank"><strong>%2$s</strong></a>. Bảo lưu mọi quyền hạn.</aside>', get_the_date('Y'), get_bloginfo( 'title' ) , get_bloginfo( 'url' ) ) );
            ?>
            <?php 
                printf(sprintf('<aside class="mav-font-sm">Website xây dựng bằng <a href="http://www.maverick.vn/maverick-theme/" target="_blank"><strong>Maverick Theme</strong></a> phát triển bởi <a href="http://www.maverick.vn" target="_blank"><strong>Maverick Design</strong></a>.</aside>') );
            ?>
        </div>
    </section>
</footer>    

    <?php 
        /* Wordpress Footer Functions */
        wp_footer();
    ?>
    </body>
</html>