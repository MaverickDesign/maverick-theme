<?php
/**
 * @package maverick-theme
 */
?>

<article id="mavid-post-<?php the_ID(); ?>" class="mav-post" data-post-id="<?php the_ID(); ?>">
    <!-- Header -->
    <header class="mav-post-header-wrapper mav-post-header">
        <div class="mav-post-header-ctn">
            <!-- Feature image -->
            <?php
                if (has_post_thumbnail()): ?>
                    <div id="mavid-post-feature-image" class="mav-post-feature-image mav-hide-on-phone" style="background-image: url(<?php echo(get_the_post_thumbnail_url(get_the_ID(),'full'));  ?>)">
                    </div>
                <?php endif;
            ?>
            <!-- Post title -->
            <?php
                if (is_single() && !is_attachment()) {
                    printf('<div class="mav-pg-ctn"><h1 id="mavid-post-title" class="mav-post-title">%1$s</h1></div>', get_the_title());
                }
            ?>
            <!-- Post info -->
            <?php if (!is_attachment()): ?>
                <div id="mavid-post-info" class="mav-post-info-wrapper">
                    <div class="mav-post-info-ctn">
                    <?php
                        $mavSingleCat = function_exists('mavf_get_single_category') ? mavf_get_single_category() : '';
                        if (!empty($mavSingleCat)) {
                            printf(
                                '<span class="mav-post-info" title="%2$s %1$s" data-type="category">%3$s</span>',
                                $mavSingleCat,
                                __('Xem các bài chuyên mục','maverick-theme'),
                                mavf_single_category()
                            );
                        }
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

        </div>
    </header>
    <!-- Post Content -->
    <section class="mav-sec-wrapper mav-post-content-wrapper">
        <div class="mav-sec-ctn mav-post-content-ctn mav-post-content">
            <?php
                // if (function_exists('mavf_post_content_modifier')) {
                //     mavf_post_content_modifier(THEME_DIR.'/template-parts/mav-patterns.json');
                // }
                the_content();
            ?>
        </div>
    </section>
    <?php
        if ((has_tag()) || (wp_count_posts()->publish > 1)): ?>
            <!-- Post Footer -->
            <footer class="mav-post-footer-wrapper mav-post-footer">
                <div class="mav-post-footer-ctn">
                    <?php if (has_tag()): ?>
                        <!-- Post Tags -->
                        <div class="mav-post-tags-wrapper">
                            <div class="mav-post-tags-ctn">
                                <?php
                                printf('<h4 class="mav-margin-bottom-sm">%1$s</h4>',__('Thẻ liên kết','maverick-theme'));
                                the_tags('<ul id="mavid-post-tag-list" class="mav-post-tag-list"><li>', '</li><li>', '</li></ul>');
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                        $mavCountPost = wp_count_posts();
                        if ($mavCountPost->publish > 1): ?>
                            <!-- Post Navigation -->
                            <div class="mav-post-navigation-wrapper">
                                <div class="mav-post-navigation-ctn">
                                <?php
                                    $mavTitle = __('Các bài viết khác','maverick-theme');
                                    // Attachment Page
                                    if (is_attachment()) {
                                        $mavTitle = __('Trở lại bài viết','maverick-theme');
                                    }
                                    printf('<h4 class="mav-margin-bottom-sm">%1$s</h4>', $mavTitle);
                                    echo '<nav class="mav-post-navigation">';
                                        previous_post_link('%link', '%title');
                                        next_post_link('%link', '%title');
                                    echo '</nav>';
                                ?>
                                </div>
                            </div> <?php
                        endif;
                    ?>
                </div>
            </footer> <?php
        endif;
    ?>
</article>

<?php
/**
 * Related posts
 */

$categories = get_the_category();

if ( function_exists('mavf_carousel') && !empty($categories) && $categories[0]->count > 2 ): ?>
    <section id="mavid-sec-related-posts" class="mav-sec-wrapper">
        <div class="mav-sec-ctn">
            <!-- Header -->
            <header class="mav-sec-header-wrapper">
                <div class="mav-sec-header-ctn">
                    <div class="mav-sec-title-wrapper">
                        <div class="mav-sec-title-ctn">
                            <h4 class="mav-sec-title">
                            <?php
                                if (!empty($categories)) {
                                    printf(
                                        '%4$s <a href="%1$s" title="%3$s %2$s"><strong class="mav-no-break">%2$s</strong></a>',
                                        esc_url(get_category_link($categories[0]->term_id)), esc_html($categories[0]->name),__('Xem tất cả bài trong chuyên mục','maverick-theme'), __('Cùng chuyên mục','maverick-theme')
                                    );
                                }
                            ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Body -->
            <div class="mav-sec-body-wrapper">
                <div class="mav-sec-body-ctn">
                    <?php
                        // Check if total post is greater than number of post to display
                        $mavNumberOfPostsDisplay = 4 ? $categories[0]->count > 4 : $categories[0]->count;
                        $mavArgs = array(
                            'number_of_posts'           => 6,
                            'number_of_posts_display'   => $mavNumberOfPostsDisplay,
                            'categories'                => array($categories[0]->term_id),
                        );
                        mavf_carousel($mavArgs);
                    ?>
                </div>
            </div>

            <!-- Footer -->
            <footer class="mav-sec-footer-wrapper">
                <div class="mav-sec-footer-ctn">
                    <?php
                        printf(
                            '<a href="%1$s" title="%3$s %2$s"><button class="mav-btn-primary-lg">%4$s</button></a>',
                            esc_url( get_category_link( $categories[0]->term_id ) ),
                            esc_html( $categories[0]->name ),
                            __('Xem tất cả bài trong chuyên mục','maverick-theme'),
                            __('Xem đầy đủ', 'maverick-theme')
                        );
                    ?>
                </div>
            </footer>
        </div>
    </section>
<?php endif;