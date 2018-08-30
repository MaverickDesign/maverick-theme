<?php
/**
 * @package mavericktheme
 */
?>

<?php
/**
 * Breadcrumb Section
 */
$mavBreadcrumbs = get_option('mav_setting_breadcrumbs');
if (isset($mavBreadcrumbs['footer']) && !is_front_page() && !is_home() && !is_attachment() && function_exists('mavf_breadcrumbs')) :
    printf('<section class="mav-breadcrumbs-wrapper">');
        printf('<div class="mav-breadcrumbs-ctn">');
            mavf_breadcrumbs();
        echo '</div>';
    echo '</section>';
endif;
?>

<footer id="mavid-page-footer" class="mav-pg-footer">
    <!-- Footer Socials -->
    <?php
    if(function_exists('mavf_social_links') && !empty(mavf_check_social_accounts())) : ?>
        <section id="mavid-sec-footer-social" class="mav-footer-socials-wrapper">
            <div class="mav-footer-socials-ctn">
                <?php
                    printf(
                        '<span class="mav-h3"><strong>%1$s</strong> %2$s</span>',
                        get_bloginfo('name'), __('trên mạng&nbsp;xã&nbsp;hội', 'mavericktheme')
                    );
                    mavf_social_links();
                ?>
            </div>
        </section>
    <?php endif;
    ?>

    <!-- Footer Menu -->
    <?php
    if (current_theme_supports('menus') && has_nav_menu('secondary_menu')) : ?>
        <section id="mavid-sec-footer-menu" class="mav-pg-ctn mav-footer-menu-wrapper mav-hide-on-mobile">
            <div class="mav-footer-menu-ctn">
                <nav id="mavid-footer-menu" class="mav-footer-menu">
                    <?php
                    /**
                     * Displays a navigation menu
                     *
                     * @param array $args Arguments
                     */
                    $args = array(
                        'theme_location'    => 'secondary_menu',
                        'menu'              => '',
                        'container'         => false,
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => '',
                        'menu_id'           => '',
                        'echo'              => true,
                        'fallback_cb'       => 'wp_page_menu',
                        'before'            => '',
                        'after'             => '',
                        'link_before'       => '',
                        'link_after'        => '',
                        'items_wrap'        => '<ul>%3$s</ul>',
                        'depth'             => 0,
                        'walker'            => ''
                    );
                    wp_nav_menu($args);
                    ?>
                </nav>
            </div>
        </section>
    <?php endif;
    ?>

    <!-- Copyright section -->
    <section id="mavid-sec-footer-copyright" class="mav-footer-copyright-wrapper">
        <div class="mav-footer-copyright-ctn">
            <div class="mav-margin-bottom-xs">
                <?php _e('Bản quyền', 'mavericktheme');?> &copy; <strong><?php echo get_the_date('Y'); ?></strong> <?php _e('của', 'mavericktheme'); ?> <a href="<?php bloginfo('url');?>" target="_blank" class="mav-link"><strong><?php bloginfo('title'); ?></strong></a>. <?php _e('Bảo lưu mọi quyền hạn.', 'mavericktheme'); ?>
            </div>
            <div class="<?php if ( ! get_option('mav_setting_theme_info') ) { echo 'mav-hide'; } ?>">
                <?php _e('Website xây dựng bằng', 'mavericktheme'); ?> <a href="http://www.maverick.vn/mavericktheme/" target="_blank" class="mav-link"><strong>Maverick Theme</strong></a> <?php _e('phát triển bởi', 'mavericktheme'); ?> <a href="http://www.maverick.vn" target="_blank" class="mav-link"><strong>Maverick Design</strong></a>.
            </div>
        </div>
    </section>
</footer>

<?php
    /**
     * Wordpress Footer Functions
     */
    wp_footer();
?>

<?php
    /**
     * For Debug Only
     */
    // printf(
    //     '<section id="mavid-session-info" data-id="%1$s" data-start="%2$s" class="mav-pg-ctn">',
    //     $_SESSION['mavs_id'], $_SESSION['mavs_start']
    // );
    //     printf('<div class="mav-padding-top-bottom">');
    //         printf('<ul>');
    //             printf('<li>Session ID: %1$s</li>', $_SESSION['mavs_id']);
    //             printf('<li>Session start: %1$s</li>', date('Y/m/d H:i:s',$_SESSION['mavs_start']));
    //             echo '<li>Now is: '.date('Y/m/d H:i:s',$_SERVER['REQUEST_TIME']).'</li>';
    //             $mavDuration = $_SERVER['REQUEST_TIME'] - $_SESSION['mavs_start'];
    //             echo '<li>Session last: '.date('H:i:s',$mavDuration).'</li>';
    //         echo '</ul>';
    //     echo '</div>';
    // echo '</section>';
?>

    </body>
</html>