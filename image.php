<?php

// Redirects all image attachment posts to the parent post or otherwise to the landing page.

global $post;
if ( $post && $post->post_parent ) {
	wp_redirect( esc_url( get_permalink( $post->post_parent ) ), 301 );
	exit;
} else {
	wp_redirect( esc_url( home_url( '/' ) ), 301 );
	exit;
}