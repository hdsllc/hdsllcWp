<?php
require_once('wp_bootstrap_navwalker.php');

add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
	load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 640;
	} 
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
	);
}


add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.11.1' );
    }
}

add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts() {
	// pull in jQuery
	//wp_enqueue_script( 'jquery' );

	// register bootstrap js
	wp_register_script('bootstrap', get_bloginfo('template_directory') . "/js/lib/bootstrap.min.js", array("jquery"));
	// load bootstrap js
	wp_enqueue_script( 'bootstrap');
	
	// register our personal scripts
	wp_register_script('scripts', get_bloginfo('template_directory') . "/js/scripts.js", array("jquery"));
	// load our personal scripts
	wp_enqueue_script( 'scripts');
	
}

add_action( 'wp_enqueue_scripts', 'wpt_register_css' );
function wpt_register_css() {
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/lib/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );

		wp_register_style( 'hdsllc', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'hdsllc' );

}


add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'blankslate_title' );
function blankslate_title($title) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}

add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title($title) {
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'blankslate' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		)
	);
}

function blankslate_custom_pings($comment){
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}

add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number($count) {
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
  global $post;
	$content = apply_filters( 'the_content', get_the_content() );
	$content = str_replace( ']]>', ']]&gt;', $content );

	return '<a class="moretag" href="#">...</a>  <div class="full_content">' . $content . '</div>'; // Needs some custom JS here.  Load this in above where it's referencing JQuery.
}
add_filter('excerpt_more', 'new_excerpt_more');

function get_attachment_url_by_slug( $slug ) {
  $args = array(
    'post_type' => 'attachment',
    'name' => sanitize_title($slug),
    'posts_per_page' => 1,
    'post_status' => 'inherit',
  );
  $_header = get_posts( $args );
  $header = $_header ? array_pop($_header) : null;
  return $header ? wp_get_attachment_url($header->ID) : '';
}