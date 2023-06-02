<?php
/**
 *  Falcha News Blog Page Option
 *
 * @since Falcha News 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section( 'falcha_news_blog_page_section', array(
   'priority'       => 45,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Blog Section Options', 'falcha-news' ),
   'panel' 		 => 'falcha_news_panel',
) );

/*Blog Page Show content from*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-content-show-from]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-content-show-from'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-content-show-from]', array(
   'choices' => array(
    'excerpt'    => __('Excerpt','falcha-news'),
    'content'    => __('Content','falcha-news')
),
   'label'     => __( 'Select Content Display Option', 'falcha-news' ),
   'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'falcha-news'),
   'section'   => 'falcha_news_blog_page_section',
   'settings'  => 'falcha_news_options[falcha-news-content-show-from]',
   'type'      => 'select',
   'priority'  => 10,
) );
/*Blog Page excerpt length*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-excerpt-length]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-excerpt-length'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-excerpt-length]', array(
    'label'     => __( 'Size of Excerpt Content', 'falcha-news' ),
    'description' => __('Enter the number per Words to show the content in blog page.', 'falcha-news'),
    'section'   => 'falcha_news_blog_page_section',
    'settings'  => 'falcha_news_options[falcha-news-excerpt-length]',
    'type'      => 'number',
    'priority'  => 10,
) );
/*Blog Page Pagination Options*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-pagination-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-pagination-options'],
    'sanitize_callback' => 'falcha_news_sanitize_select'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-pagination-options]', array(
   'choices' => falcha_news_pagination_types(),
   'label'     => __( 'Pagination Types', 'falcha-news' ),
   'description' => __('Select the Required Pagination Type', 'falcha-news'),
   'section'   => 'falcha_news_blog_page_section',
   'settings'  => 'falcha_news_options[falcha-news-pagination-options]',
   'type'      => 'select',
   'priority'  => 10,
) );
/*Blog Page read more text*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-read-more-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-read-more-text]', array(
    'label'     => __( 'Enter Read More Text', 'falcha-news' ),
    'description' => __('Read more text for blog and archive page.', 'falcha-news'),
    'section'   => 'falcha_news_blog_page_section',
    'settings'  => 'falcha_news_options[falcha-news-read-more-text]',
    'type'      => 'text',
    'priority'  => 10,
) );

/*Blog Page author*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-blog-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-blog-author'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-blog-author]', array(
    'label'     => __( 'Show Author', 'falcha-news' ),
    'description' => __('Checked to show the author.', 'falcha-news'),
    'section'   => 'falcha_news_blog_page_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-blog-author]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );
/*Blog Page category*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-blog-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-blog-category'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-blog-category]', array(
    'label'     => __( 'Show Category', 'falcha-news' ),
    'description' => __('Checked to show the category.', 'falcha-news'),
    'section'   => 'falcha_news_blog_page_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-blog-category]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );
/*Blog Page date*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-blog-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-blog-date'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-blog-date]', array(
    'label'     => __( 'Show Date', 'falcha-news' ),
    'description' => __('Checked to show the Date.', 'falcha-news'),
    'section'   => 'falcha_news_blog_page_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-blog-date]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );
/*Blog Page comment*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-blog-comment]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-blog-comment'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-blog-comment]', array(
    'label'     => __( 'Show Comment', 'falcha-news' ),
    'description' => __('Checked to show the Comment.', 'falcha-news'),
    'section'   => 'falcha_news_blog_page_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-blog-comment]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );

/*Blog Page comment*/
$wp_customize->add_setting( 'falcha_news_options[falcha-news-enable-blog-tags]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['falcha-news-enable-blog-tags'],
    'sanitize_callback' => 'falcha_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'falcha_news_options[falcha-news-enable-blog-tags]', array(
    'label'     => __( 'Show Tags', 'falcha-news' ),
    'description' => __('Checked to show the Tags.', 'falcha-news'),
    'section'   => 'falcha_news_blog_page_section',
    'settings'  => 'falcha_news_options[falcha-news-enable-blog-tags]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );