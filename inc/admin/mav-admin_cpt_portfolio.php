<?php
/**
 * @package maverick-theme
 */

$mavPortfolioLabels = array(
    'name'              => __('Portfolio','maverick-theme'),
    'singular_name'     => __('Portfolio','maverick-theme')
);

$mavPortfolioArgs = array(
    'labels'        => $mavPortfolioLabels,
    'public'        => true,
    'has_archive'   => true
);

register_post_type( 'mav_cpt_portfolio', $mavPortfolioArgs );

flush_rewrite_rules();