<?php
/**
 *  Falcha News Sticky Sidebar Option
 *
 * @since Falcha News 1.0.0
 *
 */

/*Sticky Sidebar*/
$wp_customize->add_section( 'falcha_news_sticky_sidebar', array(
    'priority'       => 76,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Sticky Sidebar', 'falcha-news' ),
    'panel' 		 => 'falcha_news_panel',
) );
/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-sticky-sidebar'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-sticky-sidebar]', array(
    'label'     => __( 'Sticky Sidebar Option', 'falcha-news' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'falcha-news'),
    'section'   => 'falcha_news_sticky_sidebar',
    'settings'  => 'falcha_news_options[falcha-news-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );