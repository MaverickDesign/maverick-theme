<?php
/**
 * @package mavericktheme
 * Template Name: Contact Page
 * Template Post Type: page
 */
?>

<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main-content" class="mav-pg__wrp">
    <!-- Page Header -->
    <?php get_template_part('/template-parts/mav-page__header'); ?>

    <div class="mav-pg__ctn">
        <!-- Page Content -->
        <section class="mav-sec__wrp">
            <div class="mav-sec__ctn">
                <div class="mav-sec__body--wrp">
                    <div class="mav-sec__body--ctn">
                        <div class="mav-page-contact-wrapper mav-page__contact--wrp">
                            <!-- Contact Form -->
                            <?php
                                if ( function_exists( 'mavf_contact_form' ) )
                                {
                                    $mav_form_args = array(
                                        'fields'        => array( 'name', 'email', 'phone', 'message' ),
                                        'form_title'    => __( 'Gửi thông tin liên hệ tới <strong>'.get_bloginfo('name').'</strong>' , 'mavericktheme' ),
                                    );
                                    mavf_contact_form( $mav_form_args );
                                }
                            ?>

                            <!-- Social links -->
                            <?php
                                if ( function_exists( 'mavf_social_links' ) ) : ?>
                                    <div class="mav-contact-socials-wrapper mav-contact__socials--wrp">
                                        <div class="mav-contact-socials-ctn mav-contact__socials--ctn">
                                            <?php
                                                printf(
                                                    '<h4 class="mav-margin__bottom--lg mav-text--center">%1$s <strong class="mav-no-break">%2$s</strong> %3$s</h4>',
                                                    __( 'Liên lạc với', 'mavericktheme' ),
                                                    get_bloginfo( 'name' ),
                                                    __( 'qua mạng xã hội', 'mavericktheme' )
                                                );
                                                mavf_social_links();
                                            ?>
                                        </div>
                                    </div> <?php
                                endif;
                            ?>

                            <!-- Physical Address -->
                            <div class="mav-contact-wrapper mav-contact__wrp">
                                <div class="mav-contact-ctn mav-contact__ctn">
                                    <h4 class="mav-margin__bottom--lg mav-text--center"><?php _e( 'Liên hệ trực tiếp với' , 'mavericktheme' ); ?> <strong class="mav-no-break"><?php echo get_bloginfo('name'); ?></strong></h4>
                                    <?php
                                        get_template_part('/template-parts/mav-contact-info');
                                    ?>
                                    <!-- Google Map -->
                                    <?php
                                        if ( function_exists( 'mavf_google_map' ) && !empty( esc_attr( get_option( 'mav_setting_enable_google_map' ) ) ) ) {
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