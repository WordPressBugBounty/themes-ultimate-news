<?php
/**
 * Archive Layout
 *
 * @package Ultimate News
 */

$wp_customize->add_section(
	'ultimate_news_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'ultimate-news' ),
		'panel' => 'ultimate_news_theme_options',
	)
);

// Archive Layout - Grid Style.
$wp_customize->add_setting(
	'ultimate_news_archive_grid_style',
	array(
		'default'           => 'grid-column-3',
		'sanitize_callback' => 'ultimate_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ultimate_news_archive_grid_style',
	array(
		'label'   => esc_html__( 'Grid Style', 'ultimate-news' ),
		'section' => 'ultimate_news_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'grid-column-2' => __( 'Column 2', 'ultimate-news' ),
			'grid-column-3' => __( 'Column 3', 'ultimate-news' ),
		),
	)
);
