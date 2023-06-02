<?php
/**
 *  Falcha News Slider Featured Section Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Slider Options*/
$wp_customize->add_section( 'falcha_news_slider_section', array(
 'priority'       => 25,
 'capability'     => 'edit_theme_options',
 'theme_supports' => '',
 'title'          => __( 'Featured Section', 'falcha-news' ),
 'panel' 		 => 'falcha_news_panel',
) );
/*callback functions slider*/
if ( !function_exists('falcha_news_slider_active_callback') ) :
  function falcha_news_slider_active_callback(){
    global $falcha_news_theme_options;
    $falcha_news_theme_options = falcha_news_get_options_value();
    $enable_slider = absint($falcha_news_theme_options['falcha-news-enable-slider']);
    if( 1 == $enable_slider ){
      return true;
    }
    else{
      return false;
    }
  }
endif;
/*Slider Enable Option*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-slider]', array(
 'capability'        => 'edit_theme_options',
 'transport' => 'refresh',
 'default'           => $default['falcha-news-enable-slider'],
 'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-slider]', array(
 'label'     => __( 'Enable Featured Section', 'falcha-news' ),
 'description' => __('Checked to Featured Section In Home Page.', 'falcha-news'),
 'section'   => 'falcha_news_slider_section',
 'settings'  => 'falcha_news_options[falcha-news-enable-slider]',
 'type'      => 'checkbox',
 'priority'  => 10,
) );
/*Slider Category Left Selection*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-select-category]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['falcha-news-select-category'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new Falcha_News_Customize_Category_Dropdown_Control(
    $wp_customize,
    'falcha_news_options[falcha-news-select-category]',
    array(
      'label'     => __( 'Select Category For Featured Left Section', 'falcha-news' ),
      'description' => __('From the dropdown select the category for the featured left section. Category having post will display in below dropdown.', 'falcha-news'),
      'section'   => 'falcha_news_slider_section',
      'settings'  => 'falcha_news_options[falcha-news-select-category]',
      'type'      => 'category_dropdown',
      'priority'  => 10,
      'active_callback'=>'falcha_news_slider_active_callback'
    )
  )
);

/*Slider Category Right Selection*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-select-category-featured-right]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['falcha-news-select-category-featured-right'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new Falcha_News_Customize_Category_Dropdown_Control(
    $wp_customize,
    'falcha_news_options[falcha-news-select-category-featured-right]',
    array(
      'label'     => __( 'Select Category For Featured Right Section', 'falcha-news' ),
      'description' => __('From the dropdown select the category for the featured right section. Category having post will display in below dropdown.', 'falcha-news'),
      'section'   => 'falcha_news_slider_section',
      'settings'  => 'falcha_news_options[falcha-news-select-category-featured-right]',
      'type'      => 'category_dropdown',
      'priority'  => 10,
      'active_callback'=>'falcha_news_slider_active_callback'
    )
  )
);


/*Enable Category*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-slider-post-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-slider-post-category'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-slider-post-category]', array(
    'label'     => __( 'Enable the Post Category', 'falcha-news' ),
    'description' => __('You can change the category color from Color Options.', 'falcha-news'),
    'section'   => 'falcha_news_slider_section',
    'settings'  => 'falcha_news_options[falcha-news-slider-post-category]',
    'type'      => 'checkbox',
    'active_callback'=>'falcha_news_slider_active_callback',
    'priority'  => 10,
) );

/*Enable Read Time*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-slider-post-read-time]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-slider-post-read-time'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-slider-post-read-time]', array(
    'label'     => __( 'Enable the Post Read Time', 'falcha-news' ),
    'description' => __('Read time can managed from Extra Options. Default word is 200 per minute.', 'falcha-news'),
    'section'   => 'falcha_news_slider_section',
    'settings'  => 'falcha_news_options[falcha-news-slider-post-read-time]',
    'type'      => 'checkbox',
    'active_callback'=>'falcha_news_slider_active_callback',
    'priority'  => 10,
) );

/*Enable Date*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-slider-post-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-slider-post-date'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-slider-post-date]', array(
    'label'     => __( 'Enable the Post Date', 'falcha-news' ),
    'description' => __('Show or Hide the Post Date from the featured posts.', 'falcha-news'),
    'section'   => 'falcha_news_slider_section',
    'settings'  => 'falcha_news_options[falcha-news-slider-post-date]',
    'type'      => 'checkbox',
    'active_callback'=>'falcha_news_slider_active_callback',
    'priority'  => 10,
) );
/*Enable Author*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-slider-post-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-slider-post-author'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-slider-post-author]', array(
    'label'     => __( 'Enable the Post Author', 'falcha-news' ),
    'description' => __('Show or Hide the Post Author from the featured posts.', 'falcha-news'),
    'section'   => 'falcha_news_slider_section',
    'settings'  => 'falcha_news_options[falcha-news-slider-post-author]',
    'type'      => 'checkbox',
    'active_callback'=>'falcha_news_slider_active_callback',
    'priority'  => 10,
) );