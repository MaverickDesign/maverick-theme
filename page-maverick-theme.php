<?php
/**
 * @package maverick-theme
 */
?>

<?php get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main-content">
    <!-- Tiêu đề trang -->
    <section id="mavid-sec-page-title" class="mav-sec-page-title" <?php mavf_post_thumbnail_url();?>>
        <?php
            the_title('<h1 class="mav-page-title">','</h1>');
        ?>
    </section>

    <!-- Giới thiệu -->
    <section class="mav-theme-sec">
        <div class="mav-them-sec-content">
            <header class="mav-theme-sec-header">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Giới thiệu</h2>
                </div>
            </header>
            <div class="mav-theme-sec-body">
                <div class="mav-pg-ctn mav-post-content">
                    <p><strong>Maverick's WordPress Theme</strong> (gọi tắt là <strong class="mav-maverick-theme">Maverick Theme</strong>) là một bộ giao diện hoàn toàn <strong>MIỄN PHÍ</strong> cho nền tảng <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external" title="Đến trang wordpress.org">WordPress</a> - một trong những Hệ quản trị nội dung (Content Management System - CMS) được sử dụng rất nhiều trên thế giới - hiện nay chiếm khoảng <strong>30%</strong> số website trên thế giới (nguồn: <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external" title="Đến trang wordpress.org">wordpress.org</a>).</p>
                    <p><strong class="mav-maverick-theme">Maverick Theme</strong> được phát triển bởi <strong class="mav-maverick-design">Maverick Design</strong> theo các tiêu chuẩn công nghệ mới nhất cho nền tảng Web hiện nay như: HTML5, CSS3, Javascript ES6+ và PHP 7.0+.</p>
                    <p><strong class="mav-maverick-theme">Maverick Theme</strong> tương thích tốt với màn hình máy tính để bàn (Desktop Computer), các thiết bị di động như: Điện thoại di động thông minh (Smart Phone) và máy tính bảng (Tablet) với tiêu chí phát triển "Ưu tiên cho di động" (Mobile First).</p>
                    <p><strong class="mav-maverick-theme">Maverick Theme</strong> hoàn toàn có thể đáp ứng đầy đủ các nhu cầu cơ bản của một website chuyên về nội dung.</p>
                    <p>Trang này giới thiệu các tính năng nổi bật của <strong class="mav-maverick-theme">Maverick Theme</strong>.</p>
                </div>
            </div>
        </div>
    </section>

    <?php
        if (function_exists('mavf_items_grid')): ?>
        <!-- Các tính năng nổi bật -->
        <section class="mav-theme-sec">
            <div class="mav-theme-sec-content">
                <div class="mav-theme-sec-header">
                    <div class="mav-sec-title-ctn mav-flex-center-all">
                        <h2 class="mav-sec-title">Các tính năng nổi bật</h2>
                    </div>
                </div>
                <div class="mav-theme-sec-body">
                    <div class="mav-post-content mav-post-content-ctn">
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

    <?php
        if (function_exists('mavf_slider')): ?>
        <!-- Tính năng: Slider -->
        <section id="mavid-sec-slider" class="mav-theme-sec">
            <header class="mav-theme-sec-header">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Slider</h2>
                </div>
            </header>
            <div class="mav-pg-ctn mav-margin-bottom-lg">
                <aside class="mav-margin-bottom-xl">
                    <h3 class="mav-margin-bottom">Slider Type 1</h3>
                    <?php
                        mavf_slider(array('slider_type' => 1, 'number_of_slides' => 4));
                    ?>
                </aside>
                <aside class="mav-margin-bottom-xl">
                    <h3 class="mav-margin-bottom">Slider Type 2</h3>
                    <?php
                        mavf_slider(array('slider_type' => 2));
                    ?>
                </aside>
                <aside>
                    <h3 class="mav-margin-bottom">Slider Type 3</h3>
                    <?php
                        mavf_slider(array('slider_type' => 3));
                    ?>
                </aside>
            </div>
            <footer class="mav-flex-center-all">
                <?php
                    mavf_button('Xem hướng dẫn sử dụng', '#');
                ?>
            </footer>
        </section>
            <?php endif;
    ?>

    <?php
        if (function_exists('mavf_post_feature')): ?>
        <!-- Tính năng: Featured Post -->
        <section id="mavid-sec-post-featured" class="mav-theme-sec">
            <header class="mav-theme-sec-header">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Featured Post</h2>
                </div>
            </header>
            <?php

                    $mavArgs = array(
                        'number_of_posts'   => 2,
                        'post_type'         => 'post',
                        'post_in'           => array(123,129),
                        // 'title_side'     => 'mav-right'
                    );
                    echo '<div class="mav-pg-ctn mav-margin-bottom-lg">';
                        mavf_post_feature($mavArgs);
                    echo '</div>';
            ?>
            <footer class="mav-flex-center-all">
                <?php
                    mavf_button('Xem hướng dẫn sử dụng', '#');
                ?>
            </footer>
        </section>
            <?php endif;
    ?>

    <?php
        if (function_exists('mavf_carousel')): ?>
        <!-- Tính năng: Post Carousel -->
        <section id="mavid-sec-post-carousel" class="mav-theme-sec">
            <header class="mav-theme-sec-header">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Post Carousel</h2>
                </div>
            </header>
            <?php
                $mavArgs = array(
                    'number_of_posts'           => 8,
                    'number_of_posts_display'   => 4,
                    'categories'                => array(4,5)
                );

                echo '<div class="mav-theme-sec-body">';
                    mavf_carousel($mavArgs);
                echo '</div>';
            ?>
            <footer class="mav-flex-center-all">
                <?php
                    mavf_button('Xem hướng dẫn sử dụng', '#');
                ?>
            </footer>
        </section>
        <?php endif;
    ?>

    <?php
        if (function_exists('mavf_post_grid')): ?>
        <!-- Tính năng: Post Grid -->
        <section id="mavid-sec-post-grid" class="mav-theme-sec">
            <header class="mav-theme-sec-header">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Post Grid</h2>
                </div>
            </header>
            <?php
                $mavArgs = array(
                    'post_type'         => 'post',
                    'number_of_posts'   => 6,
                    'posts_display'     => 3,
                    'auto_slide'        => 'false'
                );

                echo '<div class="mav-theme-sec-body">';
                    mavf_post_grid($mavArgs);
                echo '</div>';
            ?>
            <footer class="mav-flex-center-all">
                <?php
                    mavf_button('Xem hướng dẫn sử dụng', '#');
                ?>
            </footer>
        </section>
        <?php endif;
    ?>

    <?php
        if (function_exists('mavf_google_map')): ?>
        <!-- Tính năng: Google Map -->
        <section id="mavid-sec-google-map" class="mav-theme-sec">
            <div class="mav-theme-sec-content">
                <header class="mav-theme-sec-header">
                    <div class="mav-sec-title-ctn mav-flex-center-all">
                        <h2 class="mav-sec-title">Google Map</h2>
                    </div>
                </header>
                <div class="mav-theme-sec-body">
                    <?php
                        mavf_google_map(array('height' => '50vh'));
                    ?>
                </div>
                <footer class="mav-flex-center-all">
                    <?php
                        mavf_button('Xem hướng dẫn sử dụng', '#');
                    ?>
                </footer>
            </div>
        </section>
        <?php endif;
    ?>

    <!-- Tính năng: Lighbox Gallery -->
    <section id="mavid-sec-lightbox" class="mav-theme-sec">
        <header class="mav-theme-sec-header">
            <div class="mav-sec-title-ctn mav-flex-center-all">
                <h2 class="mav-sec-title">Lightbox Gallery</h2>
            </div>
        </header>
        <footer class="mav-flex-center-all">
            <?php
                mavf_button('Xem hướng dẫn sử dụng', '#');
            ?>
        </footer>
    </section>

    <!-- Tính năng: Countdown Timer -->
    <section id="mavid-sec-countdown" class="mav-theme-sec">
        <div class="mav-theme-sec-content">
            <header class="mav-theme-sec-header">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Countdown Timer</h2>
                </div>
            </header>
            <div class="mav-theme-sec-body">
                <p class="mavjs-countdown mav-countdown-ctn mav-flex-center-all" data-expired="01/16/2019"></p>
            </div>
            <footer class="mav-flex-center-all">
                <?php
                    mavf_button('Xem hướng dẫn sử dụng', '#');
                ?>
            </footer>
        </div>
    </section>

    <!-- Accordion -->
    <section id="mavid-sec-accordion" class="mav-theme-sec">
        <div class="mav-theme-sec-content">
            <header class="mav-theme-sec-header">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Accordion</h2>
                </div>
            </header>
            <div class="mav-theme-sec-body">
                <?php
                    if (function_exists('mavf_post_accordion')) {
                        $mavArgs = array(
                            'number_of_posts'   => 3,
                            // 'collection'        => true,
                        );
                        mavf_post_accordion($mavArgs);
                    }
                ?>
            </div>
            <footer class="mav-flex-center-all">
                <?php
                    mavf_button('Xem hướng dẫn sử dụng', '#');
                ?>
            </footer>
        </div>
    </section>

    <!-- Tab View -->
    <section id="mavid-sec-tab" class="mav-theme-sec">
        <div class="mav-theme-sec-content">
            <header class="mav-theme-sec-header">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Tab View</h2>
                </div>
            </header>
            <div class="mav-theme-sec-body">
                <?php
                    if (function_exists('mavf_tab_posts')) {
                        $mavArgs = array(
                            'number_of_post'    => '5'
                        );
                        mavf_tab_posts($mavArgs);
                    }
                ?>
            </div>
            <footer class="mav-flex-center-all">
                <?php
                    mavf_button('Xem hướng dẫn sử dụng', '#');
                ?>
            </footer>
        </div>
    </section>

    <!-- Message Box -->
    <?php if(function_exists('mavf_message_box')): ?>
        <section id="mavid-sec-message-box" class="mav-theme-sec">
            <header class="mav-theme-sec-header">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Message Box</h2>
                </div>
            </header>
            <div class="mav-theme-sec-content">
                <?php
                    mavf_message_box(__('Xảy ra lỗi khi gửi thông tin liên hệ. Vui lòng thử lại.','maverick-theme'));
                ?>
            </div>
            <footer class="mav-flex-center-all">
                <?php
                    mavf_button('Xem hướng dẫn sử dụng', '#');
                ?>
            </footer>
        </section>
        <?php endif;
    ?>

    <!-- Modal Box -->
    <section id="mavid-sec-modal-box" class="mav-theme-sec">
        <header class="mav-theme-sec-header">
            <div class="mav-sec-title-ctn mav-flex-center-all">
                <h2 class="mav-sec-title">Modal Box</h2>
            </div>
        </header>
        <div class="mav-pg-ctn mav-flex-center-all">
            <button class="mav-btn-secondary" onclick="if(typeof mavf_create_modal_box === 'function'){typeof mavf_create_modal_box()}else{console.log('Modal function not found.')}">Modal Box</button>
        </div>
        <footer class="mav-flex-center-all">
            <?php
                mavf_button('Xem hướng dẫn sử dụng', '#');
            ?>
        </footer>
    </section>

    <?php
        mavf_post_modal([]);
    ?>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>