<?php
/**
 * Theme functions and definitions
 *
 * @package EvolvingHome
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */

 /**
 * Theme functions and definitions
 *
 * @package ENVOLINGHOME
 */
define( 'ENVOLINGHOME', '1.0.0' );
define( 'ENVOLINGHOME_DIR', trailingslashit( get_stylesheet_directory() ) );


/**
 * Include All Hooks.
 * @since 1.0.0
 */
require_once ENVOLINGHOME_DIR . 'includes/hooks.php';

/**
 * Include All Shortcodes.
 * @since 1.0.0
 */
require_once ENVOLINGHOME_DIR . 'includes/shortcodes.php';

/**
 * Include All widgets.
 * @since 1.0.0
 */
require_once ENVOLINGHOME_DIR . 'includes/widgets.php';

/**
 * Include all Custom Post Types.
 * @since 1.0.0
 */

class custom_post_type_Functionality {

	public function __construct(){

		// Custom Post Types.
		require_once ENVOLINGHOME_DIR . 'includes/custom-posts.php';
	}

}
// Plugin init
$custom_post_type_functionality = new custom_post_type_Functionality();

add_action( 'wp_enqueue_scripts', 'evolving_home_enqueue_scripts', 20 );

function evolving_home_enqueue_scripts() {

	$version = wp_get_theme()->get( 'Version' );

	// Enqueue CSS Style Sheets
	wp_enqueue_style(
		'evolving-home-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		$version
	);

	wp_enqueue_style( 'evolving-home-all-styles', get_stylesheet_directory_uri() . '/main.css',
		ENVOLINGHOME
	);

	wp_register_script( 'evolving-home-slick', get_stylesheet_directory_uri() . '/slick.min.js',
		array( 'jquery' ),
		ENVOLINGHOME,
		false
	);

	wp_enqueue_script( 'evolving-home-font-awesome-cdn', 'https://kit.fontawesome.com/7d730d8aef.js', 
		array( 'jquery' ),
		ENVOLINGHOME, 
		false 
	);

	wp_enqueue_script( 'evolving-home-jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
		array( 'jquery' ),
		ENVOLINGHOME,
		false
	);

	wp_enqueue_script( 'evolving-home-jquery-1.12.4', 'https://code.jquery.com/jquery-1.12.4.js',
		array( 'jquery' ),
		ENVOLINGHOME,
		false
	);

	wp_enqueue_script( 'evolving-home-custom', get_stylesheet_directory_uri() . '/custom.js',
		array( 
			'jquery',
			'evolving-home-slick'
		),
		ENVOLINGHOME,
		false
	);

}
