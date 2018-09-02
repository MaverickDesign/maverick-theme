<?php
    // Redirect to homepage when in maintenace mode
    // if ( ! is_home() && get_option( 'mav_setting_maintenance' ) ) {
    //     wp_redirect( home_url() );
    //     exit;
    // }
?>

<?php
/**
 * @package mavericktheme
 */
?>

<?php
    /* Detect device */
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
<html <?php language_attributes(); ?> <?php if(get_option('mav_setting_dev_mode')){ echo 'data-dev-mode'; } ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph Data -->
    <meta property="og:url"           content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php single_post_title(); ?>" />
    <meta property="og:description"   content="Your description" />
    <?php if( !is_404() && has_post_thumbnail() ): ?>
    <meta property="og:image"         content="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" />
    <?php endif; ?>
    <!-- Open Graph Data -->
    <title>
        <?php
            if ( !is_front_page() ) {
                wp_title('');
                echo(' - ');
                bloginfo( 'name' );
            } else {
                bloginfo( 'name' );
            }
        ?>
    </title>

    <?php
        /**
         * Google Analytics
         */

        $mavEGA  = esc_attr( get_option( 'mav_setting_enable_google_analytics' ) );
        $mavGAID = esc_attr( get_option( 'mav_setting_google_analytics_id' ) );

        if ( !empty( $mavEGA ) && !empty( $mavGAID ) ): ?>
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                ga('create', '<?php echo $mavGAID ?>', 'auto');
                ga('send', 'pageview');
            </script> <?php
        endif;
    ?>

    <?php
        /**
         * Wordpress Heads
         */
        wp_head();
    ?>

    <style>
        :root {
            <?php
                /* Site Width */
                $mavSiteWidth = esc_attr( get_option( 'mav_setting_grid_system' ) );
                if ( !empty( $mavSiteWidth ) ) {
                    echo '--mav-site-width: '.$mavSiteWidth.'px';
                }
            ?>
        }
    </style>

</head>

<body data-device="<?php echo $mav_device; ?>" data-site-width="<?php echo $mavSiteWidth; ?>">
    <?php
    $mavEFA  = esc_attr(get_option('mav_setting_enable_facebook_app'));
    $mavFAID = esc_attr(get_option('mav_setting_facebook_app_id'));
    if (!empty($mavEFA) && !empty($mavFAID)) : ?>
        <!-- Facebook Script -->
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                appId      : '<?php echo $mavFAID; ?>,
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
    <?php endif;
    ?>

    <header id="mavid-page-header" class="mav-pg-header mav-pg-header-wrapper">
        <!-- Header Logo -->
        <section id="mavid-sec-header-logo" class="mav-header-logo-wrapper">
            <div class="mav-header-logo-ctn">
                <!-- Mobile Menu Icon -->
                <button id="mavid-mobile-menu-icon" class="mav-mobile-menu-icon fas fa-bars" data-state="close" title="<?php _e('Nhấn để mở','mavericktheme'); ?>"></button>
                <!-- Site Logo -->
                <div id="mavid-site-logo" class="mav-site-logo-wrapper">
                    <a href="<?php  bloginfo('url') ;?>" title="<?php _e('Về trang chủ','mavericktheme'); ?>" class="mav-site-logo-ctn">
                        <?php
                            $mavBrandLogo = esc_attr(get_option('mav_setting_brand_logo'));
                            if ($mavBrandLogo) {
                                echo "<img src=\"$mavBrandLogo;\">";
                            } else {
                                echo '<img src="'.get_template_directory_uri().'/assets/brand-logo.php?back=193,49,34,1&mark=255,255,255,1&typo=255,255,255,0">';
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
                        <button class="mav-site-search-icon fas fa-search" title="<?php _e('Tìm nội dung','mavericktheme'); ?>"></button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Header Site Search -->
        <?php get_template_part('/template-parts/mav-header__site-search'); ?>
    </header>

    <!-- Header Menu -->
    <?php get_template_part('/template-parts/mav-header__menu'); ?>

    <?php
    /**
     * Breadcrumb Section
     */
    $mavBreadcrumbs = get_option('mav_setting_breadcrumbs');
    if (isset($mavBreadcrumbs['header']) && !is_front_page() && !is_home() && !is_attachment() && function_exists('mavf_breadcrumbs')) :
        printf('<section class="mav-breadcrumbs-wrapper">');
            printf('<div class="mav-breadcrumbs-ctn">');
                mavf_breadcrumbs();
            echo '</div>';
        echo '</section>';
    endif;
    ?>