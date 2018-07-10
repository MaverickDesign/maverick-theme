<?php
/*
    @package maverick-theme
*/
?>

<?php get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main-content">
    <section id="mavid-sec-page-title" class="mav-sec-page-title" <?php mavf_post_thumbnail_url();?>>
        <?php
            the_title('<h1 class="mav-page-title">','</h1>');
        ?>
    </section>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>