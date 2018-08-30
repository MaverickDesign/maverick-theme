<?php
/**
 * @package mavericktheme
 * Template Name: To Be Updated
 * Template Post Type: page
 */
?>

<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main" class="mav-page-wrapper" data-page-id="<?php echo get_the_ID(); ?>">
    <div class="mav-page-ctn">
        <!-- Page Header -->
        <?php get_template_part('/template-parts/mav-page__header'); ?>

        <!-- Page Content -->
        <section id="mavid-page-content" class="mav-sec-wrapper">
            <div class="mav-sec-ctn">
                <div class="mav-sec-body-wrapper">
                    <div class="mav-sec-body-ctn">
                        <?php
                        printf(
                            '<p class="mav-flex-center mav-text--lg mav-text-center">%1$s</p>',
                            __('Nội dung trang web này đang được cập nhật, vui lòng quay lại sau.', 'mavericktheme')
                        );
                        echo '<div class="mav-margin-top-lg">';
                            // Back and Home Buttons
                            require TEMPLATE_DIR.'/template-parts/mav-button__back-and-home.php';
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Page Footer -->
        <footer id="mavid-page-footer" class="mav-page-footer mav-page-footer-wrapper">
        </footer>
    </div>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>