<?php

class Bootstrap_Posts_Carousel_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'bootstrap_posts_carousel_widget', // Base ID
			__( 'Austin Stylish Posts Carousel', 'I18n' ), // Name
			array( // Args
				'description' => __( 'Austin Stylish Posts Carousel.', 'I18n' )
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
		
		// Get posts
		$posts_query_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 5,
			'order'=> 'DESC',
			'orderby' => 'date',
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'hide_from_carousel',
					'compare' => 'NOT EXISTS'
				),
				array(
					'key' => 'hide_from_carousel',
					'value' => 'no'
				)
			)
		);
		$posts_result = get_posts( $posts_query_args );
		// Reverse results
		$posts_result = array_reverse( $posts_result );
		// Include template
		bootstrap_widgets_include_template( 'bootstrap-posts-carousel-widget', array( 
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