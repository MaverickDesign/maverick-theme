<?php
/*
 * @package mavericktheme
 */

function mavf_social_account($mav_account, $mav_href, $mavClass, $mav_title , $mav_fa_class) {
	printf(sprintf('<li class="%3$s"><a href="%2$s%1$s" class="%5$s" title="%4$s" target="_blank"></a></li>', $mav_account , $mav_href, $mavClass , $mav_title , $mav_fa_class));
}

function mavf_social_links($mavFull=false, $mavUlClass="mav-social-links", $mavClass="mav-social-icon") {
	printf(sprintf('<ul class="%1$s">',$mavUlClass));
	/* 
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

	/*
	* Social Accounts
	*/
	
	// Facebook
	$facebookAcc 	= esc_attr(get_option('mav_setting_social_account_facebook'));
	if ( !empty($facebookAcc) ) {
		mavf_social_account($facebookAcc , 'http://www.facebook.com/' , $mavClass , 'Facebook' , 'fab fa-facebook-f');
	}
	// Google Plus
	$googleplusAcc 	= esc_attr(get_option('mav_setting_social_account_google_plus'));
	if ( !empty($googleplusAcc) ) {
		mavf_social_account($googleplusAcc , 'https://plus.google.com/' , $mavClass , 'Google+' , 'fab fa-google-plus-g');
	}
	// Twitter
	$twitterAcc 	= esc_attr(get_option('mav_setting_social_account_twitter'));
	if ( !empty($twitterAcc) ) {
		mavf_social_account($twitterAcc , 'http://www.twitter.com/' , $mavClass , 'Twitter' , 'fab fa-twitter');
	}
	// LinkedIn
	$linkedinAcc 	= esc_attr(get_option('mav_setting_social_account_linkedin'));
	if ( !empty($linkedinAcc) ) {
		mavf_social_account($linkedinAcc , 'http://www.linkedin.com/in/' , $mavClass , 'LinkedIn' , 'fab fa-linkedin-in');
	}
	// Instagram
	$instagramAcc 	= esc_attr(get_option('mav_setting_social_account_instagram'));
	if ( !empty($instagramAcc) ) {
		mavf_social_account($instagramAcc , 'http://www.instagram.com/' , $mavClass , 'Instagram' , 'fab fa-instagram');
	}
	// YouTube
	$youtubeAcc 	= esc_attr(get_option('mav_setting_social_account_youtube'));
	if ( !empty($youtubeAcc) ) {
		mavf_social_account($youtubeAcc , 'http://www.youtube.com/' , $mavClass , 'YouTube' , 'fab fa-youtube');		
	}
	// Flickr
	$flickrAcc 		= esc_attr(get_option('mav_setting_social_account_flickr'));
	if ( !empty($flickrAcc) ) {
		mavf_social_account($flickrAcc , 'http://www.flickr.com/' , $mavClass , 'Flickr' , 'fab fa-flickr');
	}
	echo '</ul>';
}

function mavf_social_links_name(){
	$mavSocialAccounts = [];
	// Facebook
	$facebookAcc 	= esc_attr(get_option('mav_setting_social_account_facebook'));
	if ( !empty($facebookAcc) ) {
		array_push($mavSocialAccounts, 'Facebook');
	}
	// Google Plus
	$googleplusAcc 	= esc_attr(get_option('mav_setting_social_account_google_plus'));
	if ( !empty($googleplusAcc) ) {
		array_push($mavSocialAccounts, 'Google Plus');
	}
	return $mavSocialAccounts;
}