<?php
/*
Plugin Name: Add Shortlink to Posts
Plugin URI: http://philipjohn.co.uk
Description: Adds a link to the shortlink for each post below the content.
Version: 0.3.2
Author: Philip John
Author URI: http://philipjohn.co.uk
License: GPL2
*/

/*
 * Localise the plugin
 */
load_plugin_textdomain('astp');

/*
 * Adds the shortlink on the end of posts
 */
function astp_add_shortlink($content){
	$shortlink = wp_get_shortlink();
	$shortlink = (!empty($shortlink) ? $shortlink : get_permalink());
    $content = $content.'<p class="the_shortlink">'.__("Shortlink for this post:", 'astp').' <a rel="shortlink" href="'.$shortlink.'" title="'.get_the_title().'">'.$shortlink.'</p>';
    return $content;
}
add_filter( "the_content", "astp_add_shortlink", 11);

?>