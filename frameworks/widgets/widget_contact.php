<?php
/**
 * Plugin Name: KMG: Contact
 * Plugin URI:
 * Description: This widget displays the contact information.
 * Version: 1.0
 * Author: makecodework
 * Author URI: https://codegrabber.blogspot.com/
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'contact_widgets' );
function contact_widgets(){
	$widget = 'widget_contact';
	register_widget( $widget);
}

class widget_contact extends WP_Widget{

	public static $widget_fields = array (
		'title' => '',
		'short_text' => '',
		'phone' => '',
		'email' => ''
	);
	/**
	 * Widget SetUp.
	 */
	public function __construct( ) {
		$widget_options = array( 'classname' => '', 'description' => __( 'Widget displays the contact information' ) );
		parent ::__construct( 'widget_contact', __( 'KMG: Contact', 'kmg' ), $widget_options);
	}

	/**
	 * Displays widget on frontend part.
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];
		$phone = $instance['phone'];
		$email = $instance['email'];
		$short_text = $instance['short_text'];
		echo $before_title;
		?>
		<?php if ( $title ) : ?>
			<?php echo $title;?>
		<?php
			endif;
			echo $after_title;?>
		<?php if( $short_text ) : ?>
			<p><?php echo wp_trim_words( $short_text, 10, '' ) ; ?></p>
		<?php endif;?>
		<ul class="address-widget-list">
			<li class="footer-mobile-number"><i class="fa fa-phone"></i><?php echo $phone;?></li>
			<li class="footer-mobile-number"><i class="fa fa-envelope"></i><a href="mailto:<?php echo $email?>">
					<?php echo $email?></a></li>
			<li class="footer-mobile-number"><i class="fa fa-map-marker"></i>House Building Uttara</li>
		</ul>
		<?php

	}

	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		foreach (self::$widget_fields as $field => $value ){
			$instance[$field] = isset( $new_instance ) ? strip_tags( stripcslashes( $new_instance[$field])) : '';
		}
		return $instance;
	}

	/**
	 * @param array $instance
	 *
	 * @return string|void
	 */
	public function form( $instance ) {
		global $wp_version;
		foreach( self::$widget_fields as $field => $value){
			if( array_key_exists( $field, self::$widget_fields ) ){
				${$field} = !isset( $instance[$field] ) ? $value : esc_attr( $instance[$field] );
			}
		}?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e('Title:', 'kmg'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>"
			       value="<?php echo isset($instance['title']) ? $instance['title'] : ''; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'short_text' ); ?>">
				<?php _e('Short text:', 'kmg'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'short_text' ); ?>"
			          name="<?php echo $this->get_field_name( 'short_text' ); ?>">
				<?php echo isset($instance['short_text']) ? $instance['short_text'] : ''; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone' ); ?>">
				<?php _e('Phone:', 'kmg'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>"
			       name="<?php echo $this->get_field_name( 'phone' ); ?>"
			       value="<?php echo isset($instance['phone']) ? $instance['phone'] : ''; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>">
				<?php _e('Email:', 'kmg'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'email' ); ?>"
			       name="<?php echo $this->get_field_name( 'email' ); ?>"
			       value="<?php echo isset($instance['email']) ? $instance['email'] : ''; ?>" style="width:100%;" />
		</p>
		<?php
		
	}
}