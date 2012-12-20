<?php

/**
 * BuddyPress - Groups Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_dtheme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php do_action( 'bp_before_groups_loop' ); ?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<div class="viewing-frame">
		<div class="pag-count" id="group-dir-count-top">
			<?php bp_groups_pagination_count(); ?>
		</div>
		<div class="pagination-links" id="group-dir-pag-top">
			<?php bp_groups_pagination_links(); ?>
		</div>
	</div>
	

	<?php do_action( 'bp_before_directory_groups_list' ); ?>

	<div id="groups-list" class="item-list" role="main">

		<?php while ( bp_groups() ) : bp_the_group(); ?>

			<div class="friends-box">
				<div class="img-frame"><a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar( 'type=thumb&width=50&height=50' ); ?></a></div><!-- img-frame -->
				<div class="txt-frame">
					<p><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a></p>
					<p><?php bp_group_type(); ?> /<?php bp_group_member_count(); ?> / <div class="item-meta"><span class="activity"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></span></div></p>
					<div class="bottom-holder">
						<div class="action">
							<?php do_action( 'bp_directory_groups_actions' ); ?>
						</div>
						<div class="text-line">
							<?php bp_group_description_excerpt(); ?>
						</div>
					</div><!-- bottom-holder -->
				</div><!-- txt-frame -->
			</div><!-- friends-box -->

		<?php endwhile; ?>

	</div>

	<?php do_action( 'bp_after_directory_groups_list' ); ?>

	<div class="viewing-frame">
		<div class="pag-count" id="group-dir-count-top">
			<?php bp_groups_pagination_count(); ?>
		</div>
		<div class="pagination-links" id="group-dir-pag-top">
			<?php bp_groups_pagination_links(); ?>
		</div>
	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>
