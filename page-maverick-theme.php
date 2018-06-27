<?php
/*
    @package mavericktheme
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
    <section class="mav-pg-ctn">
        <div class="mav-sec-title-wrapper">
            <div class="mav-sec-title-ctn mav-flex-center-all">
                <h2 class="mav-sec-title">Giới thiệu</h2>
            </div>
        </div>
        <div class="mav-post-content-wrapper">
            <div class="mav-post-content">
                <p>Maverick's WordPress Theme (gọi tắt là <strong>Maverick Theme</strong>) là một bộ giao diện hoàn toàn MIỄN PHÍ dành cho nền tảng <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external">WordPress</a> - một trong những Hệ quản trị nội dung (Content Management System - CMS) được sử dụng rất nhiều trên thế giới - hiện nay chiếm khoảng 30% số website trên thế giới (nguồn: <a href="http://www.wordpress.org" target="_blank" class="mav-link" data-link="external">wordpress.org</a>).</p>
                <p><strong>Maverick Theme</strong> được phát triển mới hoàn toàn bởi <strong>Maverick Design</strong> - một công ty chuyên về Thiết kế Đồ họa và Xuất bản Điện tử tại Việt Nam - theo các tiêu chuẩn công nghệ mới nhất cho nền tảng Web như: HTML5, CSS3 (CSS Grid, Flexbox, CSS Variables...), Javascript ES6+ và PHP 7.0+.</p>
                <p><strong>Maverick Theme</strong> tương thích hoàn toàn với màn hình máy tính để bàn (Desktop Computer), các thiết bị di động như: Điện thoại di động thông minh (Smart Phone) và máy tính bảng (Tablet) với tiêu chí phát triển "Ưu tiên cho di động" (Mobile First).</p>
                <p>Mặc dù là MIỄN PHÍ nhưng <strong>Maverick Theme</strong> hoàn toàn có thể đáp ứng đầy đủ các nhu cầu cơ bản của một website chuyên về nội dung.</p>
                <p>Trang này giới thiệu các tính năng nổi bật của <strong>Maverick Theme</strong>.</p>
            </div>
        </div>
    </section>
    <section class="mav-pg-ctn">
        <div class="mav-sec-title-wrapper">
            <div class="mav-sec-title-ctn mav-flex-center-all">
                <h2 class="mav-sec-title">Các tính năng nổi bật</h2>
            </div>
        </div>
        <div class="mav-post-content-wrapper">
            <div class="mav-post-content mav-post-content-ctn">
                <?php
                    $mavArgs = array(
                        'columns' => 4,
                        'items' => file_get_contents(THEME_DIR.'/mav-grid-array.json')
                    );
                    mavf_items_grid($mavArgs);
                ?>
            </div>
        </div>
    </section>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>