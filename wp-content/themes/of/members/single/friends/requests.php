<?php do_action( 'bp_before_member_friend_requests_content' ); ?>

<?php if ( bp_has_members( 'type=alphabetical&include=' . bp_get_friendship_requests() ) ) : ?>

	<div id="friend-list" class="item-list" role="main">
		<?php while ( bp_members() ) : bp_the_member(); ?>

			<div class="friends-box" id="friendship-<?php bp_friend_friendship_id(); ?>">
				<div class="img-frame"><a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a></div><!-- img-frame -->
				<div class="txt-frame">
					<p>From <a href="#"><?php bp_member_name(); ?></a></p>
					<p>@<?php bp_displayed_user_username(); ?></p>
					<div class="item-meta"><span class="activity"><?php bp_member_last_active(); ?></span></div>
				</div><!-- txt-frame -->
				<?php do_action( 'bp_friend_requests_item' ); ?>

				<div class="action">
					<a class="button accept" href="<?php bp_friend_accept_request_link(); ?>"><?php _e( 'Accept', 'buddypress' ); ?></a> &nbsp;
					<a class="button reject" href="<?php bp_friend_reject_request_link(); ?>"><?php _e( 'Reject', 'buddypress' ); ?></a>

					<?php do_action( 'bp_friend_requests_item_action' ); ?>
				</div>
			</div><!-- friends-box -->

		<?php endwhile; ?>
	</div>

	<?php do_action( 'bp_friend_requests_content' ); ?>

	<div class="viewing-holder">
		<div class="viewing-box">
			<div class="pag-count" id="member-dir-count-bottom">

				<?php bp_members_pagination_count(); ?>

			</div>

			<div class="pagination-links" id="member-dir-pag-bottom">

				<?php bp_members_pagination_links(); ?>

			</div>
		</div>
	</div><!-- viewing-holder -->

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'You have no pending friendship requests.', 'buddypress' ); ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_member_friend_requests_content' ); ?>
