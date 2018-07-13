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
    <section class="mav-sec-theme-page">
        <header class="mav-sec-title-wrapper">
            <div class="mav-sec-title-ctn mav-flex-center-all">
                <h2 class="mav-sec-title">Giới thiệu</h2>
            </div>
        </header>
        <div class="mav-pg-ctn mav-post-content-wrapper">
            <div class="mav-post-content">
                <p><strong>Maverick's WordPress Theme</strong> (gọi tắt là Maverick Theme) là một bộ giao diện hoàn toàn MIỄN PHÍ dành cho nền tảng <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external" title="Đến trang wordpress.org">WordPress</a> - một trong những Hệ quản trị nội dung (Content Management System - CMS) được sử dụng rất nhiều trên thế giới - hiện nay chiếm khoảng 30% số website trên thế giới (nguồn: <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external" title="Đến trang wordpress.org">wordpress.org</a>).</p>
                <p>Maverick Theme được phát triển mới hoàn toàn bởi Maverick Design theo các tiêu chuẩn công nghệ mới nhất cho nền tảng Web hiện nay như: HTML5, CSS3, Javascript ES6+ và PHP 7.0+.</p>
                <p>Maverick Theme tương thích hoàn toàn với màn hình máy tính để bàn (Desktop Computer), các thiết bị di động như: Điện thoại di động thông minh (Smart Phone) và máy tính bảng (Tablet) với tiêu chí phát triển "Ưu tiên cho di động" (Mobile First).</p>
                <p>Dù MIỄN PHÍ nhưng Maverick Theme hoàn toàn có thể đáp ứng đầy đủ các nhu cầu cơ bản của một website chuyên về nội dung.</p>
                <p>Trang này giới thiệu các tính năng nổi bật của Maverick Theme.</p>
            </div>
        </div>
    </section>

    <?php
        if (function_exists('mavf_items_grid')): ?>
        <!-- Các tính năng nổi bật -->
        <section class="mav-sec-theme-page">
            <div class="mav-sec-title-wrapper">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Các tính năng nổi bật</h2>
                </div>
            </div>
            <div class="mav-pg-ctn mav-post-content-wrapper">
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
        </section>
        <?php endif;
    ?>

    <?php
        if (function_exists('mavf_slider')): ?>
        <!-- Tính năng: Slider -->
        <section id="mavid-sec-slider" class="mav-sec-theme-page">
            <header class="mav-sec-title-wrapper">
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
        <section id="mavid-sec-post-featured" class="mav-sec-theme-page">
            <header class="mav-sec-title-wrapper">
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
        <section id="mavid-sec-post-carousel" class="mav-sec-theme-page">
            <header class="mav-sec-title-wrapper">
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

                echo '<div class="mav-margin-bottom-lg">';
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
        <section id="mavid-sec-post-grid" class="mav-sec-theme-page">
            <header class="mav-sec-title-wrapper">
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

                echo '<div class="mav-margin-bottom-lg">';
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
        <section id="mavid-sec-google-map" class="mav-sec-theme-page">
            <header class="mav-sec-title-wrapper">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Google Map</h2>
                </div>
            </header>
            <?php
                echo '<div class="mav-margin-bottom-lg">';
                    mavf_google_map(array('height' => '50vh'));
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

    <!-- Tính năng: Lighbox Gallery -->
    <section id="mavid-sec-lightbox" class="mav-sec-theme-page">
        <header class="mav-sec-title-wrapper">
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

    <!-- Tính năng: Countdown -->
    <section id="mavid-sec-countdown" class="mav-sec-theme-page">
        <header class="mav-sec-title-wrapper">
            <div class="mav-sec-title-ctn mav-flex-center-all">
                <h2 class="mav-sec-title">Countdown</h2>
            </div>
        </header>
        <div class="mav-pg-ctn mav-margin-bottom-lg">
            <p class="mavjs-countdown mav-countdown-ctn mav-flex-center-all" data-expired="01/16/2019"></p>
        </div>
        <footer class="mav-flex-center-all">
            <?php
                mavf_button('Xem hướng dẫn sử dụng', '#');
            ?>
        </footer>
    </section>

    <!-- Typography -->
    <section id="mavid-sec-typography" class="mav-sec-theme-page">
        <header class="mav-sec-title-wrapper">
            <div class="mav-sec-title-ctn mav-flex-center-all">
                <h2 class="mav-sec-title">Typography</h2>
            </div>
        </header>
        <div class="mav-pg-ctn">
            <h3>Headings</h3>
            <aside>
                <h1>h1 - Heading 1</h1>
                <h2>h2 - Heading 2</h2>
                <h3>h3 - Heading 3</h3>
                <h4>h4 - Heading 4</h4>
                <h5>h5 - Heading 5</h5>
                <h6>h6 - Heading 6</h6>
            </aside>
        </div>
        <footer class="mav-flex-center-all">
            <?php
                mavf_button('Xem hướng dẫn sử dụng', '#');
            ?>
        </footer>
    </section>

    <!-- Typography -->
    <section id="mavid-sec-button" class="mav-sec-theme-page">
        <header class="mav-sec-title-wrapper">
            <div class="mav-sec-title-ctn mav-flex-center-all">
                <h2 class="mav-sec-title">Buttons</h2>
            </div>
        </header>
        <div class="mav-pg-ctn mav-margin-bottom-lg mav-grid mav-grid-col-2">
            <aside class="mav-flex-center-all">
                <button class="mav-btn-primary">Primary Button</button>
            </aside>
            <aside class="mav-flex-center-all">
                <button class="mav-btn-secondary">Secondary Button</button>
            </aside>
        </div>
        <footer class="mav-flex-center-all">
            <?php
                mavf_button('Xem hướng dẫn sử dụng', '#');
            ?>
        </footer>
    </section>

    <!-- Accordion -->
    <section id="mavid-sec-accordion" class="mav-sec-theme-page">
        <header class="mav-sec-title-wrapper">
            <div class="mav-sec-title-ctn mav-flex-center-all">
                <h2 class="mav-sec-title">Accordion</h2>
            </div>
        </header>
        <div class="mav-pg-ctn mav-margin-bottom-lg">
            <aside class="mav-accordion-wrapper">
                <span class="mav-accordion-trigger" data-trigger-icon data-state="close" title="">The accordion</span>
                <ul class="mav-accordion-ctn">
                    <li>
                        <aside class="mav-accordion-wrapper">
                            <span class="mav-accordion-trigger" data-trigger-icon="1" data-state="close">1</span>
                            <p class="mav-accordion-ctn">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis quod tempore sint, dicta repellat minus molestias illo autem, itaque ex earum, laborum reprehenderit vel tenetur minima ratione. Tenetur voluptas, laboriosam reiciendis ipsam suscipit est magnam doloremque officia error itaque deleniti dolor, velit culpa consequatur et aut repudiandae, repellendus quis! Laudantium?</p>
                        </aside>
                    </li>
                    <li>
                        <aside class="mav-accordion-wrapper">
                            <span class="mav-accordion-trigger" data-trigger-icon="2" data-state="close">2</span>
                            <p class="mav-accordion-ctn">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis quod tempore sint, dicta repellat minus molestias illo autem, itaque ex earum, laborum reprehenderit vel tenetur minima ratione. Tenetur voluptas, laboriosam reiciendis ipsam suscipit est magnam doloremque officia error itaque deleniti dolor, velit culpa consequatur et aut repudiandae, repellendus quis! Laudantium?</p>
                        </aside>
                    </li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                </ul>
            </aside>
        </div>
        <footer class="mav-flex-center-all">
            <?php
                mavf_button('Xem hướng dẫn sử dụng', '#');
            ?>
        </footer>
    </section>

    <!-- Message Box -->
    <?php if(function_exists('mavf_message_box')): ?>
        <section id="mavid-sec-message-box" class="mav-sec-theme-page">
            <header class="mav-sec-title-wrapper">
                <div class="mav-sec-title-ctn mav-flex-center-all">
                    <h2 class="mav-sec-title">Message Box</h2>
                </div>
            </header>
            <div class="mav-sec-content">
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
    <section id="mavid-sec-modal-box" class="mav-sec-theme-page">
        <header class="mav-sec-title-wrapper">
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
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>