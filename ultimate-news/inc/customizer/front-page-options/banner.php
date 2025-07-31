<?php
/**
 * Banner Section
 *
 * @package Ultimate News
 */

$wp_customize->add_section(
	'ultimate_news_banner_section',
	array(
		'panel'    => 'ultimate_news_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'ultimate-news' ),
		'priority' => 20,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'ultimate_news_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ultimate_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ultimate_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ultimate_news_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'ultimate-news' ),
			'section'  => 'ultimate_news_banner_section',
			'settings' => 'ultimate_news_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ultimate_news_enable_banner_section',
		array(
			'selector' => '#ultimate_news_banner_section .section-link',
			'settings' => 'ultimate_news_enable_banner_section',
		)
	);
}

// Banner Section - Banner Posts Content Type.
$wp_customize->add_setting(
	'ultimate_news_banner_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ultimate_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ultimate_news_banner_posts_content_type',
	array(
		'label'           => esc_html__( 'Select Banner\'s Posts Content Type', 'ultimate-news' ),
		'section'         => 'ultimate_news_banner_section',
		'settings'        => 'ultimate_news_banner_posts_content_type',
		'type'            => 'select',
		'active_callback' => 'ultimate_news_is_banner_posts_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ultimate-news' ),
			'category' => esc_html__( 'Category', 'ultimate-news' ),
		),
	)
);

for ( $i = 1; $i <= 7; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'ultimate_news_banner_posts_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ultimate_news_banner_posts_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ultimate-news' ), $i ),
			'section'         => 'ultimate_news_banner_section',
			'settings'        => 'ultimate_news_banner_posts_content_post_' . $i,
			'active_callback' => 'ultimate_news_is_banner_posts_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ultimate_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'ultimate_news_banner_posts_content_category',
	array(
		'sanitize_callback' => 'ultimate_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ultimate_news_banner_posts_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ultimate-news' ),
		'section'         => 'ultimate_news_banner_section',
		'settings'        => 'ultimate_news_banner_posts_content_category',
		'active_callback' => 'ultimate_news_is_banner_posts_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ultimate_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'ultimate_news_banner_posts_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Ultimate_News_Customize_Horizontal_Line(
		$wp_customize,
		'ultimate_news_banner_posts_horizontal_line',
		array(
			'section'         => 'ultimate_news_banner_section',
			'settings'        => 'ultimate_news_banner_posts_horizontal_line',
			'active_callback' => 'ultimate_news_is_banner_posts_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Editor Pick Title.
$wp_customize->add_setting(
	'ultimate_news_editor_picks_title',
	array(
		'default'           => __( 'Editor\'s Picks', 'ultimate-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ultimate_news_editor_picks_title',
	array(
		'label'           => esc_html__( 'Editors Picks\'s Section Title', 'ultimate-news' ),
		'section'         => 'ultimate_news_banner_section',
		'settings'        => 'ultimate_news_editor_picks_title',
		'type'            => 'text',
		'active_callback' => 'ultimate_news_is_banner_posts_section_enabled',
	)
);

// Banner Section - Editor Pick Content Type.
$wp_customize->add_setting(
	'ultimate_news_editor_picks_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ultimate_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ultimate_news_editor_picks_content_type',
	array(
		'label'           => esc_html__( 'Select Editor Picks\'s Content Type', 'ultimate-news' ),
		'section'         => 'ultimate_news_banner_section',
		'settings'        => 'ultimate_news_editor_picks_content_type',
		'type'            => 'select',
		'active_callback' => 'ultimate_news_is_banner_posts_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ultimate-news' ),
			'category' => esc_html__( 'Category', 'ultimate-news' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Banner Section - Editor Picks Select Post.
	$wp_customize->add_setting(
		'ultimate_news_editor_picks_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ultimate_news_editor_picks_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ultimate-news' ), $i ),
			'section'         => 'ultimate_news_banner_section',
			'settings'        => 'ultimate_news_editor_picks_content_post_' . $i,
			'active_callback' => 'ultimate_news_is_editor_picks_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ultimate_news_get_post_choices(),
		)
	);

}

// Banner Section - Editor picks Select Category.
$wp_customize->add_setting(
	'ultimate_news_editor_picks_content_category',
	array(
		'sanitize_callback' => 'ultimate_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ultimate_news_editor_picks_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ultimate-news' ),
		'section'         => 'ultimate_news_banner_section',
		'settings'        => 'ultimate_news_editor_picks_content_category',
		'active_callback' => 'ultimate_news_is_editor_picks_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ultimate_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'ultimate_news_editor_picks_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Ultimate_News_Customize_Horizontal_Line(
		$wp_customize,
		'ultimate_news_editor_picks_horizontal_line',
		array(
			'section'         => 'ultimate_news_banner_section',
			'settings'        => 'ultimate_news_editor_picks_horizontal_line',
			'active_callback' => 'ultimate_news_is_banner_posts_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Advertisement Area.
$wp_customize->add_setting(
	'ultimate_news_banner_advertisement_area',
	array(
		'default'           => '',
		'sanitize_callback' => 'ultimate_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ultimate_news_banner_advertisement_area',
		array(
			'label'           => esc_html__( 'Advertisement Area', 'ultimate-news' ),
			'section'         => 'ultimate_news_banner_section',
			'settings'        => 'ultimate_news_banner_advertisement_area',
			'active_callback' => 'ultimate_news_is_banner_posts_section_enabled',
		)
	)
);

// Banner Section - Advertisement Link.
$wp_customize->add_setting(
	'ultimate_news_banner_advertisement_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ultimate_news_banner_advertisement_link',
	array(
		'label'           => esc_html__( 'Advertisement Link', 'ultimate-news' ),
		'section'         => 'ultimate_news_banner_section',
		'settings'        => 'ultimate_news_banner_advertisement_link',
		'type'            => 'url',
		'active_callback' => 'ultimate_news_is_banner_posts_section_enabled',
	)
);
