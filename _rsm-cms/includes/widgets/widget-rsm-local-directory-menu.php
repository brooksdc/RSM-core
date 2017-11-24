<?php
/**
 * Widget: RSM Local Directory Widget
 * Ver: 1.0
 *
 * NOTE: These ACF widget fields aren't currently compatible with page builders.
 */

class RSM_LocalDirectoryMenu_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'rsm_LocalDirectoryMenu_widget', // Base ID
      __('RSM - Local Directory Menu', 'text_domain'), // Name
      array( 'description' => __( 'Displays a dynamic menu for the current page directory.', 'text_domain' ), ) // Args
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
    $widget_excludes = get_field('rsm_widget_local_directory_menu_exclude_ids', 'widget_' . $args['widget_id']);
    $widget_depth = get_field('rsm_widget_local_directory_menu_depth', 'widget_' . $args['widget_id']);

    // create an array of the custom fields to pass through to the template $args
    $widget_args = array();

    if( !empty($widget_excludes) ) {

      // convert multi select array into string to pass to $args.
      $id_string = '';
      $i = 0;
      $id_count = count($widget_excludes);
      foreach($widget_excludes as $id) {
        if($i >= 1 && $i != $id_count) {
          $id_string .= ',';
        }
        $id_string .= $id;
        $i++;
      }

      $widget_args['exclude'] = $id_string;
    } 
    elseif( $widget_depth ) {
      $widget_args['depth'] = $widget_depth;
    }

    rsm_get_template( 'rsm-local-directory-menu.php', $widget_args );

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

} // class RSM_LocalDirectoryMenu_Widget

// register RSM_LocalDirectoryMenu_Widget widget
add_action( 'widgets_init', function(){
  register_widget( 'RSM_LocalDirectoryMenu_Widget' );
});