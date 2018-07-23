<?php
/**
 * @package maverick-theme
 */
?>

<?php get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main" class="mav-page-wrapper">
    <div class="mav-page-ctn">
        <!-- Tiêu đề trang -->
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
        <!-- Nội dung chính của trang -->
        <div id="mavid-page-content" class="mav-page-body-wrapper">
            <div class="mav-page-body-ctn">
                <!-- Giới thiệu -->
                <section class="mav-sec-wrapper">
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
                        <div class="mav-sec-body-wrapper">
                            <div class="mav-sec-body-ctn">
                                <div class="mav-post-content">
                                    <p><strong>Maverick's WordPress Theme</strong> (gọi tắt là <strong class="mav-maverick-theme">Maverick Theme</strong>) là một bộ giao diện hoàn toàn <strong>MIỄN PHÍ</strong> cho nền tảng <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external" title="Đến trang wordpress.org">WordPress</a> - một trong những Hệ quản trị nội dung (Content Management System - CMS) được sử dụng rất nhiều trên thế giới - hiện nay chiếm khoảng <strong>30%</strong> số website trên thế giới (nguồn: <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external" title="Đến trang wordpress.org">wordpress.org</a>).</p>
                                    <p><strong class="mav-maverick-theme">Maverick Theme</strong> được phát triển bởi <strong class="mav-maverick-design">Maverick Design</strong> theo các tiêu chuẩn công nghệ mới nhất cho nền tảng Web hiện nay như: HTML5, CSS3, Javascript ES6+ và PHP 7.0+.</p>
                                    <p><strong class="mav-maverick-theme">Maverick Theme</strong> tương thích tốt với màn hình máy tính để bàn (Desktop Computer), các thiết bị di động như: Điện thoại di động thông minh (Smart Phone) và máy tính bảng (Tablet) với tiêu chí phát triển "Ưu tiên cho di động" (Mobile First).</p>
                                    <p><strong class="mav-maverick-theme">Maverick Theme</strong> hoàn toàn có thể đáp ứng đầy đủ các nhu cầu cơ bản của một website chuyên về nội dung.</p>
                                    <p>Trang này giới thiệu các tính năng nổi bật của <strong class="mav-maverick-theme">Maverick Theme</strong>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Các tính năng nổi bật: Item Grid -->
                <?php
                    if (function_exists('mavf_items_grid')): ?>
                    <section class="mav-sec-wrapper">
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
                                        $mavArgs = array(
                                            'columns'   => 4,
                                            'items'     => file_get_contents(THEME_DIR.'/mav-grid-array.json')
                                        );
                                        mavf_items_grid($mavArgs);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php endif;
                ?>

                <!-- Tính năng: Slider -->
                <?php
                    if (function_exists('mavf_slider')): ?>
                    <section id="mavid-sec-slider" class="mav-sec-wrapper">
                        <div class="mav-sec-ctn">
                            <header class="mav-sec-header-wrapper">
                                <div class="mav-sec-header-ctn">
                                    <div class="mav-sec-title-wrapper">
                                        <div class="mav-sec-title-ctn">
                                            <h2 class="mav-sec-title">Sliders</h2>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="mav-sec-body-wrapper">
                                <div class="mav-sec-body-ctn">
                                    <div class="mav-margin-bottom-xl">
                                        <h3 class="mav-margin-bottom">Slider Type 1</h3>
                                        <?php
                                            mavf_slider(array('slider_type' => 1, 'number_of_slides' => 4));
                                        ?>
                                    </div>
                                    <div class="mav-margin-bottom-xl">
                                        <h3 class="mav-margin-bottom">Slider Type 2</h3>
                                        <?php
                                            mavf_slider(array('slider_type' => 2));
                                        ?>
                                    </div>
                                    <div>
                                        <h3 class="mav-margin-bottom">Slider Type 3</h3>
                                        <?php
                                            mavf_slider(array('slider_type' => 3));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <footer class="mav-sec-footer-wrapper">
                                <div class="mav-sec-footer-ctn">
                                    <?php
                                        mavf_button('Xem hướng dẫn sử dụng', '#');
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </section>
                        <?php endif;
                ?>

                <!-- Tính năng: Featured Post -->
                <?php
                    if (function_exists('mavf_post_feature')): ?>
                        <section id="mavid-sec-post-featured" class="mav-sec-wrapper">
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
                                            $mavArgs = array(
                                                'number_of_posts'   => 2,
                                                'post_type'         => 'post',
                                                'post_in'           => array(123,129),
                                                // 'title_side'     => 'mav-right'
                                            );
                                                mavf_post_feature($mavArgs);
                                        ?>
                                    </div>
                                </div>
                                <footer class="mav-sec-footer-wrapper">
                                    <div class="mav-sec-footer-ctn">
                                        <?php
                                            mavf_button('Xem hướng dẫn sử dụng', '#');
                                        ?>
                                    </div>
                                </footer>
                            </div>
                        </section> <?php
                    endif;
                ?>

                <!-- Tính năng: Post Carousel -->
                <?php
                    if (function_exists('mavf_carousel')): ?>
                        <section id="mavid-sec-post-carousel" class="mav-sec-wrapper">
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
                                            $mavArgs = array(
                                                'number_of_posts'           => 8,
                                                'number_of_posts_display'   => 4,
                                                'categories'                => array(4,5)
                                            );
                                                mavf_carousel($mavArgs);
                                        ?>
                                    </div>
                                </div>
                                <footer class="mav-sec-footer-wrapper">
                                    <div class="mav-sec-footer-ctn">
                                        <?php
                                            mavf_button('Xem hướng dẫn sử dụng', '#');
                                        ?>
                                    </div>
                                </footer>
                            </div>
                        </section> <?php
                    endif;
                ?>

                <!-- Tính năng: Post Grid -->
                <?php
                    if (function_exists('mavf_post_grid')): ?>
                    <section id="mavid-sec-post-grid" class="mav-sec-wrapper">
                        <div class="mav-sec-ctn">
                            <header class="mav-sec-header-wrapper">
                                <div class="mav-sec-header-ctn">
                                    <div class="mav-sec-title-wrapper">
                                        <div class="mav-sec-title-ctn">
                                            <h2 class="mav-sec-title">Post Grid</h2>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="mav-sec-body-wrapper">
                                <div class="mav-sec-body-ctn">
                                    <?php
                                        $mavArgs = array(
                                            'post_type'         => 'post',
                                            'number_of_posts'   => 6,
                                            'posts_display'     => 3,
                                            'auto_slide'        => 'false'
                                        );
                                        mavf_post_grid($mavArgs);
                                    ?>
                                </div>
                            </div>
                            <footer class="mav-sec-footer-wrapper">
                                <div class="mav-sec-footer-ctn">
                                    <?php
                                        mavf_button('Xem hướng dẫn sử dụng', '#');
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </section>
                    <?php endif;
                ?>

                <!-- Tính năng: Google Map -->
                <?php
                    if ( function_exists( 'mavf_google_map' ) && !empty( esc_attr( get_option( 'mav_setting_enable_google_map' ) ) ) ): ?>
                    <section id="mavid-sec-google-map" class="mav-sec-wrapper">
                        <div class="mav-sec-ctn">
                            <header class="mav-sec-header-wrapper">
                                <div class="mav-sec-header-ctn">
                                    <div class="mav-sec-title-wrapper">
                                        <div class="mav-sec-title-ctn">
                                            <h2 class="mav-sec-title">Google Map</h2>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="mav-sec-body-wrapper">
                                <div class="mav-sec-body-ctn" data-full-width>
                                    <?php
                                        mavf_google_map(array('height' => '50vh'));
                                    ?>
                                </div>
                            </div>
                            <footer class="mav-sec-footer-wrapper">
                                <div class="mav-sec-footer-ctn">
                                    <?php
                                        mavf_button('Xem hướng dẫn sử dụng', '#');
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </section>
                    <?php endif;
                ?>

                <!-- Tính năng: Lighbox Gallery -->
                <section id="mavid-sec-lightbox" class="mav-sec-wrapper">
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
                                    echo do_shortcode('[gallery link="file" columns="3" size="medium" ids="231,232,233,234,235,236"]');
                                ?>
                            </div>
                        </div>
                        <footer class="mav-sec-footer-wrapper">
                            <div class="mav-sec-footer-ctn">
                                <?php
                                    mavf_button('Xem hướng dẫn sử dụng', '#');
                                ?>
                            </div>
                        </footer>
                    </div>
                </section>

                <!-- Tính năng: Countdown Timer -->
                <section id="mavid-sec-countdown" class="mav-sec-wrapper">
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
                                    mavf_button('Xem hướng dẫn sử dụng', '#');
                                ?>
                            </div>
                        </footer>
                    </div>
                </section>

                <!-- Tính năng: Accordion -->
                <?php
                    if (function_exists('mavf_post_accordion')): ?>
                        <section id="mavid-sec-accordion" class="mav-sec-wrapper">
                            <div class="mav-sec-ctn">
                                <header class="mav-sec-header-wrapper">
                                    <div class="mav-sec-header-ctn">
                                        <div class="mav-sec-title-wrapper">
                                            <div class="mav-sec-title-ctn">
                                                <h2 class="mav-sec-title">Accordion</h2>
                                            </div>
                                        </div>
                                    </div>
                                </header>
                                <div class="mav-sec-body-wrapper">
                                    <div class="mav-sec-body-ctn">
                                        <?php
                                            $mavArgs = array(
                                                'number_of_posts'   => 3,
                                                'collection'        => true,
                                                'faq'               => true,
                                                'removable'         => true
                                            );
                                            mavf_post_accordion($mavArgs);
                                        ?>
                                    </div>
                                </div>
                                <footer class="mav-sec-footer-wrapper">
                                    <div class="mav-sec-footer-ctn">
                                        <?php
                                            mavf_button('Xem hướng dẫn sử dụng', '#');
                                        ?>
                                    </div>
                                </footer>
                            </div>
                        </section> <?php
                    endif;
                ?>

                <!-- Tính năng: Tab View -->
                <?php
                    if (function_exists('mavf_tab_posts')): ?>
                        <section id="mavid-sec-tab" class="mav-sec-wrapper">
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
                                        <?php
                                            $mavArgs = array(
                                                'number_of_post'    => '5'
                                            );
                                            mavf_tab_posts($mavArgs);
                                        ?>
                                    </div>
                                </div>
                                <footer class="mav-sec-footer-wrapper">
                                    <div class="mav-sec-footer-ctn">
                                        <?php
                                            mavf_button('Xem hướng dẫn sử dụng', '#');
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
                        <section id="mavid-sec-message-box" class="mav-sec-wrapper">
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
                                            mavf_message_box(__('Thông báo','maverick-theme'));
                                        ?>
                                    </div>
                                </div>
                                <footer class="mav-sec-footer-wrapper">
                                    <div class="mav-sec-footer-ctn">
                                        <?php
                                            mavf_button('Xem hướng dẫn sử dụng', '#');
                                        ?>
                                    </div>
                                </footer>
                            </div>
                        </section> <?php
                    endif;
                ?>

                <!-- Tính năng: Javascript Modal Box -->
                <section id="mavid-sec-modal-box" class="mav-sec-wrapper">
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
                                    <button class="mav-btn-secondary" onclick="if(typeof mavf_create_modal_box === 'function'){typeof mavf_create_modal_box()}else{console.log('Modal function not found.')}"><?php _e( 'Click to open Modal Box' , 'maverick-theme' );?></button>
                                </div>
                            </div>
                        </div>
                        <footer class="mav-sec-footer-wrapper">
                            <div class="mav-sec-footer-ctn">
                                <?php
                                    mavf_button('Xem hướng dẫn sử dụng', '#');
                                ?>
                            </div>
                        </footer>
                    </div>
                </section>

                <!-- Tính năng: Price Table -->
                <section id="mavid-sec-price-table" class="mav-sec-wrapper">
                    <div class="mav-sec-ctn">
                        <header class="mav-sec-header-wrapper">
                            <div class="mav-sec-header-ctn">
                                <div class="mav-sec-title-wrapper">
                                    <div class="mav-sec-title-ctn">
                                        <h2 class="mav-sec-title">Price Table</h2>
                                    </div>
                                </div>
                            </div>
                        </header>
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
                                            <li class="mav-price-table-row" data-row="footer"><button class="mav-btn-cta" style="visibility: hidden;">Đặt mua</button></li>
                                        </ul>
                                        <ul class="mav-price-table">
                                            <li class="mav-price-table-row" data-row="header">Header Row</li>
                                            <li class="mav-price-table-row">Table row 1</li>
                                            <li class="mav-price-table-row" data-row="price"><span class="mav-price">100.000</span><span class="mav-price-unit">đồng</span></li>
                                            <li class="mav-price-table-row" data-row="checked">&nbsp;</li>
                                            <li class="mav-price-table-row" data-row="unchecked">&nbsp;</li>
                                            <li class="mav-price-table-row" data-row="footer"><button class="mav-btn-cta">Đặt mua</button></li>
                                        </ul>
                                        <ul class="mav-price-table" data-size="big">
                                            <li class="mav-price-table-row" data-row="header"><h3>
                                                Header row really long
                                            </h3></li>
                                            <li class="mav-price-table-row">Table row 1</li>
                                            <li class="mav-price-table-row" data-row="price"><span class="mav-price">2.000.000</span><span class="mav-price-unit">đồng</span></li>
                                            <li class="mav-price-table-row">Table row 3</li>
                                            <li class="mav-price-table-row">Table row 4</li>
                                            <li class="mav-price-table-row" data-row="footer"><button class="mav-btn-cta">Đặt mua</button></li>
                                        </ul>
                                        <ul class="mav-price-table">
                                            <li class="mav-price-table-row" data-row="header">Header Row</li>
                                            <li class="mav-price-table-row">Table row 1</li>
                                            <li class="mav-price-table-row" data-row="price"><span class="mav-price">300.000</span><span class="mav-price-unit">đồng</span></li>
                                            <li class="mav-price-table-row">Table row 3</li>
                                            <li class="mav-price-table-row">Table row 4</li>
                                            <li class="mav-price-table-row" data-row="footer"><button class="mav-btn-cta">Đặt mua</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="mav-sec-footer-wrapper">
                            <div class="mav-sec-footer-ctn">
                                <?php
                                    mavf_button('Xem hướng dẫn sử dụng', '#');
                                ?>
                            </div>
                        </footer>
                    </div>
                </section>
            </div>
        </div>
        <footer id="mavid-page-footer" class="mav-page-footer-wrapper">
            <div class="mav-page-footer-ctn">
            </div>
        </footer>
    </div>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>