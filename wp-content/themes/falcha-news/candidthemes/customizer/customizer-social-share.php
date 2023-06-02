<?php
/**
 *  Falcha News Social Share Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'falcha_news_social_share_section', array(
   'priority'       => 87,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Social Share Options', 'falcha-news' ),
   'panel'     => 'falcha_news_panel',
) );

/*Blog Page Social Share*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-blog-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-blog-sharing'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-blog-sharing]', array(
    'label'     => __( 'Enable Social Sharing', 'falcha-news' ),
    'description' => __('Checked to Enable Social Sharing In Home Page,  Search Page and Archive page.', 'falcha-news'),
    'section'   => 'falcha_news_social_share_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-blog-sharing]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );

/* Single Page social sharing*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-single-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-single-sharing'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-single-sharing]', array(
    'label'     => __( 'Social Sharing on Blog Page', 'falcha-news' ),
    'description' => __('Checked to Enable Social Sharing In Single post and page.', 'falcha-news'),
    'section'   => 'falcha_news_social_share_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-single-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/* Single Page social sharing*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-single-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-single-sharing'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-single-sharing]', array(
    'label'     => __( 'Social Sharing on Single Post', 'falcha-news' ),
    'description' => __('Checked to Enable Social Sharing In Single post and page.', 'falcha-news'),
    'section'   => 'falcha_news_social_share_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-single-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/* Static Front Page social sharing*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-static-page-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-static-page-sharing'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-static-page-sharing]', array(
    'label'     => __( 'Social Sharing on Static Front Page', 'falcha-news' ),
    'description' => __('Checked to Enable Social Sharing In static front page.', 'falcha-news'),
    'section'   => 'falcha_news_social_share_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-static-page-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );