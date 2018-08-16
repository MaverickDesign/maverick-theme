<?php
/**
 * @package maverick-theme
 */
?>
<?php
    /* Detect device */
    if (function_exists('mavf_mobile_detect')) {
        $mavDevice = mavf_mobile_detect();
    } else {
        $mavDevice = '';
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
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph Data -->
    <meta property="og:url"           content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php single_post_title(); ?>" />
    <meta property="og:description"   content="Your description" />
    <?php if( !is_404() && has_post_thumbnail( $post->ID ) ): ?>
    <meta property="og:image"         content="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" />
    <?php endif; ?>
    <!-- Open Graph Data -->
    <title>
        <?php
            if (!is_front_page()) {
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
        /* Wordpress Heads */
        wp_head();
    ?>

    <style>
        :root {
            <?php
                /* Site Width */
                $mavSiteWidth = esc_attr( get_option( 'mav_setting_grid_system' ) );
                if ( !empty($mavSiteWidth) ) {
                    echo '--mav-site-width: '.$mavSiteWidth.'px';
                }
            ?>
        }
    </style>

</head>

<body data-device="<?php echo $mavDevice; ?>" data-site-width="<?php echo $mavSiteWidth; ?>">
    <?php
        $mavEFA  = esc_attr(get_option('mav_setting_enable_facebook_app'));
        $mavFAID = esc_attr(get_option('mav_setting_facebook_app_id'));
        if (!empty($mavEFA) && !empty($mavFAID)): ?>
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

        <!-- Site Search -->
        <section id="mavid-sec-site-search" class="mav-sec-wrapper mav-site-search-wrapper">
            <div class="mav-sec-ctn">
                <div class="mav-site-search-ctn">
                    <form id="mavid-site-search" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( __('Nhập từ khóa cần tìm...','maverick-theme'), 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( __('Tìm theo từ khóa','maverick-theme'), 'label' ) ?>" class="mav-search-input"/>
                        <button type="submit" title="<?php _e('Tìm kiếm','maverick-theme'); ?>" class="mav-btn-secondary"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Header Logo -->
        <section id="mavid-sec-header-logo" class="mav-header-logo-wrapper">
            <div class="mav-header-logo-ctn">
                <button id="mavid-mobile-menu-icon" class="mav-mobile-menu-icon fas fa-bars" data-state="close" title="<?php _e('Nhấn để mở','maverick-theme'); ?>"></button>
                <div id="mavid-site-logo" class="mav-site-logo-wrapper">
                    <a href="<?php  bloginfo('url') ;?>" title="<?php _e('Về trang chủ','maverick-theme'); ?>" class="mav-site-logo-ctn">
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
                <div class="mav-flex-row mav-header-social-links">
                    <?php if(function_exists('mavf_social_links') && !empty(mavf_check_social_accounts())): ?>
                        <div id="mavid-header-socials" class="mav-header-socials-wrapper">
                            <div class="mav-header-socials-ctn">
                                <?php mavf_social_links(); ?>
                            </div>
                        </div>
                        <?php endif;
                    ?>
                    <div>
                        <button class="mav-site-search-icon fas fa-search" title="<?php _e('Tìm nội dung','maverick-theme'); ?>"></button>
                    </div>
                </div>
            </div>
        </section>
    </header>

    <?php
        /**
         * Header Menu
         */
        if ( current_theme_supports( 'menus' ) && has_nav_menu( 'primary_menu') ): ?>
            <section id="mavid-sec-header-menu" class="mav-sec-header-menu mav-hide-on-mobile">

                <!-- Sticky logo -->
                <div class="mav-sticky-logo-wrapper mav-hide-on-mobile">
                    <div class="mav-sticky-logo-ctn">
                        <a href="<?php  bloginfo( 'url' ); ?>" title="<?php _e('Về trang chủ','maverick-theme')?>" class="mav-sticky-logo">
                            <?php
                                $mavBrandLogo = esc_attr(get_option('mav_setting_brand_logo'));
                                if ($mavBrandLogo) {
                                    echo "<img id=\"mavid-sticky-logo\" src=\"$mavBrandLogo;\">";
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
                        wp_nav_menu( $mavMenuArgs ); ?>
                    </nav>
                </div>
            </section>
        <?php endif;
    ?>

    <?php
		/**
		 * Breadcrumb Section
		 * Only show up when the device is not phone
		 */
        if (!is_front_page() && !is_home() && !is_attachment() && function_exists('mavf_breadcrumbs')): ?>
            <section id="mavid-site-breadcrumbs" class="mav-breadcrumbs-wrapper mav-hide-on-mobile">
                <div class="mav-breadcrumbs-ctn">
                    <?php mavf_breadcrumbs(); ?>
                </div>
            </section>
        <?php endif;
    ?>