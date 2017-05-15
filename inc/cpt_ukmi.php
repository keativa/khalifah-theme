<?php

// CPT: Gallery
function cpt_gallery() {
	$labels = array(
		'name'                => 'Galleries',
		'singular_name'       => 'Gallery',
		'menu_name'           => 'Galeri',
		'parent_item_colon'   => 'Parent Gallery:',
		'all_items'           => 'All Galleries',
		'view_item'           => 'View Gallery',
		'add_new_item'        => 'Add New Gallery',
		'add_new'             => 'New Gallery',
		'edit_item'           => 'Edit Gallery',
		'update_item'         => 'Update Gallery',
		'search_items'        => 'Search Galleries',
		'not_found'           => 'No galleries found',
		'not_found_in_trash'  => 'No galleries found in Trash',
	);

	$args = array(
		'label'               => 'gallery',
		'description'         => 'Gallery information pages',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '/wp-content/themes/khalifah-theme/images/cpt_icon.png',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	register_post_type( 'gallery', $args );
}
add_action( 'init', 'cpt_gallery', 0 );


?>