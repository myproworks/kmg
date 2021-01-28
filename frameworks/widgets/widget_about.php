<?php
/**
 * Plugin Name: KMG: About me
 * Plugin URI:
 * Description: This widget displays the information and the social links.
 * Version: 1.0
 * Author: makecodework
 * Author URI: https://codegrabber.blogspot.com/
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'w_about_widgets' );

function w_about_widgets(){
	$widget = "widget_about";
	register_widget( $widget );
}

/**
 * Class w_about_widgets.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 */
class widget_about extends WP_Widget{

	public static $widget_fields = array(
		'title' => '',
		'logo' => '',
		'description' => '',
		'facebook_url' => '',
		'instagram_url' => '',
		'viber' => '',
		''
	);
	/**
	 * Widget setUp.
	 */
	public function __construct() {
		$widget_options = array ( 'classname' => '', 'description' => 'Widget to describe about the company.' );
		parent ::__construct( 'widget_about', __( 'KMG: About us', 'kmg' ), $widget_options );
	}

	/**
	 * Display data on the screen.
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];
		$description = $instance['description'];
		echo $before_title;
		?>
		<?php if ( $title ) : ?>
			<?php echo $title;?>
		<?php
		endif;
		echo $after_title;?>
		<?php if( $description ):?>
			<p><?php echo wp_trim_words( $description, 20, '' ) ; ?></p>
		<?php endif; ?>
		<?php


	}

	/**
	 * Update widget data.
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		foreach( self::$widget_fields as $field => $value ){
			$instance[$field] = isset( $new_instance ) ? strip_tags( stripcslashes( $new_instance[$field] ) ) : '';
		}
		return $instance;
	}

	/**
	 * Display inputs in admin panel.
	 * @param array $instance
	 *
	 * @return string
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
			<label for="<?php echo $this->get_field_id( 'description' ); ?>">
				<?php _e('Short text:', 'kmg'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>"
			          name="<?php echo $this->get_field_name( 'description' ); ?>">
				<?php echo isset($instance['description']) ? $instance['description'] : ''; ?></textarea>
		</p>
		<p><label for="<?php echo $this->get_field_id( 'facebook_url' )?>"><?php echo  _e( 'Facebook URL:', 'kmg' );?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'facebook_url' )?>" name="<?php echo  $this->get_field_name( 'facebook_url' );?>" value="<?php echo $instance['facebook_url']?>"></p>

		<p><label for="<?php echo $this->get_field_id( 'instagram_url' )?>"><?php echo  _e( 'Instagram URL:', 'kmg' );?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'instagram_url' )?>" name="<?php echo  $this->get_field_name( 'instagram_url' );?>" value="<?php echo $instance['instagram_url']?>"></p>
		<?php

	}

}