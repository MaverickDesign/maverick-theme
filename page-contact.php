<?php
/**
 * @package mavericktheme
 * Template Name: Contact Page
 * Template Post Type: page
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

    <!-- Contact Form -->
    <section class="mav-pg-ctn mav-contact-form-wrapper">
        <div class="mav-contact-form-ctn">
            <h2 class="mav-margin-bottom-lg mav-text-center">Gửi thông tin liên hệ</h2>
            <form id="mavid-contact-form" method="POST" class="mavjs-form mav-form mav-contact-form" data-ajax-url="<?php echo admin_url('admin-ajax.php')?>" data-action="mavf_ajax_form">
                <!-- Name -->
                <input type="text" id="mavid-form-name" name="name" placeholder="Tên" value="Minh" required>
                <span class="mav-form-hint"><i class="fas fa-info-circle mav-margin-right-xs"></i>Thông tin phải có.</span>
                <!-- Email -->
                <input type="email" id="mavid-form-email" name="email" placeholder="Email" value="minh@maverick.vn" required>
                <span class="mav-form-hint"><i class="fas fa-info-circle mav-margin-right-xs"></i>Thông tin phải có.</span>
                <!-- Phone -->
                <input type="phone" id="mavid-form-phone" name="phone" placeholder="Số điện thoại" value="0909096464">
                <span class="mav-form-hint">Thông tin tùy chọn.</span>
                <!-- Message -->
                <textarea id="mavid-form-message" name="message" cols="100%" rows="10vw" placeholder="Nội dung liên hệ"></textarea>
                <!-- Submit button -->
                <button id="mavid-form-submit" type="submit" class="mavjs-form-submit mav-btn-solid">Gửi nội dung</button>
            </form>
        </div>
    </section>

    <div class="mav-contact-socials-wrapper">
        <div class="mav-contact-socials-ctn">
            <?php
            $mavString = '';
            $mavDivider = '|';
            $mavLength = mavf_social_links_name();
            for ($i = 0; $i < count($mavLength); $i++) {
                if ($i == count($mavLength)-1) {
                    $mavDivider = '';
                }
                $mavString .= mavf_social_links_name()[$i].$mavDivider;
            }
            ?>
            <h2 class="mav-margin-bottom-lg mav-text-center">Liên lạc với <strong><?php echo bloginfo( 'name' )?></strong> qua <span class="mav-type-writer" data-content="<?php echo $mavString?>|mạng xã hội">mạng xã hội</span></h2>
            <?php mavf_social_links(); ?>
        </div>
    </div>
    <div class="mav-contact-ctn">
        <h2 class="mav-margin-bottom-lg mav-text-center">Địa chỉ liên hệ trực tiếp</h2>
        <?php
            printf(sprintf('<div class="mav-contact" data-type="name"><h3>%1$s</h3></div>',get_bloginfo( 'name' )));

            $mavAddress = esc_attr( get_option('mav_setting_brand_address') );
            printf(sprintf('<div class="mav-contact" data-type="address">%1$s</div>',$mavAddress));

            $mavPhone = esc_attr( get_option('mav_setting_brand_phone') );
            printf(sprintf('<div class="mav-contact" data-type="phone">%1$s</div>',$mavPhone));

            $mavEmail = esc_attr( get_option('mav_setting_brand_email') );
            printf(sprintf('<div class="mav-contact" data-type="email">%1$s</div>',$mavEmail));
        ?>
        <div class="mav-margin-top-lg">
            <?php
                if (function_exists('mavf_google_map')) {
                    mavf_google_map(false,'30vw');
                }
            ?>
        </div>
    </div>
</main>
<!-- Page content ends here -->
<?php get_footer(); ?>