<?php
/**
 * @package maverick-theme
 */
?>

<?php get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main-content">
    <header id="mavid-page-header">
        <section id="mavid-sec-page-title" class="mav-sec-page-title" <?php mavf_post_thumbnail_url();?>>
            <?php
                the_title('<h1 class="mav-page-title">','</h1>');
            ?>
        </section>
    </header>
    <section id="mavid-sec-page-content" class="mav-pg-ctn">
        <?php
            the_post();
            the_content();
        ?>
    </section>
    <footer id="mavid-page-footer">
    </footer>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>