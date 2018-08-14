<?php
/**
 * @package maverick-theme
 * Template Name: Maintenance Page
 * Template Post Type: page
 */
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        //  Wordpress Heads
        wp_head();
    ?>

</head>

<body class="mav-page-maintenance">

    <header id="mavid-page-header">
        <div title="<?php bloginfo( 'name' ); ?>" class="mav-flex-center mav-margin-top">
            <?php
                $mavBrandLogo = esc_attr(get_option('mav_setting_brand_logo'));
                if ($mavBrandLogo) {
                    echo "<img src=\"$mavBrandLogo;\" height=80px>";
                } else {
                    if (is_child_theme()){
                        $mavImgSrc = get_stylesheet_directory_uri();
                    } else {
                        $mavImgSrc = get_template_directory_uri();
                    }
                    echo '<img src="'.$mavImgSrc.'/assets/brand-logo.php?back=193,49,34,1&mark=255,255,255,1&typo=255,255,255,1" height=80px>';
                }
            ?>
        </div>
    </header>

    <main id="mavid-page-main-content">
        <header id="mavid-sec-page-title" class="mav-flex-center-all mav-page-maintenance-section">
            <?php
                the_title('<h1>','</h1>');
            ?>
        </header>
        <section id="mavid-sec-page-content" class="mav-post-content mav-page-maintenance-section">
            <?php
                the_post();
                the_content();
            ?>
        </section>

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
            <?php endif;
        ?>
        <?php
            $mavMaintenanceTime = esc_attr(get_option( 'mav_setting_maintenance_time' ));
            if (!empty($mavMaintenanceTime)): ?>
                <!-- Maintenance time -->
                <section id="mavid-sec-maintenance-time" class="mav-page-maintenance-section">
                    <h3 class="mav-margin-bottom"><?php _e('Thời gian dự kiến hoàn tất bảo trì còn','maverick-theme'); ?></h3>
                    <div class="mavjs-countdown mav-countdown-ctn" data-expired="<?php echo $mavMaintenanceTime; ?>"></div>
                </section>
            <?php endif;
        ?>
    </main>

    <footer id="mavid-page-footer" class="mav-pg-footer">
        <!-- Copyright section -->
        <section id="mavid-sec-footer-copyright" class="mav-footer-copyright-wrapper">
            <div class="mav-footer-copyright-ctn">
                <div class="mav-margin-bottom-xs">
                    <?php _e('Bản quyền','maverick-theme');?> &copy; <strong><?php echo get_the_date('Y'); ?></strong> <?php _e('của','maverick-theme'); ?> <a href="<?php bloginfo('url');?>" target="_blank" class="mav-link"><strong><?php bloginfo('title'); ?></strong></a>. <?php _e('Bảo lưu mọi quyền hạn.','maverick-theme'); ?>
                </div>
                <div>
                    <?php _e('Website xây dựng bằng','maverick-theme'); ?> <a href="http://www.maverick.vn/maverick-theme/" target="_blank" class="mav-link"><strong>Maverick Theme</strong></a> <?php _e('phát triển bởi','maverick-theme'); ?> <a href="http://www.maverick.vn" target="_blank" class="mav-link"><strong>Maverick Design</strong></a>.
                </div>
            </div>
        </section>
    </footer>

    <?php
        // Wordpress Footer
        wp_footer();
    ?>

    </body>
</html>