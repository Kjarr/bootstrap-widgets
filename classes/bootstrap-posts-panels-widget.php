<?php

class Bootstrap_Posts_Panels_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
				'bootstrap_posts_panels_widget', // Base ID
				__( 'Austin Stylish Posts Panels', 'I18n' ), // Name
				array( // Args
					'description' => __( 'Austin Stylish Posts Panels.', 'I18n' )
				)
		);
	}
	
	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		
		$posts_per_page = get_option( 'posts_per_page' );
		$page = get_query_var( 'paged' );
		if ( $page == '' ) {
			$page = get_query_var( 'page' );
		}
		if ( $page < 1 ) {
			$page = 1;
		}
		
		// Get posts
		$posts_query_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => $posts_per_page,
			'offset' => $posts_per_page*($page - 1),
			'order'=> 'DESC',
			'orderby' => 'date'
		);
		if ( isset( $args['category'] ) ) {
			$posts_query_args['category'] = $args['category'];
		}
		$posts_result = get_posts( $posts_query_args );
		// Include template
		bootstrap_widgets_include_template( 'bootstrap-posts-panels-widget', array( 
			'posts' => $posts_result 
		) );
		
		echo $args['after_widget'];
	}
	
	/**
	 * Ouputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		
	}
	
	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		return $new_instance;
	}
	
}