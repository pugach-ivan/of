<?php do_action( 'bp_before_member_messages_loop' ); ?>

<?php if ( bp_has_message_threads( bp_ajax_querystring( 'messages' ) ) ) : ?>

	<div class="viewing-block">
		<div class="pag-count" id="messages-dir-count">
			<?php bp_messages_pagination_count(); ?>
		</div>

		<div class="pagination-links" id="messages-dir-pag">
			<?php bp_messages_pagination(); ?>
		</div>
	</div>
	<?php do_action( 'bp_after_member_messages_pagination' ); ?>

	<?php do_action( 'bp_before_member_messages_threads'   ); ?>

	<div class="message-area messages-notices" id="message-threads" >
		<?php while ( bp_message_threads() ) : bp_message_thread(); ?>

			<div id="m-<?php bp_message_thread_id(); ?>" class="message-box <?php bp_message_css_class(); ?><?php echo ( bp_message_thread_has_unread() ) ? 'unread' : 'read'; ?>">
				<div class="delete-frame">
					<div class="form-item">
						<input type="checkbox" class="form-checkbox" name="message_ids[]" value="<?php bp_message_thread_id(); ?>" />
					</div>
					<a class="button confirm form-submit" href="<?php bp_message_thread_delete_link(); ?>" title="<?php _e( "Delete Message", "buddypress" ); ?>"><?php _e( 'Delete', 'buddypress' ); ?></a> &nbsp;
				</div>
				<div class="txt-frame">
					<div class="img-frame">
						<div class="img-box"><?php bp_message_thread_avatar(); ?></div><!-- img-box -->
						<?php if(bp_get_message_thread_unread_count())
						{
							?>
							<span class="message-count"><?php echo bp_get_message_thread_unread_count(); ?></span>
							<?php
						}
						?>
					</div><!-- img-frame -->
					<div class="txt-box">
						<?php if ( 'sentbox' != bp_current_action() ) : ?>
							<div class="message-author thread-from">
								<p><?php _e( 'From:', 'buddypress' ); ?> <?php bp_message_thread_from(); ?></p>
								<p><a href="#">@<?php bp_displayed_user_username(); ?></a></p>
								<br />
								<p><span class="activity"><?php bp_message_thread_last_post_date(); ?></span></p>
							</div>
						<?php else: ?>
							<div class="message-author thread-from">
								<p><?php _e( 'To:', 'buddypress' ); ?> <?php bp_message_thread_to(); ?></p>
								<p><a href="#">@<?php bp_displayed_user_username(); ?></a></p>
								<br />
								<p><span class="activity"><?php bp_message_thread_last_post_date(); ?></span></p>
							</div>
						<?php endif; ?>
						<!-- message-author -->
						<div class="text-frame thread-info">
							<p><a href="<?php bp_message_thread_view_link(); ?>" title="<?php _e( "View Message", "buddypress" ); ?>"><?php bp_message_thread_subject(); ?></a></p>
							<p><?php bp_message_thread_excerpt(); ?></p>
							<p><?php do_action( 'bp_messages_inbox_list_item' ); ?></p>
						</div><!-- text-frame -->
					</div><!-- txt-box -->
				</div><!-- txt-frame -->
			</div><!-- message-box -->

		<?php endwhile; ?>
	</div><!-- #message-threads -->

	<div class="friends-filter messsages-filter">
		<?php bp_messages_options(); ?>
	</div><!-- friends-filter -->

	<?php do_action( 'bp_after_member_messages_threads' ); ?>

	<?php do_action( 'bp_after_member_messages_options' ); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'Sorry, no messages were found.', 'buddypress' ); ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_member_messages_loop' ); ?>
