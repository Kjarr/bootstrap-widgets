<?php

class Bootstrap_Post_Parallax_Header_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
				'bootstrap_post_parallax_header_widget', // Base ID
				__( 'Austin Stylish Post Parallax Header', 'I18n' ), // Name
				array( // Args
					'description' => __( 'Austin Stylish Post Parallax Header.', 'I18n' )
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
		if ( ! is_single() ) {
			return;
		}
		
		echo $args['before_widget'];
		
		// Get post
		$post = get_post();
		// Include template
		bootstrap_widgets_include_template( 'bootstrap-post-parallax-header-widget', array( 
			'post' => $post 
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