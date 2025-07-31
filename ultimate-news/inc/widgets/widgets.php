<?php

// Posts Grid Widget.
require get_template_directory() . '/inc/widgets/posts-grid-widget.php';

// Posts List Widget.
require get_template_directory() . '/inc/widgets/posts-list-widget.php';

// Posts Small List Widget.
require get_template_directory() . '/inc/widgets/posts-small-list-widget.php';

// Posts Grid and List Widget.
require get_template_directory() . '/inc/widgets/posts-grid-and-list-widget.php';

// Posts Slider Widget.
require get_template_directory() . '/inc/widgets/posts-slider-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function ultimate_news_pro_register_widgets() {

	register_widget( 'Ultimate_News_Posts_Grid_Widget' );

	register_widget( 'Ultimate_News_Posts_List_Widget' );

	register_widget( 'Ultimate_News_Posts_Small_List_Widget' );

	register_widget( 'Ultimate_News_Posts_Grid_And_List_Widget' );

	register_widget( 'Ultimate_News_Posts_Slider_Widget' );

	register_widget( 'Ultimate_News_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'ultimate_news_pro_register_widgets' );
