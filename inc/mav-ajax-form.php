<?php
/**
 * @package maverick-theme
 */

// For normal users
add_action('wp_ajax_nopriv_mavf_ajax_form' , 'mavf_ajax_form');
// For login users
add_action('wp_ajax_mavf_ajax_form' , 'mavf_ajax_form');

function mavf_ajax_form() {
    if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        // Get user name
        $mavName = wp_strip_all_tags($_POST['name']);
        // Get user email
        $mavEmail = wp_strip_all_tags($_POST['email']);
        // Get user phone
        $mavPhone = isset($_POST['phone']) ? wp_strip_all_tags($_POST['phone']) : '';
        // Get message
        $mavMessage = $_POST['message'];

        $mavFrom = $mavEmail;
        $mavTo = 'minhdc@gmail.com';
        $mavSubject = "Contact from $mavName";
        $mavHeaders = "From: $mavEmail\n";
        $mavHeaders .= "MIME-Version: 1.0\n";
        $mavHeaders .= "Content-type: text/html; charset=iso=8859-1\n";

        if (wp_mail($mavTo, $mavSubject, $mavMessage, $mavHeaders)) {
            mavf_message_box(__('Thông tin liên hệ đã được gửi. Cám ơn bạn đã liên lạc với chung tôi.','maverick-theme'));
        } else {
            mavf_message_box(__('Xảy ra lỗi khi gửi thông tin liên hệ. Vui lòng thử lại.','maverick-theme'));
        }
    }
    die();
}