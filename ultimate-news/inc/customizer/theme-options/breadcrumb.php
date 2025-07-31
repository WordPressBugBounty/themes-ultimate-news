<?php
/**
 * Breadcrumb
 *
 * @package Ultimate News
 */

$wp_customize->add_section(
	'ultimate_news_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'ultimate-news' ),
		'panel' => 'ultimate_news_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'ultimate_news_enable_breadcrumb',
	array(
		'sanitize_callback' => 'ultimate_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ultimate_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ultimate_news_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'ultimate-news' ),
			'section' => 'ultimate_news_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'ultimate_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'ultimate_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'ultimate-news' ),
		'active_callback' => 'ultimate_news_is_breadcrumb_enabled',
		'section'         => 'ultimate_news_breadcrumb',
	)
);
