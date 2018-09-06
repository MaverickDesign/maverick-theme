<?php
/**
 * @package mavericktheme
 */
?>

<section id="mavid-sec-footer-social" class="mav-footer-socials-wrapper">
    <div class="mav-footer-socials-ctn">
        <?php
            printf(
                '<p class="mav-text--xl mav-text--center"><strong>%1$s</strong> %2$s</p>',
                get_bloginfo( 'name' ), __( 'trên <span class="mav-no-break">mạng xã hội</span>', 'mavericktheme' )
            );
            mavf_social_links();
        ?>
    </div>
</section>