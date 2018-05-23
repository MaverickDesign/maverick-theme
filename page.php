<?php
/*
    @package mavericktheme
*/
?>

<?php get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main-content">
    <header id="mavid-page-header" class="mav-page-header" <?php mavf_post_thumbnail_url();?>>
        <?php
            the_title('<h1 class="mav-page-title">','</h1>');
        ?>
    </header>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>