<?php
/**
 *  Falcha News Single Page Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Single Page Options*/
$wp_customize->add_section( 'falcha_news_single_page_section', array(
   'priority'       => 68,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Single Post Options', 'falcha-news' ),
   'panel' 		 => 'falcha_news_panel',
) );

/*Featured Image Option*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-single-page-featured-image]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-single-page-featured-image'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-single-page-featured-image]', array(
    'label'     => __( 'Enable Featured Image', 'falcha-news' ),
    'description' => __('You can hide or show featured image on single page.', 'falcha-news'),
    'section'   => 'falcha_news_single_page_section',
    'settings'  => 'falcha_news_options[falcha-news-single-page-featured-image]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*Enable Category*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-single-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-single-category'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-single-category]', array(
    'label'     => __( 'Enable Category', 'falcha-news' ),
    'description' => __('Checked to Enable Category In Single post and page.', 'falcha-news'),
    'section'   => 'falcha_news_single_page_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-single-category]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*Enable Date*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-single-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-single-date'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-single-date]', array(
    'label'     => __( 'Enable Date', 'falcha-news' ),
    'description' => __('Checked to Enable Date In Single post and page.', 'falcha-news'),
    'section'   => 'falcha_news_single_page_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-single-date]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*Enable Author*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-single-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-single-author'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-single-author]', array(
    'label'     => __( 'Enable Author', 'falcha-news' ),
    'description' => __('Checked to Enable Author In Single post and page.', 'falcha-news'),
    'section'   => 'falcha_news_single_page_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-single-author]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Related Post Options*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-single-page-related-posts]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-single-page-related-posts'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-single-page-related-posts]', array(
    'label'     => __( 'Enable Related Posts', 'falcha-news' ),
    'description' => __('3 Post from similar category will display at the end of the page. More Options is in Premium Version', 'falcha-news'),
    'section'   => 'falcha_news_single_page_section',
    'settings'  => 'falcha_news_options[falcha-news-single-page-related-posts]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*callback functions related posts*/
if ( !function_exists('falcha_news_related_post_callback') ) :
    function falcha_news_related_post_callback(){
        global $falcha_news_theme_options;
        $falcha_news_theme_options = falcha_news_get_options_value();
        $related_posts = absint($falcha_news_theme_options['falcha-news-single-page-related-posts']);
        if( 1 == $related_posts ){
            return true;
        }
        else{
            return false;
        }
    }
endif;
/*Related Post Title*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-single-page-related-posts-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-single-page-related-posts-title]', array(
    'label'     => __( 'Related Posts Title', 'falcha-news' ),
    'description' => __('Give the appropriate title for related posts', 'falcha-news'),
    'section'   => 'falcha_news_single_page_section',
    'settings'  => 'falcha_news_options[falcha-news-single-page-related-posts-title]',
    'type'      => 'text',
    'priority'  => 20,
    'active_callback'=>'falcha_news_related_post_callback'
) );

