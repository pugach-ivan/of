<?php
remove_action('wp_head', 'buddypress_global_adminbar_css');
remove_action('admin_head', 'buddypress_global_adminbar_css');
remove_action('init', 'bp_core_add_admin_bar_css');
define('CP_SALT', 'k-TNr0o?JP3UkgD({Y!.');

function my_scripts_method() {
    wp_deregister_script('thickbox');
    wp_enqueue_script( 'jquery' );
}

add_action('wp_enqueue_scripts', 'my_scripts_method');

function cr_search_form_type_select() {
	global $bp;

	$options = array();

	if ( bp_is_active( 'xprofile' ) )
		$options['members'] = __( 'Members', 'buddypress' );

	if ( bp_is_active( 'groups' ) )
		$options['groups']  = __( 'Groups',  'buddypress' );

	if ( bp_is_active( 'blogs' ) && is_multisite() )
		$options['blogs']   = __( 'Blogs',   'buddypress' );

	if ( bp_is_active( 'forums' ) && bp_forums_is_installed_correctly() && bp_forums_has_directory() )
		$options['forums']  = __( 'Forums',  'buddypress' );

	$options['posts'] = __( 'Posts', 'buddypress' );

	$selection_box .= '<select name="search-which" id="search-which">';

	$options = apply_filters( 'bp_search_form_type_select_options', $options );
	foreach( (array)$options as $option_value => $option_title )
		$selection_box .= sprintf( '<option value="%s">%s</option>', $option_value, $option_title );

	$selection_box .= '</select>';

	return $selection_box;
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Right Sidebar',
		'before_widget' => '<div class="side-box widget %2$s" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="heading">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Mentor Info',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="heading">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Invite Friend',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="heading">',
		'after_title' => '</h3>'
	));
}

function displayMentorsSidebarBlock()
{
	global $wpdb;
	$db_query = 'SELECT user_id FROM wp_bp_xprofile_data WHERE field_id = 12 AND value = "Yes"';
	$match_ids = $wpdb->get_results($db_query, ARRAY_A  );
	$resultsIdsString = '';
	$i = 0;
	foreach ($match_ids as $value)
	{
		$resultsIdsString .= (1 < ++$i) ? ',' : '';
		$resultsIdsString .= $value['user_id'];
	}
	$get_these_members = 'include=' .$resultsIdsString;

	if (bp_has_members($get_these_members, 'per_page optional=9'))
	{
		?>
		<div class="side-box">
			<h3 class="heading">
				Mentors
				<a class="help fancy" href="#mentor-info-box">help</a>
			</h3>
			<div class="side-holder">
				<ul class="mentors-list">
					<?php while ( bp_members() ) : bp_the_member(); ?>

						<li>
							<a href="<?php bp_member_permalink() ?>">
								<?php bp_member_avatar('width=38&height=38') ?>
							</a>
						</li>

					<?php endwhile; ?>

				</ul>
				<a class="more" href="/mentors">View more</a>
			</div>
		</div>
		<?php
	}
}
function displayClassifieds($_post_type = 'classifieds',$_count_posts = 5)
{
    $the_query = new WP_Query('post_type=' . $_post_type . '&showposts=' . $_count_posts);
    if ($the_query->have_posts()):
        ?>
		<div class="side-box">
			<h3 class="heading">Marketplace</h3>
			<div class="side-holder">
				<ul class="posts-list">
					<?php
	                while ($the_query->have_posts()) : $the_query->the_post();
	                    global $post; ?>
	                    <li>
							<div class="img-holder">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(38, 26));?></a>
							</div>
							<div class="wrap">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></p>
							</div>
						</li>
	                <?php endwhile; ?>
	                <?php wp_reset_query(); ?>

				</ul>
				<a class="more" href="/marketplace">View more</a>
			</div>
		</div>
    <?php endif;
}

function displayHomeGallery($_post_type = 'gallery',$_count_posts = 5)
{
    $the_query = new WP_Query('post_type=' . $_post_type . '&showposts=' . $_count_posts);
    if ($the_query->have_posts()):
        ?>
		<div class="mentor">
			<div class="t">&nbsp;</div>
			<div class="m">

				<?php
				while ($the_query->have_posts()) : $the_query->the_post();
				    global $post; ?>
				    
				    <div class="m-box">
				    	<?php
				    	if(has_post_thumbnail())
				    	{
				    		?>
							<div class="picture">
								<?php the_post_thumbnail(array(391, 525));?>
							</div>
				    		<?php
				    	}
				    	$blueTitle = get_post_meta($post->ID, 'blue_title', true);
				    	$blackTitle = get_post_meta($post->ID, 'black_title', true);
				    	?>
						<div class="signature">
					    	<?php
					    	if( $blueTitle || $blackTitle)
					    	{
					    		?>
					    		<span><strong><?php echo $blueTitle?></strong><?php echo $blackTitle; ?></span>
					    		<?php
					    	}
					    	else
					    	{
					    		?>
					    		<span><strong><?php the_title(); ?></strong></span>
					    		<?php
					    	}
					    	?>
						</div>	
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>

			</div>
			<div class="b">&nbsp;</div>
		</div>
    <?php endif;
}

?>