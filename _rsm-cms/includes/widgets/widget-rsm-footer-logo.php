<?php
/**
 * Widget: RSM Footer Logo
 * Ver: 1.0
 *
 * NOTE: These ACF widget fields aren't currently compatible with page builders.
 */

class RSM_FooterLogo_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'rsm_FooterLogo_widget', // Base ID
      __('RSM - Footer Logo', 'text_domain'), // Name
      array( 'description' => __( 'The logo to be used in the footer of the site.', 'text_domain' ), ) // Args
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
    $footer_logo = get_field('rsm_widget_footer_logo_image', 'widget_' . $args['widget_id']);
    $footer_tagline = get_field('rsm_widget_footer_logo_tagline', 'widget_' . $args['widget_id']);

    if($footer_logo || $footer_tagline):

      echo '<div class="site-footer__logo">';

        if( $footer_logo ) {
          echo wp_get_attachment_image($footer_logo, 'fullsize', false, array( 'class' => 'site-footer__logo-img' ) );
        }

        if( $footer_tagline ) {
          echo '<div class="site-footer__logo-tagline">'.$footer_tagline.'</div>';
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

} // class RSM_FooterLogo_Widget

// register RSM_FooterLogo_Widget widget
add_action( 'widgets_init', function(){
  register_widget( 'RSM_FooterLogo_Widget' );
});