<?php

/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_dtheme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php do_action( 'bp_before_members_loop' ); ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>

	<?php do_action( 'bp_before_directory_members_list' ); ?>

	<div id="members-list" class="item-list" role="main">

		<?php while ( bp_members() ) : bp_the_member(); ?>

			<div class="friends-box">
				<div class="img-frame"><a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a></div><!-- img-frame -->
				<div class="txt-frame">
					<p>From <a href="#"><?php bp_member_name(); ?></a></p>
					<p>@<?php bp_displayed_user_username(); ?></p>
					<?php do_action( 'bp_directory_members_item' ); ?>
				</div><!-- txt-frame -->
				<div class="action">

					<?php do_action( 'bp_directory_members_actions' ); ?>

				</div>
			</div><!-- friends-box -->

		<?php endwhile; ?>

	</div>

	<?php do_action( 'bp_after_directory_members_list' ); ?>

	<?php bp_member_hidden_fields(); ?>

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
		<p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_members_loop' ); ?>
