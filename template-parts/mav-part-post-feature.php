<?php
/**
 * @package maverick-theme
 */
?>
<?php

    $mavPostType    = get_post_type();
    $mavPostID      = get_the_ID();
    $mavNameSpace   = 'mav-post-feature';

    if (!empty($mavTitleSide)) {
        $mavTitleSide = 'style=" grid-area: '.$mavTitleSide.'!important"';
    }

    printf(
        '<div id="mavid-%1$s-%2$d" data-post-type="%1$s" class="%3$s">',
        $mavPostType, $mavPostID , $mavClassWrapperItem
    );
        printf('<div class="%1$s">', $mavClassContainerItem);

            /* Figure - Post featured image */
            printf('<div class="%1$s-figure-wrapper">',$mavNameSpace);
                printf('<div class="%1$s-figure-ctn">',$mavNameSpace);
                    printf('<figure style="background: url(%1$s);">',get_the_post_thumbnail_url());
                    echo '</figure>';
                echo '</div>';
            echo '</div>';

            /* Info */
            printf('<div class="%1$s-info-wrapper" %2$s>',$mavNameSpace, $mavTitleSide);
                printf('<div class="%1$s-info-ctn">',$mavNameSpace);
                    /* Title */
                    printf('<header class="%1$s-title-wrapper">',$mavNameSpace);
                        printf('<div class="%1$s-title-ctn">',$mavNameSpace);
                            printf(
                                '<a href="%3$s" title="%4$s %1$s"><h3 class="%2$s-title mav-text-center">%1$s</h3></a>',
                            get_the_title(), $mavNameSpace, get_the_permalink(), __( 'Đến trang' , 'maverick-theme' )
                            );
                        echo '</div>';
                    echo '</header>';
                    /* Intro */
                    $mavIntroContent = ($mavPostType == 'page') ?  get_post_meta( get_the_ID(), 'mav_page_intro', true ) : get_the_excerpt();
                    printf('<div class="%1$s-intro-wrapper">',$mavNameSpace);
                        printf('<div class="%1$s-intro-ctn">',$mavNameSpace);
                            printf('<p class="%1$s-intro mav-text-center">%2$s</p>',$mavNameSpace,$mavIntroContent);
                        echo '</div>';
                    echo '</div>';
                    /* CTA Button */
                    printf('<footer class="%1$s-cta-wrapper">',$mavNameSpace);
                        printf('<div class="%1$s-cta-ctn">',$mavNameSpace);
                            printf('<a href="%2$s" title="%3$s"><button class="mav-btn-cta">%1$s</button></a>',$mavButtonText,get_the_permalink(),__( 'Đến trang '.get_the_title() , 'maverick-theme' ));
                        echo '</div>';
                    echo '</footer>';
                echo '</div>';
            echo '</div>';

        echo '</div>';
    echo '</div>';
?>