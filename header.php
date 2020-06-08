<?php
/**
 * @package mavericktheme
 */

// Redirect to homepage when in maintenace mode
get_template_part( '/template-parts/header/mav-header__redirect' );

printf( '<!DOCTYPE html>' );

/**
 * HTML Tag
 * ========
 */

// Check for development mode is enabled
$mav_dev_mode = get_option( 'mav_setting_dev_mode' ) ? 'data-dev-mode' : '';
printf(
    '<html %1$s %2$s>',
    get_language_attributes(), $mav_dev_mode
);

/**
 * Head Tag
 * ========
 */

printf('<head>');

    /* Google Analytics */
    get_template_part( '/template-parts/mav-header__google-analytics' );

    /* Google Tag Manager */
    get_template_part( '/template-parts/header/mav-header__google-tag-manager' );

    /* Google AdSense */
    get_template_part( '/template-parts/header/mav-header__google-adsense' );

    /*
     * Site Meta
     * =========
     */
    get_template_part( 'template-parts/header/mav-header__meta' );

    get_template_part( 'template-parts/header/mav-header__open-graph' );

    /* Site Title */

    $mav_blog_desc = get_bloginfo( 'description' );
    $mav_title = get_bloginfo( 'name' );

    if ( !is_front_page() ) {
        $mav_title = get_the_title().' - '.get_bloginfo('name');
    } else {
        if (!empty($mav_blog_desc)) {
            $mav_title = get_bloginfo('name').' - '.$mav_blog_desc;
        } else {
            $mav_title = get_bloginfo('name');
        }
    }

    printf( '<title>%1$s</title>', $mav_title );

    // Wordpress Heads
    wp_head();

    /* Modified Theme Styles */
    get_template_part( '/template-parts/header/mav-header__modified-styles' );

echo '</head>';

    // Detect device
    if ( function_exists( 'mavf_mobile_detect' ) ) {
        $mav_device = mavf_mobile_detect();
    } else {
        $mav_device = '';
    }

    // Get option Grid System
    $mav_site__width = esc_attr( get_option( 'mav_setting_grid_system' ) );

?>

<body data-device="<?php echo $mav_device; ?>" data-site-width="<?php echo $mav_site__width; ?>">

    <?php
        if ( ! empty( $mav_egtm ) && ! empty( $mav_gtm_id ) ) : ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTGC75P"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <?php endif;
    ?>

    <?php
        // Get option Enable Facebook App
        $mav_efa  = esc_attr( get_option( 'mav_setting_enable_facebook_app' ) );

        // Get option Facebook App ID
        $mav_faid = esc_attr( get_option( 'mav_setting_facebook_app_id' ) );

        if ( ! empty( $mav_efa ) && ! empty( $mav_faid ) ) : ?>
            <!-- Facebook Script -->
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=<?php echo $mav_faid; ?>&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <?php endif;
    ?>

    <header id="mavid-site-header" class="mav-pg__header mav-pg__header--wrp">

        <!-- Header Logo -->
        <section id="mavid-sec-header-logo" class="mav-header__logo--wrp">
            <div class="mav-header__logo--ctn">

                <!-- Mobile Menu Icon -->
                <button id="mavid-mobile-menu-icon" class="mav-mobile-menu-icon fas fa-bars" data-state="close" title="<?php _e( 'Nhấn để mở','mavericktheme' ); ?>"></button>

                <!-- Site Logo -->
                <div id="mavid-site-logo" class="mav-site__logo--wrp">
                    <a href="<?php  bloginfo('url') ;?>" title="<?php _e( 'Về trang chủ', 'mavericktheme' ); ?>" class="mav-site-logo-ctn mav-site__logo--ctn">
                        <?php
                            // Get option brand logo
                            $mav_brand_logo = esc_attr( get_option( 'mav_setting_brand_logo' ) );
                            if ( $mav_brand_logo ) {
                                echo "<img src=\"$mav_brand_logo\">";
                            }
                            else {
                                echo '<img src="'.TEMPLATE_URI.'/assets/brand-logo.php?back=193,49,34,1&mark=255,255,255,1&typo=255,255,255,0">';
                            }
                        ?>
                    </a>
                </div>

                <div class="mav-header__utilities--wrp">
                    <div class="mav-header__utilities--ctn">

                        <!-- Header Social Links -->
                        <?php
                            if( function_exists( 'mavf_social_links' ) && !empty( mavf_check_social_accounts() ) ):
                                printf('<div id="mavid-header-socials" class="mav-header-social-links mav-header-socials-wrapper">');
                                    printf('<div class="mav-header-socials-ctn">');
                                        mavf_social_links();
                                    echo '</div>';
                                echo '</div>';
                            endif;
                        ?>

                        <!-- Site Search Toggle Button -->
                        <div class="mav-header__search__icon--wrp">
                            <button class="mav-site-search-icon fas fa-search" title="<?php _e( 'Tìm nội dung' , 'mavericktheme' ); ?>">
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- Header Site Search -->
        <?php get_template_part( '/template-parts/mav-header__site-search' ); ?>

    </header>

    <!-- Header Menu -->
    <?php get_template_part( '/template-parts/mav-header__menu' ); ?>

    <!-- Header BreadCrumbs -->
    <?php get_template_part( '/template-parts/mav-header__breadcrumbs' ); ?>