<?php
/**
 * Custom functions
 */



/***** Adding excerpt ******/
add_action( 'init', 'ac_add_excerpts' );
function ac_add_excerpts() {
  add_post_type_support( 'page', 'excerpt' );
  add_post_type_support( 'intezmeny', 'excerpt' );
   
}



/********* Custom Post Types for Intezmeny ****************/

function create_intezmeny() {
  $labels = array(
    'name' => 'Intézmények',
    'singular_name' => 'Intézmény',
    'add_new' => 'Új hozzáadása',
    'add_new_item' => 'Új intézmény felvétele',
    'edit_item' => 'Intézmény szerkesztése',
    'new_item' => 'Új intézmény',
    'all_items' => 'Összes intézmény',
    'view_item' => 'Intézmény megtekintése',
    'search_items' => 'Intézmények keresése',
    'not_found' =>  'Nincs találat',
    'not_found_in_trash' => 'Nincs találat a lomtárban', 
    'parent_item_colon' => 'parent_item_colon',
    'menu_name' => 'Intézmények'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'intezmeny' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'yarpp_support' => true,
    'supports' => array( 'title', 'editor', 'thumbnail','comments' )
  ); 

  register_post_type( 'intezmeny', $args );
}
add_action( 'init', 'create_intezmeny' ); 

/********* END OF Custom Post Types for Intézmény Management ****************/


/************* Custom taxonomy for Main Content mnagement *********/


add_action( 'init', 'create_torzs_csoport', 0 );
function create_torzs_csoport() {
  $labels = array(
    'name'              => 'Törzs csoportok',
    'singular_name'     => 'Törzs csoport',
    'menu_name'         => 'Törzs csoportok',
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'torzs-csoport' ),
  );

  register_taxonomy( 'torzs-csoport', array( 'page' ), $args );
}







add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'CMB/init.php';

}




// add tag & category support to pages
function ac_tagcat_support_all() {
  register_taxonomy_for_object_type('post_tag', 'page');
  register_taxonomy_for_object_type('category', 'page');
}

// ensure all tags are included in queries
function ac_tagcat_support_query($query) {
  if ( ( $query->get('tag') || $query->get('cat') ) &&  $query->is_main_query() ){
    $query->set('post_type', array('post','page'));
    //$query->set('posts_per_page', -1);
    remove_all_actions ( '__after_loop');
  } 
}

// tag hooks
add_action('init', 'ac_tagcat_support_all');
add_action('pre_get_posts', 'ac_tagcat_support_query');


// function alter_treat_cat_query($query) {
//     global $wp_query;
//     if ( $wp_query->get('kezeles-csoport')  &&  $wp_query->is_main_query() ){
//       $wp_query->set('posts_per_page', -1);
//       $wp_query->set('post_type', 'kezeles');
//       remove_all_actions ( '__after_loop');
//     } 
// }
// add_action('pre_get_posts','alter_treat_cat_query');



# Deregister style files
function ac_DequeueYarppStyle()
{
  wp_dequeue_style('yarppRelatedCss');
  wp_deregister_style('yarppRelatedCss');
}
add_action('wp_footer', ac_DequeueYarppStyle);

function ac_remove_scripts () {
  if(!is_admin()){ 
    wp_deregister_script('bootstrap-shortcodes-tooltip');
    wp_deregister_script('bootstrap-shortcodes-popover');
  }
}
add_action('wp_print_scripts', 'ac_remove_scripts', 11);