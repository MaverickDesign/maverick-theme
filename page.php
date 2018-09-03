<?php
/**
 * @package mavericktheme
 */
?>

<?php get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main" class="mav-page-wrapper">
    <div class="mav-page-ctn">
        <!-- Page Header -->
        <?php get_template_part( 'template-parts/mav-page__header' ); ?>

        <!-- Page Content -->
        <section id="mavid-page-content" class="mav-sec-wrapper">
            <div class="mav-sec-ctn">
                <div class="mav-sec-body-wrapper">
                    <div class="mav-sec-body-ctn">
                        <div class="mav-post-content-wrapper">
                            <div class="mav-post-content-ctn mav-post-content">
                                <?php
                                    the_post();
                                    if ( function_exists( 'mavf_post_content_modifier' ) ) {
                                        $mav_json_file = TEMPLATE_DIR . '/template-parts/mav-patterns.json';
                                        if ( file_exists( $mav_json_file ) ) {
                                            mavf_post_content_modifier($mav_json_file);
                                        }
                                    }
                                    the_content();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Footer -->
        <!-- <footer id="mavid-page-footer" class="mav-page-footer mav-page-footer-wrapper">
        </footer> -->
    </div>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>