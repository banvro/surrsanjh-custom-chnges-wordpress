<?php
/**
 *  Falcha News Header Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'falcha_news_header_ads_section', array(
   'priority'       => 16,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Header Ads Options', 'falcha-news' ),
   'panel' 		 => 'falcha_news_panel',
) );
/*callback functions header section*/
if ( !function_exists('falcha_news_ads_header_active_callback') ) :
  function falcha_news_ads_header_active_callback(){
      global $falcha_news_theme_options;
      $falcha_news_theme_options = falcha_news_get_options_value();
      $enable_ads_header = absint($falcha_news_theme_options['falcha-news-enable-ads-header']);
      if( 1 == $enable_ads_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Header Ads Section*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-ads-header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['falcha-news-enable-ads-header'],
   'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-ads-header]', array(
   'label'     => __( 'Show Header Advertisement', 'falcha-news' ),
   'description' => __('Checked to Enable the header ads. Select either image or google adsense.', 'falcha-news'),
   'section'   => 'falcha_news_header_ads_section',
   'settings'  => 'falcha_news_options[falcha-news-enable-ads-header]',
   'type'      => 'checkbox',
   'priority'  => 10,
) );

/*Header Ads Image*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-header-ads-image]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['falcha-news-header-ads-image'],
    'sanitize_callback' => 'falcha_news_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'falcha_news_options[falcha-news-header-ads-image]',
        array(
            'label'   => __( 'Header Ad Image', 'falcha-news' ),
            'section'   => 'falcha_news_header_ads_section',
            'settings'  => 'falcha_news_options[falcha-news-header-ads-image]',
            'type'      => 'image',
            'priority'  => 10,
            'active_callback' => 'falcha_news_ads_header_active_callback',
            'description' => __( 'Recommended image size of 728*90', 'falcha-news' )
        )
    )
);

/*Ads Image Link*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-header-ads-image-link]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['falcha-news-header-ads-image-link'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-header-ads-image-link]', array(
    'label'   => __( 'Header Ads Image Link', 'falcha-news' ),
    'section'   => 'falcha_news_header_ads_section',
    'settings'  => 'falcha_news_options[falcha-news-header-ads-image-link]',
    'type'      => 'url',
    'active_callback' => 'falcha_news_ads_header_active_callback',
    'priority'  => 10
) );

