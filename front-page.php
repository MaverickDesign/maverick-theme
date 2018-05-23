<?php
/*
 * @package mavericktheme
 */
?>
<?php get_header(); ?>
<!-- Page content starts here -->
<main id="mavid-page-main-content">
<?php
    // if (function_exists(mavf_slider)) {
    //     mavf_slider(2,'mavid-slider-2','mav-slider-type-2-ctn');
    // }
?>
<?php
    // if (function_exists(mavf_slider)) {
    //     mavf_slider(1,'mavid-hero-slider','mav-slider-type-1-ctn');
    // }
?>
<?php
    if (function_exists(mavf_slider)) {
        // mavf_slider(2,'mavid-slider-2','mav-slider-type-2-ctn');
    }
?>
<?php
    if (function_exists(mavf_google_map)) {
        // mavf_google_map(false,'30vw');
    }
?>
<!-- <p class="mav-count-down" data-expired="01/16/2019"></p>
<p class="mav-count-down" data-expired="06/28/2018"></p> -->
<?php
if (function_exists(mavf_post_carousel)){
    mavf_post_carousel(6,4,310);
}
?>
</main>
<!-- Page content ends here -->
<?php get_footer(); ?>
<script>
    // mavf_slider('mavid-slider-1','mav-slider-type-1-ctn');
    // mavf_slider('mavid-slider-2','mav-slider-type-2-ctn');
    // mavf_slider('mavid-slider-3','mav-slider-type-3-ctn');
    // mavf_type_writer('','.mav-type-writer','',40,false,3000);
    // mavf_type_multi('','|','.mav-type-writer','',40,1000);    
</script>