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



function child_remove_parent_function() {
    remove_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );
}
add_action( 'wp_loaded', 'child_remove_parent_function' );

/**
 * REPLACE TWENTYTHIRTEEN SCRIPTS
 *
 * @since Twenty Thirteen 1.0
 */
function africangifted_scripts_styles() {
  /*
   * Adds JavaScript to pages with the comment form to support
   * sites with threaded comments (when in use).
   */
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  // Loads JavaScript file with functionality specific to Twenty Thirteen.
  wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );

  // Add Genericons font, used in the main stylesheet.
  wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.03' );

  // Loads our main stylesheet.
  wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

  // Loads the Internet Explorer specific stylesheet.
  wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
  wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'africangifted_scripts_styles' );


// YEAR SHORTCODE
function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');
