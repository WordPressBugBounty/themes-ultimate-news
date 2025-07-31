<?php
/**
 * Sidebar Position
 *
 * @package Ultimate News
 */

$wp_customize->add_section(
	'ultimate_news_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'ultimate-news' ),
		'panel' => 'ultimate_news_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'ultimate_news_sidebar_position',
	array(
		'sanitize_callback' => 'ultimate_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ultimate_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'ultimate-news' ),
		'section' => 'ultimate_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ultimate-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ultimate-news' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'ultimate_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'ultimate_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ultimate_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'ultimate-news' ),
		'section' => 'ultimate_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ultimate-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ultimate-news' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'ultimate_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'ultimate_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ultimate_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'ultimate-news' ),
		'section' => 'ultimate_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ultimate-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ultimate-news' ),
		),
	)
);
