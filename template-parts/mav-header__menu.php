<?php
/**
 * @package maverick-theme
 */

/**
 * Header Menu
 */

if (current_theme_supports('menus') && has_nav_menu('primary_menu')) : ?>
    <section id="mavid-sec-header-menu" class="mav-sec-header-menu mav-hide-on-mobile">
        <!-- Sticky logo -->
        <div class="mav-sticky-logo-wrapper mav-hide-on-mobile">
            <div class="mav-sticky-logo-ctn">
                <a href="<?php  bloginfo('url'); ?>" title="<?php _e('Về trang chủ', 'maverick-theme')?>" class="mav-sticky-logo">
                    <?php
                        $mavBrandLogo = esc_attr(get_option('mav_setting_brand_logo'));
                        if ($mavBrandLogo) {
                            printf('<img id="mavid-sticky-logo" src="%1$s">', $mavBrandLogo);
                        } else {
                            echo '<img id="mavid-sticky-logo" src="'.get_template_directory_uri().'/assets/brand-logo.php?back=193,49,34,0&mark=255,255,255,1&typo=255,255,255,0">';
                        }
                    ?>
                </a>
            </div>
        </div>

        <!-- Header Menu -->
        <div class="mav-header-menu-wrapper">
            <nav class="mav-header-menu-ctn">
                <?php
                $mavMenuArgs = array(
                    'theme_location' => 'primary_menu',
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
                    'items_wrap' => '<ul id="mavid-header-menu" class="mav-header-menu">%3$s</u>',
                    'depth' => 0,
                    'walker' => new Mav_Walker_Nav_Primary()
                );
                wp_nav_menu($mavMenuArgs); ?>
            </nav>
        </div>
    </section>
<?php endif;