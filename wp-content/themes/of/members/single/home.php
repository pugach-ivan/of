<?php

/**
 * BuddyPress - Users Home
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( 'buddypress' ); ?>

	<div id="main">
		<div id="contour-area">
			<?php get_sidebar('right'); ?>
			<?php get_sidebar('left'); ?>
			<?php do_action( 'bp_before_member_home_content' ); ?>
			<div id="content">
				<div class="topic-holder">
					<h2><?php echo getMemberAreaHeader(); ?></h2>
				</div><!-- topic-holder -->
				<div class="block-top-menu">
					<ul class="top-menu">
						<?php bp_get_displayed_user_nav(); ?>
						<?php do_action( 'bp_member_options_nav' ); ?>
					</ul>
				</div><!-- block-top-menu -->
				<?php do_action( 'bp_before_member_body' );

				if ( bp_is_user_activity() || !bp_current_component() ) :
					locate_template( array( 'members/single/activity.php'  ), true );

				 elseif ( bp_is_user_blogs() ) :
					locate_template( array( 'members/single/blogs.php'     ), true );

				elseif ( bp_is_user_friends() ) :
					locate_template( array( 'members/single/friends.php'   ), true );

				elseif ( bp_is_user_groups() ) :
					locate_template( array( 'members/single/groups.php'    ), true );

				elseif ( bp_is_user_messages() ) :
					locate_template( array( 'members/single/messages.php'  ), true );

				elseif ( bp_is_user_profile() ) :
					locate_template( array( 'members/single/profile.php'   ), true );

				elseif ( bp_is_user_forums() ) :
					locate_template( array( 'members/single/forums.php'    ), true );

				elseif ( bp_is_user_settings() ) :
					locate_template( array( 'members/single/settings.php'  ), true );

				// If nothing sticks, load a generic template
				else :
					locate_template( array( 'members/single/plugins.php'   ), true );

				endif;

				do_action( 'bp_after_member_body' ); ?>
			</div><!-- content -->
			<?php do_action( 'bp_after_member_home_content' ); ?>
		</div><!-- contour-area -->
	</div><!-- main -->
<?php get_footer( 'buddypress' ); ?>
