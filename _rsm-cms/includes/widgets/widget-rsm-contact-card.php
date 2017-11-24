<?php
/**
 * Widget: RSM Contact Card
 * Ver: 1.0
 *
 * NOTE: These ACF widget fields aren't currently compatible with page builders.
 */

class RSM_ContactCard_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'rsm_ContactCard_widget', // Base ID
      __('RSM - Contact Card', 'text_domain'), // Name
      array( 'description' => __( 'Use this contact card to provide easy contact details for your business.', 'text_domain' ), ) // Args
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
    $contact_card_logo = get_field('rsm_widget_contact_card_logo', 'widget_' . $args['widget_id']);
    $contact_card_includes = get_field('rsm_widget_contact_card_includes', 'widget_' . $args['widget_id']);
    $contact_card_arbitrary_content = get_field('rsm_widget_contact_card_arbitrary_content', 'widget_' . $args['widget_id']);
    $contact_card_custom_class = get_field('rsm_widget_contact_card_custom_class', 'widget_' . $args['widget_id']);
    // data for includes
    $phone = get_field('primary_phone_number','option');
    $email_address = get_field('primary_email_address','option');
    $address_company_name = get_field('address_company_name', 'option');
    $address_street = get_field('address_street', 'option');
    $address_city = get_field('address_city', 'option');
    $address_region = get_field('address_region', 'option');
    $address_country = get_field('address_country', 'option');
    $address_postal = get_field('address_postal', 'option');
    $business_hours = get_field('business_hours', 'option');


    if($contact_card_includes || $contact_card_arbitrary_content):

      if($contact_card_custom_class) {
        $custom_class = $contact_card_custom_class;
      } else {
        $custom_class = null;
      }

      echo '<div class="rsm-contact-card '.$custom_class.'">';

        if( $contact_card_logo ) {
          echo wp_get_attachment_image($contact_card_logo, 'fullsize', false, array( 'class' => 'rsm-ontact-card__logo' ) );
        }

        if($contact_card_includes) {
          echo '<ul class="rsm-contact-card__details">';
          foreach($contact_card_includes as $data) {
            
            // phone
            if( $data == 'phone' && !empty($phone) ) {
              echo '<li class="phone"><i class="fa fa-phone"></i> '.$phone.'</li>';
            }

            // address
            if( $data == 'address' && !empty($address_street) ) {
              echo '<li class="address"><i class="fa fa-map-marker"></i> ';
              ?>
                <span class="address-group">
                  <?php if($address_street) { ?>
                    <span class="address-street"><?php _e($address_street); ?></span>
                  <?php } ?>
                  <?php if($address_city) { ?>
                    <span class="address-city"><?php _e($address_city); ?></span>
                  <?php } ?>
                  <?php if($address_region) { ?>
                    <span class="address-region"><?php _e($address_region); ?></span>
                  <?php } ?>
                  <?php if($address_country) { ?>
                    <span class="address-country"><?php _e($address_country); ?></span>
                  <?php } ?>
                  <?php if($address_postal) { ?>
                    <span class="address-postal"><?php _e($address_postal); ?></span>
                  <?php } ?>
                </span>
                <?php
              echo '</li>';
            }

            // email
            if( $data == 'email' && !empty($email_address) ) {
              echo '<li class="email"><i class="fa fa-envelope"></i>';
                
                $obfuscated_email = '';
                foreach(str_split($email_address) as $letter) {
                  $obfuscated_email .= '&#' . ord($letter) . ';';
                }
                echo $obfuscated_email;

              echo '</li>';
            }

            // hours
            if( $data == 'hours' && !empty($business_hours) ) {
              echo '<li class="hours">';
                echo '<ul class="key-value-list list--striped">';
                foreach($business_hours as $hours){
                  echo '<li>';
                    echo '<span class="key">'.$hours['hours_label'].'</span>';
                    echo '<span class="value">'.$hours['hours_time'].'</span>';
                  echo '</li>';
                }
                echo '</ul>';
              echo '</li>';
            }

          }
          echo '</ul>';
        }

        if( $contact_card_arbitrary_content ) {
          echo '<div class="rsm-contact-card__content">'.$contact_card_arbitrary_content.'</div>';
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

} // class RSM_ContactCard_Widget

// register RSM_ContactCard_Widget widget
add_action( 'widgets_init', function(){
  register_widget( 'RSM_ContactCard_Widget' );
});