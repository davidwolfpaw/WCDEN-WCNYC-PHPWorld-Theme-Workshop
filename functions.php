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


add_action( 'customize_register', 'denver_customize_register' );
function denver_customize_register( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_section(
		'section_archives', array(
			'title' => __( 'Archives', 'denver' ),
		)
	);
	$wp_customize->add_setting(
		'show_excerpts_in_archives', array(
			'type'      => 'theme_mod',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_excerpts_in_archives_control',
			array(
				'label'    => __( 'Only show excerpts on archive pages', 'denver' ),
				'section'  => 'section_archives',
				'settings' => 'show_excerpts_in_archives',
				'type'     => 'checkbox',
			)
		)
	);
}

// Adds Gutenberg Theme Support
// https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
add_action( 'after_setup_theme', 'denver_setup_theme_supported_features' );
function denver_setup_theme_supported_features() {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => __( 'strong magenta', 'denver' ),
				'slug'  => 'strong-magenta',
				'color' => '#a156b4',
			),
			array(
				'name'  => __( 'light grayish magenta', 'denver' ),
				'slug'  => 'light-grayish-magenta',
				'color' => '#d0a5db',
			),
			array(
				'name'  => __( 'very light gray', 'denver' ),
				'slug'  => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name'  => __( 'very dark gray', 'denver' ),
				'slug'  => 'very-dark-gray',
				'color' => '#444',
			),
		)
	);
}


// Add Gutenberg Wide Image Theme Support
add_theme_support( 'align-wide' );

// Add Gutenberg Block Style Theme Support
add_theme_support( 'wp-block-styles' );
