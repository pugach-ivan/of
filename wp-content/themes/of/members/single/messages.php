<?php

/**
 * BuddyPress - Users Messages
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>
<div class="friends-filter item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul class="link-list">
		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); ?>
		<?php if ( bp_is_messages_inbox() || bp_is_messages_sentbox() ) : ?>

			<div class="message-search"><?php bp_message_search_form(); ?></div>

		<?php endif; ?>
	</ul>
</div><!-- friends-filter -->

<?php

	if ( bp_is_current_action( 'compose' ) ) :
		locate_template( array( 'members/single/messages/compose.php' ), true );

	elseif ( bp_is_current_action( 'view' ) ) :
		locate_template( array( 'members/single/messages/single.php' ), true );

	else :
		do_action( 'bp_before_member_messages_content' ); ?>

	<div class="messages" role="main">

		<?php
			if ( bp_is_current_action( 'notices' ) )
				locate_template( array( 'members/single/messages/notices-loop.php' ), true );
			else
				locate_template( array( 'members/single/messages/messages-loop.php' ), true );
		?>

	</div><!-- .messages -->

	<?php do_action( 'bp_after_member_messages_content' ); ?>

<?php endif; ?>
