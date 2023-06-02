<?php

/**
 *  Falcha News Site Layout Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Site Layout Section*/
$wp_customize->add_section('falcha_news_site_layout_section', array(
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Site Layout Options', 'falcha-news'),
    'panel'     => 'falcha_news_panel',
));
/*Site Layout settings*/
$wp_customize->add_setting('falcha_news_options[falcha-news-site-layout-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-site-layout-options'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
));
$wp_customize->add_control('falcha_news_options[falcha-news-site-layout-options]', array(
    'choices' => array(
        'boxed'    => __('Boxed Layout', 'falcha-news'),
        'full-width'    => __('Full Width', 'falcha-news')
    ),
    'label'     => __('Site Layout Option', 'falcha-news'),
    'description' => __('You can make the overall site full width or boxed in nature.', 'falcha-news'),
    'section'   => 'falcha_news_site_layout_section',
    'settings'  => 'falcha_news_options[falcha-news-site-layout-options]',
    'type'      => 'select',
    'priority'  => 30,
));

/*callback functions header section*/
if (!function_exists('falcha_news_boxed_layout_width')) :
    function falcha_news_boxed_layout_width()
    {
        global $falcha_news_theme_options;
        $falcha_news_theme_options = falcha_news_get_options_value();
        $boxed_width = esc_attr($falcha_news_theme_options['falcha-news-site-layout-options']);
        if ('boxed' == $boxed_width) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Site Layout width*/
$wp_customize->add_setting('falcha_news_options[falcha-news-boxed-width-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-boxed-width-options'],
    'sanitize_callback' => 'absint'
));
$wp_customize->add_control('falcha_news_options[falcha-news-boxed-width-options]', array(
    'label'     => __('Set Boxed Width Range', 'falcha-news'),
    'description' => __('Make the required width of your boxed layout. Select a custom width for the boxed layout. Minimim is 1200px and maximum is 1500px.', 'falcha-news'),
    'section'   => 'falcha_news_site_layout_section',
    'settings'  => 'falcha_news_options[falcha-news-boxed-width-options]',
    'type'      => 'range',
    'priority'  => 30,
    'input_attrs' => array(
        'min' => 1200,
        'max' => 1500,
    ),
    'active_callback' => 'falcha_news_boxed_layout_width',
));
