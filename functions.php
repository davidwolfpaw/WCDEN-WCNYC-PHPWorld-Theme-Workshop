<?php

// Enqueue Parent and Child Theme Scripts
add_action( 'wp_enqueue_scripts', 'denver_wp_enqueue_scripts' );
function denver_wp_enqueue_scripts() {
	wp_enqueue_style( 'twentyseventeen-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'denver-child-style', get_stylesheet_directory_uri() . '/style.css' );
}
