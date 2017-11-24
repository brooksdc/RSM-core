<?php
/**
 * A few helper functions
 *
 */

//--
// Easy to read array for debugging
//--
if(!function_exists('spill')) {
	function spill($element) {
		echo '<pre>'.print_r($element, true).'</pre>';
	}
}


//---
// obfuscate email address
//---
if(!function_exists('obfuscate')){
	function obfuscate($email){
		
		$link = '';
		foreach(str_split($email) as $letter)
		$link .= '&#' . ord($letter) . ';';
		return $link;
	}
}

//---
// Function to determine if the current page is 3rd level or down.
//---
if(!function_exists('wp_has_grandparent')){
	function wp_has_grandparent($page_id = null) {
	    if(is_null($page_id)) {
	    	$page_id = get_the_ID();
	    }
	    
	    $current_page = get_page( $page_id );

	    if ($current_page->post_parent > 0){
	        //has at least a parent
	        $parent_page = get_page($current_page->post_parent);
	        if ($parent_page->post_parent > 0){
	            return $parent_page->post_parent;
	        }else{
	            return false;
	        }
	    }
	    return false;
	}
}