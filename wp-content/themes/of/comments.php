<?php

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) {
	?> <p>This post is password protected. Enter the password to view comments.</p> <?php
	return;
}

function theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

	<li>
		<div class="img-holder">
			<a href="<?php comment_author_url(); ?>"><?php echo get_avatar( $comment, 48 ); ?></a>
		</div>
		<div class="heading">
			<div class="holder">
				<h2><?php comment_author_link(); ?></h2>
				<span class="caption">Culture</span>
				<em class="comments-date"><?php comment_time('g:i a'); ?> on <?php comment_date('F d Y'); ?></em>
			</div>
		</div>
		<div class="box alt page">
			<?php if ($comment->comment_approved == '0') : ?>
				<p>Your comment is awaiting moderation.</p>
			<?php else: ?>
				<?php comment_text(); ?>
			<?php endif; ?>
			<ul class="comment-tools">
				<li class="reply">
					<?php
					comment_reply_link(array_merge( $args, array(
						'reply_text' => 'reply',
						'before' => '',
						'after' => '',
						'depth' => $depth,
						'max_depth' => $args['max_depth']
					))); ?>
				</li>
			</ul>
		</div>
	<?php }

	function theme_comment_end() { ?>
		</li>
	<?php }
?>

<?php if ( have_comments() ) : ?>

	<ul class="comments-list">
		<?php wp_list_comments(array(
			'callback' => 'theme_comment',
			'end-callback' => 'theme_comment_end'
			)); ?>
	</ul>

	<div class="navigation">
		<div class="next"><?php previous_comments_link('&laquo; Older Comments') ?></div>
		<div class="prev"><?php next_comments_link('Newer Comments &raquo;') ?></div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p>Comments are closed.</p>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div class="section respond" id="respond">
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="comment-form" id="commentform">
		<fieldset>
			<h2><a>Leave a Comment</a></h2>

			<a href="<?php bloginfo('url'); ?>/members/<?php echo $current_user->data->user_login; ?>/profile/change-avatar/"><?php bp_loggedin_user_avatar( 'type=thumb&width=48&height=48' ) ?></a>
			<div class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></div>

			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>

				<?php if ( is_user_logged_in() ) : ?>

					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

				<?php else : ?>

					<div class="wrap">
						<div class="text">
							<label for="author">Name</label>
							<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" />
						</div>
					</div>
					<div class="wrap">
						<div class="text">
							<label for="email">E-Mail (will not be published)</label>
							<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" />
						</div>
					</div>
					<div class="wrap">
						<div class="text">
							<label for="url">Website</label>
							<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" />
						</div>
					</div>

				<?php endif; ?>
				<div class="wrap">
					<div class="textarea"><textarea name="comment" cols="30" rows="10">Write a comment ...</textarea></div>
					<em class="caption">You may use these HTML tags and attributes:&lt;a href="" title=""&gt;&lt;abbr title=""&gt;&lt;acronym title=""&gt;&lt;b&gt;&lt;blockquote cite=""&gt;&lt;cite&gt;&lt;code&gt;&lt;del datetime=""&gt;&lt;em&gt;&lt;i&gt;&lt;q cite=""&gt;&lt;strike&gt;&lt;strong&gt;</em>
					<input type="submit" name="submit" class="submit" value="Post Comment"/>
				</div>

			<?php
				comment_id_fields();
				do_action('comment_form', $post->ID);
			?>

			<?php endif; ?>

		</fieldset>
	</form>
</div>

<?php endif; ?>
