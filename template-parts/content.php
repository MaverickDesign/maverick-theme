<?php
/**
 * @package maverick-theme
 */
?>
<?php
    // Get the Post or Page ID
    $mavID = get_the_ID();

    $mavStickyPost = is_sticky($mavID) ? 'sticky' : '';

    printf( '<div class="mav-card-wrapper" data-post-id="%1$s">', $mavID );
        printf( '<div class="mav-card-ctn" data-post-id="%1$s">', $mavID );
            printf( '<article class="mav-card-post %2$s" data-postid="%1$s">', $mavID, $mavStickyPost );
                /**
                 * Card Header
                 */
                $mavBackgroundLogo = function_exists( 'mavf_logo_bg' ) ? mavf_get_logo_bg('240,240,240,1','0,0,0,0.05','0,0,0,0') : '';

                printf('<header class="mav-card-post-header" %1$s>', $mavBackgroundLogo);
                    if ( has_post_thumbnail() && function_exists('mavf_get_post_thumbnail_url')):
                        printf('<a href="%1$s" class="mav-card-post-thumbnail-wrapper">', get_the_permalink());
                            printf('
                            <div class="mav-card-post-thumbnail" %1$s></div>',
                                mavf_get_post_thumbnail_url('large')
                            );
                        echo '</a>';
                    endif;
                echo '</header>';

                /**
                 * Card Body
                 */
                printf('<section class="mav-card-post-content">');
                    echo '<div class="mav-card-post-info-wrapper">';
                        printf('<div class="mav-card-post-info-ctn mav-padding">');
                            if ( function_exists('mavf_get_single_category') && function_exists('mavf_single_category') && !empty( mavf_get_single_category() ) ):
                                printf('
                                    <span class="mav-post-info" data-type="category" title="%3$s%2$s">%1$s</span>',
                                    mavf_single_category(), mavf_get_single_category(), __('Xem mục ', 'maverick-theme')
                                );
                            endif;
                            printf('<span class="mav-post-info" data-type="date">%1$s</span>', get_the_date());
                        echo '</div>';
                    echo '</div>';
                    // Title
                    printf( '<div class="mav-card-post-title-wrapper">' );
                        printf('<h3 class="mav-card-post-title"><a href="%2$s" title="%3$s%1$s">%1$s</a></h3>',
                            get_the_title(), get_the_permalink(), __( 'Xem nội dung ' , 'maverick-theme' )
                        );
                    echo '</div>';
                echo '</section>';

                /**
                 * Card Footer
                 */
                printf('<footer class="mav-card-post-footer">');
                    printf(
                        '<a href="%1$s" title="%2$s"><button class="mav-btn-primary" data-full-width>%2$s</button></a>',
                        get_the_permalink(), __('Xem chi tiết','maverick-theme')
                    );
                echo '</footer>';
            echo '</article>';
        echo '</div>';
    echo '</div>';
?>