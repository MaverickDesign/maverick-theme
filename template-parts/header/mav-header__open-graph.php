<?php
/**
 * @package mavericktheme
 */
$url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
printf( '<meta property="og:url" content="http://%1$s"/>', $url );
printf( '<meta property="og:type" content="website"/>' );
printf( '<meta property="og:title" content="%1$s"/>', single_post_title('', false) );
$mav_excerpt = has_excerpt() ? get_the_excerpt() : __( '', 'mavericktheme' );
printf( '<meta property="og:description" content="%1$s"/>', $mav_excerpt );
if ( !is_404() && has_post_thumbnail() ) :
    printf('<meta property="og:image" content="%1$s"/>', get_the_post_thumbnail_url(get_the_ID(), 'full'));
endif;