<?php
function internship_enqueue() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Roboto&display=swap');
  wp_enqueue_style('bootstrap-style', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-script', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', NULL, '5.3.0', true);
  wp_enqueue_style('bootstrap-icons', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css');

  wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', NULL, '1.8.1', "all");
  wp_enqueue_style('slick-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', NULL, '1.8.1', "all");
  wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), "1.8.1", true);

  wp_enqueue_style('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', NULL, '5.0', "all");
  wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array('jquery'), "5.0", true);
  
  wp_enqueue_style('main-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . "/style.css"), "all");
  
  wp_enqueue_script('main-script', get_template_directory_uri() . '/main.js', NULL, filemtime(get_template_directory() . "/main.js"), true);
}

add_action('wp_enqueue_scripts', 'internship_enqueue');

function internship_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'internship_custom_logo_setup' );

// Menus
if ( ! function_exists( 'internship_register_nav_menu' ) ) {

	function internship_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => esc_html(__( 'Primary Menu', 'digital-agency' )),
	    	'footer_menu_1'  => esc_html(__( 'Footer Menu One', 'digital-agency' )),
            'footer_menu_2'  => esc_html(__( 'Footer Menu Two', 'digital-agency' )),
            'footer_social_icons'  => esc_html(__( 'Footer Social Icons', 'digital-agency' ))
		) );
	}
	add_action( 'after_setup_theme', 'internship_register_nav_menu', 0 );
}

function internship_features() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
  }
  
  add_action('after_setup_theme', 'internship_features');