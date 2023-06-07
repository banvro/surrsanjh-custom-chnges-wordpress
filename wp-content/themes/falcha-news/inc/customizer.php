<?php
/**
 * Falcha News Theme Customizer
 *
 * @package Falcha News
 */
/**
 * Load Customizer Defult Settings
 *
 * Default value for the customizer set here.
 */
require get_template_directory() . '/candidthemes/customizer/customizer-default-values.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function falcha_news_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'falcha_news_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'falcha_news_customize_partial_blogdescription',
		) );
	}
	/**
	 * Load Customizer Settings
	 *
	 * All the settings for appearance > customize
	 */
	require get_template_directory() . '/candidthemes/customizer/customizer-main-panel.php';


	/*Getting Home Page Widget Area on Main Panel*/
	$falcha_news_home_section = $wp_customize->get_section( 'sidebar-widgets-falcha-news-home-widget-area' );
	if ( ! empty( $falcha_news_home_section ) ) {
		$falcha_news_home_section->panel = '';
		$falcha_news_home_section->title = esc_html__( 'Home Page Widget Area ', 'falcha-news' );
		$falcha_news_home_section->priority = 30;
	}
}
add_action( 'customize_register', 'falcha_news_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function falcha_news_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function falcha_news_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function falcha_news_customize_preview_js() {
	wp_enqueue_script( 'falcha-news-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'falcha_news_customize_preview_js' );

/**
* Customizer Styles
*/
function falcha_news_customizer_css() {
    wp_enqueue_style('falcha-news-customizer-css', get_template_directory_uri() . '/candidthemes/assets/css/customizer-style.css', array(), '1.0.0');
}
add_action( 'customize_controls_enqueue_scripts', 'falcha_news_customizer_css' );
