<?php
/**
 * @package mavericktheme
 */

if ( function_exists('mavf_social_links') ) {
    printf('<section id="mavid-site-footer-social" class="mav-footer-socials-wrapper mav-footer__socials--wrp">');
        printf('<div class="mav-footer-socials-ctn mav-footer__socials--ctn">');
            printf(
                '<p class="mav-text--xl mav-text--center"><strong>%1$s</strong> %2$s</p>',
                get_bloginfo( 'name' ), __( 'trên <span class="mav-no-break">mạng xã hội</span>', 'mavericktheme' )
            );
            mavf_social_links();
        echo '</div>';
    echo '</section>';
}