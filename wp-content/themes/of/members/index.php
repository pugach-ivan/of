<?php

/**
 * BuddyPress - Members Directory
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( 'buddypress' ); ?>

	<?php do_action( 'bp_before_directory_members_page' ); ?>

	<div id="main">
		<div id="contour-area">
			<?php get_sidebar('right'); ?>
			<?php get_sidebar('left'); ?>
			<?php ?>
			<div id="content">
				<?php do_action( 'bp_before_directory_members' ); ?>

				<form action="" method="post" id="members-directory-form" class="dir-form">

					<h3><?php _e( 'Members Directory', 'buddypress' ); ?></h3>

					<?php do_action( 'bp_before_directory_members_content' ); ?>

					<div id="members-dir-search" class="dir-search" role="search">

						<?php bp_directory_members_search_form(); ?>

					</div><!-- #members-dir-search -->

					<ul id="nav-group">
						<li class="selected" id="members-all"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_members_root_slug() ); ?>"><?php printf( __( 'All Members <span>%s</span>', 'buddypress' ), bp_get_total_member_count() ); ?></a></li>

						<?php if ( is_user_logged_in() && bp_is_active( 'friends' ) && bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>

							<li id="members-personal"><a href="<?php echo bp_loggedin_user_domain() . bp_get_friends_slug() . '/my-friends/' ?>"><?php printf( __( 'My Friends <div class="amount-frame">
											<div class="amount-box">%s<span>&nbsp;</span></div><!-- amount-box --></div><!--  amount-box -->', 'buddypress' ), bp_get_total_friend_count( bp_loggedin_user_id() ) ); ?></a></li>

						<?php endif; ?>

						<?php do_action( 'bp_members_directory_member_types' ); ?>
					</ul>
					<div class="nav-holder">
						<div class="item">
							<div class="groups-filter-form">
								<fieldset>
									<div class="form-item">
										<?php do_action( 'bp_members_directory_member_sub_types' ); ?>

										<div id="members-order-select" class="last filter">

											<label for="members-order-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
											<select id="members-order-by">
												<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
												<option value="newest"><?php _e( 'Newest Registered', 'buddypress' ); ?></option>

												<?php if ( bp_is_active( 'xprofile' ) ) : ?>

													<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>

												<?php endif; ?>

												<?php do_action( 'bp_members_directory_order_options' ); ?>

											</select>
										</div>
									</div>
								</fieldset>
							</div>
						</div><!-- item -->
					</div><!-- nav-holder -->
					<div class="view-area">
						<div class="cut-holder">

							<div id="members-dir-list" class="members dir-list">

								<?php locate_template( array( 'members/members-loop.php' ), true ); ?>

							</div><!-- #members-dir-list -->

						</div><!--  cut-holder-->
					</div><!-- view-area -->


					<?php do_action( 'bp_directory_members_content' ); ?>

					<?php wp_nonce_field( 'directory_members', '_wpnonce-member-filter' ); ?>

					<?php do_action( 'bp_after_directory_members_content' ); ?>

				</form><!-- #members-directory-form -->

				<?php do_action( 'bp_after_directory_members' ); ?>

			</div><!-- content -->
		</div><!-- contour-area -->
	</div><!-- main -->

	<?php do_action( 'bp_after_directory_members_page' ); ?>
<?php get_footer( 'buddypress' ); ?>
