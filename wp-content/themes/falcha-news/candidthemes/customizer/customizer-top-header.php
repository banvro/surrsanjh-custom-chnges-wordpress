<?php
/**
 *  Falcha News Top Header Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'falcha_news_header_section', array(
   'priority'       => 15,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Top Header Options', 'falcha-news' ),
   'panel' 		 => 'falcha_news_panel',
) );
/*callback functions header section*/
if ( !function_exists('falcha_news_header_active_callback') ) :
  function falcha_news_header_active_callback(){
      global $falcha_news_theme_options;
      $falcha_news_theme_options = falcha_news_get_options_value();
      $enable_header = absint($falcha_news_theme_options['falcha-news-enable-top-header']);
      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;
/*Enable Top Header Section*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-top-header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['falcha-news-enable-top-header'],
   'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-top-header]', array(
   'label'     => __( 'Enable Top Header', 'falcha-news' ),
   'description' => __('Checked to show the top header section like search and social icons', 'falcha-news'),
   'section'   => 'falcha_news_header_section',
   'settings'  => 'falcha_news_options[falcha-news-enable-top-header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );
/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-top-header-social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['falcha-news-enable-top-header-social'],
   'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-top-header-social]', array(
   'label'     => __( 'Enable Social Icons', 'falcha-news' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'falcha-news'),
   'section'   => 'falcha_news_header_section',
   'settings'  => 'falcha_news_options[falcha-news-enable-top-header-social]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'falcha_news_header_active_callback'
) );

/*Enable Menu in top Header*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-top-header-menu]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-top-header-menu'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-top-header-menu]', array(
    'label'     => __( 'Menu in Header', 'falcha-news' ),
    'description' => __('Top Header Menu will display here. Go to Appearance < Menu.', 'falcha-news'),
    'section'   => 'falcha_news_header_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-top-header-menu]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'falcha_news_header_active_callback'
) );

/*Enable Date in top Header*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-top-header-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-top-header-date'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-top-header-date]', array(
    'label'     => __( 'Date in Header', 'falcha-news' ),
    'description' => __('Enable Date in Header', 'falcha-news'),
    'section'   => 'falcha_news_header_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-top-header-date]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'falcha_news_header_active_callback'
) );

/*Date format*/
$wp_customize->add_setting('falcha_news_options[falcha-news-top-header-date-format]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['falcha-news-top-header-date-format'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
));
$wp_customize->add_control('falcha_news_options[falcha-news-top-header-date-format]', array(
    'choices' => array(
        'default-date' => __('Theme Default Date Format', 'falcha-news'),
        'core-date' => __('Setting Date Fromat', 'falcha-news'),
    ),
    'label' => __('Select Date Format in Header', 'falcha-news'),
    'description' => __('You can have default format for date or Setting > General date format.', 'falcha-news'),
    'section' => 'falcha_news_header_section',
    'settings' => 'falcha_news_options[falcha-news-top-header-date-format]',
    'type' => 'select',
    'priority' => 5,
    'active_callback'=> 'falcha_news_header_active_callback',
));