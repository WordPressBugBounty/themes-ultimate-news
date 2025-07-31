<?php
if ( ! get_theme_mod( 'ultimate_news_enable_banner_section', false ) ) {
	return;
}

$banner_content_ids        = $editor_picks_ids = array();
$banner_content_type       = get_theme_mod( 'ultimate_news_banner_posts_content_type', 'post' );
$editor_picks_content_type = get_theme_mod( 'ultimate_news_editor_picks_content_type', 'post' );

if ( $banner_content_type === 'post' ) {
	for ( $i = 1; $i <= 7; $i++ ) {
		$banner_content_ids[] = get_theme_mod( 'ultimate_news_banner_posts_content_post_' . $i );
	}
	$banner_posts_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 7 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $banner_content_ids ) ) ) {
		$banner_posts_args['post__in'] = array_filter( $banner_content_ids );
		$banner_posts_args['orderby']  = 'post__in';
	} else {
		$banner_posts_args['orderby'] = 'date';
	}
} else {
	$cat_content_id    = get_theme_mod( 'ultimate_news_banner_posts_content_category' );
	$banner_posts_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 7 ),
	);
}
$banner_posts_args = apply_filters( 'ultimate_news_banner_section_args', $banner_posts_args );

if ( $editor_picks_content_type === 'post' ) {
	for ( $i = 1; $i <= 4; $i++ ) {
		$editor_picks_ids[] = get_theme_mod( 'ultimate_news_editor_picks_content_post_' . $i );
	}
	$editor_picks_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $editor_picks_ids ) ) ) {
		$editor_picks_args['post__in'] = array_filter( $editor_picks_ids );
		$editor_picks_args['orderby']  = 'post__in';
	} else {
		$editor_picks_args['orderby'] = 'date';
	}
} else {
	$cat_content_id    = get_theme_mod( 'ultimate_news_editor_picks_content_category' );
	$editor_picks_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}
$editor_picks_args = apply_filters( 'ultimate_news_banner_section_args', $editor_picks_args );

ultimate_news_render_banner_section( $banner_posts_args, $editor_picks_args );

/**
 * Render Banner Section.
 */
function ultimate_news_render_banner_section( $banner_posts_args, $editor_picks_args ) {
	?>

	<section id="ultimate_news_banner_section" class="banner-section style-2">
		<?php
		if ( is_customize_preview() ) :
			ultimate_news_section_link( 'ultimate_news_banner_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="banner-section-wrapper">
				<div class="banner-grid-section">
					<?php
					$banner_query = new WP_Query( $banner_posts_args );

					if ( $banner_query->have_posts() ) :
						while ( $banner_query->have_posts() ) :
							$banner_query->the_post();
							?>
							<div class="banner-item">
								<div class="mag-post-single has-image tile-design">
									<div class="mag-post-img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'post-thumbnail' ); ?>
										</a>
									</div>
									<div class="mag-post-detail">
										<div class="mag-post-category with-background">
											<?php ultimate_news_categories_list( true ); ?>
										</div>
										<h3 class="mag-post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div class="mag-post-meta">
											<span class="post-author">
												<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
											</span>
											<span class="post-date">
												<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
											</span>
										</div>
									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>

				<?php $editor_picks_title = get_theme_mod( 'ultimate_news_editor_picks_title', __( 'Editor\'s Picks', 'ultimate-news' ) ); ?>
				<div class="editor-advedr">
					<div class="banner-editor-picks-section">
						<?php if ( ! empty( $editor_picks_title ) ) { ?>
							<div class="section-header banner-section-header">
								<h3 class="section-title"><?php echo esc_html( $editor_picks_title ); ?></h3>
								<div class="editor-pick-arrows vertical magazine-carousel-slider-navigation header"></div>
							</div>
						<?php } ?>
						<div class="editor-picks-wrapper magazine-carousel-slider-navigation vertical">
							<?php
							$editor_picks_query = new WP_Query( $editor_picks_args );
							if ( $editor_picks_query->have_posts() ) :
								$i = 1;
								while ( $editor_picks_query->have_posts() ) :
									$editor_picks_query->the_post();
									?>
									<div class="carousel-item">
										<div class="mag-post-single has-image list-design">
											<div class="mag-post-img">
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail( 'post-thumbnail' ); ?>
												</a>
												<span class="number"><?php echo absint( $i ); ?></span>
											</div>
											<div class="mag-post-detail">
												<div class="mag-post-detail-inner">
													<h3 class="mag-post-title">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h3>
													<div class="mag-post-meta">
														<span class="post-author">
															<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
														</span>
														<span class="post-date">
															<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
									$i++;
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
					</div>
					<?php
					$banner_ads     = get_theme_mod( 'ultimate_news_banner_advertisement_area', '' );
					$banner_ads_url = get_theme_mod( 'ultimate_news_banner_advertisement_link', '' );
					if ( ! empty( $banner_ads ) ) {
						?>
						<div class="banner-adver">
							<?php if ( ! empty( $banner_ads ) ) { ?>
								<a href="<?php echo esc_url( $banner_ads_url ); ?>">
									<img src="<?php echo esc_url( $banner_ads ); ?>" alt="<?php esc_attr_e( 'Advertisement Image', 'ultimate-news' ); ?>">
								</a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<?php

}
