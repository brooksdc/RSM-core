<?php
/*
Shortcode TinyMCE Plugin
A WordPress plugin that will add a button to the tinyMCE editor to add shortcodes

Ref 1: https://paulund.co.uk/add-button-tinymce-shortcodes
Ref 2: http://itechtuts.com/add-button-show-shortcode-in-tinymce-editor/ (has updated JS)
*/

new Shortcode_Tinymce();
class Shortcode_Tinymce
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'rsm_shortcode_button'));
        add_action('admin_footer', array($this, 'rsm_get_shortcodes'));
    }

    /**
     * Create a shortcode button for tinymce
     *
     * @return [type] [description]
     */
    public function rsm_shortcode_button()
    {
        if( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
        {
            add_filter( 'mce_external_plugins', array($this, 'rsm_add_buttons' ));
            add_filter( 'mce_buttons', array($this, 'rsm_register_buttons' ));
        }
    }

    /**
     * Add new Javascript to the plugin scrippt array
     *
     * @param  Array $plugin_array - Array of scripts
     *
     * @return Array
     */
    public function rsm_add_buttons( $plugin_array )
    {
        $path = plugin_dir_url( __FILE__ ) . '../../assets/js/rsm-shortcode-button-tinyMCE.js';
        $plugin_array['rsmshortcodes'] = $path;
        
        return $plugin_array;
    }

    /**
     * Add new button to tinymce
     *
     * @param  Array $buttons - Array of buttons
     *
     * @return Array
     */
    public function rsm_register_buttons( $buttons )
    {
        array_push( $buttons, 'separator', 'rsmshortcodes' );
        return $buttons;
    }

    /**
     * Add shortcode JS to the page
     *
     * @return HTML
     */
    public function rsm_get_shortcodes()
    {
        //global $shortcode_tags;
        $rsm_shortcode_tags = array();
        $rsm_shortcode_tags['test'] = 'test';

        echo '<script type="text/javascript">';

        echo 'var shortcodes_button = new Array();';

        $count = 0;

        foreach($rsm_shortcode_tags as $tag => $code)
        {
            echo "shortcodes_button[{$count}] = '{$tag}';";
            $count++;
        }

        echo '</script>';
    }
}
?>