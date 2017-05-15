<?php

	/* ======================== START Custom Capabilities ======================= */
	
	/* Give Administrators and Editors All Agenda Capabilities
	function add_agenda_caps_to_admin() {
	  $caps_agenda = array(
		'read_post' => 'read_agenda',
		'read_private_posts' => 'read_private_agenda',
		'edit_posts' => 'edit_agenda',
		'edit_private_posts' => 'edit_private_agenda',
		'edit_published_posts' => 'edit_published_agenda',
		'edit_others_posts' => 'edit_others_agenda',
		'publish_posts' => 'publish_agenda',
		'delete_posts' => 'delete_agenda',
		'delete_posts' => 'delete_private_agenda',
		'delete_published_posts' => 'delete_published_agenda',
		'delete_others_posts' => 'delete_others_agenda',
	  );
	  $roles = array(
		get_role( 'administrator' ),
		get_role( 'editor' ),
	  );
	  foreach ($roles as $role) {
		foreach ($caps_agenda as $cap_agenda) {
		  $role->remove_cap( $cap_agenda );
		}
	  }
	}
	add_action( 'admin_init', 'add_agenda_caps_to_admin' );
	
	
	/ * ======================== END Custom Capabilities ======================= */

?>