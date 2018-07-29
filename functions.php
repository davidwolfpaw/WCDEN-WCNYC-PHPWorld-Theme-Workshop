<?php

// Enqueue Parent and Child Theme Scripts
add_action( 'wp_enqueue_scripts', 'denver_wp_enqueue_scripts' );
function denver_wp_enqueue_scripts() {
	wp_enqueue_style( 'twentyseventeen-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'denver-child-style', get_stylesheet_directory_uri() . '/style.css' );
}


// Add Header Widget Area
add_action( 'widgets_init', 'denver_widgets_init' );
function denver_widgets_init() {
	register_sidebar(
		array(
			'id'            => 'header-widget-area',
			'name'          => __( 'Header Widget Area', 'denver' ),
			'description'   => __( 'Add widgets here to appear in your footer.', 'denver' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
		)
	);
}

// Add Header Secondary Meu
add_action( 'after_setup_theme', 'denver_after_setup_theme', 11 );
function denver_after_setup_theme() {
	register_nav_menu( 'header_secondary', __( 'Secondary Header Menu', 'denver' ) );
}
