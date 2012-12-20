<?php

/**
 * BuddyPress - Users Groups
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>
<div class="friends-filter item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul class="link-list">
		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); ?>
		<?php if ( !bp_is_current_action( 'invites' ) ) : ?>

			<li id="groups-order-select" class="last filter">

				<label for="groups-sort-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
				<select id="groups-sort-by">
					<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
					<option value="popular"><?php _e( 'Most Members', 'buddypress' ); ?></option>
					<option value="newest"><?php _e( 'Newly Created', 'buddypress' ); ?></option>
					<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>

					<?php do_action( 'bp_member_group_order_options' ); ?>

				</select>
			</li>

		<?php endif; ?>
	</ul>
</div><!-- friends-filter -->

<?php

if ( bp_is_current_action( 'invites' ) ) :
	locate_template( array( 'members/single/groups/invites.php' ), true );

else :
	do_action( 'bp_before_member_groups_content' ); ?>

	<div class="groups mygroups">

		<?php locate_template( array( 'groups/groups-loop.php' ), true ); ?>

	</div>

	<?php do_action( 'bp_after_member_groups_content' ); ?>

<?php endif; ?>
