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



/*************** Metaboxes for Intezmen Custom Post Type *************/

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/CMB2/init.php';
}



add_filter( 'cmb2_meta_boxes', 'ac_intezmeny_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function ac_intezmeny_metaboxes( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_addr_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $meta_boxes['address_metabox'] = array(
        'id'            => 'address_metabox',
        'title'         => __( 'Cím, elérhetőség, nyitvatartás', 'cmb2' ),
        'object_types'  => array( 'intezmeny', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
            array(
                'name'       => __( 'Teljes cím', 'cmb2' ),
                'id'         => $prefix . 'fulladdr',
                'type'       => 'wysiwyg',
                'options'    => array (
                  'media_buttons' => false,
                  'textarea_rows' => get_option('default_post_edit_rows', 5),
                  'teeny' => true, 
                ),
            ),
            array(
                'name' => __( 'Weboldal URL', 'cmb2' ),
                'id'   => $prefix . 'url',
                'type' => 'text_url',
            ),
            array(
                'name' => __( 'Kontakt email', 'cmb2' ),
                'id'   => $prefix . 'email',
                'type' => 'text_email',
                // 'repeatable' => true,
            ),
            array(
                'name' => __( 'Telefon', 'cmb2' ),
                'id'   => $prefix . 'telefon',
                'type' => 'text',
                // 'repeatable' => true,
            ),
            array(
                'name'       => __( 'Nyitvatartás', 'cmb2' ),
                'id'         => $prefix . 'nyitva',
                'type'       => 'wysiwyg',
                'options'    => array (
                  'media_buttons' => false,
                  'textarea_rows' => get_option('default_post_edit_rows', 5),
                  'teeny' => true, 
                ),
            ),
        ),
    );

    // Add other metaboxes as needed


    $prefix = '_data_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $meta_boxes['data_metabox'] = array(
        'id'            => 'data_metabox',
        'title'         => __( 'További részletek', 'cmb2' ),
        'object_types'  => array( 'intezmeny', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
          array(
              'id'          => $prefix . 'accordion',
              'type'        => 'group',
              'description' => __( 'Create an accordion with collapsible elements', 'cmb' ),
              'options'     => array(
                  'group_title'   => __( 'Collapsible element {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                  'add_button'    => __( 'Add another collapsible element', 'cmb' ),
                  'remove_button' => __( 'Remove element', 'cmb' ),
                  'sortable'      => true, // beta
              ),
              // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
              'fields'      => array(
                  array(
                      'name' => 'Collapsible Title',
                      'id'   => 'title',
                      'type' => 'text',
                      // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                  ),
                  array(
                      'name' => 'Collapsible content',
                      'description' => 'Add any content you want',
                      'id'   => 'content',
                      'type' => 'wysiwyg',
                      'options'    => array (
                        'media_buttons' => false,
                        'textarea_rows' => get_option('default_post_edit_rows', 5),
                        //'teeny' => true, 
                      ),
                  ),

              ),
          ), /* end of group def*/



        ),
    );




    return $meta_boxes;
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