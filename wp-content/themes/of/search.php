<?php get_header(); ?>

	<div id="content">
		<div class="results-page">
			<h1 class="search-results">SEARCH RESULTS</h1>
			<?php
			/* Search Count */
			$allsearch = &new WP_Query("s=$s&showposts=-1");
			$key = wp_specialchars($s, 1);
			$count = $allsearch->post_count;
			wp_reset_query(); ?>
			<p class="current"><strong><?php echo $count; ?></strong> results for: <?php the_search_query() ?></p>
			<?php if ( have_posts() ) : ?>
				<div class="podcasts-list">
					<?php while ( have_posts() ) : the_post();
						global $post; ?>
						<div class="post">
							<h2 class="post-title"><?php echo strtoupper($post->post_type); ?>: <?php echo strtoupper(get_the_title($post->ID)); ?></h2>
							<?php the_excerpt(); ?>
							<div class="actions">
								<ul>
									<li><a href="<?php the_permalink() ?>" class="read-more">read more</a></li>
								</ul>
							</div>
						</div>

					<?php endwhile; ?>
				</div>
				<div class="page-nav">
					<div class="link-prev"><?php next_posts_link('previous') ?></div>
					<div class="link-next"><?php previous_posts_link('next') ?></div>
				</div>
			<?php else : ?>

					<div class="podcasts-list">
						<h2>Nothing Found</h2>
						<div class="entry-content">
							<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
						</div>
						<?php include (TEMPLATEPATH . '/searchform.php'); ?>
					</div>
			<?php endif; ?>

		</div>
	</div>
	<?php get_sidebar('left'); ?>

<?php get_footer(); ?>