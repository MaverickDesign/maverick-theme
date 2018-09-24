<?php
/**
 * @package mavericktheme
 */

    // Redirect to homepage when in maintenace mode
    if ( ! is_home() && get_option( 'mav_setting_maintenance' ) ) {
        wp_redirect( home_url() );
        exit;
    }

    // Detect device
    if ( function_exists( 'mavf_mobile_detect' ) ) {
        $mav_device = mavf_mobile_detect();
    } else {
        $mav_device = '';
    }
?>

<?php
    // session_start();
    // if (!isset($_SESSION['mavs_id'])) {
    //     $_SESSION['mavs_id']        = mavf_unique(16);
    //     $_SESSION['mavs_start']     = $_SERVER['REQUEST_TIME'];
    // }
    // $mavSessionID = $_SESSION['mavs_id'];
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if ( get_option( 'mav_setting_dev_mode' ) ) { echo 'data-dev-mode'; } ?>>
<head>
    <?php
        // Google Analytics
        get_template_part( '/template-parts/mav-header__google-analytics' );
    ?>

    <?php
        /**
         * Google Tag Manager
         */

        // Enable Google Tag Manager
        $mav_egtm = esc_attr( get_option( 'mav_setting_enable_google_tag_manager' ) );
        // Google Tag Manager ID
        $mav_gtm_id = esc_attr( get_option( 'mav_setting_google_tag_manager_id' ) );

        if ( ! empty( $mav_egtm ) && ! empty( $mav_gtm_id ) ) : ?>
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','<?php echo $mav_gtm_id ?>');</script>
            <!-- End Google Tag Manager -->
        <?php endif;
    ?>

    <?php
        /* Google AdSense */
        $mav_egas = esc_attr( get_option( 'mav_setting_enable_google_adsense' ) );
        $mav_gas_id = esc_attr( get_option( 'mav_setting_google_adsense_id' ) );
        if ( ! empty( $mav_egas ) && ! empty( $mav_gas_id ) ) : ?>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({
                    google_ad_client: "<?php echo $mav_gas_id ?>",
                    // google_ad_client: "ca-pub-9572362503337525",
                    enable_page_level_ads: true
                });
            </script>
        <?php endif;
    ?>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo get_bloginfo('description')?>">

    <!-- Open Graph Data -->
    <meta property="og:url"           content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php single_post_title(); ?>" />
    <meta property="og:description"   content="Your description" />
    <?php if ( ! is_404() && has_post_thumbnail() ) : ?>
        <meta property="og:image"         content="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" />
    <?php endif; ?>
    <!-- End of Open Graph Data -->

    <title>
        <?php
            if ( ! is_front_page() ) {
                wp_title('');
                echo(' - ');
                bloginfo( 'name' );
            } else {
                $mav_blog_desc = get_bloginfo('description');
                echo get_bloginfo( 'name' );
                if ( ! empty( $mav_blog_desc ) ) {
                    echo ' - '.$mav_blog_desc;
                }
            }
        ?>
    </title>

    <?php
        // Wordpress Heads
        wp_head();
    ?>

    <!-- Modified Theme Styles -->
    <?php get_template_part( '/template-parts/header/mav-header__modified-styles' ); ?>

</head>

<body data-device="<?php echo $mav_device; ?>" data-site-width="<?php echo $mav_site__width; ?>">
    <?php
        if ( ! empty( $mav_egtm ) && ! empty( $mav_gtm_id ) ) : ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTGC75P"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        <?php endif;
    ?>

    <?php
        $mav_efa  = esc_attr( get_option( 'mav_setting_enable_facebook_app' ) );
        $mav_faid = esc_attr( get_option( 'mav_setting_facebook_app_id' ) );
        if ( ! empty( $mav_efa ) && ! empty( $mav_faid ) ) : ?>
        <!-- Facebook Script -->
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                appId      : '<?php echo $mav_faid; ?>,
                xfbml      : true,
                version    : 'v3.0'
                });
                FB.AppEvents.logPageView();
            };
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <!-- End of Facebook Script -->
    <?php endif; ?>

    <header id="mavid-page-header" class="mav-pg-header mav-pg-header-wrapper">
        <!-- Header Logo -->
        <section id="mavid-sec-header-logo" class="mav-header-logo-wrapper">
            <div class="mav-header-logo-ctn">
                <!-- Mobile Menu Icon -->
                <button id="mavid-mobile-menu-icon" class="mav-mobile-menu-icon fas fa-bars" data-state="close" title="<?php _e( 'Nhấn để mở','mavericktheme' ); ?>"></button>
                <!-- Site Logo -->
                <div id="mavid-site-logo" class="mav-site-logo-wrapper">
                    <a href="<?php  bloginfo('url') ;?>" title="<?php _e('Về trang chủ','mavericktheme'); ?>" class="mav-site-logo-ctn">
                        <?php
                            $mav_brand_logo = esc_attr( get_option( 'mav_setting_brand_logo' ) );
                            if ($mav_brand_logo) {
                                echo "<img src=\"$mav_brand_logo;\">";
                            } else {
                                echo '<img src="'.TEMPLATE_URI.'/assets/brand-logo.php?back=193,49,34,1&mark=255,255,255,1&typo=255,255,255,0">';
                            }
                        ?>
                    </a>
                </div>

                <!-- Header Social Links -->
                <div class="mav-flex-row">
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
                    <div>
                        <button class="mav-site-search-icon fas fa-search" title="<?php _e( 'Tìm nội dung','mavericktheme' ); ?>"></button>
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