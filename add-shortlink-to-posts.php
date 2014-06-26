<?php
/*
Plugin Name: Add Shortlink to Posts
Plugin URI: http://philipjohn.co.uk
Description: Adds a link to the shortlink for each post below the content.
Version: 0.3.3
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

	// Don't add shortlink to excerpts
	if ( ! is_single() )
		return $content;

	// Generate the shortlink
	$shortlink = wp_get_shortlink();
	$shortlink = ( ! empty( $shortlink ) ? $shortlink : get_permalink() );

	// Generate the html
    $html = sprintf(
		'<p class="the_shortlink">%s <a rel="shortlink" href="%s" title="%s">%s</p>',
		__("Shortlink for this post:", 'astp'),
		$shortlink,
		get_the_title(),
		$shortlink
	);

	// Add to the content
    return $content . $html;

}
add_filter( "the_content", "astp_add_shortlink", 11 );

?>