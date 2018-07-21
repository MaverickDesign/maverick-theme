<?php
/**
 * @package maverick-theme
 */
?>

<?php get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main" class="mav-page-wrapper">
    <div class="mav-page-ctn">
        <header id="mavid-page-header" class="mav-page-header-wrapper" <?php mavf_post_thumbnail_url();?>>
            <div class="mav-page-header-ctn">
                <div id="mavid-sec-page-title" class="mav-page-title-wrapper" >
                    <div class="mav-page-title-ctn" >
                        <?php
                            the_title('<h1 class="mav-page-title">','</h1>');
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <section id="mavid-page-content" class="mav-sec-wrapper">
            <div class="mav-sec-ctn">
                <div class="mav-sec-body-wrapper">
                    <div class="mav-sec-body-ctn mav-post mav-post-content">
                        <?php
                            the_post();
                            the_content();
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <footer id="mavid-page-footer" class="mav-page-footer mav-page-footer-wrapper">
        </footer>
    </div>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>