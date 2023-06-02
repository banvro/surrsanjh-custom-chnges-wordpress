<?php
/**
 *  Falcha News Sidebar Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section( 'falcha_news_sidebar_section', array(
   'priority'       => 40,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sidebar Options', 'falcha-news' ),
   'panel' 		 => 'falcha_news_panel',
) );
/*Front Page Sidebar Layout*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-sidebar-blog-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-sidebar-blog-page'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-sidebar-blog-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','falcha-news'),
    'left-sidebar'    => __('Left Sidebar','falcha-news'),
    'no-sidebar'      => __('No Sidebar','falcha-news'),
    'middle-column'   => __('Middle Column','falcha-news')
),
   'label'     => __( 'Inner Pages Sidebar', 'falcha-news' ),
   'description' => __('This sidebar will work for all Pages', 'falcha-news'),
   'section'   => 'falcha_news_sidebar_section',
   'settings'  => 'falcha_news_options[falcha-news-sidebar-blog-page]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Front Page Sidebar Layout*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-sidebar-front-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-sidebar-front-page'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-sidebar-front-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','falcha-news'),
    'left-sidebar'    => __('Left Sidebar','falcha-news'),
    'no-sidebar'      => __('No Sidebar','falcha-news'),
    'middle-column'   => __('Middle Column','falcha-news')
),
   'label'     => __( 'Front Page Sidebar', 'falcha-news' ),
   'description' => __('This sidebar will work for Front Page', 'falcha-news'),
   'section'   => 'falcha_news_sidebar_section',
   'settings'  => 'falcha_news_options[falcha-news-sidebar-front-page]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Archive Page Sidebar Layout*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-sidebar-archive-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-sidebar-archive-page'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-sidebar-archive-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','falcha-news'),
    'left-sidebar'    => __('Left Sidebar','falcha-news'),
    'no-sidebar'      => __('No Sidebar','falcha-news'),
    'middle-column'   => __('Middle Column','falcha-news')
),
   'label'     => __( 'Archive Page Sidebar', 'falcha-news' ),
   'description' => __('This sidebar will work for all Archive Pages', 'falcha-news'),
   'section'   => 'falcha_news_sidebar_section',
   'settings'  => 'falcha_news_options[falcha-news-sidebar-archive-page]',
   'type'      => 'select',
   'priority'  => 10,
) );