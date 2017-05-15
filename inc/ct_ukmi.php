<?php

// Custom Taxonomy: Itag (for Inspirasi)
function ct_itag()  {
	$labels = array(
		'name'                       => 'Tag',
		'singular_name'              => 'Tag',
		'menu_name'                  => 'Tag',
		'all_items'                  => 'All Tags',
		'parent_item'                => 'Parent Tag',
		'parent_item_colon'          => 'Parent Tag:',
		'new_item_name'              => 'New Tag Name',
		'add_new_item'               => 'Add New Tag',
		'edit_item'                  => 'Edit Tag',
		'update_item'                => 'Update Tag',
		'separate_items_with_commas' => 'Separate tags with commas',
		'search_items'               => 'Search tags',
		'add_or_remove_items'        => 'Add or remove tags',
		'choose_from_most_used'      => 'Choose from the most used tags',
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'itag', 'inspirasi', $args );
}
add_action( 'init', 'ct_itag', 0 );

?>