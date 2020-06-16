<?php
/**
 * @package WordPress
 * @subpackage mytheme
 *
 * Customize widgets
 */
class My_Widget extends WP_Widget {
	/**Setup the widget name, description, etc..*/
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'custom_class',
			'description' => 'This is the cutomized widget',
		);
		parent::__construct( 'Any_widget', 'AnyWidget', $widget_ops );

	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$desc  = apply_filters( 'widget_description', $instance['desc'] );

		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		if ( ! empty( $desc ) ) {
			echo $instance['desc'];
		}
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		$desc  = ! empty( $instance['desc'] ) ? $instance['desc'] : esc_html__( 'Type some description here...', 'text_domain' );
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php esc_html_e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'desc' ); ?>"><?php esc_html_e( 'Description:' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" ><?php echo esc_attr( $desc ); ?></textarea>
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['desc']  = ( ! empty( $new_instance['desc'] ) ) ? wp_strip_all_tags( $new_instance['desc'] ) : '';

		return $instance;
	}

}

add_action(
	'widgets_init',
	function() {
		register_widget( 'My_Widget' );
	}
);
