<?php
/**
 * @package mavericktheme
 */
?>
<div class="mav-card-wrapper">
    <article id="mavid-post-<?php the_ID(); ?>" <?php post_class('mav-card-post'); ?>>
        <!-- Post header -->
        <header class="mav-card-post-header" <?php if (function_exists('mavf_logo_bg')) { mavf_logo_bg('240,240,240,1','0,0,0,0.05','0,0,0,0'); };?>>
            <?php
                if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="mav-card-post-thumbnail" <?php mavf_post_thumbnail_url('medium'); ?>></a>
                <?php endif;
            ?>
        </header>
        <!-- Post content -->
        <div class="mav-card-post-content">
            <?php
                echo '<header>';
                    printf('<div class="mav-card-post-info-ctn mav-margin-bottom">');
                        printf('
                            <span class="mav-post-info" data-type="category" title="%3$s%2$s">%1$s</span>',
                            mavf_single_category(), mavf_get_single_category(), __('Xem mục ', 'mavericktheme')
                        );
                        printf('<span class="mav-post-info" data-type="date">%1$s</span>', get_the_date());
                    echo '</div>';
                    printf('<a href="%1$s" title="%3$s %2$s"><h3 class="mav-card-post-title">%2$s</h3></a>',get_permalink(),get_the_title(),__('Xem nội dung bài viết','mavericktheme'));
                echo '</header>';
                /* Only display on post index page */
                // if ( is_home() ) {
                    echo '<div class="mav-card-post-excerpt">';
                    the_excerpt();
                    echo '</div>';
                // }
            ?>
        </div>
        <!-- Post footer -->
        <footer class="mav-card-post-footer">
            <?php
                printf('<a href="%1$s" title="%2$s" class="mav-btn-solid">%2$s</a>',get_the_permalink(),__('Xem chi tiết','mavericktheme'));
            ?>
        </footer>
    </article>
</div>