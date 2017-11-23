<?php
//Yoast SEO breadcrumbs must be enabled in the plugin admin
if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
}