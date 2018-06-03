<?php
/*
 * @package mavericktheme
 */
?>
<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main-content">
<?php
    if (is_home() && function_exists(mavf_slider)):
        echo '<section class="mav-hide-on-phone mav-margin-bottom-lg">';
            $mavArgs = array (
                'slider_type'       => 3,
                'height'            => '30vh',
                // 'slider_id'         => 'mavid-slider-1',
                // 'slider_container'  => 'mav-slider-type-1-ctn',
                // 'mavDisplayTitle'   => true,
                // 'display_title'     => true,
                // 'number_of_slides'  => 3,
                // 'interval'          => 10000,
                // 'categories'        => array(1,4)
                // 'category'              => 4
                // 'posts'                => array(32,139,135,132,129)
            );
            mavf_slider($mavArgs);
        echo '</section>';
    endif;
?>
<section class="mav-has-sidebar">
    <?php
        if (have_posts()): ?>
            <section id="mavid-post-index" class="mav-post-index-wrapper">
                <div class="mav-post-index-ctn mav-grid-col-3">
                    <?php while (have_posts()):
                        the_post();
                        get_template_part( 'template-parts/content', get_post_format() );
                    endwhile; ?>
                </div>
                <div id="mavid-paginate-links" class="mav-paginate-links-wrapper">
                    <div class="mav-paginate-links-ctn">
                        <?php
                            $mavArgs = array(
                                // 'prev_next'          => false,
                                'prev_text'          => __('Trang trước','mavericktheme'),
                                'next_text'          => __('Trang sau','mavericktheme'),
                                'before_page_number' => '',
                                'after_page_number'  => ''
                            );
                            echo paginate_links($mavArgs);
                        ?>
                    </div>
                </div>
            </section>
        <?php endif;
    ?>
    <?php get_sidebar(); ?>
</section>

</main>
<!-- Page content ends here -->

<?php get_footer(); ?>