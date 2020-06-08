<?php
/**
 * @package mavericktheme
 */

// Get option - Enable Google Tag Manager
$mav_egtm = esc_attr( get_option( 'mav_setting_enable_google_tag_manager' ) );

// Get option - Google Tag Manager ID
$mav_gtm_id = esc_attr( get_option( 'mav_setting_google_tag_manager_id' ) );

if ( !empty( $mav_egtm ) && !empty( $mav_gtm_id ) ) : ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo $mav_gtm_id ?>');</script>
<?php endif;