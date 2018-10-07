<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mycooltheme_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/mycooltheme
   */
  load_theme_textdomain( 'mycooltheme' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   */
  add_theme_support( 'title-tag' );

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(
    array(
      'top'    => __( 'Top Menu', 'mycooltheme' ),
      'social' => __( 'Social Links Menu', 'mycooltheme' ),
    )
  );

}
add_action( 'after_setup_theme', 'mycooltheme_setup' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since My Cool Theme 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function mycooltheme_excerpt_more( $link ) {
  if ( is_admin() ) {
    return $link;
  }

  $link = sprintf(
    '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
    esc_url( get_permalink( get_the_ID() ) ),
    /* translators: %s: Name of current post */
    sprintf( __( 'Continue reading<span class="sr-only"> "%s"</span>', 'mycooltheme' ), get_the_title( get_the_ID() ) )
  );
  return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'mycooltheme_excerpt_more' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function mycooltheme_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
  }
}
add_action( 'wp_head', 'mycooltheme_pingback_header' );


/**
 * Enqueue scripts and styles.
 */
function mycooltheme_scripts() {
  wp_enqueue_style( 'mycooltheme-style', get_theme_file_uri('dist/app.css?2') );
  wp_enqueue_script( 'mycooltheme-global', get_theme_file_uri( 'dist/app.bundle.js' ) );
  // wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:200i,400', false );
}
add_action( 'wp_enqueue_scripts', 'mycooltheme_scripts' );
/*
   * This theme styles the visual editor to resemble the theme style,
   * specifically font, colors, icons, and column width.
   */
  add_editor_style( array( 'dist/editor.css' ) );

/**
 * WYSIWYG Content Classes
 */
// Callback function to insert 'styleselect' into the $buttons array
// function my_mce_buttons( $buttons ) {
//   array_unshift( $buttons, 'styleselect' );
//   return $buttons;
// }
// Register our callback to the appropriate filter
// add_filter( 'mce_buttons_2', 'my_mce_buttons' );

// Callback function to filter the MCE settings
// function my_mce_before_init_insert_formats( $init_array ) {
//   // Define the style_formats array
//   $style_formats = array(
//     // Each array child is a format with it's own settings
//     array(
//       'title' => 'Larger Body Text',
//       'block' => 'span',
//       'classes' => 'txt-lead',
//       'wrapper' => true,
//     ),

//     array(
//       'title' => 'All Caps',
//       'block' => 'span',
//       'classes' => 'caps',
//       'wrapper' => true,
//     ),

//     array(
//       'title' => 'Horizontal Dividing Line',
//       'block' => 'hr',
//       'classes' => 'rule',
//       'wrapper' => false,
//     ),

//     array(
//       'title' => 'Expanding Text block',
//       'block' => 'div',
//       'classes' => 'expandy',
//       'wrapper' => true,
//     ),

//   );
//   // Insert the array, JSON ENCODED, into 'style_formats'
//   $init_array['style_formats'] = json_encode( $style_formats );
//   return $init_array;
// }
// Attach callback to 'tiny_mce_before_init'
// add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

// add_image_size( 'keynote-thumbnail', 180, 180, array( 'center', 'center' ) );

