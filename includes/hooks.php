<?php
/**
 * Registered all the Menus
 */
add_action( 'after_setup_theme', 'register_menus_and_logo' );

if ( ! function_exists( 'register_menus_and_logo' ) ) :
	
	function register_menus_and_logo() {

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		register_nav_menus(
			array(
				'menu-1'    		=> esc_html__( 'Primary', 'EvolvingHome' ),
				'main_menu' 		=> esc_html__( 'Main Menu', 'EvolvingHome' ),
			)
		);

	}

endif;

add_filter( 'wp_check_filetype_and_ext', function( $data, $file, $filename, $mimes ) {

	global $wp_version;

	if ( $wp_version !== '4.7.1' ) {
	   return $data;
	}
  
	$filetype = wp_check_filetype( $filename, $mimes );
  
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
}, 10, 4 );
  
function svg_file_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'svg_file_types' );
  
function svg_css() {
	echo '<style type="text/css">
		.attachment-266x266, .thumbnail img {
			width: 100% !important;
			height: auto !important;
		}
	</style>';
}
add_action( 'admin_head', 'svg_css' );
