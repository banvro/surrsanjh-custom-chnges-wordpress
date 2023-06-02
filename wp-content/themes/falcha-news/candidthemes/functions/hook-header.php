<?php

/**
 * Header Hook Element.
 *
 * @package Falcha News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('falcha_news_do_skip_to_content_link')) {
    /**
     * Add skip to content link before the header.
     *
     * @since 1.0.0
     */
    function falcha_news_do_skip_to_content_link()
    {
?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'falcha-news'); ?></a>
        <?php
    }
}
add_action('falcha_news_before_header', 'falcha_news_do_skip_to_content_link', 10);

if (!function_exists('falcha_news_preloader')) {
    /**
     * Add preloader to website
     *
     * @since 1.0.0
     */
    function falcha_news_preloader()
    {
        global $falcha_news_theme_options;


        //Check if preloader is enabled from customizer
        if ($falcha_news_theme_options['falcha-news-extra-preloader'] == 1) :
        ?>
            <!-- Preloader -->
            <div id="loader-wrapper">
                <div id="loader"></div>

                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>

            </div>
        <?php
        endif;
    }
}
add_action('falcha_news_before_header', 'falcha_news_preloader', 20);

if (!function_exists('falcha_news_header_start_container')) {
    /**
     * Add header html open tag
     *
     * @since 1.0.0
     */
    function falcha_news_header_start_container()
    {
        ?>
        <header id="masthead" class="site-header" <?php falcha_news_do_microdata('header'); ?>>
        <?php

    }
}
add_action('falcha_news_header_start', 'falcha_news_header_start_container', 10);


if (!function_exists('falcha_news_construct_header')) {
    /**
     * Add header block.
     *
     * @since 1.0.0
     */
    function falcha_news_construct_header()
    {
        /**
         * falcha_news_after_header_open hook.
         *
         * @since 1.0.0
         *
         */
        do_action('falcha_news_after_header_open');
        ?>
            <div class="overlay"></div>
        <?php
        global $falcha_news_theme_options;

        /**
         * falcha_news_main_header hook.
         *
         * @since 1.0.0
         *
         * @hooked falcha_news_construct_main_header - 10
         *
         */
        do_action('falcha_news_main_header');


        /**
         * falcha_news_main_navigation hook.
         *
         * @since 1.0.0
         *
         * @hooked falcha_news_construct_main_navigation - 10
         *
         */
        do_action('falcha_news_main_navigation');


        /**
         * falcha_news_before_header_close hook.
         *
         * @since 1.0.0
         *
         */
        do_action('falcha_news_before_header_close');
    }
}
add_action('falcha_news_header', 'falcha_news_construct_header', 10);


if (!function_exists('falcha_news_header_end_container')) {
    /**
     * Add header html close tag
     *
     * @since 1.0.0
     */
    function falcha_news_header_end_container()
    {
        ?>
        </header><!-- #masthead -->
        <?php

    }
}
add_action('falcha_news_header_end', 'falcha_news_header_end_container', 10);

if (!function_exists('falcha_news_header_ads')) {
    /**
     * Add header ads
     *
     * @since 1.0.0
     */
    function falcha_news_header_ads()
    {
        global $falcha_news_theme_options;
        $logo_position = $falcha_news_theme_options['falcha-news-custom-logo-position'];

        $falcha_news_header_ad_image = esc_url($falcha_news_theme_options['falcha-news-header-ads-image']);
        $falcha_news_header_ad_url = esc_url($falcha_news_theme_options['falcha-news-header-ads-image-link']);
        if (!empty($falcha_news_header_ad_image)) :
        ?>
            <div class="falcha-news-header-ads clearfix">
                <?php
                if (!empty($falcha_news_header_ad_image) && (!empty($falcha_news_header_ad_url))) {
                ?>
                    <a href="<?php echo esc_url($falcha_news_header_ad_url); ?>" target="_blank">
                        <img src="<?php echo esc_url($falcha_news_header_ad_image); ?>">
                    </a>
                <?php
                } else if (!empty($falcha_news_header_ad_image)) {
                ?>
                    <img src="<?php echo esc_url($falcha_news_header_ad_image); ?>">
                <?php
                }
                ?>
            </div> <!-- .logo-right-wrapper -->
        <?php
        endif; // !empty $falcha_news_header_ad_image


    }
}
add_action('falcha_news_header_ads', 'falcha_news_header_ads', 10);


if (!function_exists('falcha_news_trending_news_item')) {
    /**
     * Add trending news section
     *
     * @since 1.0.0
     */
    function falcha_news_trending_news_item()
    {
        global $falcha_news_theme_options;
        $trending_cat = absint($falcha_news_theme_options['falcha-news-trending-news-category']);
        $trending_title = esc_html($falcha_news_theme_options['falcha-news-enable-trending-news-text']);
        if (is_rtl()) {
            $marquee_class = 'trending-right';
        } else {
            $marquee_class = 'trending-left';
        }
        ?>
        <?php
        $query_args = array(
            'post_type' => 'post',
            'ignore_sticky_posts' => true,
            'posts_per_page' => 10,
            'cat' => $trending_cat
        );

        $query = new WP_Query($query_args);
        if ($query->have_posts()) :
        ?>

            <div class="trending-wrapper">
                <?php
                if ($trending_title) :
                ?>
                    <strong class="trending-title">
                        <?php echo $trending_title; ?>
                    </strong>
                <?php
                endif;
                ?>
                <div class="trending-content <?php echo $marquee_class; ?>">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <div class="img-marq">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>

                            <div class="title-marq">
                                <span class="title">
                                    <?php the_title(); ?>
                                </span>

                                <span class="post-date">
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                </div>
            </div>
            <!-- .top-right-col -->
        <?php
        endif;
        ?>
<?php


    }
}
add_action('falcha_news_trending_news', 'falcha_news_trending_news_item', 10);
