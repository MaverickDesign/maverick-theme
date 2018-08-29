<?php
/**
 * @package maverick-theme
 */
?>
<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main-content">
    <section class="mav-pg-ctn">
        <?php
            printf(
                '<h1 class="mav-text-center mav-margin-top-bottom-xl">%1$s</h1>',
                __('Không tìm thấy nội dung', 'maverick-theme')
            );
            printf(
                '<p class="mav-text-center mav-margin-bottom-lg">%1$s</p>',
                __('Nội dung bạn cần tìm không tồn tại trên website này. Vui lòng kiểm tra lại thông tin cần tìm.', 'maverick-theme')
            );
            printf('<footer class="mav-flex-center-all mav-margin-bottom-lg">');
                /* Back and Home Buttons */
                require TEMPLATE_DIR.'/template-parts/mav-button__back-and-home.php';
            echo '</footer>';
        ?>
    </section>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>