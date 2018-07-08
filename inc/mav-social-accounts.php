<?php
/**
 * @package mavericktheme
 */
$facebookAcc 	= esc_attr(get_option('mav_setting_social_account_facebook'));
$googleplusAcc 	= esc_attr(get_option('mav_setting_social_account_google_plus'));
$twitterAcc 	= esc_attr(get_option('mav_setting_social_account_twitter'));
$linkedinAcc 	= esc_attr(get_option('mav_setting_social_account_linkedin'));
$instagramAcc 	= esc_attr(get_option('mav_setting_social_account_instagram'));
$youtubeAcc 	= esc_attr(get_option('mav_setting_social_account_youtube'));
$flickrAcc 		= esc_attr(get_option('mav_setting_social_account_flickr'));

function mavf_social_account($mav_account, $mav_href, $mavClass, $mav_title , $mav_fa_class) {
	printf('<li class="%3$s"><a href="%2$s%1$s" class="%5$s" title="%4$s" target="_blank"></a></li>', $mav_account , $mav_href, $mavClass , $mav_title , $mav_fa_class);
}

function mavf_social_links($mavFull=false, $mavUlClass="mav-social-links", $mavClass="mav-social-icon") {
	printf('<ul class="%1$s">',$mavUlClass);
	/**
	 * Brand Contact Info
	 */
	if ($mavFull) {
		// Phone Number
		$mavBrandPhoneNumber 	= esc_attr(get_option('mav_setting_brand_phone'));
		if ( !empty($mavBrandPhoneNumber) ) {
			mavf_social_account($mavBrandPhoneNumber, 'tel:' , $mavClass , 'Phone' , 'fa fa-phone' );
		}
		// Email
		$mavBrandContactEmail 	= esc_attr(get_option('mav_setting_brand_email'));
		if ( !empty($mavBrandContactEmail) ) {
			mavf_social_account($mavBrandContactEmail, 'mailto:' , $mavClass , 'Email' , 'fa fa-envelope' );
		}
	}

	$mavBrandName = esc_html(get_bloginfo('name')) . __(' trên ','mavericktheme');

	/**
	 * Social Accounts
	 */

	// Facebook
	global $facebookAcc;
	if ( !empty($facebookAcc) ) {
		mavf_social_account($facebookAcc , 'http://www.facebook.com/' , $mavClass , $mavBrandName.'Facebook' , 'fab fa-facebook-f');
	}
	// Google Plus
	global $googleplusAcc;
	if ( !empty($googleplusAcc) ) {
		mavf_social_account($googleplusAcc , 'https://plus.google.com/' , $mavClass , $mavBrandName.'Google+' , 'fab fa-google-plus-g');
	}
	// Twitter
	global $twitterAcc;
	if ( !empty($twitterAcc) ) {
		mavf_social_account($twitterAcc , 'http://www.twitter.com/' , $mavClass , $mavBrandName.'Twitter' , 'fab fa-twitter');
	}
	// LinkedIn
	global $linkedinAcc;
	if ( !empty($linkedinAcc) ) {
		mavf_social_account($linkedinAcc , 'http://www.linkedin.com/in/' , $mavClass , $mavBrandName.'LinkedIn' , 'fab fa-linkedin-in');
	}
	// Instagram
	global $instagramAcc;
	if ( !empty($instagramAcc) ) {
		mavf_social_account($instagramAcc , 'http://www.instagram.com/' , $mavClass , $mavBrandName.'Instagram' , 'fab fa-instagram');
	}
	// YouTube
	global $youtubeAcc;
	if ( !empty($youtubeAcc) ) {
		mavf_social_account($youtubeAcc , 'http://www.youtube.com/' , $mavClass , $mavBrandName.'YouTube' , 'fab fa-youtube');
	}
	// Flickr
	global $flickrAcc;
	if ( !empty($flickrAcc) ) {
		mavf_social_account($flickrAcc , 'http://www.flickr.com/' , $mavClass , $mavBrandName.'Flickr' , 'fab fa-flickr');
	}
	echo '</ul>';
}

function mavf_social_links_name(){
	$mavSocialAccounts = [];
	// Facebook
	global $facebookAcc;
	if ( !empty($facebookAcc) ) {
		array_push($mavSocialAccounts, 'Facebook');
	}
	// Google Plus
	global $googleplusAcc;
	if ( !empty($googleplusAcc) ) {
		array_push($mavSocialAccounts, 'Google Plus');
	}
	return $mavSocialAccounts;
}

function mavf_check_social_accounts(){
	global $facebookAcc;
	global $googleplusAcc;
	global $twitterAcc;
	global $linkedinAcc;
	global $instagramAcc;
	global $youtubeAcc;
	global $flickrAcc;

	$mavSocialAccounts = [$facebookAcc,$googleplusAcc,$twitterAcc,$linkedinAcc,$instagramAcc,$youtubeAcc,$flickrAcc];

	$mavHasAccounts = false;

	foreach ($mavSocialAccounts as $mavSocialAccount) {
		if (!empty($mavSocialAccount)) {
			$mavHasAccounts = true;
		}
	}

	return $mavHasAccounts;
}