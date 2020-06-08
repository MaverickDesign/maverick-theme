<?php
/**
 * @package mavericktheme
 */

// Get option - Eneable Google AdSense
$mav_egas = esc_attr( get_option( 'mav_setting_enable_google_adsense' ) );

// Get option - Google AdSense ID
$mav_gas_id = esc_attr( get_option( 'mav_setting_google_adsense_id' ) );

if ( !empty( $mav_egas ) && !empty( $mav_gas_id ) ) : ?>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "<?php echo $mav_gas_id ?>",
            enable_page_level_ads: true
        });
    </script>
<?php endif;