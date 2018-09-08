<?php
/**
 * @package mavericktheme
 * Template Part - Google Analytics
 */

/**
 * Google Analytics
 */

//  Enable Google Analytics
$mav_ega  = esc_attr( get_option( 'mav_setting_enable_google_analytics' ) );
// Google Analytics ID
$mav_ga_id = esc_attr( get_option( 'mav_setting_google_analytics_id' ) );

if ( ! empty( $mav_ega ) && ! empty( $mav_ga_id ) ): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $mav_ga_id ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo $mav_ga_id ?>');
    </script>
    <!-- End of Google Analytics -->

    <!-- Old GA Script -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '<?php echo $mav_ga_id ?>', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Old GA Script -->
<?php endif; ?>