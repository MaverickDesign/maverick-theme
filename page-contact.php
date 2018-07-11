<?php
/**
 * @package maverick-theme
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
            <h2 class="mav-margin-bottom-lg mav-text-center"><?php _e('Gửi thông tin liên hệ','maverick-theme'); ?></h2>
            <form id="mavid-contact-form" method="POST" class="mavjs-form mav-form mav-contact-form" data-ajax-url="<?php echo admin_url('admin-ajax.php')?>" data-action="mavf_ajax_form">
                <!-- Name -->
                <label class="mav-form-label" for="mavid-form-name">Họ &amp; Tên</label>
                <input type="text" id="mavid-form-name" name="name" placeholder="Ví dụ: John Doe" required>
                <span class="mav-form-hint"><i class="fas fa-info-circle mav-margin-right-xs"></i>Thông tin phải có.</span>
                <!-- Email -->
                <label class="mav-form-label" for="mavid-form-email">Địa chỉ email</label>
                <input type="email" id="mavid-form-email" name="email" placeholder="Ví dụ: johndoe@email.com" required>
                <span class="mav-form-hint"><i class="fas fa-info-circle mav-margin-right-xs"></i>Thông tin phải có.</span>
                <!-- Phone -->
                <label class="mav-form-label" for="mavid-form-phone">Số điện thoại</label>
                <input type="phone" id="mavid-form-phone" name="phone" placeholder="Ví dụ: 090-909-6464">
                <span class="mav-form-hint">Thông tin tùy chọn.</span>
                <!-- Message -->
                <textarea id="mavid-form-message" name="message" cols="100%" rows="10vw" placeholder="Nội dung liên hệ"></textarea>
                <!-- Submit button -->
                <button id="mavid-form-submit" type="submit" class="mavjs-form-submit mav-btn-solid">Gửi nội dung</button>
            </form>
        </div>
    </section>

    <?php
        if (function_exists('mavf_social_links')): ?>
            <!-- Social links -->
            <div class="mav-contact-socials-wrapper">
                <div class="mav-contact-socials-ctn">
                    <?php
                        printf(
                            '<h2 class="mav-margin-bottom-lg mav-text-center">%1$s <strong>%2$s</strong> %3$s</h2>',
                            __('Liên lạc với','maverick-theme'),
                            get_bloginfo('name'),
                            __('qua mạng xã hội','maverick-theme')
                        );
                        mavf_social_links();
                    ?>
                </div>
            </div>
        <?php endif;
    ?>

    <!-- Physical Address -->
    <div class="mav-contact-ctn">
        <h2 class="mav-margin-bottom-lg mav-text-center"><?php _e('Liên hệ trực tiếp với','maverick-theme'); ?> <strong><?php echo get_bloginfo('name')?></strong></h2>
        <?php
            printf('<div class="mav-flex-center-all"><ul>');
            printf('<li class="mav-contact" data-type="address">%1$s</li>',esc_attr( get_option('mav_setting_brand_address') ));
            printf(
                '<li class="mav-contact" data-type="phone"><a href="tel:+84%1$s" title="%2$s%1$s">%1$s</a></li>',
                esc_attr(get_option('mav_setting_brand_phone')),
                __('Gọi cho số ','maverick-theme')
            );
            printf(
                '<li class="mav-contact" data-type="email"><a href="mailto:%1$s" title="%2$s%1$s">%1$s</a></li>',
                esc_attr(get_option('mav_setting_brand_email')),
                __('Gửi email đến ','maverick-theme')
            );
            printf('</ul></div>');
        ?>
        <!-- Google Map -->
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