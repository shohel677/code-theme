<?php

function _themename_assets() {
    wp_enqueue_style( '_themename-bootstylesheet', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
	 include(get_template_directory() . '/lib/inline-css.php');
    wp_add_inline_style( '_themename-stylesheet', $inline_styles );
	wp_enqueue_style( '_themename-menustylesheet', get_template_directory_uri() . '/assets/css/meanmenu.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( '_themename-stylesheet', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'designx', get_stylesheet_uri() );

	
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( '_themename-menuscripts', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( '_themename-scripts', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( '_themename-bootscripts', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true );

}
add_action('wp_enqueue_scripts', '_themename_assets');
?>