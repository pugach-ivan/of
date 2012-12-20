<?php do_action( 'bp_before_group_invites_content' ); ?>

<?php if ( bp_has_groups( 'type=invites&user_id=' . bp_loggedin_user_id() ) ) : ?>

	<div class="viewing-frame">
		<div class="pag-count" id="group-dir-count-top">
			<?php bp_groups_pagination_count(); ?>
		</div>
		<div class="pagination-links" id="group-dir-pag-top">
			<?php bp_groups_pagination_links(); ?>
		</div>
	</div>
	
	<div id="group-list" class="invites item-list" role="main">

		<?php while ( bp_groups() ) : bp_the_group(); ?>

			<div class="friends-box">
				<div class="img-frame"><a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar( 'type=thumb&width=50&height=50' ); ?></a></div><!-- img-frame -->
				<div class="txt-frame">
					<p><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a><span class="small"> - <?php printf( __( '%s members', 'buddypress' ), bp_group_total_members( false ) ); ?></span></p>
					<p><a href="#"><?php bp_group_type(); ?> /<?php bp_group_member_count(); ?> / <div class="item-meta"><span class="activity"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></span></div></a></p>
					<div class="bottom-holder">
						<div class="action">
							<a class="button accept" href="<?php bp_group_accept_invite_link(); ?>"><?php _e( 'Accept', 'buddypress' ); ?></a> &nbsp;
							<a class="button reject confirm" href="<?php bp_group_reject_invite_link(); ?>"><?php _e( 'Reject', 'buddypress' ); ?></a>

							<?php do_action( 'bp_group_invites_item_action' ); ?>

						</div>
						<div class="text-line">
							<?php bp_group_description_excerpt(); ?>
						</div>
						<?php do_action( 'bp_group_invites_item' ); ?>
					</div><!-- bottom-holder -->
				</div><!-- txt-frame -->
			</div><!-- friends-box -->

		<?php endwhile; ?>
	</div>

<div class="viewing-frame">
	<div class="pag-count" id="group-dir-count-top">
		<?php bp_groups_pagination_count(); ?>
	</div>
	<div class="pagination-links" id="group-dir-pag-top">
		<?php bp_groups_pagination_links(); ?>
	</div>
</div>

<?php else: ?>

	<div id="message" class="info" role="main">
		<p><?php _e( 'You have no outstanding group invites.', 'buddypress' ); ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_group_invites_content' ); ?>