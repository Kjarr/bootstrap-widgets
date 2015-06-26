<?php
/*
Plugin Name: Bootstrap Widgets
Plugin URI: http://patternsinthecloud.com
Description: Add Bootstrap widgets to Wordpress
Version: 1.0
Author: Patterns in the Cloud
Author URI: http://patternsinthecloud.com
License: Single-site
*/

/**
 * Activate hook
 */
function bootstrap_widgets_activate() {
	
}
register_activation_hook( __FILE__, 'bootstrap_widgets_activate' );

/**
 * Deactivate hook
 */
function bootstrap_widgets_deactivate() {
	
}
register_deactivation_hook( __FILE__, 'bootstrap_widgets_deactivate' );

/**
 * Uninstall hook
 */
function bootstrap_widgets_uninstall() {
	
}
register_uninstall_hook( __FILE__, 'bootstrap_widgets_uninstall' );

function bootstrap_widgets_register_widgets() {
	require_once( 'classes/bootstrap-posts-carousel-widget.php' );
	register_widget( 'Bootstrap_Posts_Carousel_Widget' );
	require_once( 'classes/bootstrap-posts-panels-widget.php' );
	register_widget( 'Bootstrap_Posts_Panels_Widget' );
	require_once( 'classes/bootstrap-post-parallax-header-widget.php' );
	register_widget( 'Bootstrap_Post_Parallax_Header_Widget' );
	require_once( 'classes/bootstrap-advertisement-widget.php' );
	register_widget( 'Bootstrap_Advertisement_Widget' );
}
add_action( 'widgets_init', 'bootstrap_widgets_register_widgets' );

function bootstrap_widgets_include_template( $template, $vars ) {
	extract( $vars );
	include ( "templates/{$template}.php" );
}

function bootstrap_widgets_scripts() {
	wp_enqueue_style( 'bootstrap-widgets', plugin_dir_url( __FILE__ ) . 'css/style.css' );
	wp_enqueue_script( 'masonry.desandro', plugin_dir_url( __FILE__ ) . 'js/masonry.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap-widgets', plugin_dir_url( __FILE__ ) . 'js/scripts.js', array( 'jquery', 'masonry.desandro' ) );
}
add_action( 'wp_enqueue_scripts', 'bootstrap_widgets_scripts' );

function bootstrap_widgets_get_post_excerpt( $post_id, $charlength ) {
	global $post;
	$temp_post = $post;
	$post = get_post( $post_id );
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			$excerpt = mb_substr( $subex, 0, $excut );
		} else {
			$excerpt = $subex;
		}
		$excerpt .= '<a href="' . get_permalink( $post_id ) . '">[...]</a>';
	}
	
	$post = $temp_post;
	
	return $excerpt;
}


/*
 * Shortcodes
 */

function bootstrap_widgets_posts_panels_shortcode( $args ) {
	ob_start();
	the_widget( 'Bootstrap_Posts_Panels_Widget', array(), $args );
	$contents = ob_get_contents();
	ob_end_clean();
	return $contents;
}
add_shortcode( 'bootstrap-posts-panels', 'bootstrap_widgets_posts_panels_shortcode' );
