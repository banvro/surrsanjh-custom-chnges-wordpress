<?php
/**
 *  Falcha News Logo Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Logo Options*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-custom-logo-position]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-custom-logo-position'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-custom-logo-position]', array(
   'choices' => array(
    'default'    => __('Left Align','falcha-news'),
    'center'    => __('Center Logo','falcha-news')
),
   'label'     => __( 'Logo Position Option', 'falcha-news' ),
   'description' => __('Your logo will be in the center position.', 'falcha-news'),
   'section'   => 'title_tagline',
   'settings'  => 'falcha_news_options[falcha-news-custom-logo-position]',
   'type'      => 'select',
   'priority'  => 30,
) );