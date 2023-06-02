<?php

/**
 * Falcha News Theme Customizer default values
 *
 * @package Falcha News
 */
if (!function_exists('falcha_news_default_theme_options_values')) :
    function falcha_news_default_theme_options_values()
    {
        $default_theme_options = array(

            /*General Colors*/
            'falcha-news-primary-color' => '#ff9516',
            'falcha-news-site-title-hover' => '',
            'falcha-news-site-tagline' => '',


            /*Logo Section Colors*/
            'falcha-news-logo-section-background' => '#ff9516',

            /*logo position*/
            'falcha-news-custom-logo-position' => 'center',

            /*Site Layout Options*/
            'falcha-news-site-layout-options' => 'boxed',
            'falcha-news-boxed-width-options' => 1500,

            /*Top Header Section Default Value*/
            'falcha-news-enable-top-header' => true,
            'falcha-news-enable-top-header-social' => true,
            'falcha-news-enable-top-header-menu' => true,
            'falcha-news-enable-top-header-date' => true,
            'falcha-news-top-header-date-format' => 'default-date',

            /*Treding News*/
            'falcha-news-enable-trending-news' => true,
            'falcha-news-enable-trending-news-text' => esc_html__('Trending News', 'falcha-news'),
            'falcha-news-trending-news-category' => 0,

            /*Menu Section*/
            'falcha-news-enable-menu-section-search' => true,
            'falcha-news-enable-sticky-primary-menu' => true,
            'falcha-news-enable-menu-home-icon' => true,

            /*Header Ads Default Value*/
            'falcha-news-enable-ads-header' => false,
            'falcha-news-header-ads-image' => '',
            'falcha-news-header-ads-image-link' => 'https://www.candidthemes.com/themes/falcha-news-pro/',

            /*Slider Section Default Value*/
            'falcha-news-enable-slider' => true,
            'falcha-news-select-category' => 0,
            'falcha-news-select-category-featured-right' => 0,
            'falcha-news-slider-post-date' => true,
            'falcha-news-slider-post-author' => false,
            'falcha-news-slider-post-category' => true,
            'falcha-news-slider-post-read-time' => true,


            /*Sidebars Default Value*/
            'falcha-news-sidebar-blog-page' => 'right-sidebar',
            'falcha-news-sidebar-front-page' => 'right-sidebar',
            'falcha-news-sidebar-archive-page' => 'right-sidebar',

            /*Blog Page Default Value*/
            'falcha-news-content-show-from' => 'excerpt',
            'falcha-news-excerpt-length' => 25,
            'falcha-news-pagination-options' => 'numeric',
            'falcha-news-read-more-text' => esc_html__('Read More', 'falcha-news'),
            'falcha-news-enable-blog-author' => false,
            'falcha-news-enable-blog-category' => true,
            'falcha-news-enable-blog-date' => true,
            'falcha-news-enable-blog-comment' => false,
            'falcha-news-enable-blog-tags' => false,

            /*Single Page Default Value*/
            'falcha-news-single-page-featured-image' => true,
            'falcha-news-single-page-related-posts' => true,
            'falcha-news-single-page-related-posts-title' => esc_html__('Related Posts', 'falcha-news'),
            'falcha-news-enable-single-category' => true,
            'falcha-news-enable-single-date' => true,
            'falcha-news-enable-single-author' => true,


            /*Sticky Sidebar Options*/
            'falcha-news-enable-sticky-sidebar' => true,

            /*Social Share Options*/
            'falcha-news-enable-single-sharing' => true,
            'falcha-news-enable-blog-sharing' => false,
            'falcha-news-enable-static-page-sharing' => false,

            /*Footer Section*/
            'falcha-news-footer-copyright' =>  esc_html__('All Rights Reserved 2023.', 'falcha-news'),
            'falcha-news-go-to-top' => true,


            /*Extra Options*/
            'falcha-news-extra-breadcrumb' => true,
            'falcha-news-breadcrumb-text' =>  esc_html__('You are Here', 'falcha-news'),
            'falcha-news-extra-preloader' => true,
            'falcha-news-front-page-content' => false,
            'falcha-news-extra-hide-read-time' => false,
            'falcha-news-extra-post-formats-icons' => true,
            'falcha-news-enable-category-color' => false,

            'falcha-news-breadcrumb-display-from-option' => 'theme-default',
            'falcha-news-breadcrumb-display-from-plugins' => 'yoast',

        );
        return apply_filters('falcha_news_default_theme_options_values', $default_theme_options);
    }
endif;

/**
 *  Falcha News Theme Options and Settings
 *
 * @since Falcha News 1.0.0
 *
 * @param null
 * @return array falcha_news_get_options_value
 *
 */
if (!function_exists('falcha_news_get_options_value')) :
    function falcha_news_get_options_value()
    {
        $falcha_news_default_theme_options_values = falcha_news_default_theme_options_values();
        $falcha_news_get_options_value = get_theme_mod('falcha_news_options');
        if (is_array($falcha_news_get_options_value)) {
            return array_merge($falcha_news_default_theme_options_values, $falcha_news_get_options_value);
        } else {
            return $falcha_news_default_theme_options_values;
        }
    }
endif;
