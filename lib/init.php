<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/roots-translations
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'h2'),
    'intezmeny_navigation' => __('Intézmény Navigation', 'h2'),
    'alvaszavar_navigation' => __('Alvászavar Navigation', 'h2'),
    'gyogyitas_navigation' => __('Gyógyítás és terápia Navigation', 'h2'),
    'alvas_navigation' => __('Alvás Navigation', 'h2'),
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

/**
 * Register sidebars
 */
function roots_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget__body">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Blocks', 'roots'),
    'id'            => 'sidebar-fblocks',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget__body">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget__body">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'roots_widgets_init');
