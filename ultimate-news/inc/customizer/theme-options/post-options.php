<?php
/**
 * Post Options
 *
 * @package Ultimate News
 */

$wp_customize->add_section(
	'ultimate_news_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'ultimate-news' ),
		'panel' => 'ultimate_news_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'ultimate_news_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'ultimate_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ultimate_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ultimate_news_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'ultimate-news' ),
			'section' => 'ultimate_news_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'ultimate_news_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'ultimate_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ultimate_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ultimate_news_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'ultimate-news' ),
			'section' => 'ultimate_news_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'ultimate_news_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'ultimate_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ultimate_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ultimate_news_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'ultimate-news' ),
			'section' => 'ultimate_news_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'ultimate_news_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'ultimate_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ultimate_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ultimate_news_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'ultimate-news' ),
			'section' => 'ultimate_news_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'ultimate_news_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'ultimate-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ultimate_news_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'ultimate-news' ),
		'section'  => 'ultimate_news_post_options',
		'settings' => 'ultimate_news_post_related_post_label',
		'type'     => 'text',
	)
);
