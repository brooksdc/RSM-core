<?php
/**
 * Widget: RSM Primary Phone
 * Ver: 1.0
 *
 * NOTE: These ACF widget fields aren't currently compatible with page builders.
 */

class RSM_PrimaryPhone_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'rsm_PrimaryPhone_widget', // Base ID
      __('RSM - Primary Phone', 'text_domain'), // Name
      array( 'description' => __( 'Display the primary phone number as set in the options panel.', 'text_domain' ), ) // Args
    );
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
    echo $args['before_widget'];
    
    /* DISABLING THE "TITLE" FIELD FROM THE FRONT-END HERE.
    if ( !empty($instance['title']) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }*/

    /**
     * // CUSTOM OUTPUT START //
     *
     * To get an ACF field, add these extra parameters to the array:
     * ex: get_field('the_field_name', 'widget_' . $args['widget_id']);
     *
     */
    $phone = get_field('primary_phone_number','option');
    $phone_link = preg_replace("/[^0-9]/","", $phone);
    $use_phone_link = get_field('rsm_widget_primary_phone_link', 'widget_' . $args['widget_id']);
    $custom_class = get_field('rsm_widget_primary_phone_custom_class', 'widget_' . $args['widget_id']);

    if($phone):

      if($use_phone_link == true){
        echo '<a class="rsm-primary-phone '.$custom_class.'" href="tel:1'.$phone_link.'">'.$phone.'</a>';
      } else {
        echo '<span class="rsm-primary-phone '.$custom_class.'">'.$phone.'</span>';
      }
      
    endif;

    
    /*
     * // CUSTOM OUTPUT END //
     **/

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    if ( isset($instance['title']) ) {
      $title = $instance['title'];
    }
    else {
      $title = __( 'New title', 'text_domain' );
    }
    ?>
    <?php /*
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    */ ?>
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
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
  }

} // class RSM_PrimaryPhone_Widget

// register RSM_PrimaryPhone_Widget widget
add_action( 'widgets_init', function(){
  register_widget( 'RSM_PrimaryPhone_Widget' );
});