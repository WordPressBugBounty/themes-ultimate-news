<?php
/**
 * Header Options
 *
 * @package Ultimate News
 */

$wp_customize->add_section(
	'ultimate_news_header_options',
	array(
		'panel' => 'ultimate_news_theme_options',
		'title' => esc_html__( 'Header Options', 'ultimate-news' ),
	)
);

// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'ultimate_news_enable_topbar',
	array(
		'sanitize_callback' => 'ultimate_news_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Ultimate_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ultimate_news_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'ultimate-news' ),
			'section' => 'ultimate_news_header_options',
		)
	)
);

// Header Section - Advertisement.
$wp_customize->add_setting(
	'ultimate_news_header_advertisement',
	array(
		'sanitize_callback' => 'ultimate_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ultimate_news_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'ultimate-news' ),
			'section'  => 'ultimate_news_header_options',
			'settings' => 'ultimate_news_header_advertisement',
		)
	)
);

// Header Section - Advertisement URL.
$wp_customize->add_setting(
	'ultimate_news_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ultimate_news_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'ultimate-news' ),
		'section'  => 'ultimate_news_header_options',
		'settings' => 'ultimate_news_header_advertisement_url',
		'type'     => 'url',
	)
);
