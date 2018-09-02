<?php
/**
 * @package mavericktheme
 */
?>

<section id="mavid-sec-footer-social" class="mav-footer-socials-wrapper">
    <div class="mav-footer-socials-ctn">
        <?php
            printf(
                '<span class="mav-h3"><strong>%1$s</strong> %2$s</span>',
                get_bloginfo( 'name' ), __( 'trên mạng xã hội', 'mavericktheme' )
            );
            mavf_social_links();
        ?>
    </div>
</section>