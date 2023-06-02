<?php
/**
 *  Falcha News Footer Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Footer Options*/
$wp_customize->add_section( 'falcha_news_footer_section', array(
   'priority'       => 85,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Footer Options', 'falcha-news' ),
   'panel' 		 => 'falcha_news_panel',
) );
/*Copyright Setting*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-footer-copyright]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-footer-copyright]', array(
    'label'     => __( 'Copyright Text', 'falcha-news' ),
    'description' => __('Enter your own copyright text.', 'falcha-news'),
    'section'   => 'falcha_news_footer_section',
    'settings'  => 'falcha_news_options[falcha-news-footer-copyright]',
    'type'      => 'text',
    'priority'  => 15,
) );
/*Go to Top Setting*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-go-to-top]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-go-to-top'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-go-to-top]', array(
    'label'     => __( 'Enable Go to Top', 'falcha-news' ),
    'description' => __('Checked to Enable Go to Top', 'falcha-news'),
    'section'   => 'falcha_news_footer_section',
    'settings'  => 'falcha_news_options[falcha-news-go-to-top]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );