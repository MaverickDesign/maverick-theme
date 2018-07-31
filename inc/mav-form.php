<?php
/**
 * @package maverick-theme
 */

function mavf_contact_form($mavArgs){

    if (function_exists('mavf_unique')) {
        $mavUniqueNumber = mavf_unique(rand(6,12));
    } else {
        $mavUniqueNumber = wp_create_nonce(time());
    }

    $mavHintRequired = __( 'Thông tin phải có.' , 'maverick-theme' );
    $mavHintOptional = __( 'Thông tin tùy chọn.' , 'maverick-theme' );

    /* Default Field Attributes */
    $mavFormFields = array(
        'name'  =>  array(
            'label'     => 'Họ & Tên',
            'type'      => 'text',
            'required'  => true,
            'hint'      => $mavHintRequired,
            'placeholder'   => 'e.g., John Doe'
        ),
        'email' => array(
            'label'     => 'Email',
            'type'      => 'email',
            'required'  => true,
            'hint'      => $mavHintRequired

        ),
        'phone' => array(
            'label'     => 'Điện thoại',
            'type'      => 'phone',
            'hint'      => $mavHintOptional
        ),
        'dob'   => array(
            'label'     => 'Ngày sinh',
            'type'      => 'date',
        ),
        'address' => array(
            'label'     => 'Địa chỉ',
            'type'      => 'text',
            'hint'      => $mavHintOptional
        ),
    );

    $mavFields  = isset($mavArgs['form_fields']) ? $mavArgs['form_fields'] : $mavFormFields;

    $mavDisplayFields = $mavArgs['fields'];

    $mavFormTitle           = isset($mavArgs['form_title']) ? $mavArgs['form_title'] : '';
    $mavFormIntro           = isset($mavArgs['form_intro']) ? $mavArgs['form_intro'] : '';

    $mavClassFormInput = 'mav-form-input';


    if ( !empty( $mavDisplayFields ) ) {
        printf('<div class="mav-form-contact-wrapper">');
            printf('<div class="mav-form-contact-ctn">');
                /* The Form */
                printf(
                    '<form id="mavid-form-%1$s" method="POST" class="mavjs-form mavjs-form-contact mav-form mav-form-contact" data-unique="%1$s" data-ajax-url="%2$s" data-action="mavf_ajax_form">',
                    $mavUniqueNumber, admin_url('admin-ajax.php')
                    );

                    /* Form Header */
                    if (!empty($mavFormTitle) || !empty($mavFormIntro)):
                        printf('<header class="mav-form-header-wrapper">');
                            printf('<div class="mav-form-header-ctn">');
                                /* Form Title */
                                if (!empty($mavFormTitle)):
                                    printf('<div class="mav-form-title-wrapper">');
                                        printf('<div class="mav-form-title-ctn">');
                                            printf('<h3 class="mav-form-title">%1$s</h3>',$mavFormTitle);
                                        echo '</div>';
                                    echo '</div>';
                                endif;
                                /* Form Intro */
                                if (!empty($mavFormIntro)):
                                    printf('<div class="mav-form-intro-wrapper">');
                                        printf('<div class="mav-form-intro-ctn">');
                                            printf('<p>%1$s</p>',$mavFormIntro);
                                        echo '</div>';
                                    echo '</div>';
                                endif;
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
                                        if ($mavCurrentField === $mavField ):

                                            $mavFieldName   = $mavField;

                                            $mavFieldLabel  = isset($mavFieldArgs['label'])     ? $mavFieldArgs['label']    : __( 'Input' , 'maverick-theme' );
                                            $mavFieldType   = isset($mavFieldArgs['type'])      ? $mavFieldArgs['type']     : 'text';
                                            $mavFieldHint   = isset($mavFieldArgs['hint'])      ? $mavFieldArgs['hint']     : $mavHintOptional;
                                            $mavRequired    = isset($mavFieldArgs['required'])  ? 'required'                : '';

                                            $mavFieldID     = 'mavid-form__input--'.$mavFieldName;

                                                printf(
                                                    '<label for="%1$s">%2$s</label>',
                                                    $mavFieldID, $mavFieldLabel
                                                );
                                                printf(
                                                    '<input id="%1$s" type="%2$s" name="%4$s" class="mavjs-form-input mav-form-input" %3$s>',
                                                    $mavFieldID, $mavFieldType, $mavRequired, $mavFieldName
                                                );
                                                printf(
                                                    '<div class="mav-form-hint"><i class="fas fa-exclamation mav-margin-right-xs"></i>%1$s</div>',
                                                    $mavFieldHint
                                                );
                                        endif;
                                    }
                                    /* Message */
                                    if ($mavCurrentField === 'message') {
                                        printf(
                                            '<textarea id="mavid-form__input--message" name="message" class="mavjs-form-input mav-form-input-message"></textarea>'
                                        );
                                    }
                                echo '</div>';
                            }
                        echo '</div>';
                    echo '</div>';

                    /* Form Footer */
                    printf('<footer class="mav-form-footer mav-form-footer-wrapper">');
                        printf('<div class="mav-form-footer-ctn">');
                            /* Form Submit Button */
                            printf('<div class="mav-form-submit-ctn">');
                                printf(
                                    '<button id="mavid-form-submit-%1$s" type="submit" class="mavjs-form-submit mav-btn-primary">%2$s</button>',
                                    $mavUniqueNumber, __( 'Submit' , 'maverick-theme' )
                                );
                            echo '</div>';

                            /* Form Status */
                            printf('<div class="mav-form-status-ctn">');
                            echo '</div>';
                        echo '</div>';
                    echo '</footer>';
                echo '</form>';
            echo '</div>';
        echo '</div>';
    }
}