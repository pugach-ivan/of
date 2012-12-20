<?php do_action( 'bp_before_profile_loop_content' ); ?>

<?php if ( bp_has_profile() ) : ?>

	<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

		<?php if ( bp_profile_group_has_fields() ) : ?>

			<?php do_action( 'bp_before_profile_field_content' ); ?>

			<div class="bp-widget <?php bp_the_profile_group_slug(); ?>">
				
				<div class="block-personal-table">
					<table class="personal-table">

						<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

							<?php if ( bp_field_has_data() ) : ?>

								<tr<?php bp_field_css_class(); ?>>

									<td class="col-1"><?php bp_the_profile_field_name(); ?></td>

									<td class="col-2"><?php bp_the_profile_field_value(); ?></td>

								</tr>

							<?php endif; ?>

							<?php do_action( 'bp_profile_field_item' ); ?>

						<?php endwhile; ?>

					
					</table>
				</div><!-- block-personal-table -->
			</div>

			<?php do_action( 'bp_after_profile_field_content' ); ?>

		<?php endif; ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_profile_field_buttons' ); ?>

<?php endif; ?>

<?php do_action( 'bp_after_profile_loop_content' ); ?>
