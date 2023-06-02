<?php

/**
 * Main Header Hook Element.
 *
 * @package Falcha News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('falcha_news_construct_main_header')) {
    /**
     * Add main header block
     *
     * @since 1.0.0
     */
    function falcha_news_construct_main_header()
    {
        global $falcha_news_theme_options;
        $logo_position = $falcha_news_theme_options['falcha-news-custom-logo-position'];
        if ($logo_position == 'center') {
            $logo_class = 'full-wrapper text-center';
            $logo_right_class = 'full-wrapper';
        } else {
            $logo_class = 'float-left';
            $logo_right_class = 'float-right';
        }
?>
        <?php

        $has_header_image = has_header_image();
        if (!empty($has_header_image)) {
        ?>
            <div class="logo-wrapper-block">
            <?php
        } else {
            ?>
                <div class="logo-wrapper-block">
                <?php
            }
                ?>
                <div class="container-inner clearfix logo-wrapper-container">
                    <div class="header-mid-left clearfix">
                        <?php do_action('falcha_news_mid_date'); ?>
                        <?php do_action('falcha_news_mid_menu'); ?>
                    </div>
                    <!-- .header-mid-left -->

                    <div class="logo-wrapper">
                        <div class="site-branding">

                            <div class="falcha-news-logo-container">
                                <?php
                                if (function_exists('the_custom_logo')) {

                                    the_custom_logo();
                                }
                                if (is_front_page() && is_home()) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                <?php
                                endif;

                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) : ?>
                                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                <?php
                                endif; ?>
                            </div> <!-- falcha-news-logo-container -->
                        </div><!-- .site-branding -->
                    </div> <!-- .logo-wrapper -->

                    <div class="header-mid-right clearfix">
                        <?php do_action('falcha_news_top_link_right'); ?>
                    </div>
                    <!-- .header-mid-right -->

                </div> <!-- .container-inner -->
                </div> <!-- .logo-wrapper-block -->
        <?php
    }
}
add_action('falcha_news_main_header', 'falcha_news_construct_main_header', 10);
add_action('falcha_news_before_header_close', 'falcha_news_falcha_ad');

function falcha_news_falcha_ad()
{
    global $falcha_news_theme_options;
    //Check if header advertisement is enabled from customizer
    if ($falcha_news_theme_options['falcha-news-enable-ads-header'] == 1) :
        /**
         * falcha_news_header_ads hook.
         *
         * @since 1.0.0
         *
         */
        do_action('falcha_news_header_ads');

    endif;
}
