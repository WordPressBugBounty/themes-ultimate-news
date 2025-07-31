<?php
/**
 * Typography
 *
 * @package Ultimate News
 */

$wp_customize->add_section(
	'ultimate_news_typography',
	array(
		'panel' => 'ultimate_news_theme_options',
		'title' => esc_html__( 'Typography', 'ultimate-news' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ultimate_news_site_title_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'ultimate_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ultimate_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'ultimate-news' ),
		'section'  => 'ultimate_news_typography',
		'settings' => 'ultimate_news_site_title_font',
		'type'     => 'select',
		'choices'  => ultimate_news_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'ultimate_news_site_description_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'ultimate_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ultimate_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'ultimate-news' ),
		'section'  => 'ultimate_news_typography',
		'settings' => 'ultimate_news_site_description_font',
		'type'     => 'select',
		'choices'  => ultimate_news_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'ultimate_news_header_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'ultimate_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ultimate_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'ultimate-news' ),
		'section'  => 'ultimate_news_typography',
		'settings' => 'ultimate_news_header_font',
		'type'     => 'select',
		'choices'  => ultimate_news_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'ultimate_news_body_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'ultimate_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ultimate_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'ultimate-news' ),
		'section'  => 'ultimate_news_typography',
		'settings' => 'ultimate_news_body_font',
		'type'     => 'select',
		'choices'  => ultimate_news_get_all_google_font_families(),
	)
);
