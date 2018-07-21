<?php
/**
 * @package maverick-theme
 * Template Name: Contact Page
 * Template Post Type: page
 */
?>
<?php get_header(); ?>
<!-- Page content starts here -->
<main id="mavid-page-main-content" class="mav-page-wrapper">
    <div class="mav-page-ctn">
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
        <!-- Page Content -->
        <section class="mav-sec-wrapper">
            <div class="mav-sec-ctn">
                <div class="mav-sec-body-wrapper">
                    <div class="mav-sec-body-ctn">
                        <div class="mav-page-contact-wrapper">
                            <!-- Contact Form -->
                            <div class="mav-contact-form-wrapper">
                                <div class="mav-contact-form-ctn">
                                    <h3 class="mav-margin-bottom-lg mav-text-center"><?php _e('Gửi thông tin liên hệ','maverick-theme'); ?></h3>
                                    <form id="mavid-contact-form" method="POST" class="mavjs-form mav-form mav-contact-form" data-ajax-url="<?php echo admin_url('admin-ajax.php')?>" data-action="mavf_ajax_form">
                                        <!-- Name -->
                                        <label class="mav-form-label" for="mavid-form-name"><?php _e('Họ & Tên','maverick-theme'); ?></label>
                                        <input type="text" id="mavid-form-name" name="name" placeholder="Ví dụ: John Doe" required>
                                        <span class="mav-form-hint"><i class="fas fa-info-circle mav-margin-right-xs"></i><?php _e('Thông tin phải có.','maverick-theme'); ?></span>
                                        <!-- Email -->
                                        <label class="mav-form-label" for="mavid-form-email"><?php _e('Địa chỉ email','maverick-theme'); ?></label>
                                        <input type="email" id="mavid-form-email" name="email" placeholder="Ví dụ: johndoe@email.com" required>
                                        <span class="mav-form-hint"><i class="fas fa-info-circle mav-margin-right-xs"></i><?php _e('Thông tin phải có.','maverick-theme'); ?></span>
                                        <!-- Phone -->
                                        <label class="mav-form-label" for="mavid-form-phone"><?php _e('Số điện thoại','maverick-theme'); ?></label>
                                        <input type="phone" id="mavid-form-phone" name="phone" placeholder="Ví dụ: 090-909-6464">
                                        <span class="mav-form-hint"><?php _e('Thông tin tùy chọn.','maverick-theme'); ?></span>
                                        <!-- Message -->
                                        <textarea id="mavid-form-message" name="message" cols="100%" rows="10vw" placeholder="Nội dung liên hệ"></textarea>
                                        <!-- Submit button -->
                                        <button id="mavid-form-submit" type="submit" class="mavjs-form-submit mav-btn-solid">Gửi nội dung</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Social links -->
                            <?php
                                if (function_exists('mavf_social_links')): ?>
                                    <div class="mav-contact-socials-wrapper">
                                        <div class="mav-contact-socials-ctn">
                                            <?php
                                                printf(
                                                    '<h3 class="mav-margin-bottom-lg mav-text-center">%1$s <strong class="mav-no-break">%2$s</strong> %3$s</h3>',
                                                    __('Liên lạc với','maverick-theme'),
                                                    get_bloginfo('name'),
                                                    __('qua mạng xã hội','maverick-theme')
                                                );
                                                mavf_social_links();
                                            ?>
                                        </div>
                                    </div> <?php
                                endif;
                            ?>
                            <!-- Physical Address -->
                            <div class="mav-contact-wrapper">
                                <div class="mav-contact-ctn">
                                    <h3 class="mav-margin-bottom-lg mav-text-center"><?php _e('Liên hệ trực tiếp với','maverick-theme'); ?> <strong class="mav-no-break"><?php echo get_bloginfo('name')?></strong></h3>
                                    <?php
                                        $mavAdress = esc_attr(get_option('mav_setting_brand_address'));
                                        $mavPhone = esc_attr(get_option('mav_setting_brand_phone'));
                                        $mavEmail = esc_attr(get_option('mav_setting_brand_email'));
                                        printf('<address class="mav-flex-center-all mav-margin-bottom-lg">');
                                            echo '<ul>';
                                                if (!empty($mavAdress)) {
                                                    printf('<li class="mav-contact" data-type="address">%1$s</li>',$mavAdress);
                                                }
                                                if (!empty($mavPhone)) {
                                                    printf(
                                                        '<li class="mav-contact" data-type="phone"><a href="tel:+84%1$s" title="%2$s%1$s">%1$s</a></li>',
                                                        $mavPhone,
                                                        __('Gọi cho số ','maverick-theme')
                                                    );
                                                }
                                                if (!empty($mavEmail)) {
                                                    printf(
                                                        '<li class="mav-contact" data-type="email"><a href="mailto:%1$s" title="%2$s%1$s">%1$s</a></li>',
                                                        $mavEmail,
                                                        __('Gửi email đến ','maverick-theme')
                                                    );
                                                }
                                            echo '</ul>';
                                        echo '</address>';
                                    ?>
                                    <!-- Google Map -->
                                    <?php
                                        if (function_exists('mavf_google_map')) {
                                            mavf_google_map([]);
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<!-- Page content ends here -->
<?php get_footer(); ?>