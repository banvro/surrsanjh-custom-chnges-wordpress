<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Falcha News
 */
$falcha_news_theme_options = falcha_news_get_options_value();
$GLOBALS['falcha_news_theme_options'] = $falcha_news_theme_options;
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php falcha_news_do_microdata('body'); ?>>
    <?php
    //wp_body_open hook from WordPress 5.2
    if (function_exists('wp_body_open')) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    }
    ?>
    <div id="page" class="site">
        <?php
        /**
         * falcha_news_before_header hook.
         *
         * @since 1.0.0
         *
         * @hooked falcha_news_do_skip_to_content_link - 10
         *
         */
        do_action('falcha_news_before_header');


        /**
         * falcha_news_header_start_container hook.
         *
         * @since 1.0.0
         *
         */
        do_action('falcha_news_header_start');

        /**
         * falcha_news_header hook.
         *
         * @since 1.0.0
         *
         * @hooked falcha_news_construct_header - 10
         */
        do_action('falcha_news_header');

        /**
         * falcha_news_header_end_container hook.
         *
         * @since 1.0.0
         *
         */
        do_action('falcha_news_header_end');

        /**
         * falcha_news_after_header hook.
         *
         * @since 1.0.0
         *
         */
        do_action('falcha_news_after_header');


        if (($falcha_news_theme_options['falcha-news-enable-trending-news'] == 1) && (is_front_page())) :
            do_action('falcha_news_trending_news');
        endif;

        //Check if slider is enabled from customizer
        if ($falcha_news_theme_options['falcha-news-enable-slider'] == 1) :
            /**
             * falcha_news_carousel hook.
             *
             * @since 1.0.0
             *
             * @hooked falcha_news_constuct_carousel - 10
             */
            do_action('falcha_news_carousel');

        endif;

        //Full Width Sidebar Area below the featured Section
        if (is_active_sidebar('falcha-news-home-full-width-area') && is_front_page()) {
        ?>
            <div class="ct-below-featured-area">
                <div class="container-inner">
                    <?php dynamic_sidebar('falcha-news-home-full-width-area'); ?>
                </div>
            </div>
        <?php
        }

        ?>

        <div id="content" class="site-content">
            <?php
            $container_class = !is_page_template('elementor_header_footer') ? 'container-inner ct-container-main' : 'container-outer ct-container-main';
            ?>
            <div class="<?php echo $container_class; ?> clearfix">