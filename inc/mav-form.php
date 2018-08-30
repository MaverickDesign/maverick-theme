<?php
/**
 * @package mavericktheme
 */

function mavf_contact_form($mav_args)
{
    if (function_exists('mavf_unique')) {
        $mav_unique_number = mavf_unique(rand(6, 12));
    } else {
        $mav_unique_number = wp_create_nonce(time());
    }

    $mavHintRequired = __('Thông tin phải có.', 'mavericktheme');
    $mavHintOptional = __('Thông tin tùy chọn.', 'mavericktheme');

    /* Default Field Attributes */
    $mavFormFields = array(
        'name' => array(
            'label'         => 'Họ & Tên',
            'type'          => 'text',
            'required'      => true,
            'hint'          => $mavHintRequired,
            'placeholder'   => 'e.g., John Doe'
        ),
        'email' => array(
            'label'         => 'Email',
            'type'          => 'email',
            'required'      => true,
            'hint'          => $mavHintRequired,
            'placeholder'   => 'e.g., johndoe@mail.com'

        ),
        'phone' => array(
            'label'         => 'Điện thoại',
            'type'          => 'phone',
            'hint'          => $mavHintOptional,
            'placeholder'   => 'e.g., 090-909-6464'

        ),
        'address' => array(
            'label'         => 'Địa chỉ',
            'type'          => 'text',
            'hint'          => $mavHintOptional,
            'placeholder'   => 'e.g., 121 Đinh Tiên Hoàng, Đa Kao, Quận 1, TP.HCM'
        ),
        'dob' => array(
            'label'         => 'Ngày sinh',
            'type'          => 'date',
        ),
    );

    $mavFields = isset($mav_args['form_fields']) ? $mav_args['form_fields'] : $mavFormFields;

    $mavDisplayFields = $mav_args['fields'];

    $mavFormTitle = isset($mav_args['form_title']) ? $mav_args['form_title'] : '';
    $mavFormIntro = isset($mav_args['form_intro']) ? $mav_args['form_intro'] : '';

    $mavClassFormInput = 'mav-form-input';

    if (!empty($mavDisplayFields)) {
        printf('<div class="mav-form-contact-wrapper">');
            printf('<div class="mav-form-contact-ctn">');
                /* The Form */
                printf(
                    '<form id="mavid-form-%1$s" method="POST" class="mavjs-form mavjs-form-contact mav-form mav-form-contact" data-unique="%1$s" data-ajax-url="%2$s" data-action="mavf_ajax_form">',
                    $mav_unique_number, admin_url('admin-ajax.php')
                );

                    /* Form Header */
                    if (!empty($mavFormTitle) || !empty($mavFormIntro)) :
                        printf('<header class="mav-form-header-wrapper">');
                            printf('<div class="mav-form-header-ctn">');
                                /* Form Title */
                                if (!empty($mavFormTitle)) {
                                    printf('<div class="mav-form-title-wrapper">');
                                        printf('<div class="mav-form-title-ctn">');
                                            printf('<h3 class="mav-form-title">%1$s</h3>', $mavFormTitle);
                                        echo '</div>';
                                    echo '</div>';
                                }
                                /* Form Intro */
                                if (!empty($mavFormIntro)) {
                                    printf('<div class="mav-form-intro-wrapper">');
                                        printf('<div class="mav-form-intro-ctn">');
                                            printf('<p>%1$s</p>', $mavFormIntro);
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '<header>';
                    endif;

                    /* Form Body */
                    printf('<div class="mav-form-fields-wrapper">');
                        printf('<div class="mav-form-fields-ctn">');
                            for ($i = 0; $i < count($mavDisplayFields); $i++) {

                                $mavCurrentField = $mavDisplayFields[$i];

                                printf('<div class="mav-form-input-ctn">');
                                    foreach ($mavFields as $mavField => $mavFieldArgs) {
                                        if ($mavCurrentField === $mavField) :

                                            $mavFieldName   = $mavField;

                                            $mavFieldLabel  = isset($mavFieldArgs['label'])     ? $mavFieldArgs['label']    : __('Input', 'mavericktheme');
                                            $mavFieldType   = isset($mavFieldArgs['type'])      ? $mavFieldArgs['type']     : 'text';
                                            $mavFieldHint   = isset($mavFieldArgs['hint'])      ? $mavFieldArgs['hint']     : $mavHintOptional;
                                            $mavRequired    = isset($mavFieldArgs['required'])  ? 'required'                : '';
                                            $mavPlaceholder = isset($mavFieldArgs['placeholder']) ? $mavFieldArgs['placeholder'] : '';

                                            $mavFieldID     = 'mavid-form__input--'.$mavFieldName;

                                                printf(
                                                    '<label for="%1$s">%2$s</label>',
                                                    $mavFieldID, $mavFieldLabel
                                                );
                                                printf(
                                                    '<input id="%1$s" type="%2$s" name="%4$s" class="mavjs-form-input mav-form-input" placeholder="%5$s" %3$s>',
                                                    $mavFieldID, $mavFieldType, $mavRequired, $mavFieldName, $mavPlaceholder
                                                );
                                                printf(
                                                    '<div class="mav-form-hint"><i class="fas fa-exclamation mav-margin-right-xs"></i>%1$s</div>',
                                                    $mavFieldHint
                                                );
                                        endif;
                                    }
                                    // Message
                                    if ($mavCurrentField === 'message') {
                                        printf(
                                            '<label for="mavid-form__input--message" class="mav-margin-bottom-sm">%1$s</label>',
                                            __('Nội dung liên hệ', 'mavericktheme')
                                        );
                                        printf(
                                            '<textarea id="mavid-form__input--message" name="message" class="mavjs-form-input mav-form-input-message"></textarea>'
                                        );
                                        printf(
                                            '<div class="mav-form-hint"><i class="fas fa-exclamation mav-margin-right-xs"></i>%1$s</div>',
                                            __('Vui lòng nhập nội dung tiếng Việt có dấu.', 'mavericktheme')
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
                                    '<button id="mavid-form-submit-%1$s" type="submit" class="mavjs-form-submit mav-btn-primary-lg" data-full-width>%2$s</button>',
                                    $mav_unique_number, __('Gửi thông tin liên hệ', 'mavericktheme')
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