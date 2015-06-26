<?php

class Bootstrap_Advertisement_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
				'bootstrap_advertisement_widget', // Base ID
				__( 'Austin Stylish Advertisement', 'I18n' ), // Name
				array( // Args
					'description' => __( 'Austin Stylish Advertisement.', 'I18n' )
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
		
		// Get post
		$post = get_post();
		// Include template
		bootstrap_widgets_include_template( 'bootstrap-advertisement-widget', $instance );
		
		echo $args['after_widget'];
	}
	
	/**
	 * Ouputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$link_url = ! empty( $instance['link_url'] ) ? $instance['link_url'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_url' ); ?>"><?php _e( 'Link URL:', 'bootsrap-widget' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link_url' ); ?>" name="<?php echo $this->get_field_name( 'link_url' ); ?>" type="text" value="<?php echo esc_attr( $link_url ); ?>">
		</p>
		<?php 
		
		$image_url = ! empty( $instance['image_url'] ) ? $instance['image_url'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image URL:', 'bootsrap-widget' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo esc_attr( $image_url ); ?>">
		</p>
		<?php 
		
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'bootsrap-widget' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
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