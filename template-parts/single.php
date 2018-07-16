<?php
/**
 * @package maverick-theme
 */
?>

<article id="mavid-post-<?php the_ID(); ?>" class="mav-post">
    <header id="mavid-post-header" class="mav-post-header">
        <?php
            if (has_post_thumbnail()): ?>
                <div id="mavid-post-feature-image" class="mav-post-feature-image mav-hide-on-phone" style="background-image: url(<?php echo(get_the_post_thumbnail_url(get_the_ID(),'full'));  ?>)">
                </div>
            <?php endif;
        ?>
        <?php if (!is_attachment()): ?>
            <div id="mavid-post-info" class="mav-post-info-wrapper">
                <div class="mav-post-info-ctn">
                <?php
                    $mavSingleCat = function_exists('mavf_get_single_category') ? mavf_get_single_category() : '';

                    printf(
                        '<span class="mav-post-info" title="%2$s %1$s" data-type="category">%3$s</span>',
                        $mavSingleCat,
                        __('Xem các bài chuyên mục','maverick-theme'),
                        mavf_single_category()
                    );
                    printf('
                        <span class="mav-post-info" title="%2$s" data-type="date">%1$s</span>',
                        get_the_date(),
                        __('Ngày đăng','maverick-theme')
                    );
                    printf('
                        <span class="mav-post-info" title="%2$s" data-type="author">%1$s</span>',
                        get_the_author(),
                        __('Tác giả','maverick-theme')
                    );
                ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
            if (is_single() && !is_attachment()) {
                printf('<div class="mav-site-width"><h1 id="mavid-post-title" class="mav-post-title">%1$s</h1></div>', get_the_title());
            }
        ?>
    </header>
    <section id="mavid-post-content" class="mav-post-content-wrapper<?php if (is_attachment()) {echo ' mav-post-attachment-wrapper';} ?>">
        <div class="mav-post-content-ctn mav-post-content<?php if (is_attachment()) {echo ' mav-post-attachment-ctn';} ?>">
            <?php
                // if (function_exists('mavf_post_content_modifier')) {
                //     mavf_post_content_modifier(THEME_DIR.'/template-parts/mav-patterns.json');
                // }
                the_content();
            ?>
        </div>
    </section>
    <footer id="mavid-post-footer" class="mav-post-footer-wrapper mav-post-footer">
        <div class="mav-pg-ctn mav-post-footer-ctn">
            <?php if (has_tag()): ?>
                <div class="mav-post-tags-wrapper">
                    <div class="mav-post-tags-ctn">
                        <?php
                        printf('<h4>%1$s</h4>',__('Thẻ liên kết','maverick-theme'));
                        the_tags('<ul id="mavid-post-tag-list" class="mav-post-tag-list"><li>', '</li><li>', '</li></ul>');
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php
                $mavCountPost = wp_count_posts();
                if ($mavCountPost->publish > 1): ?>
                <div class="mav-post-navigation-wrapper">
                    <div class="mav-post-navigation-ctn">
                    <?php
                        printf('<h4>%1$s</h4>', __('Các bài viết khác','maverick-theme'));
                        echo '<nav class="mav-post-navigation">';
                            previous_post_link('%link', '%title');
                            next_post_link('%link', '%title');
                        echo '</nav>';
                    ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </footer>
</article>

<?php
/**
 * Related articles
 */

$categories = get_the_category();

if ( !empty($categories) && $categories[0]->count > 2 ): ?>
    <section id="mavid-sec-related-posts" class="mav-related-posts-wrapper">
        <div class="mav-flex-center">
            <h2 class="mav-sec-title">Cùng chuyên mục
            <?php
                if (!empty($categories)) {
                    printf(sprintf('<a href="%1$s" title="%3$s %2$s"><strong class="mav-no-break">%2$s</strong></a>', esc_url(get_category_link($categories[0]->term_id)), esc_html($categories[0]->name),__('Xem tất cả bài trong chuyên mục','maverick-theme')));
                }
            ?>
            </h2>
        </div>
        <?php
            // Check if total post is greater than number of post to display
            $mavNumberOfPostsDisplay = 4 ? $categories[0]->count > 4 : $categories[0]->count;
            if (function_exists('mavf_carousel')){
                $mavArgs = array(
                    'number_of_posts'           => 6,
                    'number_of_posts_display'   => $mavNumberOfPostsDisplay,
                    'categories'                => array($categories[0]->term_id),
                );
                echo '<div class="mav-related-posts-wrapper">';
                    echo '<div class="mav-related-posts-ctn">';
                        mavf_carousel($mavArgs);
                    echo '</div>';
                echo '</div>';
            }
        ?>
        <div class="mav-site-width mav-flex-center">
            <?php
                printf('
                <a href="%1$s" class="mav-btn-primary" title="%3$s %2$s">%4$s</a>',
                esc_url( get_category_link( $categories[0]->term_id ) ),
                esc_html( $categories[0]->name ),
                __('Xem tất cả bài trong chuyên mục','maverick-theme'),
                __('Xem đầy đủ', 'maverick-theme')
                );
            ?>
        </div>
    </section>
<?php endif;