<?php
/**
 *  Falcha News Color Option
 *
 * @since Falcha News 1.0.0
 *
 */

$wp_customize->add_panel(
    'colors',
    array(
        'title'    => __( 'Color Options', 'falcha-news' ),
        'priority' => 30, // Before Additional CSS.
    )
);
$wp_customize->add_section(
    'colors',
    array(
        'title' => __( 'General Colors', 'falcha-news' ),
        'panel' => 'colors',
    )
);

/* Site Title hover color */
$wp_customize->add_setting( 'falcha_news_options[falcha-news-site-title-hover]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['falcha-news-site-title-hover'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'falcha_news_options[falcha-news-site-title-hover]',
        array(
            'label'       => esc_html__( 'Site Title Hover Color', 'falcha-news' ),
            'description' => esc_html__( 'It will change the color of site title in hover.', 'falcha-news' ),
            'section'     => 'colors',
             'settings'  => 'falcha_news_options[falcha-news-site-title-hover]',
        )
    )
);

/* Site tagline color */
$wp_customize->add_setting( 'falcha_news_options[falcha-news-site-tagline]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['falcha-news-site-tagline'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'falcha_news_options[falcha-news-site-tagline]',
        array(
            'label'       => esc_html__( 'Site Tagline Color', 'falcha-news' ),
            'description' => esc_html__( 'It will change the color of site tagline color.', 'falcha-news' ),
            'section'     => 'colors',
        )
    )
);

/* Primary Color Section Inside Core Color Option */
$wp_customize->add_setting( 'falcha_news_options[falcha-news-primary-color]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['falcha-news-primary-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'falcha_news_options[falcha-news-primary-color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'falcha-news' ),
            'description' => esc_html__( 'Applied to main color of site.', 'falcha-news' ),
            'section'     => 'colors',
        )
    )
);
/* Logo Section Colors */

$wp_customize->add_section(
    'logo_colors',
    array(
        'title' => __( 'Logo Section Colors', 'falcha-news' ),
        'panel' => 'colors',
    )
);

/* Colors background the logo */
$wp_customize->add_setting( 'falcha_news_options[falcha-news-logo-section-background]',
    array(
        'default'           => $default['falcha-news-logo-section-background'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'falcha_news_options[falcha-news-logo-section-background]',
        array(
            'label'       => esc_html__( 'Background Color', 'falcha-news' ),
            'description' => esc_html__( 'Will change the color of background logo.', 'falcha-news' ),
            'section'     => 'logo_colors',
        )
    )
);