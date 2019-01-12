<?php
/**
 * @package mavericktheme
 * Template Name: To Be Updated
 * Template Post Type: page
 */
?>

<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main" class="mav-pg__wrp" data-page-id="<?php echo get_the_ID(); ?>">
    <div class="mav-page-ctn">
        <!-- Page Header -->
        <?php get_template_part('/template-parts/mav-page__header'); ?>

        <!-- Page Content -->
        <section id="mavid-page-content" class="mav-sec__wrp">
            <div class="mav-sec__ctn">
                <div class="mav-sec__body--wrp">
                    <div class="mav-sec__body--ctn">
                        <?php
                            printf(
                                '<p class="mav-text--center mav-text--lg">%1$s</p>',
                                __( 'Nội dung trang web này đang được cập nhật, vui lòng quay lại sau.', 'mavericktheme' )
                            );
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Page Footer -->
        <footer id="mavid-page-footer" class="mav-page__footer mav-page__footer--wrp">
            <?php
                printf('<div class="mav-margin__bottom">');
                    // Back and Home Buttons
                    require TEMPLATE_DIR.'/template-parts/mav-button__back-and-home.php';
                echo '</div>';
            ?>
        </footer>
    </div>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>