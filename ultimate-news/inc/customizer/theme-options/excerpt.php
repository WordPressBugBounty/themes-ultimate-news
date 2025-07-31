<?php
/**
 * Excerpt
 *
 * @package Ultimate News
 */

$wp_customize->add_section(
	'ultimate_news_excerpt_options',
	array(
		'panel' => 'ultimate_news_theme_options',
		'title' => esc_html__( 'Excerpt', 'ultimate-news' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'ultimate_news_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'ultimate_news_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'ultimate_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'ultimate-news' ),
		'section'     => 'ultimate_news_excerpt_options',
		'settings'    => 'ultimate_news_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 200,
			'step' => 1,
		),
	)
);
