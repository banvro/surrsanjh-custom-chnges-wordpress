<?php 
/**
 *  Falcha News Additional Settings Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Extra Options*/
$wp_customize->add_section( 'falcha_news_extra_options', array(
    'priority'       => 75,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Extra Options', 'falcha-news' ),
    'panel'          => 'falcha_news_panel',
) );

/*Preloader Enable*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-extra-preloader]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-extra-preloader'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-extra-preloader]', array(
    'label'     => __( 'Enable Preloader', 'falcha-news' ),
    'description' => __( 'It will enable the preloader on the website.', 'falcha-news' ),
    'section'   => 'falcha_news_extra_options',
    'settings'  => 'falcha_news_options[falcha-news-extra-preloader]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Home Page Content*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-front-page-content]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-front-page-content'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-front-page-content]', array(
    'label'     => __( 'Hide Front Page Content', 'falcha-news' ),
    'description' => __( 'Checked to hide the front page content from front page.', 'falcha-news' ),
    'section'   => 'falcha_news_extra_options',
    'settings'  => 'falcha_news_options[falcha-news-front-page-content]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Hide Post Format Icons*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-extra-post-formats-icons]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-extra-post-formats-icons'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-extra-post-formats-icons]', array(
    'label'     => __( 'Hide Post Formats Icons', 'falcha-news' ),
    'description' => __( 'Icons like camera, photo, video, audio will hide.', 'falcha-news' ),
    'section'   => 'falcha_news_extra_options',
    'settings'  => 'falcha_news_options[falcha-news-extra-post-formats-icons]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );


/*Hide Read More Time*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-extra-hide-read-time]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-extra-hide-read-time'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-extra-hide-read-time]', array(
    'label'     => __( 'Hide Reading Time', 'falcha-news' ),
    'description' => __( 'You can hide the reading time in whole site.', 'falcha-news' ),
    'section'   => 'falcha_news_extra_options',
    'settings'  => 'falcha_news_options[falcha-news-extra-hide-read-time]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );