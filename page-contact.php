<?php
/**
 * @package maverick-theme
 * Template Name: Contact Page
 * Template Post Type: page
 */
?>
<?php get_header(); ?>
<!-- Page content starts here -->
<main id="mavid-page-main-content" class="mav-page-wrapper">
    <div class="mav-page-ctn">
        <header id="mavid-page-header" class="mav-page-header-wrapper" <?php mavf_post_thumbnail_url();?>>
            <div class="mav-page-header-ctn">
                <div id="mavid-sec-page-title" class="mav-page-title-wrapper" >
                    <div class="mav-page-title-ctn" >
                        <?php
                            the_title('<h1 class="mav-page-title">','</h1>');
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content -->
        <section class="mav-sec-wrapper">
            <div class="mav-sec-ctn">
                <div class="mav-sec-body-wrapper">
                    <div class="mav-sec-body-ctn">
                        <div class="mav-page-contact-wrapper">
                            <!-- Contact Form -->
                            <?php
                            if ( function_exists( 'mavf_contact_form' ) ) {
                                $mavFormArgs = array(
                                    'fields'    => array('name','email','phone','message'),
                                    'form_title'    => __( 'Gửi thông tin liên hệ tới <strong>'.get_bloginfo( 'name' ).'</strong>' , 'maverick-theme' ),
                                    // 'form_intro'    => __( 'Liên lạc với <strong>'.get_bloginfo( 'name' ).'</strong> qua email.' , 'maverick-theme' )
                                );
                                mavf_contact_form($mavFormArgs);
                            }
                            ?>

                            <!-- Social links -->
                            <?php
                                if ( function_exists( 'mavf_social_links' ) ): ?>
                                    <div class="mav-contact-socials-wrapper">
                                        <div class="mav-contact-socials-ctn">
                                            <?php
                                                printf(
                                                    '<h3 class="mav-margin-bottom-lg mav-text-center">%1$s <strong class="mav-no-break">%2$s</strong> %3$s</h3>',
                                                    __('Liên lạc với','maverick-theme'),
                                                    get_bloginfo('name'),
                                                    __('qua mạng xã hội','maverick-theme')
                                                );
                                                mavf_social_links();
                                            ?>
                                        </div>
                                    </div> <?php
                                endif;
                            ?>

                            <!-- Physical Address -->
                            <div class="mav-contact-wrapper">
                                <div class="mav-contact-ctn">
                                    <h3 class="mav-margin-bottom-lg mav-text-center"><?php _e('Liên hệ trực tiếp với','maverick-theme'); ?> <strong class="mav-no-break"><?php echo get_bloginfo('name')?></strong></h3>
                                    <?php
                                        get_template_part( '/template-parts/mav-contact-info');
                                    ?>
                                    <!-- Google Map -->
                                    <?php
                                        if ( function_exists('mavf_google_map') && !empty( esc_attr( get_option( 'mav_setting_enable_google_map' ) ) ) ) {
                                            mavf_google_map([]);
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<!-- Page content ends here -->
<?php get_footer(); ?>