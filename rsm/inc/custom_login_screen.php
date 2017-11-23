<?php
/*
 * Change login logo and styles
 */
// change logo CSS
function my_login_logo() { ?>
    <style type="text/css">
        body.login {
            background-color: #f7f7f7;  
        }
        body.wp-core-ui .button-primary {
          background: #222;
          border-color: #222;
          box-shadow: 0 1px 0 #000;
          color: #ffffff;
          text-decoration: none;
          text-shadow: 0 -1px 1px #000, 1px 0 1px #000, 0 1px 1px #000, -1px 0 1px #000;
        }
        body.wp-core-ui .button-primary.focus,
        body.wp-core-ui .button-primary.hover,
        body.wp-core-ui .button-primary:focus,
        body.wp-core-ui .button-primary:hover {
            background: #444;
            border-color: #444;
            color: #ffffff;
        }
        
        body.login #backtoblog a,
        body.login #nav a {
          color: #000;
        }
        body.login #backtoblog a:hover,
        body.login #nav a:hover,
        body.login h1 a:hover {
          color: #333;
        }
        
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/prevail-logo-icon.svg);
            background-size: 100% auto;
            height: 85px;
            padding-bottom: 0;
            width: 85px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// change the logo link and title
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Double Dare Design';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );