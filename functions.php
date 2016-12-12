<?php


// //INCLUDE PARENT STYLESHEET
// add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

// function enqueue_parent_styles() {
//    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
// }


//CHANGE LOGO ON LOGIN PAGE
function my_loginlogo() {
  echo '<style type="text/css">
    h1 a {
      background-image: url(' . get_stylesheet_directory_uri() . '/images/asa_logo.png) !important;
    }
  </style>';
}
add_action('login_head', 'my_loginlogo');



// REMOVE PARENT THEMES FONTS
function unhook_parent_googlefonts() {

  wp_dequeue_style( 'twentythirteen-fonts' );
  wp_deregister_style( 'twentythirteen-fonts' );

}
add_action( 'wp_enqueue_scripts', 'unhook_parent_googlefonts', 20 );


// ADD BITTER AND LATO FONTS
function wpb_add_google_fonts() {
wp_enqueue_style( 'wpb-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i|Playfair+Display', false ); 
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


add_action('wp_enqueue_scripts', 'africangifted_enqueue_scripts');

function africangifted_enqueue_scripts() {
  // Enqueue Sticky Header scripts
  wp_enqueue_script('waypoints', get_stylesheet_directory_uri() . '/js/waypoints.min.js', array('jquery'));
  wp_enqueue_script('waypoints-sticky', get_stylesheet_directory_uri() . '/js/sticky.min.js', array('waypoints'));
  wp_enqueue_script('africangifted-functions', get_stylesheet_directory_uri() . '/js/functions.js', array('jquery', 'waypoints' ));
};
