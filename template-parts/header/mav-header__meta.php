<?php
/**
 * @package mavericktheme
 */

printf( '<meta charset="UTF-8">' );
printf( '<meta name="viewport" content="width=device-width, initial-scale=1.0">' );
$meta_content = ( has_excerpt() && is_single() ) ? get_the_excerpt() : get_bloginfo( 'description' );
printf( '<meta name="description" content="%1$s">',
    $meta_content
);