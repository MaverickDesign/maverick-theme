<?php
/**
 * @package maverick-theme
 */
?>
<?php
    $mavID = get_the_ID();
    printf('<div class="mav-card-wrapper" data-post-id="%1$s">', $mavID);
        printf('<div class="mav-card-ctn" data-post-id="%1$s">', $mavID);
            printf(
                '<article class="mav-card-post" data-postid="%1$s">',
                $mavID
            );

            /* Card Header */
            $mavBackgroundLogo = function_exists( 'mavf_logo_bg' ) ? mavf_get_logo_bg('240,240,240,1','0,0,0,0.05','0,0,0,0') : '';
            printf('<header class="mav-card-post-header" %1$s>', $mavBackgroundLogo);
                if ( has_post_thumbnail() ):
                    printf('<a href="%1$s" class="mav-card-post-thumbnail-wrapper">', get_the_permalink());
                        printf('
                        <div class="mav-card-post-thumbnail" %1$s></div>',
                            mavf_get_post_thumbnail_url('large')
                        );
                    echo '</a>';
                endif;
            echo '</header>';

            /* Card Body */
            printf('<section class="mav-card-post-content">');
                echo '<div class="mav-card-post-info-wrapper">';
                    printf('<div class="mav-card-post-info-ctn mav-padding">');
                        if ( !empty( mavf_get_single_category() ) ):
                            printf('
                                <span class="mav-post-info" data-type="category" title="%3$s%2$s">%1$s</span>',
                                mavf_single_category(), mavf_get_single_category(), __('Xem mục ', 'maverick-theme')
                            );
                        endif;
                        printf('<span class="mav-post-info" data-type="date">%1$s</span>', get_the_date());
                    echo '</div>';
                echo '</div>';
                printf('<div class="mav-padding">');
                    printf('    <a href="%2$s">
                                    <h3>%1$s</h3>
                                </a>',
                        get_the_title(), get_the_permalink()
                    );
                echo '</div>';
                printf('<div>');
                echo '</div>';
            echo '</section>';
            /* Card Footer */
            printf('<footer class="mav-card-post-footer"');
                printf(
                    '<a href="%1$s" title="%2$s" class="mav-btn-wrapper"><button class="mav-btn-primary" data-full-width>%2$s</button></a>',
                    get_the_permalink(), __('Xem chi tiết','maverick-theme')
                );
            echo '</footer>';
            echo '</article>';
        echo '</div>';
    echo '</div>';
?>