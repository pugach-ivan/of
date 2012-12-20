<div class="block-sent-form">
	<form action="<?php bp_messages_form_action('compose'); ?>" method="post" id="send_message_form" class="sent-form">
		<fieldset>
			<?php do_action( 'bp_before_messages_compose_content' ); ?>
			<div class="form-item">
				<label for="send-to-input">Send To (Username)</label>
				<div class="sent-box">
					<?php bp_message_get_recipient_tabs(); ?>
					<input type="text" name="send-to-input" class="send-to-input form-text" id="send-to-input" />
				</div>
			</div><!-- form-item -->

			<?php if ( bp_current_user_can( 'bp_moderate' ) ) : ?>
				<div class="checkbox-item">
					<input type="checkbox" id="send-notice" name="send-notice" class="form-checkbox" value="1" />
					<label for="send-notice">This is a notice to all users.</label>
				</div><!-- checkbox-item -->
			<?php endif; ?>

			<div class="form-item">
				<label for="subject">Subject</label>
				<input type="text" name="subject" id="subject" class="form-text" value="<?php bp_messages_subject_value(); ?>" />
			</div><!-- form-item -->
			<div class="form-item">
				<label for="message_content">Message</label>
				<textarea name="content" id="message_content" rows="7" cols="50"><?php bp_messages_content_value(); ?></textarea>
			</div><!-- form-item -->

			<input type="hidden" name="send_to_usernames" id="send-to-usernames" value="<?php bp_message_get_recipient_usernames(); ?>" class="<?php bp_message_get_recipient_usernames(); ?>" />

			<?php do_action( 'bp_after_messages_compose_content' ); ?>

			<div class="form-item">
				<input type="submit" class="form-submit" value="Send" name="send" id="send" />
			</div><!-- form-item -->
			<?php wp_nonce_field( 'messages_send_message' ); ?>
		</fieldset>
	</form>

	<script type="text/javascript">
		document.getElementById("send-to-input").focus();
	</script>
</div><!-- block-sent-form -->