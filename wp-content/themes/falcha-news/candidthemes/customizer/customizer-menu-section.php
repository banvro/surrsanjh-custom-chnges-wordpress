<?php
/**
 *  Falcha News Menu Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Menu Options*/
$wp_customize->add_section( 'falcha_news_primary_menu_section', array(
   'priority'       => 25,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Menu Section Options', 'falcha-news' ),
   'panel'     => 'falcha_news_panel',
) );

/*Enable Search Icons In Header*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-sticky-primary-menu]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['falcha-news-enable-sticky-primary-menu'],
   'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-sticky-primary-menu]', array(
   'label'     => __( 'Enable Primary Menu Sticky', 'falcha-news' ),
   'description' => __('The main primary menu will be sticky.', 'falcha-news'),
   'section'   => 'falcha_news_primary_menu_section',
   'settings'  => 'falcha_news_options[falcha-news-enable-sticky-primary-menu]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Search Icons In Header*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-menu-section-search]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['falcha-news-enable-menu-section-search'],
   'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-menu-section-search]', array(
   'label'     => __( 'Enable Search Icons', 'falcha-news' ),
   'description' => __('You can show the search field in header.', 'falcha-news'),
   'section'   => 'falcha_news_primary_menu_section',
   'settings'  => 'falcha_news_options[falcha-news-enable-menu-section-search]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Home Icons In Menu*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-menu-home-icon]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['falcha-news-enable-menu-home-icon'],
   'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-menu-home-icon]', array(
   'label'     => __( 'Enable Home Icons', 'falcha-news' ),
   'description' => __('Home Icon will displayed in menu.', 'falcha-news'),
   'section'   => 'falcha_news_primary_menu_section',
   'settings'  => 'falcha_news_options[falcha-news-enable-menu-home-icon]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );