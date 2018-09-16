<?php
/**
 * @package mavericktheme
 */
?>

<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main" class="mav-page-wrapper">
    <div class="mav-page-ctn">
        <!-- Tiêu đề trang -->
        <?php get_template_part('/template-parts/mav-page__header'); ?>

        <!-- Nội dung chính của trang -->
        <div id="mavid-page-content" class="mav-page-body-wrapper">
            <div class="mav-page-body-ctn">

                <!-- Giới thiệu -->
                <section class="mav-sec-wrapper mav-pg-section">
                    <div class="mav-sec-ctn">
                        <header class="mav-sec-header-wrapper">
                            <div class="mav-sec-header-ctn">
                                <div class="mav-sec-title-wrapper">
                                    <div class="mav-sec-title-ctn">
                                        <h2 class="mav-sec-title">Giới thiệu</h2>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="mav-sec-body-wrapper mav-post-content-wrapper">
                            <div class="mav-sec-body-ctn mav-post-content-ctn">
                                <div class="mav-post-content">
                                    <p><strong>Maverick's WordPress Theme</strong> (gọi tắt là <strong>Maverick Theme</strong>) là một bộ giao diện (Theme) cho nền tảng <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external" title="Đến trang wordpress.org">WordPress</a> - một trong những Hệ quản trị nội dung (<em>Content Management System - <abbr title="Content Management System">CMS</abbr></em>) được sử dụng rất nhiều trên thế giới - hiện nay chiếm khoảng <strong>31%</strong> số website trên thế giới (nguồn: <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external" title="Đến trang wordpress.org">wordpress.org</a>).</p>
                                    <p><span class="mav-mavericktheme">Maverick Theme</span> được phát triển bởi <strong class="mav-maverick-design">Maverick Design</strong> theo các tiêu chuẩn công nghệ mới nhất cho nền tảng Web hiện nay như: <abbr title="Hypertext Markup Language">HTML5</abbr>, <abbr title="Cascading Style Sheet">CSS3</abbr>, Javascript ES6+ và PHP 7.0+.</p>
                                    <p><span class="mav-mavericktheme">Maverick Theme</span> tương thích tốt với màn hình máy tính để bàn (Desktop Computer), các thiết bị di động như: Điện thoại di động thông minh (Smart Phone) và máy tính bảng (Tablet) với tiêu chí phát triển "Ưu tiên cho di động" (Mobile First).</p>
                                    <p><span class="mav-mavericktheme">Maverick Theme</span> đáp ứng đầy đủ các yêu cầu cơ bản của một website chuyên về nội dung.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Các tính năng nổi bật: Item Grid -->
                <?php
                    if (function_exists('mavf_items_grid')): ?>
                        <section class="mav-sec-wrapper mav-pg-section">
                            <div class="mav-sec-ctn">
                                <div class="mav-sec-header-wrapper">
                                    <div class="mav-sec-header-ctn">
                                        <div class="mav-sec-title-wrapper">
                                            <div class="mav-sec-title-ctn">
                                                <h2 class="mav-sec-title">Các tính năng nổi bật</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mav-sec-body-wrapper">
                                    <div class="mav-sec-body-ctn">
                                        <?php
                                            $mav_args = array(
                                                'columns'   => 4,
                                                'items'     => file_get_contents(TEMPLATE_URI.'/mav-grid-array.json')
                                            );
                                            mavf_items_grid($mav_args);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </section> <?php
                    endif;
                ?>

                <!-- Tính năng: Slider -->
                <?php if ( function_exists( 'mavf_slider' ) ) : ?>
                    <section id="mavid-sec-slider" class="mav-sec-wrapper mav-pg-section">
                        <div class="mav-sec-ctn">
                            <!-- Header -->
                            <header class="mav-sec-header-wrapper">
                                <div class="mav-sec-header-ctn">
                                    <div class="mav-sec-title-wrapper">
                                        <div class="mav-sec-title-ctn">
                                            <h2 class="mav-sec-title">Sliders</h2>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <!-- Body -->
                            <div class="mav-sec-body-wrapper">
                                <div class="mav-sec-body-ctn">
                                    <div class="mav-margin-bottom-xl">
                                        <p class="mav-sub-heading-1 mav-margin-bottom">Slider Type 1</p>
                                        <?php
                                            mavf_slider(array('slider_type' => 1, 'number_of_slides' => 4));
                                        ?>
                                    </div>
                                    <div class="mav-margin-bottom-xl">
                                        <p class="mav-sub-heading-1 mav-margin-bottom">Slider Type 2</p>
                                        <?php
                                            mavf_slider(array('slider_type' => 2));
                                        ?>
                                    </div>
                                    <div>
                                    <p class="mav-sub-heading-1 mav-margin-bottom">Slider Type 3</p>
                                        <?php
                                            mavf_slider(array('slider_type' => 3));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer -->
                            <footer class="mav-sec-footer-wrapper">
                                <div class="mav-sec-footer-ctn">
                                    <?php
                                        if ( function_exists( 'mavf_button' ) ) {
                                            mavf_button('Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg');
                                        }
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </section>
                <?php endif; ?>

                <!-- Tính năng: Featured Post -->
                <?php if ( function_exists( 'mavf_post_feature' ) ) : ?>
                    <section id="mavid-sec-post-featured" class="mav-sec-wrapper mav-pg-section">
                        <div class="mav-sec-ctn">
                            <header class="mav-sec-header-wrapper">
                                <div class="mav-sec-header-ctn">
                                    <div class="mav-sec-title-wrapper">
                                        <div class="mav-sec-title-ctn">
                                            <h2 class="mav-sec-title">Featured Post</h2>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="mav-sec-body-wrapper">
                                <div class="mav-sec-body-ctn">
                                    <?php
                                    $mav_query_args = array(
                                        'post_type'     => 'page',
                                        'post_parent'   =>  22,
                                    );
                                    $mav_args = array(
                                        'query_args'    => $mav_query_args,
                                        'button_text'   => 'Tìm hiểu thêm'
                                    );
                                    mavf_post_feature($mav_args);
                                    ?>
                                </div>
                            </div>
                            <footer class="mav-sec-footer-wrapper">
                                <div class="mav-sec-footer-ctn">
                                    <?php
                                        if ( function_exists( 'mavf_button' ) ) {
                                            mavf_button('Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg');
                                        }
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </section>
                <?php endif; ?>

                <!-- Tính năng: Post Carousel -->
                <?php if ( function_exists( 'mavf_carousel' ) ) : ?>
                    <section id="mavid-sec-post-carousel" class="mav-sec-wrapper mav-pg-section">
                        <div class="mav-sec-ctn">
                            <header class="mav-sec-header-wrapper">
                                <div class="mav-sec-header-ctn">
                                    <div class="mav-sec-title-wrapper">
                                        <div class="mav-sec-title-ctn">
                                            <h2 class="mav-sec-title">Post Carousel</h2>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="mav-sec-body-wrapper">
                                <div class="mav-sec-body-ctn">
                                    <?php
                                        $mav_args = array(
                                            'query_args'    => array(
                                                'post_type'         => 'post',
                                                'posts_per_page'    => 5,
                                                'cat'               => array(1),
                                            ),
                                            'display'   => 4,
                                        );
                                            mavf_carousel( $mav_args );
                                    ?>
                                </div>
                            </div>
                            <footer class="mav-sec-footer-wrapper">
                                <div class="mav-sec-footer-ctn">
                                    <?php
                                        if ( function_exists( 'mavf_button' ) ) {
                                            mavf_button( 'Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg' );
                                        }
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </section>
                <?php endif; ?>

                <!-- Tính năng: Post Grid -->
                <?php if ( function_exists( 'mavf_post_grid' ) ) : ?>
                    <section id="mavid-sec-post-grid" class="mav-sec-wrapper mav-pg-section">
                        <div class="mav-sec-ctn">
                            <!-- Header -->
                            <header class="mav-sec-header-wrapper">
                                <div class="mav-sec-header-ctn">
                                    <div class="mav-sec-title-wrapper">
                                        <div class="mav-sec-title-ctn">
                                            <h2 class="mav-sec-title">Post Grid</h2>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <!-- Body -->
                            <div class="mav-sec-body-wrapper">
                                <div class="mav-sec-body-ctn">
                                    <?php
                                        $mav_args = array(
                                            'post_type'         => 'post',
                                            'number_of_posts'   => 6,
                                            'posts_display'     => 3,
                                            'auto_slide'        => 'false'
                                        );
                                        mavf_post_grid( $mav_args );
                                    ?>
                                </div>
                            </div>
                            <!-- Footer -->
                            <footer class="mav-sec-footer-wrapper">
                                <div class="mav-sec-footer-ctn">
                                    <?php
                                        if ( function_exists( 'mavf_button' ) ) {
                                            mavf_button( 'Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg' );
                                        }
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </section>
                <?php endif; ?>

                <!-- Tính năng: Google Map -->
                <?php if ( function_exists( 'mavf_google_map' ) && !empty( esc_attr( get_option( 'mav_setting_enable_google_map' ) ) ) ) : ?>
                    <section id="mavid-sec-google-map" class="mav-sec-wrapper mav-pg-section">
                        <div class="mav-sec-ctn">
                            <!-- Header -->
                            <header class="mav-sec-header-wrapper">
                                <div class="mav-sec-header-ctn">
                                    <div class="mav-sec-title-wrapper">
                                        <div class="mav-sec-title-ctn">
                                            <h2 class="mav-sec-title">Google Map</h2>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <!-- Body -->
                            <div class="mav-sec-body-wrapper">
                                <div class="mav-sec-body-ctn" data-full-width>
                                    <?php
                                        mavf_google_map( array( 'height' => '50vh' ) );
                                    ?>
                                </div>
                            </div>
                            <!-- Footer -->
                            <footer class="mav-sec-footer-wrapper">
                                <div class="mav-sec-footer-ctn">
                                    <?php
                                        if ( function_exists( 'mavf_button' ) ) {
                                            mavf_button( 'Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg' );
                                        }
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </section>
                <?php endif; ?>

                <!-- Tính năng: Lighbox Gallery -->
                <section id="mavid-sec-lightbox" class="mav-sec-wrapper mav-pg-section">
                    <div class="mav-sec-ctn">
                        <header class="mav-sec-header-wrapper">
                            <div class="mav-sec-header-ctn">
                                <div class="mav-sec-title-wrapper">
                                    <div class="mav-sec-title-ctn">
                                        <h2 class="mav-sec-title">Lightbox Gallery</h2>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="mav-sec-body-wrapper">
                            <div class="mav-sec-body-ctn">
                                <?php
                                    echo do_shortcode('[gallery link="file" columns="4" size="medium" ids="231,232,233,234,235,236"]');
                                ?>
                            </div>
                        </div>
                        <footer class="mav-sec-footer-wrapper">
                            <div class="mav-sec-footer-ctn">
                                <?php
                                    if ( function_exists( 'mavf_button' ) ) {
                                        mavf_button( 'Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg' );
                                    }
                                ?>
                            </div>
                        </footer>
                    </div>
                </section>

                <!-- Tính năng: Countdown Timer -->
                <section id="mavid-sec-countdown" class="mav-sec-wrapper mav-pg-section">
                    <div class="mav-sec-ctn">
                        <header class="mav-sec-header-wrapper">
                            <div class="mav-sec-header-ctn">
                                <div class="mav-sec-title-wrapper">
                                    <div class="mav-sec-title-ctn">
                                        <h2 class="mav-sec-title">Countdown Timer</h2>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="mav-sec-body-wrapper">
                            <div class="mav-sec-body-ctn">
                                <div class="mav-countdown-wrapper">
                                    <div class="mavjs-countdown mav-countdown-ctn" data-expired="01/16/2019"></div>
                                </div>
                            </div>
                        </div>
                        <footer class="mav-sec-footer-wrapper">
                            <div class="mav-sec-footer-ctn">
                                <?php
                                    if ( function_exists( 'mavf_button' ) ) {
                                        mavf_button('Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg');
                                    }
                                ?>
                            </div>
                        </footer>
                    </div>
                </section>

                <!-- Tính năng: Accordion -->
                <?php if ( function_exists( 'mavf_post_accordion' ) ) : ?>
                    <section id="mavid-sec-accordion" class="mav-sec-wrapper mav-pg-section">
                        <div class="mav-sec-ctn">
                            <!-- Header -->
                            <header class="mav-sec-header-wrapper">
                                <div class="mav-sec-header-ctn">
                                    <div class="mav-sec-title-wrapper">
                                        <div class="mav-sec-title-ctn">
                                            <h2 class="mav-sec-title">Accordion</h2>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <!-- Body -->
                            <div class="mav-sec-body-wrapper">
                                <div class="mav-sec-body-ctn">
                                    <div class="mav-margin-bottom-xl">
                                        <p class="mav-sub-heading-1">Q&A Style</p>
                                        <?php
                                            $mav_args = array(
                                                'query_args'        => array(
                                                                        'post_type'             => 'post',
                                                                        'posts_per_page'        => 3,
                                                                        'ignore_sticky_posts'   => true,
                                                                        'post__not_in'          => get_option( 'sticky_posts' ),
                                                                    ),
                                                'collection'        => true,
                                                'faq'               => true,
                                                'removable'         => true
                                            );
                                            mavf_post_accordion( $mav_args );
                                        ?>
                                    </div>
                                    <div class="mav-margin-bottom-xl">
                                        <p class="mav-sub-heading-1">Individual</p>
                                        <?php
                                            $mav_args = array(
                                                'query_args'        => array(
                                                                        'post_type'             => 'post',
                                                                        'posts_per_page'        => 3,
                                                                        'ignore_sticky_posts'   => true,
                                                                        'post__not_in'          => get_option( 'sticky_posts' ),
                                                                    ),
                                                'removable'         => true
                                            );
                                            mavf_post_accordion( $mav_args );
                                        ?>
                                    </div>
                                    <div>
                                        <p class="mav-sub-heading-1">Collection</p>
                                        <?php
                                            $mav_args = array(
                                                'query_args'        => array(
                                                                        'post_type'             => 'post',
                                                                        'posts_per_page'        => 3,
                                                                        'ignore_sticky_posts'   => true,
                                                                        'post__not_in'          => get_option( 'sticky_posts' ),
                                                                    ),
                                                'collection'        => true,
                                            );
                                            mavf_post_accordion( $mav_args );
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer -->
                            <footer class="mav-sec-footer-wrapper">
                                <div class="mav-sec-footer-ctn">
                                    <?php
                                        if ( function_exists( 'mavf_button' ) ) {
                                            mavf_button('Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg');
                                        }
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </section>
                <?php endif; ?>

                <!-- Tính năng: Tab View -->
                <?php
                    if (function_exists('mavf_tabbed_posts')): ?>
                        <section id="mavid-sec-tab-view" class="mav-sec-wrapper mav-pg-section">
                            <div class="mav-sec-ctn">
                                <header class="mav-sec-header-wrapper">
                                    <div class="mav-sec-header-ctn">
                                        <div class="mav-sec-title-wrapper">
                                            <div class="mav-sec-title-ctn">
                                                <h2 class="mav-sec-title">Tab View</h2>
                                            </div>
                                        </div>
                                    </div>
                                </header>
                                <div class="mav-sec-body-wrapper">
                                    <div class="mav-sec-body-ctn">
                                        <div class="mav-sub-heading-1 mav-margin-bottom">Horizontal</div>
                                        <?php
                                            $mav_args = array(
                                                'query_args'    => array(
                                                    'post_type'             => 'post',
                                                    'posts_per_page'        => 5,
                                                    'post__not_in'          => get_option("sticky_posts"),
                                                    'ignore_sticky_posts'   => true,
                                                    'category__in'          => array(5)
                                                ),
                                            );
                                            mavf_tabbed_posts($mav_args);
                                        ?>
                                    </div>
                                    <div class="mav-sec-body-ctn">
                                        <div class="mav-sub-heading-1 mav-margin-bottom">Vertical</div>
                                        <?php
                                            $mav_args = array(
                                                'query_args'    => array(
                                                    'post_type'             => 'post',
                                                    'posts_per_page'        => 5,
                                                    'post__not_in'          => get_option("sticky_posts"),
                                                    'ignore_sticky_posts'   => true,
                                                    'category__in'          => array(5)
                                                ),
                                                'vertical'      => true
                                            );
                                            mavf_tabbed_posts($mav_args);
                                        ?>
                                    </div>
                                    <div class="mav-sec-body-ctn">
                                        <div class="mav-sub-heading-1 mav-margin-bottom">Plain</div>
                                        <?php
                                            $mav_args = array(
                                                'query_args'    => array(
                                                    'post_type'             => 'post',
                                                    'posts_per_page'        => 5,
                                                    'post__not_in'          => get_option("sticky_posts"),
                                                    'ignore_sticky_posts'   => true,
                                                    'category__in'          => array(5)
                                                ),
                                                'plain'      => true
                                            );
                                            mavf_tabbed_posts($mav_args);
                                        ?>
                                    </div>
                                </div>
                                <footer class="mav-sec-footer-wrapper">
                                    <div class="mav-sec-footer-ctn">
                                        <?php
                                            if ( function_exists( 'mavf_button' ) ) {
                                                mavf_button('Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg');
                                            }
                                        ?>
                                    </div>
                                </footer>
                            </div>
                        </section> <?php
                    endif;
                ?>

                <!-- Tính năng: Message Box -->
                <?php
                    if(function_exists('mavf_message_box')): ?>
                        <section id="mavid-sec-message-box" class="mav-sec-wrapper mav-pg-section">
                            <div class="mav-sec-ctn">
                                <header class="mav-sec-header-wrapper">
                                    <div class="mav-sec-header-ctn">
                                        <div class="mav-sec-title-wrapper">
                                            <div class="mav-sec-title-ctn">
                                                <h2 class="mav-sec-title">Message Box</h2>
                                            </div>
                                        </div>
                                    </div>
                                </header>
                                <div class="mav-sec-body-wrapper">
                                    <div class="mav-sec-body-ctn">
                                        <?php
                                            mavf_message_box( __( 'Thông báo', 'mavericktheme' ) );
                                        ?>
                                    </div>
                                </div>
                                <footer class="mav-sec-footer-wrapper">
                                    <div class="mav-sec-footer-ctn">
                                        <?php
                                            if ( function_exists( 'mavf_button' ) ) {
                                                mavf_button( 'Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg' );
                                            }
                                        ?>
                                    </div>
                                </footer>
                            </div>
                        </section> <?php
                    endif;
                ?>

                <!-- Tính năng: Javascript Modal Box -->
                <section id="mavid-sec-modal-box" class="mav-sec-wrapper mav-pg-section">
                    <div class="mav-sec-ctn">
                        <header class="mav-sec-header-wrapper">
                            <div class="mav-sec-header-ctn">
                                <div class="mav-sec-title-wrapper">
                                    <div class="mav-sec-title-ctn">
                                        <h2 class="mav-sec-title">Javascript Modal Box</h2>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="mav-sec-body-wrapper">
                            <div class="mav-sec-body-ctn">
                                <div class="mav-flex-center-all">
                                    <button class="mav-btn-cta mav-padding" onclick="if( typeof mavf_create_modal_box === 'function' ){ typeof mavf_create_modal_box() } else { console.log('Modal function not found.') }"><?php _e( 'Nhấn để mở Modal Box' , 'mavericktheme' );?></button>
                                </div>
                            </div>
                        </div>
                        <footer class="mav-sec-footer-wrapper">
                            <div class="mav-sec-footer-ctn">
                                <?php
                                    if ( function_exists( 'mavf_button' ) ) {
                                        mavf_button('Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg');
                                    }
                                ?>
                            </div>
                        </footer>
                    </div>
                </section>

                <!-- Tính năng: Price Table -->
                <section id="mavid-sec-price-table" class="mav-sec-wrapper mav-pg-section">
                    <div class="mav-sec-ctn">
                        <!-- Header -->
                        <header class="mav-sec-header-wrapper">
                            <div class="mav-sec-header-ctn">
                                <div class="mav-sec-title-wrapper">
                                    <div class="mav-sec-title-ctn">
                                        <h2 class="mav-sec-title">Price Table</h2>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <!-- Body -->
                        <div class="mav-sec-body-wrapper">
                            <div class="mav-sec-body-ctn">
                                <div class="mav-price-table-wrapper">
                                    <div class="mav-price-table-ctn">
                                        <ul class="mav-price-table" data-size="legend">
                                            <li class="mav-price-table-row" data-row="header">&nbsp;</li>
                                            <li class="mav-price-table-row">Legend 1</li>
                                            <li class="mav-price-table-row" data-row="price"><span class="mav-price">&nbsp;</span><span class="mav-price-unit" style="visibility: hidden;">đồng</span></li>
                                            <li class="mav-price-table-row">Table row 3</li>
                                            <li class="mav-price-table-row">Table row 4</li>
                                            <li class="mav-price-table-row" data-row="footer"><button class="mav-btn-cta mav-padding" style="visibility: hidden;">Đặt mua</button></li>
                                        </ul>
                                        <ul class="mav-price-table">
                                            <li class="mav-price-table-row" data-row="header">Header Row</li>
                                            <li class="mav-price-table-row">Table row 1</li>
                                            <li class="mav-price-table-row" data-row="price"><span class="mav-price">100.000</span><span class="mav-price-unit">đồng</span></li>
                                            <li class="mav-price-table-row" data-row="checked">&nbsp;</li>
                                            <li class="mav-price-table-row" data-row="unchecked">&nbsp;</li>
                                            <li class="mav-price-table-row" data-row="footer"><button class="mav-btn-cta mav-padding">Đặt mua</button></li>
                                        </ul>
                                        <ul class="mav-price-table" data-size="big">
                                            <li class="mav-price-table-row" data-row="header">Header row really long</li>
                                            <li class="mav-price-table-row">Table row 1</li>
                                            <li class="mav-price-table-row" data-row="price"><span class="mav-price">2.000.000</span><span class="mav-price-unit">đồng</span></li>
                                            <li class="mav-price-table-row">Table row 3</li>
                                            <li class="mav-price-table-row">Table row 4</li>
                                            <li class="mav-price-table-row" data-row="footer"><button class="mav-btn-cta mav-padding">Đặt mua</button></li>
                                        </ul>
                                        <ul class="mav-price-table">
                                            <li class="mav-price-table-row" data-row="header">Header Row</li>
                                            <li class="mav-price-table-row">Table row 1</li>
                                            <li class="mav-price-table-row" data-row="price"><span class="mav-price">300.000</span><span class="mav-price-unit">đồng</span></li>
                                            <li class="mav-price-table-row">Table row 3</li>
                                            <li class="mav-price-table-row">Table row 4</li>
                                            <li class="mav-price-table-row" data-row="footer"><button class="mav-btn-cta mav-padding">Đặt mua</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Footer -->
                        <footer class="mav-sec-footer-wrapper">
                            <div class="mav-sec-footer-ctn">
                                <?php
                                    if ( function_exists( 'mavf_button' ) ) {
                                        mavf_button( 'Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg' );
                                    }
                                ?>
                            </div>
                        </footer>
                    </div>
                </section>

                <!-- Contact Form -->
                <?php
                    if ( function_exists( 'mavf_contact_form' ) ): ?>
                        <section id="mavid-sec-contact-form" class="mav-sec-wrapper mav-pg-section">
                            <div class="mav-sec-ctn">
                                <header class="mav-sec-header-wrapper">
                                    <div class="mav-sec-header-ctn">
                                        <div class="mav-sec-title-wrapper">
                                            <div class="mav-sec-title-ctn">
                                                <h2 class="mav-sec-title">Contact Form</h2>
                                            </div>
                                        </div>
                                    </div>
                                </header>
                                <div class="mav-sec-body-wrapper">
                                    <div class="mav-sec-body-ctn">
                                        <?php
                                            $mav_form_args = array(
                                                'fields'        => array( 'name', 'email', 'phone', 'address', 'dob', 'message' ),
                                                'form_title'    => __( 'Gửi thông tin liên hệ tới '.get_bloginfo( 'name' ) , 'mavericktheme' ),
                                                'form_intro'    => __( 'Liên lạc với '.get_bloginfo( 'name' ).' qua email.' , 'mavericktheme' )
                                            );
                                            mavf_contact_form( $mav_form_args );
                                        ?>
                                    </div>
                                </div>
                                <div class="mav-sec-footer-wrapper">
                                    <div class="mav-sec-footer-ctn">
                                        <?php
                                            if ( function_exists( 'mavf_button' ) ) {
                                                mavf_button( 'Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg' );
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </section> <?php
                    endif;
                ?>

                <!-- Typography -->
                <section id="mavid-sec-typography" class="mav-sec-wrapper mav-pg-section">
                    <div class="mav-sec-ctn">
                        <header class="mav-sec-header-wrapper">
                            <div class="mav-sec-header-ctn">
                                <div class="mav-sec-title-wrapper">
                                    <div class="mav-sec-title-ctn">
                                        <h2 class="mav-sec-title">Typography</h2>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="mav-sec-body-wrapper mav-post-content-wrapper">
                            <div class="mav-sec-body-ctn mav-post-content-ctn">
                                <!-- Headings -->
                                <section>
                                    <h2 class="mav-sub-heading-1 mav-margin-bottom-lg">Headings</h2>
                                    <ul class="mav-non-list">
                                        <li class="mav-h1 mav-padding-top-bottom"><span>H1</span> - <span>Heading 1</span></li>
                                        <li class="mav-h2 mav-padding-top-bottom"><span>H2</span> - <span>Heading 2</span></li>
                                        <li class="mav-h3 mav-padding-top-bottom"><span>H3</span> - <span>Heading 3</span></li>
                                        <li class="mav-h4 mav-padding-top-bottom"><span>H4</span> - <span>Heading 4</span></li>
                                        <li class="mav-h5 mav-padding-top-bottom"><span>H5</span> - <span>Heading 5</span></li>
                                        <li class="mav-h6 mav-padding-top-bottom"><span>H6</span> - <span>Heading 6</span></li>
                                    </ul>
                                </section>

                                <!-- Sub Headings -->
                                <section class="mav-post-content">
                                    <h2 class="mav-sub-heading-1 mav-margin-bottom-lg">Sub Headings</h2>
                                    <ul class="mav-non-list">
                                        <li class="mav-sub-heading-1 mav-padding-top-bottom">Sub Heading - Level 1</l>
                                        <li class="mav-sub-heading-2 mav-padding-top-bottom">Sub Heading - Level 2</l>
                                        <li class="mav-sub-heading-3 mav-padding-top-bottom">Sub Heading - Level 3</l>
                                    </ul>
                                </section>

                                <!-- Fonts Sizes -->
                                <section class="mav-post-content">
                                    <h2 class="mav-sub-heading-1 mav-margin-bottom-lg">Font Sizes</h2>
                                    <ul class="mav-non-list mav-sec-typography-font-sizes">
                                        <li>
                                            <h3 class="mav-sub-heading-2">Extra large</h3>
                                            <p class="mav-text--xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, in!</p>
                                        </li>
                                        <li>
                                            <h3 class="mav-sub-heading-2">Large</h3>
                                            <p class="mav-text--lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio nemo dicta vero eveniet voluptates? Explicabo sed quos repellendus atque et.</p>
                                        </li>
                                        <li>
                                            <h3 class="mav-sub-heading-2">Normal</h3>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsam suscipit quos, voluptas voluptatibus rem eligendi harum itaque reprehenderit minus, laudantium ratione consectetur magni. Ipsa laudantium reprehenderit dolore dolores minima!</p>
                                        </li>
                                        <li>
                                            <h3 class="mav-sub-heading-2">Small</h3>
                                            <p class="mav-text--sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel optio exercitationem voluptates accusantium cumque suscipit ea voluptate fugiat vitae odio libero adipisci ex veniam obcaecati quam, nostrum cum laborum, in recusandae at nulla? Culpa maiores corrupti ratione. Placeat, repellendus labore.</p>
                                        </li>
                                        <li>
                                            <h3 class="mav-sub-heading-2">Extra small</h3>
                                            <p class="mav-text--xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam adipisci minima voluptatibus, corrupti, nemo inventore laborum accusantium id fugiat sit ducimus. Cum odit neque voluptatum dicta asperiores architecto minus cumque nam tempore dolore corporis, impedit tempora blanditiis? Ea exercitationem dolor qui? Veniam, sunt! Sint ad nobis doloremque corporis recusandae iure.</p>
                                        </li>
                                    </ul>
                                </section>

                                <!-- List Items -->
                                <section class="mav-post-content">
                                    <h2 class="mav-sub-heading-1 mav-margin-bottom-lg">List Items</h2>
                                    <h3 class="mav-sub-heading-2 mav-accordion-trigger mav-margin-bottom" data-trigger-icon data-state="open">Unorder List</h3>
                                    <ul class="mav-accordion-ctn-wrapper mav-margin-bottom">
                                        <li>List item 1</li>
                                        <li>List item 2</li>
                                        <li>
                                            List item 3
                                            <ul>
                                                <li>List item 1 - Level 2</li>
                                                <li>List item 2  - Level 2</li>
                                                <li>
                                                    List item 3 - Level 2
                                                    <ul>
                                                        <li>List item 1 - Level 3</li>
                                                        <li>List item 2 - Level 3</li>
                                                        <li>
                                                            List item 3 - Level 3
                                                            <ul>
                                                                <li>List item 1 - Level 4</li>
                                                                <li>List item 2 - Level 4</li>
                                                                <li>List item 3 - Level 4</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <h3 class="mav-sub-heading-2 mav-accordion-trigger mav-margin-bottom" data-trigger-icon data-state="open">Order List</h3>
                                    <ol class="mav-accordion-ctn-wrapper mav-margin-bottom">
                                        <li>List item 1</li>
                                        <li>List item 2</li>
                                        <li>
                                            List item 3
                                            <ol>
                                                <li>List item 1 - Level 2</li>
                                                <li>List item 2  - Level 2</li>
                                                <li>
                                                    List item 3 - Level 2
                                                    <ol>
                                                        <li>List item 1 - Level 3</li>
                                                        <li>List item 2 - Level 3</li>
                                                        <li>
                                                            List item 3 - Level 3
                                                            <ol>
                                                                <li>List item 1 - Level 4</li>
                                                                <li>List item 2 - Level 4</li>
                                                                <li>List item 3 - Level 4</li>
                                                            </ol>
                                                        </li>
                                                    </ol>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </section>
                            </div>
                        </div>
                        <footer class="mav-sec-footer-wrapper">
                            <div class="mav-sec-footer-ctn">
                                <?php
                                    if ( function_exists( 'mavf_button' ) ) {
                                        mavf_button('Xem hướng dẫn sử dụng', '#' , 'mav-btn-primary-lg');
                                    }
                                ?>
                            </div>
                        </footer>
                    </div>
                </section>

            </div>
        </div>

        <!-- Chân trang -->
        <footer id="mavid-page-footer" class="mav-page-footer-wrapper">
            <div class="mav-page-footer-ctn">
            </div>
        </footer>
    </div>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>