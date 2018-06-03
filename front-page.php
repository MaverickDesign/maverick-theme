<?php
/*
 * @package mavericktheme
 */
?>
<?php get_header(); ?>
<!-- Page content starts here -->
<main id="mavid-page-main-content">
<?php
    if (function_exists(mavf_slider)) {
        $mavArgs = array (
            // 'slider_type'       => 2,
            // 'slider_id'         => 'mavid-slider-1',
            // 'slider_container'  => 'mav-slider-type-1-ctn',
            // 'mavDisplayTitle'   => true,
            // 'display_title'     => true,
            // 'number_of_slides'  => 3,
            // 'interval'          => 10000,
            // 'categories'        => array(1,4)
            // 'category'          => 4
            // 'posts'             => array(32,139,135,132,129)
        );
        mavf_slider($mavArgs);
    }

?>

<section class="mav-sec-home">
    <div class="mav-flex-center">
        <a href="<?php echo get_page_link(22); ?>" class="mav-sec-title"><h2>Các dịch vụ</h2></a>
    </div>
    <?php
        if (function_exists(mavf_post_feature)) {
            $mavArgs = array(
                // 'type'              => 1,
                'number_of_posts'   => 2,
                'post_type'         => 'post',
                'post_in'           => array(123,129),
                // 'title_side'     => 'mav-right'
            );
            echo '<div class="mav-pg-ctn mav-sec-content">';
                mavf_post_feature($mavArgs);
            echo '</div>';
        }
        ?>
    <div class="mav-sec-btn-wrapper">
        <?php mavf_button('Đến trang Dịch Vụ',get_page_link(22)); ?>
    </div>
</section>

<section class="mav-sec-home">
    <div class="mav-flex-center">
        <a href="<?php echo get_page_link(7); ?>" class="mav-sec-title"><h2>Cập nhật</h2></a>
    </div>
    <?php
        if (function_exists(mavf_carousel)){
            $mavArgs = array(
                'number_of_posts'           => 8,
                'number_of_posts_display'   => 4,
                'categories'                => array(4,5)
            );

            echo '<div class="mav-sec-content">';
                mavf_carousel($mavArgs);
            echo '</div>';
        }
    ?>
    <div class="mav-sec-btn-wrapper">
        <?php mavf_button('Đến trang Cập Nhật',get_page_link(7)); ?>
    </div>
</section>

<section class="mav-sec-home">
    <div class="mav-flex-center">
        <a href="" class="mav-sec-title"><h2>Sản Phẩm</h2></a>
    </div>
    <?php
        if (function_exists(mavf_carousel)){
            $mavArgs = array(
                'post_type'         => 'post',
                'number_of_posts'   => 7,
                'display'           => 4,
                'auto_slide'        => 'false'
            );

            echo '<div class="mav-sec-content">';
                mavf_carousel($mavArgs);
            echo '</div>';
        }
    ?>
    <div class="mav-sec-btn-wrapper">
        <?php mavf_button('Đến trang Sản Phẩm',get_page_link(214)); ?>
    </div>
</section>

<section class="mav-sec-home">
    <div class="mav-flex-center">
        <a href="" class="mav-sec-title"><h2>Khách hàng</h2></a>
    </div>
    <?php
        if (function_exists(mavf_post_grid)){
            $mavArgs = array(
                'post_type'         => 'post',
                'number_of_posts'   => 6,
                'posts_display'     => 3,
                'auto_slide'        => 'false'
            );

            echo '<div class="mav-sec-content">';
                mavf_post_grid($mavArgs);
            echo '</div>';
        }
    ?>
    <div class="mav-sec-btn-wrapper">
        <?php mavf_button('Đến trang Khách hàng',get_page_link(216)); ?>
    </div>
</section>

<section class="mav-sec-home">
    <div class="mav-flex-center">
        <a href="<?php echo get_page_link(11); ?>" class="mav-sec-title"><h2>Liên hệ</h2></a>
    </div>
    <?php
        if (function_exists(mavf_google_map)) {
            echo '<div class="mav-sec-content">';
                mavf_google_map(array('height' => '50vh'));
            echo '</div>';
        }
    ?>
    <div class="mav-sec-btn-wrapper">
        <?php mavf_button('Đến trang Liên Hệ',get_page_link(11)); ?>
    </div>
</section>

<!-- <p class="mav-count-down" data-expired="01/16/2019"></p>
<p class="mav-count-down" data-expired="06/28/2018"></p> -->
</main>
<!-- Page content ends here -->
<?php get_footer(); ?>
<script>
    // mavf_type_writer('','.mav-type-writer','',40,false,3000);
    // mavf_type_multi('','|','.mav-type-writer','',40,1000);
</script>