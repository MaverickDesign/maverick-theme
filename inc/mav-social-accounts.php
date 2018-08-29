<?php
/**
 * @package maverick-theme
 */

// Get social account info from JSON file
$mavFilePath = TEMPLATE_DIR . '/inc/mav-social-accounts.json';

if (file_exists($mavFilePath)) {
    $mavJSON = json_decode(file_get_contents($mavFilePath), true);
} else {
    return;
}

/**
 * Social Account - li element
 *
 * @param [type] $mav_account
 * @param [type] $mav_href
 * @param [type] $mavClass
 * @param [type] $mav_title
 * @param [type] $mav_fa_class
 * @return void
 */

function mavf_social_account($mav_account, $mav_href, $mavClass, $mav_title , $mav_fa_class)
{
    printf(
        '<li class="%3$s"><a href="%2$s%1$s" class="%5$s" title="%4$s" target="_blank"></a></li>',
        $mav_account , $mav_href, $mavClass , $mav_title , $mav_fa_class
    );
}

function mavf_social_links($mavFull=false, $mavUlClass="mav-social-links", $mavClass="mav-social-icon")
{
    printf('<ul class="%1$s">', $mavUlClass);
    /**
     * Brand Contact Info
     */
    if ($mavFull) {
        // Phone Number
        $mavBrandPhoneNumber = esc_attr(get_option('mav_setting_brand_phone'));
        if (!empty($mavBrandPhoneNumber)) {
            mavf_social_account($mavBrandPhoneNumber, 'tel:', $mavClass, 'Phone', 'fa fa-phone');
        }
        // Email
        $mavBrandContactEmail = esc_attr(get_option('mav_setting_brand_email'));
        if (!empty($mavBrandContactEmail)) {
            mavf_social_account($mavBrandContactEmail, 'mailto:', $mavClass, 'Email', 'fa fa-envelope');
        }
    }

    $mavBrandName = esc_html(get_bloginfo('name')) . __(' trên ', 'maverick-theme');

    /**
     * Social Accounts
     */

     global $mavJSON;

     foreach ($mavJSON["accounts"] as $mavAccount) {
         $mavAccountName = esc_attr(get_option($mavAccount['option']));
         if (!empty($mavAccountName)) {
            mavf_social_account($mavAccountName, $mavAccount['url'], $mavClass, $mavBrandName.$mavAccount['name'], $mavAccount['icon']);
         }
     }
    echo '</ul>';
}

function mavf_social_links_name()
{
    $mavSocialAccounts = [];
    // Facebook
    $facebookAcc 	= esc_attr(get_option('mav_setting_social_account_facebook'));
    if (!empty($facebookAcc)) {
        array_push($mavSocialAccounts, 'Facebook');
    }
    // Google Plus
    $googleplusAcc 	= esc_attr(get_option('mav_setting_social_account_google_plus'));
    if (!empty($googleplusAcc)) {
        array_push($mavSocialAccounts, 'Google Plus');
    }
    return $mavSocialAccounts;
}

/**
 * Check social account settings
 */
function mavf_check_social_accounts()
{
    global $mavJSON;
    $mavHasAccounts = false;
    if (!empty($mavJSON)) {
        foreach ($mavJSON["accounts"] as $mavAccount) {
            $mavSocialAccount = esc_attr(get_option($mavAccount['option']));
            if (!empty($mavSocialAccount)) {
                $mavHasAccounts = true;
            }
        }
    }
    return $mavHasAccounts;
}
