<?php
require($_SERVER['DOCUMENT_ROOT'] . '/fm/wp-blog-header.php');

$errors = array();
nocache_headers();

if ( FALSE == get_option('users_can_register') ) {
	echo "User registration is disabled.";
	exit();
}

if ( $_POST ) {
	require_once($_SERVER['DOCUMENT_ROOT'] . '/fm/wp-includes/registration.php');

	$user_login = sanitize_user( $_POST['user_login'] );
	$user_pass = sanitize_user( $_POST['user_password'] );
	$user_pass_2 = sanitize_user( $_POST['user_password_2'] );
	$user_email = apply_filters( 'user_registration_email', $_POST['user_email'] );


	if (( $user_pass == ''  || $user_pass_2 == '' ) || $user_pass != $user_pass_2)
	{
		$errors['user_password'] = __('<strong>ERROR</strong>: Please enter a valid password.');
	}

	// Check the username
	if ( $user_login == '' )
		$errors['user_login'] = __('<strong>ERROR</strong>: Please enter a username.');
	elseif ( !validate_username( $user_login ) ) {
		$errors['user_login'] = __('<strong>ERROR</strong>: This username is invalid.  Please enter a valid username.');
		$user_login = '';
	} elseif ( username_exists( $user_login ) )
		$errors['user_login'] = __('<strong>ERROR</strong>: This username is already registered, please choose another one.');

	// Check the e-mail address
	if ($user_email == '') {
		$errors['user_email'] = __('<strong>ERROR</strong>: Please type your e-mail address.');
	} elseif ( !is_email( $user_email ) ) {
		$errors['user_email'] = __('<strong>ERROR</strong>: The email address is invalid.');
		$user_email = '';
	} elseif ( email_exists( $user_email ) )
		$errors['user_email'] = __('<strong>ERROR</strong>: This email is already registered, please choose another one.');

	do_action('register_post');

	$errors = apply_filters( 'registration_errors', $errors );

	if ( empty( $errors ) ) {

		$user_id = wp_create_user( $user_login, $user_pass, $user_email );
		if ( !$user_id )
			$errors['registerfail'] = sprintf(__('<strong>ERROR</strong>: Couldn&#8217;t register you... please contact the webmaster!\n%s'), get_option('admin_email'));
		else {
			wp_new_user_notification($user_id, $user_pass);

				if(isset($_POST['recive_newsletter']) && 'yes' == $_POST['recive_newsletter'])
				{
					addUserToSubscription($_POST['user_email'], $user_login);
				}
				else
				{
					deleteUserFromSubscription($_POST['user_email']);
				}

			echo 'Success Registration! Please check your email address!';
			exit();
		}
	}
}

if ( !empty( $error ) ) {
	$errors['error'] = $error;
	unset($error);
}

if ( !empty( $errors ) ) {
	if ( is_array( $errors ) ) {
		$newerrors = "";
		foreach ( $errors as $error ) {
			$stripped = str_replace("<strong>", "", $error);
			$stripped = str_replace("</strong>", "", $stripped);
			$newerrors .= $stripped . "\n";
		}
		$errors = $newerrors;
	}
}

echo apply_filters('login_errors', $errors);
exit();
?>