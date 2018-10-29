<?php
/**
 * @package mavericktheme
 */

if ( current_theme_supports( 'menus' ) && has_nav_menu( 'primary_menu' ) ) : ?>
    <section id="mavid-sec-header-menu" class="mav-sec-header-menu mav-hide-on-mobile">

        <?php
            $mav_sticky_logo = esc_attr( get_option( 'mav_setting_sticky_logo' ) );
            if (empty($mav_sticky_logo)): ?>
            <!-- Sticky logo -->
            <div class="mav-sticky-logo-wrapper mav-sticky__logo--wrp">
                <div class="mav-sticky-logo-ctn mav-sticky__logo--ctn">
                    <a href="<?php  bloginfo( 'url' ); ?>" title="<?php _e( 'Về trang chủ', 'mavericktheme' ); ?>" class="mav-sticky-logo">
                        <?php
                            $mav_brand_logo = get_option( 'mav_setting_brand_logo_mobile' ) ? esc_attr( get_option( 'mav_setting_brand_logo_mobile' ) ) : esc_attr( get_option( 'mav_setting_brand_logo' ) );
                            if ( $mav_brand_logo ) {
                                printf(' <img id="mavid-sticky-logo" src="%1$s">', $mav_brand_logo );
                            } else {
                                echo '<img id="mavid-sticky-logo" src="' . get_template_directory_uri() . '/assets/brand-logo.php?back=193,49,34,0&mark=255,255,255,1&typo=255,255,255,0">';
                            }
                        ?>
                    </a>
                </div>
            </div>
            <?php endif;
        ?>

        <!-- Header Menu -->
        <div class="mav-header__menu--wrp">
            <nav class="mav-header__menu--ctn">
                <?php
                    $mavMenuArgs = array(
                        'theme_location'    => 'primary_menu',
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
                        'items_wrap'        => '<ul id="mavid-header-menu" class="mav-header-menu mav-header__menu">%3$s</u>',
                        'depth'             => 0,
                        'walker'            => new Mav_Walker_Nav_Primary()
                    );
                    wp_nav_menu( $mavMenuArgs );
                ?>
            </nav>
        </div>
    </section>
<?php endif;