<?php
/**
 *  Falcha News Category Color Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Category Color Options*/
$wp_customize->add_section('falcha_news_category_color_setting', array(
    'priority'      => 72,
    'title'         => __('Category Color', 'falcha-news'),
    'description'   => __('You can select the different color for each category.', 'falcha-news'),
    'panel'          => 'falcha_news_panel'
));

/*Customizer color*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-category-color]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['falcha-news-enable-category-color'],
   'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-category-color]', array(
   'label'     => __( 'Enable Category Color', 'falcha-news' ),
   'description' => __('Checked to enable the category color and select the required color for each category.', 'falcha-news'),
   'section'   => 'falcha_news_category_color_setting',
   'settings'  => 'falcha_news_options[falcha-news-enable-category-color]',
   'type'      => 'checkbox',
   'priority'  => 1,
) );

/*callback functions header section*/
if ( !function_exists('falcha_news_colors_active_callback') ) :
  function falcha_news_colors_active_callback(){
      global $falcha_news_theme_options;
      $falcha_news_theme_options = falcha_news_get_options_value();
      $enable_color = absint($falcha_news_theme_options['falcha-news-enable-category-color']);
      if( 1 == $enable_color ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

$i = 1;
$args = array(
    'orderby' => 'id',
    'hide_empty' => 0
);
$categories = get_categories( $args );
$wp_category_list = array();
foreach ($categories as $category_list ) {
    $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

    $wp_customize->add_setting('falcha_news_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']', array(
        'default'           => $default['falcha-news-primary-color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
		    'falcha_news_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']',
		    array(
		    	'label'     => sprintf(__('"%s" Color', 'falcha-news'), $wp_category_list[$category_list->cat_ID] ),
			    'section'   => 'falcha_news_category_color_setting',
			    'settings'  => 'falcha_news_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']',
			    'priority'  => $i,
                'active_callback'   => 'falcha_news_colors_active_callback'
		    )
	    )
    );
    $i++;
}