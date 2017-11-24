<?php
/**
 * Widget: RSM CTA Button Group
 * Ver: 1.0
 *
 * NOTE: These ACF widget fields aren't currently compatible with page builders.
 */

class RSM_ctaButtonGroup_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'rsm_ctaButtonGroup_widget', // Base ID
      __('RSM - CTA Button Group', 'text_domain'), // Name
      array( 'description' => __( 'Displays a button with some text or link below it.', 'text_domain' ), ) // Args
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
    
    $button_style = get_field('rsm_cta_btn_group_choose_style', 'widget_' . $args['widget_id']);
    $button_classes = get_field('rsm_cta_btn_group_extra_btn_classes', 'widget_' . $args['widget_id']);
    $button_text = get_field('rsm_cta_btn_group_btn_text', 'widget_' . $args['widget_id']);
    $button_url = get_field('rsm_cta_btn_group_btn_url', 'widget_' . $args['widget_id']);
    $button_target = get_field('rsm_cta_btn_group_link_target', 'widget_' . $args['widget_id']);
    $text_below = get_field('rsm_cta_btn_group_text_below', 'widget_' . $args['widget_id']);

    if( ($button_url && $button_text) || $text_below):

      echo '<div class="rsm-cta-btn-group">';

        if( $button_url && $button_text ) {
          echo '<a class="btn '.$button_style.' '.$button_classes.'" href="'.$button_url['url'].'" target="'.$button_target.'">'.$button_text.'</a>';
        }

        if( $text_below ) {
          echo '<span class="rsm-cta-btn-group__bottom">'.do_shortcode($text_below).'</span>';
        }

      echo '</div>';

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

} // class RSM_ctaButtonGroup_Widget

// register RSM_ctaButtonGroup_Widget widget
add_action( 'widgets_init', function(){
  register_widget( 'RSM_ctaButtonGroup_Widget' );
});