<?php
/**
 * @package mavericktheme
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
            if ( !is_front_page() ) {
                wp_title('');
                echo(' - ');
                bloginfo( 'name' );
            } else {
                bloginfo( 'name' );
            }
        ?>
    </title>

    <?php wp_head(); ?>
</head>

<body class="mav-page-maintenance">
    <header id="mavid-page-header">
        <?php if ( empty( get_option( 'mav_setting_maintenance_display_logo' ) ) ) : ?>
            <div class="mav-margin-top-lg">
                <figure title="<?php bloginfo( 'name' ); ?>" style="display: inline-block; margin: 0 auto;">
                    <?php
                        $mav_brand_logo = esc_attr( get_option( 'mav_setting_brand_logo' ) );
                        $mav_alt = get_bloginfo( 'name' ).' logo';
                        if ( $mav_brand_logo ) {
                            echo '<img alt="'.$mav_alt.'" src="'.$mav_brand_logo.'" height=80px>';
                        } else {
                            if ( is_child_theme() ) {
                                $mavImgSrc = get_stylesheet_directory_uri();
                            } else {
                                $mavImgSrc = get_template_directory_uri();
                            }
                            echo '<img alt="'.$mav_alt.'" src="'.$mavImgSrc.'/assets/brand-logo.php?back=193,49,34,1&mark=255,255,255,1&typo=255,255,255,1" height=80px>';
                        }
                    ?>
                </figure>
            </div>
        <?php endif; ?>
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

        <?php
            if ( empty( get_option( 'mav_setting_maintenance_display_social' ) ) && function_exists( 'mavf_social_links' ) && ! empty( mavf_check_social_accounts() ) ) :
                /* Social links */
                include_once TEMPLATE_DIR . '/template-parts/mav-footer_social-links.php';
            endif;
        ?>

        <?php
            $mav_maintenance_time = esc_attr( get_option( 'mav_setting_maintenance_time' ) );
            if ( ! empty( $mav_maintenance_time ) ) : ?>
                <!-- Maintenance time -->
                <section id="mavid-sec-maintenance-time" class="mav-page-maintenance-section">
                    <h3 class="mav-margin-bottom"><?php _e('Thời gian dự kiến hoàn tất còn', 'mavericktheme'); ?></h3>
                    <div class="mavjs-countdown mav-countdown-ctn" data-expired="<?php echo $mav_maintenance_time; ?>"></div>
                </section> <?php
            endif;
        ?>
    </main>

    <footer id="mavid-page-footer" class="mav-pg-footer">
        <!-- Copyright section -->
        <?php
            include_once TEMPLATE_DIR . '/template-parts/mav-footer_copyright.php';
        ?>
    </footer>

    <?php wp_footer(); ?>
</body>

</html>