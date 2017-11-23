<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package rsm_core_
 */

global $post;


?><!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" <?php language_attributes(); ?> class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
<!-- switch no-js if browser has JS -->
<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>


<?php wp_head(); ?>


</head>