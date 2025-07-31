<?php
/**
 * Pagination
 *
 * @package Ultimate News
 */

$wp_customize->add_section(
	'ultimate_news_pagination',
	array(
		'panel' => 'ultimate_news_theme_options',
		'title' => esc_html__( 'Pagination', 'ultimate-news' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'ultimate_news_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'ultimate_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ultimate_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ultimate_news_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'ultimate-news' ),
			'section'  => 'ultimate_news_pagination',
			'settings' => 'ultimate_news_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'ultimate_news_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'ultimate_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ultimate_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'ultimate-news' ),
		'section'         => 'ultimate_news_pagination',
		'settings'        => 'ultimate_news_pagination_type',
		'active_callback' => 'ultimate_news_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'ultimate-news' ),
			'numeric' => __( 'Numeric', 'ultimate-news' ),
		),
	)
);
