<?php
/**
 *  Falcha News Top Header Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'falcha_news_trending_news_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Trending News Options', 'falcha-news' ),
   'panel'     => 'falcha_news_panel',
) );

/*Trending News*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-trending-news]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-trending-news'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-trending-news]', array(
    'label'     => __( 'Trending News in Header', 'falcha-news' ),
    'description' => __('Trending News will appear on the top header.', 'falcha-news'),
    'section'   => 'falcha_news_trending_news_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-trending-news]',
    'type'      => 'checkbox',
    'priority'  => 5,
) );


/*callback functions header section*/
if ( !function_exists('falcha_news_header_trending_active_callback') ) :
  function falcha_news_header_trending_active_callback(){
      global $falcha_news_theme_options;
      $falcha_news_theme_options = falcha_news_get_options_value();
      $enable_trending = absint($falcha_news_theme_options['falcha-news-enable-trending-news']);
      if( 1 == $enable_trending   ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Trending News Category Selection*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-trending-news-category]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['falcha-news-trending-news-category'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new Falcha_News_Customize_Category_Dropdown_Control(
    $wp_customize,
    'falcha_news_options[falcha-news-trending-news-category]',
    array(
      'label'     => __( 'Select Category For Trending News', 'falcha-news' ),
      'description' => __('Select the category from dropdown. It will appear on the header.', 'falcha-news'),
      'section'   => 'falcha_news_trending_news_section',
      'settings'  => 'falcha_news_options[falcha-news-trending-news-category]',
      'type'      => 'category_dropdown',
      'priority'  => 5,
      'active_callback'=>'falcha_news_header_trending_active_callback'
    )
  )
);

/*Trending News*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-trending-news-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-trending-news-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-trending-news-text]', array(
    'label'     => __( 'Trending News Text', 'falcha-news' ),
    'description' => __('Write your own text in place of Trending news.', 'falcha-news'),
    'section'   => 'falcha_news_trending_news_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-trending-news-text]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=>'falcha_news_header_trending_active_callback'
) );