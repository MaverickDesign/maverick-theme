<?php
/**
 * @package mavericktheme
 */
?>

<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main-content">
    <section class="mav-page-wrapper" data-post-format="<?php echo get_post_format(); ?>" data-post-type="<?php echo get_post_type(); ?>">
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/single', get_post_format() );
            }
        }
        ?>
    </section>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>