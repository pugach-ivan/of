<?php
remove_action('wp_head', 'buddypress_global_adminbar_css');
remove_action('admin_head', 'buddypress_global_adminbar_css');
remove_action('init', 'bp_core_add_admin_bar_css');
remove_action( 'wp_footer', 'bp_core_admin_bar' );
remove_action( 'admin_footer', 'bp_core_admin_bar' );
define('BP_DISABLE_ADMIN_BAR', true);
define( 'BP_DISABLE_ADMIN_BAR', true );

function remove_bp_adminbar(){
     remove_action( 'wp_footer', 'bp_core_admin_bar', 8 );
     remove_action( 'admin_footer', 'bp_core_admin_bar');
     show_admin_bar(true);
}
add_action('after_setup_theme','remove_bp_adminbar');

function my_scripts_method() {
    wp_deregister_script('thickbox');
    wp_deregister_script( 'jquery' );
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

function getMemberAreaHeader()
{
	$headers = array(
		'profile' => 'My Profile',
		'friends' => 'Friends',
		'messages' => 'Messages',
		'groups' => 'Groups',
		'settings' => 'Settings',
	);

	if( array_key_exists(basename($_SERVER[REQUEST_URI]), $headers) )
		return $headers[basename($_SERVER[REQUEST_URI])];

	return ucfirst(bp_current_action());
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Right Sidebar',
		'before_widget' => '<div class="side-box widget %2$s" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="heading">',
		'after_title' => '</h3>'
	));
}

function displayHomepageSidebarEvents(){}
function displayHomepageGroups(){}


function displayNews($_count_posts = 5)
{
    $the_query = new WP_Query('post_type=post&showposts=' . $_count_posts);
    if ($the_query->have_posts()):
        ?>
		<div class="side-box">
		    <h2>News</h2>
		    <?php
			while ($the_query->have_posts()) : $the_query->the_post();
			    global $post; ?>
			    <div class="news-box">
			        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			        <?php the_excerpt(); ?>
			    </div><!-- news-box -->
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div><!-- side-box -->
    	<?php 
    endif;
}

$themename = "of-theme";
$shortname = "of";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category"); 

$options = array (
 
array( "name" => $themename." Options",
	"type" => "title"),
array( "name" => "Custom Options",
	"type" => "section"),
array( "type" => "open"),
array( "name" => "About",
	"desc" => "About content",
	"id" => $shortname."_about",
	"type" => "textarea",
	"std" => ''),
array( "name" => "We're Hiring",
	"desc" => "We're Hiring content",
	"id" => $shortname."_we_hiring",
	"type" => "textarea",
	"std" => ''),
array( "type" => "close"),

);

function mytheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=functions.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=functions.php&reset=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>
 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

 
<?php break;
 
case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<div style="font-size:9px; margin-bottom:10px;">Icons: <a href="http://www.woothemes.com/2009/09/woofunction/">WooFunction</a></div>
 </div> 
 

<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');

class Description_Walker extends Walker_Nav_Menu {

// add classes to ul sub-menus
function start_lvl( &$output, $depth ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n" . $indent . '<div class="drop"><div class="t">&nbsp;</div><div class="m"><ul class="' . $class_names . '">' . "\n";
}

function end_lvl(&$output, $depth) {
     $indent = str_repeat("\t", $depth);
     $output .= $indent.'</ul></div><div class="b">&nbsp;</div></div>'."\n";}

// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth, $args ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
    if(!$depth)
        $item_output = '<span class="l">&nbsp;</span><span class="c">'.$item_output.'</span><span class="r">&nbsp;</span>';

    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}

?>