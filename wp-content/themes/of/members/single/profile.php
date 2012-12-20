<?php

/**
 * BuddyPress - Users Profile
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php if ( bp_is_my_profile() ) : ?>
	<div class="nav-holder">
		<div class="item">
			<div class="block-link-list">
				<ul class="link-list">
					<?php bp_get_options_nav(); ?>
				</ul>
			</div><!-- block-link-list -->
		</div><!-- item -->
	</div><!-- nav-holder -->

<?php endif; ?>

<?php do_action( 'bp_before_profile_content' ); ?>


<div class="personal-area">
	<div class="img-frame"><?php bp_loggedin_user_avatar( 'type=thumb&width=58&height=58' ) ?></div><!-- img-frame -->
	<strong class="personal-head">About You</strong>
</div><!-- personal-area -->
<div class="personal-holder">
	<?php
	// Profile Edit
	if ( bp_is_current_action( 'edit' ) )
		locate_template( array( 'members/single/profile/edit.php' ), true );

	// Change Avatar
	elseif ( bp_is_current_action( 'change-avatar' ) )
		locate_template( array( 'members/single/profile/change-avatar.php' ), true );

	// Display XProfile
	elseif ( bp_is_active( 'xprofile' ) )
		locate_template( array( 'members/single/profile/profile-loop.php' ), true );

	// Display WordPress profile (fallback)
	else
		locate_template( array( 'members/single/profile/profile-wp.php' ), true );
	?>
</div><!-- personal-holder -->

<?php do_action( 'bp_after_profile_content' ); ?>