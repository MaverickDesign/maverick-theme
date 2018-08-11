<?php
/**
 * @package maverick-theme
 * Template Name: To Be Updated
 * Template Post Type: page
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
                            printf('<h1 class="mav-page-title">%1$s</h1>',__( 'Đang cập nhật' , 'maverick-theme' ));
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <section id="mavid-page-content" class="mav-sec-wrapper">
            <div class="mav-sec-ctn">
                <div class="mav-sec-body-wrapper">
                    <div class="mav-sec-body-ctn">
                        <?php
                        printf('<p class="mav-flex-center mav-text--lg mav-text-center">%1$s</p>', __( 'Nội dung trang web này đang được cập nhật, vui lòng quay lại sau.' , 'maverick-theme' ));
                        ?>
                        <div class="mav-flex-center-all mav-padding-top-xl">
                            <a href="javascript:history.go(-1)"><button class="mav-btn-secondary-lg mav-margin-right"><?php _e( 'Trở lại trang trước' , 'maverick-theme' ); ?></button></a>
                            <?php
                                mavf_button(__( 'Quay lại trang chủ' , 'maverick-theme' ),get_bloginfo( 'url' ),'mav-btn-primary-lg');
                            ?>
                        </div>
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