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
        <section id="mavid-sec-uni-slider">
            <?php
                if ( function_exists( 'mavf_uni_slider' ) ) {
                    $mav_args = array(
                        'query_args'    => array(
                            'post_type'             => 'post',
                            'posts_per_page'        => 5,
                            'ignore_sticky_posts'   => true,
                            'meta_query'            => array(
                                array(
                                    'key'        => '_thumbnail_id',
                                    'compare'    => 'EXISTS'
                                )
                            )
                        ),
                        'slider_type'   => 1,
                        'display'       => 2,
                        'slider_height' => '30vh',
                    );
                    mavf_uni_slider( $mav_args );
                }
            ?>
            <hr/>
            <?php
                if ( function_exists( 'mavf_uni_slider' ) ) {
                    $mav_args = array(
                        'query_args'    => array(
                            'post_type'             => 'post',
                            'posts_per_page'        => 5,
                            'ignore_sticky_posts'   => true,
                            'meta_query'            => array(
                                array(
                                    'key'        => '_thumbnail_id',
                                    'compare'    => 'EXISTS'
                                )
                            )
                        ),
                        'slider_type'   => 1,
                        'display'       => 1,
                        'slider_height' => '30vh',
                    );
                    mavf_uni_slider( $mav_args );
                }
            ?>
            <hr/>
            <?php
                if ( function_exists( 'mavf_uni_slider' ) ) {
                    $mav_args = array(
                        'query_args'    => array(
                            'post_type'             => 'post',
                            'posts_per_page'        => 5,
                            'ignore_sticky_posts'   => true,
                            'meta_query'            => array(
                                array(
                                    'key'        => '_thumbnail_id',
                                    'compare'    => 'EXISTS'
                                )
                            )
                        ),
                        'slider_type'   => 1,
                        'display'       => 4,
                        'slider_height' => '30vh',
                    );
                    mavf_uni_slider( $mav_args );
                }
            ?>
        </section>
    </div>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>