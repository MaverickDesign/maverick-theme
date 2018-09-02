<?php
/**
 * @package mavericktheme
 */

/**
 * Contact Form
 *
 * @param [array] $mav_args
 * @return void
 */

function mavf_contact_form( $mav_args )
{
    if ( function_exists( 'mavf_unique' ) ) {
        $mav_unique_number = mavf_unique( rand( 6, 12 ) );
    } else {
        $mav_unique_number = wp_create_nonce( time() );
    }

    $mav_hint_required = __( 'Thông tin phải có.', 'mavericktheme' );
    $mav_hint_optional = __( 'Thông tin tùy chọn.', 'mavericktheme' );

    /* Default Field Attributes */
    $mav_form_fields = array(
        'name' => array(
            'label'         => __( 'Họ & Tên', 'maverick-theme' ),
            'type'          => 'text',
            'required'      => true,
            'hint'          => $mav_hint_required,
            'placeholder'   => 'E.g., John Doe'
        ),
        'email' => array(
            'label'         => __( 'Email', 'maverick-theme' ),
            'type'          => 'email',
            'required'      => true,
            'hint'          => $mav_hint_required,
            'placeholder'   => 'E.g., johndoe@mail.com'

        ),
        'phone' => array(
            'label'         => __( 'Điện thoại', 'maverick-theme' ),
            'type'          => 'phone',
            'hint'          => $mav_hint_optional,
            'placeholder'   => 'e.g., 090-909-6464'

        ),
        'address' => array(
            'label'         => __( 'Địa chỉ', 'maverick-theme' ),
            'type'          => 'text',
            'hint'          => $mav_hint_optional,
            'placeholder'   => 'e.g., 121 Đinh Tiên Hoàng, Đa Kao, Quận 1, TP.HCM'
        ),
        'dob' => array(
            'label'         => __( 'Ngày sinh', 'maverick-theme' ),
            'type'          => 'date',
        ),
    );

    $mav_fields = isset( $mav_args['form_fields'] ) ? $mav_args['form_fields'] : $mav_form_fields;

    $mav_display_fields = $mav_args['fields'];

    $mav_form_title = isset( $mav_args['form_title'] ) ? $mav_args['form_title'] : '';
    $mav_form_intro = isset( $mav_args['form_intro'] ) ? $mav_args['form_intro'] : '';

    $mav_class_form_input = 'mav-form-input';

    if ( ! empty( $mav_display_fields ) ) {
        printf('<div class="mav-form-contact-wrapper">');
            printf('<div class="mav-form-contact-ctn">');
                /* The Form */
                printf(
                    '<form id="mavid-form-%1$s" method="POST" class="mavjs-form mavjs-form-contact mav-form mav-form-contact" data-unique="%1$s" data-ajax-url="%2$s" data-action="mavf_ajax_form">',
                    $mav_unique_number, admin_url('admin-ajax.php')
                );

                    /* Form Header */
                    if ( ! empty( $mav_form_title ) || ! empty( $mav_form_intro ) ) :
                        printf('<header class="mav-form-header-wrapper">');
                            printf('<div class="mav-form-header-ctn">');
                                /* Form Title */
                                if ( ! empty( $mav_form_title ) ) {
                                    printf('<div class="mav-form-title-wrapper">');
                                        printf('<div class="mav-form-title-ctn">');
                                            printf( '<h3 class="mav-form-title">%1$s</h3>', $mav_form_title );
                                        echo '</div>';
                                    echo '</div>';
                                }
                                /* Form Intro */
                                if ( ! empty( $mav_form_intro ) ) {
                                    printf('<div class="mav-form-intro-wrapper">');
                                        printf('<div class="mav-form-intro-ctn">');
                                            printf( '<p class="mav-form-intro">%1$s</p>', $mav_form_intro );
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '<header>';
                    endif;

                    /* Form Body */
                    printf('<div class="mav-form-fields-wrapper">');
                        printf('<div class="mav-form-fields-ctn">');
                            for ( $i = 0; $i < count( $mav_display_fields ); $i++ ) {

                                $mav_current_field = $mav_display_fields[$i];

                                printf('<div class="mav-form-input-ctn">');
                                    foreach ( $mav_fields as $mav_field => $mav_field_args ) {
                                        if ( $mav_current_field === $mav_field ) :

                                            $mav_field_name   = $mav_field;

                                            $mav_field_label    = isset( $mav_field_args['label'] )         ? $mav_field_args['label']          : __( 'Input', 'mavericktheme' );
                                            $mav_field_type     = isset( $mav_field_args['type'] )          ? $mav_field_args['type']           : 'text';
                                            $mav_field_hint     = isset( $mav_field_args['hint'] )          ? $mav_field_args['hint']           : $mav_hint_optional;
                                            $mav_required       = isset( $mav_field_args['required'] )      ? 'required'                        : '';
                                            $mav_placeholder    = isset( $mav_field_args['placeholder'] )   ? $mav_field_args['placeholder']    : '';

                                            $mav_field_id     = 'mavid-form__input--'.$mav_field_name;

                                                printf(
                                                    '<label for="%1$s">%2$s</label>',
                                                    $mav_field_id, $mav_field_label
                                                );
                                                printf(
                                                    '<input id="%1$s" type="%2$s" name="%4$s" class="mavjs-form-input mav-form-input" placeholder="%5$s" %3$s>',
                                                    $mav_field_id, $mav_field_type, $mav_required, $mav_field_name, $mav_placeholder
                                                );
                                                printf(
                                                    '<div class="mav-form-hint"><i class="fas fa-exclamation mav-margin-right-xs"></i>%1$s</div>',
                                                    $mav_field_hint
                                                );
                                        endif;
                                    }
                                    // Message
                                    if ( $mav_current_field === 'message' ) {
                                        printf(
                                            '<label for="mavid-form__input--message" class="mav-margin-bottom-sm">%1$s</label>',
                                            __( 'Nội dung liên hệ', 'mavericktheme' )
                                        );
                                        printf(
                                            '<textarea id="mavid-form__input--message" name="message" class="mavjs-form-input mav-form-input-message"></textarea>'
                                        );
                                        printf(
                                            '<div class="mav-form-hint"><i class="fas fa-exclamation mav-margin-right-xs"></i>%1$s</div>',
                                            __( 'Vui lòng nhập nội dung tiếng Việt có dấu.', 'mavericktheme' )
                                        );
                                    }
                                echo '</div>';
                            }
                        echo '</div>';
                    echo '</div>';

                    // Form Footer
                    printf('<footer class="mav-form-footer mav-form-footer-wrapper">');
                        printf('<div class="mav-form-footer-ctn">');
                            // Submit Button
                            printf('<div class="mav-form-submit-ctn">');
                                printf(
                                    '<button id="mavid-form-submit-%1$s" type="submit" class="mavjs-form-submit mav-btn-primary-lg" data-full-width style="padding: var(--mav-gutter);">%2$s</button>',
                                    $mav_unique_number, __( 'Gửi thông tin liên hệ', 'mavericktheme' )
                                );
                            echo '</div>';
                            // Form Status
                            printf('<div class="mav-form-status-wrapper"><div class="mav-form-status-ctn"></div></div>');
                        echo '</div>';
                    echo '</footer>';
                echo '</form>';
            echo '</div>';
        echo '</div>';
    }
}