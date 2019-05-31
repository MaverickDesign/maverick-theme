<?php
/**
 * @package mavericktheme
 */

// Redirect to homepage when in maintenace mode
if ( !is_home() && get_option( 'mav_setting_maintenance' ) ) {
    wp_redirect(home_url());
    exit;
}

// Detect device
if ( function_exists( 'mavf_mobile_detect' ) ) {
    $mav_device = mavf_mobile_detect();
} else {
    $mav_device = '';
}

$mav_site__width = esc_attr(get_option('mav_setting_grid_system'));

// session_start();
// if (!isset($_SESSION['mavs_id'])) {
//     $_SESSION['mavs_id']        = mavf_unique(16);
//     $_SESSION['mavs_start']     = $_SERVER['REQUEST_TIME'];
// }
// $mavSessionID = $_SESSION['mavs_id'];

printf('<!DOCTYPE html>');
?>
<html <?php language_attributes(); ?> <?php if (get_option('mav_setting_dev_mode')) {echo 'data-dev-mode';} ?>>
<head>

    <?php
        /* Google Analytics */
        get_template_part( '/template-parts/mav-header__google-analytics' );

        /* Google Tag Manager */
        // Get option - Enable Google Tag Manager
        $mav_egtm = esc_attr( get_option( 'mav_setting_enable_google_tag_manager' ) );
        // Get option - Google Tag Manager ID
        $mav_gtm_id = esc_attr( get_option( 'mav_setting_google_tag_manager_id' ) );
        if ( !empty($mav_egtm) && !empty($mav_gtm_id) ) : ?>
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','<?php echo $mav_gtm_id ?>');</script>
        <?php endif;

        /* Google AdSense */
        // Get option - Eneable Google AdSense
        $mav_egas = esc_attr( get_option( 'mav_setting_enable_google_adsense' ) );
        // Get option - Google AdSense ID
        $mav_gas_id = esc_attr( get_option( 'mav_setting_google_adsense_id' ) );
        if ( !empty($mav_egas) && !empty($mav_gas_id)) : ?>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({
                    google_ad_client: "<?php echo $mav_gas_id ?>",
                    enable_page_level_ads: true
                });
            </script>
        <?php endif;
    ?>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php
        echo (has_excerpt() && is_single()) ? get_the_excerpt() : get_bloginfo('description');
    ?>">

    <!-- Open Graph Data -->
    <meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php single_post_title(); ?>"/>

    <?php
        $mav_excerpt = has_excerpt() ? get_the_excerpt() : __( '', 'mavericktheme' );
        printf('<meta property="og:description" content="%1$s"/>', $mav_excerpt);

        if (!is_404() && has_post_thumbnail()) :
            printf('<meta property="og:image" content="%1$s"/>', get_the_post_thumbnail_url(get_the_ID(), 'full'));
        endif;

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
        printf('<title>%1$s</title>', $mav_title);
        // Wordpress Heads
        wp_head();


        /* Modified Theme Styles */
        get_template_part( '/template-parts/header/mav-header__modified-styles' );
    ?>

</head>

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
                <div id="mavid-site-logo" class="mav-site-logo-wrapper mav-site__logo--wrp">
                    <a href="<?php  bloginfo('url') ;?>" title="<?php _e( 'Về trang chủ', 'mavericktheme' ); ?>" class="mav-site-logo-ctn mav-site__logo--ctn">
                        <?php
                            // Get option brand logo
                            $mav_brand_logo = esc_attr( get_option( 'mav_setting_brand_logo' ) );
                            if ( $mav_brand_logo ) {
                                echo "<img src=\"$mav_brand_logo;\">";
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