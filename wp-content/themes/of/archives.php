<?php get_header(); ?>

	<div id="content">
		<div class="results-page">
			<?php if ( have_posts() ) : ?>
				<div class="post">
					<div class="title">
						<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
						<?php /* If this is a category archive */ if (is_category()) { ?>
						<h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
						<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
						<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
						<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
						<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
						<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<h1>Archive for <?php the_time('F, Y'); ?></h1>
						<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<h1>Archive for <?php the_time('Y'); ?></h1>
						<?php /* If this is an author archive */ } elseif (is_author()) { ?>
						<h1>Author Archive</h1>
						<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
						<h1>Blog Archives</h1>
						<?php } ?>
					</div>
				</div>
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
	<?php get_sidebar('home'); ?>

<?php get_footer(); ?>