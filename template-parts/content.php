<?php
/**
 * @package maverick-theme
 */
?>
<div class="mav-card-wrapper" data-post-id="<?php the_ID(); ?>">
    <div class="mav-card-ctn" data-post-id="<?php the_ID(); ?>">
        <article id="mavid-post-<?php the_ID(); ?>" <?php post_class( 'mav-card-post' ); ?> data-post-id="<?php the_ID(); ?>">
            <!-- Card header -->
            <header class="mav-card-post-header" <?php if ( function_exists( 'mavf_logo_bg' ) ) { mavf_logo_bg('240,240,240,1','0,0,0,0.05','0,0,0,0'); };?>>
                <?php
                    if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="mav-card-post-thumbnail" <?php mavf_post_thumbnail_url('medium'); ?>></a>
                    <?php endif;
                ?>
            </header>
            <!-- Card content -->
            <div class="mav-card-post-content">
                <?php
                    echo '<header>';
                        printf('<div class="mav-card-post-info-ctn mav-margin-bottom">');
                            printf('
                                <span class="mav-post-info" data-type="category" title="%3$s%2$s">%1$s</span>',
                                mavf_single_category(), mavf_get_single_category(), __('Xem mục ', 'maverick-theme')
                            );
                            printf('<span class="mav-post-info" data-type="date">%1$s</span>', get_the_date());
                        echo '</div>';
                        printf('<a href="%1$s" title="%3$s %2$s"><h3 class="mav-card-post-title">%2$s</h3></a>',get_permalink(),get_the_title(),__('Xem nội dung bài viết','maverick-theme'));
                    echo '</header>';
                    /* Only display on post index page */
                    if ( is_home() ) {
                        echo '<div class="mav-card-post-excerpt">';
                            the_excerpt();
                        echo '</div>';
                    }
                ?>
            </div>
            <!-- Card footer -->
            <footer class="mav-card-post-footer">
                <?php
                    printf(
                        '<a href="%1$s" title="%2$s" class="mav-btn-wrapper"><button class="mav-btn-primary" data-full-width>%2$s</button></a>',
                        get_the_permalink(),__('Xem chi tiết','maverick-theme')
                    );
                ?>
            </footer>
        </article>
    </div>
</div>