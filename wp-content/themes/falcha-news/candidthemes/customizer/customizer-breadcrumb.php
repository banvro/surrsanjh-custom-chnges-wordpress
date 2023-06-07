<?php
/**
 *  Falcha News Breadcrumb Settings Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Breadcrumb Options*/
$wp_customize->add_section( 'falcha_news_breadcrumb_options', array(
    'priority'       => 73,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Settings', 'falcha-news' ),
    'panel'          => 'falcha_news_panel',
) );

/*Breadcrumb Enable*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-extra-breadcrumb'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'falcha-news' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page', 'falcha-news' ),
    'section'   => 'falcha_news_breadcrumb_options',
    'settings'  => 'falcha_news_options[falcha-news-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions breadcrumb enable*/
if ( !function_exists('falcha_news_breadcrumb_selection_enable') ) :
  function falcha_news_breadcrumb_selection_enable(){
      global $falcha_news_theme_options;
      $falcha_news_theme_options = falcha_news_get_options_value();
      $enable_bc = absint($falcha_news_theme_options['falcha-news-extra-breadcrumb']);
      if( $enable_bc == 1){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Show Breadcrumb Types Selection*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-breadcrumb-display-from-option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-breadcrumb-display-from-option'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-breadcrumb-display-from-option]', array(
    'choices' => array(
        'theme-default'    => __('Theme Default Breadcrumb','falcha-news'),
        'plugin-breadcrumb'    => __('Plugins Breadcrumb','falcha-news')
    ),
    'label'     => __( 'Select the Breadcrumb Show Option', 'falcha-news' ),
    'description' => __('Theme has its own breadcrumb. If you want to use the plugin breadcrumb, you need to enable the breadcrumb on the respected plugins first. Check plugin settings and enable it.', 'falcha-news'),
    'section'   => 'falcha_news_breadcrumb_options',
    'settings'  => 'falcha_news_options[falcha-news-breadcrumb-display-from-option]',
    'type'      => 'select',
    'priority'  => 15,
    'active_callback'=> 'falcha_news_breadcrumb_selection_enable',
) );

/*callback functions breadcrumb*/
if ( !function_exists('falcha_news_breadcrumb_selection_option') ) :
  function falcha_news_breadcrumb_selection_option(){
    global $falcha_news_theme_options;
      $falcha_news_theme_options = falcha_news_get_options_value();
      $enable_breadcrumb = absint($falcha_news_theme_options['falcha-news-extra-breadcrumb']);
      $breadcrumb_selection = esc_attr($falcha_news_theme_options['falcha-news-breadcrumb-display-from-option']);
      if( 'theme-default' == $breadcrumb_selection && $enable_breadcrumb == 1){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*callback functions breadcrumb*/
if ( !function_exists('falcha_news_breadcrumb_selection_plugin') ) :
  function falcha_news_breadcrumb_selection_plugin(){
      global $falcha_news_theme_options;
      $falcha_news_theme_options = falcha_news_get_options_value();
      $enable_breadcrumb_plugin = absint($falcha_news_theme_options['falcha-news-extra-breadcrumb']);
      $breadcrumb_selection_plugin = esc_attr($falcha_news_theme_options['falcha-news-breadcrumb-display-from-option']);
      if( 'plugin-breadcrumb' == $breadcrumb_selection_plugin && $enable_breadcrumb_plugin == 1){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Breadcrumb Text*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-breadcrumb-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-breadcrumb-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-breadcrumb-text]', array(
    'label'     => __( 'Breadcrumb Text', 'falcha-news' ),
    'description' => __( 'Write your own text in place of You are Here', 'falcha-news' ),
    'section'   => 'falcha_news_breadcrumb_options',
    'settings'  => 'falcha_news_options[falcha-news-breadcrumb-text]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback' => 'falcha_news_breadcrumb_selection_option',
) );


/*Show Breadcrumb From Plugins*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-breadcrumb-display-from-plugins]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-breadcrumb-display-from-plugins'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-breadcrumb-display-from-plugins]', array(
    'choices' => array(
        'yoast'    => __('Yoast SEO Breadcrumb','falcha-news'),
        'rank-math'    => __('Rank Math Breadcrumb','falcha-news'),
        'navxt'    => __('NavXT Breadcrumb','falcha-news')
    ),
    'label'     => __( 'Select the Breadcrumb From Plugins', 'falcha-news' ),
    'description' => __('Theme has its own breadcrumb. If you want to use the plugin breadcrumb, you need to enable the breadcrumb on the respected plugins first. Check plugin settings and enable it.', 'falcha-news'),
    'section'   => 'falcha_news_breadcrumb_options',
    'settings'  => 'falcha_news_options[falcha-news-breadcrumb-display-from-plugins]',
    'type'      => 'select',
    'priority'  => 15,
    'active_callback'=> 'falcha_news_breadcrumb_selection_plugin',
) );