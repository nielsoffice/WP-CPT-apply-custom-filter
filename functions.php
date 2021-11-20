<?php 

// Here you will understand how Custom filter or filte works on you WordPress website
// Default data that we are trying to add resquest
// You can create a custom page on your theme file to view this custom function result
// for instance page-client.php
$getResult =  request_filter();
var_dump($getResult);

function request_filter( )
{
    
 $array = apply_filters('request_filter_name',
  
     array(
       
        'title'   => 'My Title',
        'content' => 'This is the content'
     )   
  
   );    

   return $array; 

}

echo "<br/ >";

$getResult = update_title(  $getResult );
var_dump($getResult);

// Filter function call back make updates
add_action('request_filter_name', 'update_title');
function update_title(  $getResult )
{

 $getResult['title'] = 'The New Title';
 return $getResult;

}


// Custom post type base apply filter result
// Register Custom Post Type Event
function create_event_custom_post_type() {

	$menu_name   = apply_filters('nielsoffice_apply_custom_filter_hook_menu_name',  'Events');

	$labels = array(
		'name' => _x( 'events', 'Post Type General Name', 'event' ),
		'singular_name' => _x( 'Event', 'Post Type Singular Name', 'event' ),
		'menu_name' => _x( $menu_name , 'Admin Menu text', 'event' ),
		'name_admin_bar' => _x( 'Event', 'Add New on Toolbar', 'event' ),
		'archives' => __( 'Event Archives', 'event' ),
		'attributes' => __( 'Event Attributes', 'event' ),
		'parent_item_colon' => __( 'Parent Event:', 'event' ),
		'all_items' => __( 'All events', 'event' ),
		'add_new_item' => __( 'Add New Event', 'event' ),
		'add_new' => __( 'Add New', 'event' ),
		'new_item' => __( 'New Event', 'event' ),
		'edit_item' => __( 'Edit Event', 'event' ),
		'update_item' => __( 'Update Event', 'event' ),
		'view_item' => __( 'View Event', 'event' ),
		'view_items' => __( 'View events', 'event' ),
		'search_items' => __( 'Search Event', 'event' ),
		'not_found' => __( 'Not found', 'event' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'event' ),
		'featured_image' => __( 'Featured Image', 'event' ),
		'set_featured_image' => __( 'Set featured image', 'event' ),
		'remove_featured_image' => __( 'Remove featured image', 'event' ),
		'use_featured_image' => __( 'Use as featured image', 'event' ),
		'insert_into_item' => __( 'Insert into Event', 'event' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Event', 'event' ),
		'items_list' => __( 'events list', 'event' ),
		'items_list_navigation' => __( 'events list navigation', 'event' ),
		'filter_items_list' => __( 'Filter events list', 'event' ),
	);

	$args =  apply_filters('nielsoffice_apply_custom_filter_hook_arguments', array(
		'label' => __( 'Event', 'event' ),
		'description' => __( 'This is events post type', 'event' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-customizer',
		'supports' => array('title', 'thumbnail', 'revisions'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	  )

	);

	register_post_type( 'event', $args );

}
add_action( 'init', 'create_event_custom_post_type', 0 );


// This how you will use and learn hook filter or custom filter in wordpress
add_action('nielsoffice_apply_custom_filter_hook_arguments', 'change_icon_post_type');
function change_icon_post_type( $args )
{
  
	 $args['menu_icon'] = 'dashicons-admin-comments';
	 return $args;

}

// This how you will use and learn hook filter or custom filter in wordpress
add_action('nielsoffice_apply_custom_filter_hook_menu_name', 'update_menu_name_filter_hook');
function update_menu_name_filter_hook( $menu_name ) 
{ 
	$menu_name = 'Many Events'; // From Events to Many Events
	return $menu_name;
}

