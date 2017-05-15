<?php
	
	
	// Slightly Modified Options Framework ==========================
	require_once ('admin/index.php');
	
	// freshizer, a timthumb alternative ==========================
	include ( TEMPLATEPATH . '/inc/freshizer.php');
	
	// Custom Post Type =============================================
	include ( TEMPLATEPATH . '/inc/cpt_ukmi.php' );
	
	// Custom Taxonomy ==============================================
	//include ( TEMPLATEPATH . '/inc/ct_ukmi.php' );
	
	// Re-define meta box path and URL ==============================
	define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
	define( 'RWMB_DIR', trailingslashit( TEMPLATEPATH . '/meta-box' ) );
	require_once RWMB_DIR . 'meta-box.php';
	include ( TEMPLATEPATH . '/inc/cmb_ukmi.php' );
	
	// Custom Roles for Each Post Types =============================
	include ( TEMPLATEPATH . '/inc/custom_roles_ukmi.php' );
	
	// Register Navigation Menus
	function k_nav() {
		$locations = array(
			'top_menu' => 'Top Menu',
		);
	
		register_nav_menus( $locations );
	}
	add_action( 'init', 'k_nav' );
	// Remove Some Class and ID from Menu
	add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
	add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
	add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
	function my_css_attributes_filter($var) {
	  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
	}
	
	// Disable plugin updates notice
	remove_action( 'load-update-core.php', 'wp_update_plugins' );
	add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
	
	// Hide WP Logo in Admin Bar
	function remome_wp_logo_in_admin_bar() {
	  global $wp_admin_bar;
	  $wp_admin_bar->remove_menu('wp-logo');
	  $wp_admin_bar->remove_menu('comments');
	}
	add_action('wp_before_admin_bar_render', 'remome_wp_logo_in_admin_bar', 0);
	
	// Remove Menu from administration pages
	function remove_menu_from_admin() {
		remove_menu_page('edit-comments.php');
	}
	add_action( 'admin_menu', 'remove_menu_from_admin' );
	
	// Remove SubMenu from administration pages
	function remove_submenu_from_admin() {
	  $page = remove_submenu_page( 'themes.php', 'widgets.php' );
	  $page = remove_submenu_page( 'index.php', 'update-core.php' );
	}
	add_action( 'admin_menu', 'remove_submenu_from_admin', 999 );

	/* disable default dashboard widgets */
	function disable_default_dashboard_widgets() {
		remove_meta_box('dashboard_right_now', 'dashboard', 'core');
		remove_meta_box('dashboard_activity', 'dashboard', 'core');
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
		remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
		remove_meta_box('dashboard_plugins', 'dashboard', 'core');
		remove_meta_box('dashboard_primary', 'dashboard', 'core');
		remove_meta_box('dashboard_secondary', 'dashboard', 'core');
	}
	add_action('admin_menu', 'disable_default_dashboard_widgets');
	
	/* add custom message to dashboard */
	function keativa_dashboard_messages() {
		echo "<p>Administrasi website resmi Khalifah Umroh & Tour.</p>";
	}
	// Create the function use in the action hook
	function keativa_add_dashboard_widgets() {
		wp_add_dashboard_widget('example_dashboard_widget', 'Welcome!', 'keativa_dashboard_messages');
	}
	// Hoook into the 'wp_dashboard_setup' action to register our other functions
	add_action('wp_dashboard_setup', 'keativa_add_dashboard_widgets' );
	
	/* Hide admin help tab and welcome panel */
	function hide_help() {
		echo '<style type="text/css">
				#contextual-help-link-wrap, #welcome-panel { display: none !important; }
			  </style>';
	}
	add_action('admin_head', 'hide_help');

  
  // custom is_post_type, use this in template files : if (is_post_type('post_type')){ =========MASUKKAN KONTEN DISINI=========== }
  function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
  }
	
	/*
	*
	* Add TinyMCE editor to the "Biographical Info" field in a user profile
	*
	*/
	function kpl_user_bio_visual_editor( $user ) {
		// Requires WP 3.3+ and author level capabilities
		if ( function_exists('wp_editor') && current_user_can('publish_posts') ):
		?>
		<script type="text/javascript">
		(function($){
			// Remove the textarea before displaying visual editor
			$('#description').parents('tr').remove();
		})(jQuery);
		</script>
	 
		<table class="form-table">
			<tr>
				<th><label for="description"><?php _e('Biographical Info'); ?></label></th>
				<td>
					<?php
					$description = get_user_meta( $user->ID, 'description', true);
					wp_editor( $description, 'description' );
					?>
					<p class="description"><?php _e('Isi profile lengkap disini.'); ?></p>
				</td>
			</tr>
		</table>
		<?php
		endif;
	}
	add_action('show_user_profile', 'kpl_user_bio_visual_editor');
	add_action('edit_user_profile', 'kpl_user_bio_visual_editor');
	// Remove textarea filters from description field
	function kpl_user_bio_visual_editor_unfiltered() {
		remove_all_filters('pre_user_description');
	}
	add_action('admin_init','kpl_user_bio_visual_editor_unfiltered');
	
	// function to catch the first image from the post, USE : echo catch_that_image(); in template files, within the loop.
	function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];
  
    return $first_img;
  }
	
	
	/*
	*
	* My Custom Excerpt For Cutting Long Text from Meta Box Content into specific length
	*
	* Use : <?php echo keativa_excerpt($kea_text); ?>
	* where $kea_text is the text you want to shorten
	*
	*/
	function keativa_excerpt($kea_text) {
        $chars = 250;
        $kea_text = $kea_text." ";
        $kea_text = substr($kea_text,0,$chars);
        $kea_text = substr($kea_text,0,strrpos($kea_text,' '));
        $kea_text = $kea_text."...";
		$kea_text = html_entity_decode(strip_tags($kea_text));
        return $kea_text;
    }
	
	
	// Change Author Base URL, author archive page is now "http://site.com/u/[username]/" ==============================
	function change_author_base() {
	global $wp_rewrite;
	$author_slug = 'u'; // change slug name
	$wp_rewrite->author_base = $author_slug;
	}
	add_action('init', 'change_author_base');
	
	// Change 'Posts' to 'Berita'
	function change_post_menu_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Berita';
		$submenu['edit.php'][5][0] = 'Berita';
		$submenu['edit.php'][10][0] = 'Add Berita';
		$submenu['edit.php'][16][0] = 'Berita Tags';
		echo '';
	}
	function change_post_object_label() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Berita';
		$labels->singular_name = 'Berita';
		$labels->add_new = 'Add Berita';
		$labels->add_new_item = 'Add Berita';
		$labels->edit_item = 'Edit Berita';
		$labels->new_item = 'New Berita';
		$labels->view_item = 'View Berita';
		$labels->search_items = 'Search Berita';
		$labels->not_found = 'No Berita found';
		$labels->not_found_in_trash = 'No Berita found in Trash';
	}
	add_action( 'init', 'change_post_object_label' );
	add_action( 'admin_menu', 'change_post_menu_label' );


    // Remove FrontEnd Admin Bar
	function remove_admin_bar_style_frontend() { // css override for the frontend
      echo '<style type="text/css" media="screen">
      html { margin-top: 0px !important; }
      * html body { margin-top: 0px !important; }
      </style>';
    }
    add_filter('wp_head','remove_admin_bar_style_frontend', 99);

	
	// Add more or remove custom profile fields
	function modify_contact_methods($profile_fields) {
		// Add new fields
		$profile_fields['logo'] = 'Logo URL';
		//$profile_fields['fakultas'] = 'Fakultas';
		$profile_fields['fb'] = 'Facebook URL';
		$profile_fields['tw'] = 'Twitter Username';
		$profile_fields['gp'] = 'Google+ URL';
		//Remove old fields
		unset($profile_fields['aim']);
		unset($profile_fields['yim']);
		unset($profile_fields['jabber']);
		
		return $profile_fields;
	}
	add_filter('user_contactmethods', 'modify_contact_methods');
	
	
	// Get Author Role by Their ID, use this in author template
	function get_user_role($id)
	{
		$user = new WP_User($id);
		return array_shift($user->roles);
	}
	
	
	/* Count Post Views and Use For Popular Posts Query
	* 1. put this in single.php loop to count post view : setPostViews(get_the_ID());
	* 2. put this in single.php loop to show how many times it has been read by visitor : getPostViews(get_the_ID());
	* 3. Use this query to show popular post: query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
	*/
	function getPostViews($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 kali";
		}
		return $count.' kali';
	}
	function setPostViews($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	// Add it to a column in WP-Admin
	function posts_column_views($defaults){
		$defaults['post_views'] = __('Views');
		return $defaults;
	}
	function posts_custom_column_views($column_name, $id){
		if($column_name === 'post_views'){
			echo getPostViews(get_the_ID());
		}
	}
	add_filter('manage_posts_columns', 'posts_column_views');
	add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
	
	
	// Pagination
	// put this line in theme file(s): keativa_pagination();
	function keativa_pagination($pages = '', $range = 2)
	{
		 $showitems = ($range * 2)+1;
	
		 global $paged;
		 if(empty($paged)) $paged = 1;
	
		 if($pages == '')
		 {
			 global $wp_query;
			 $pages = $wp_query->max_num_pages;
			 if(!$pages)
			 {
				 $pages = 1;
			 }
		 }
	
		 if(1 != $pages)
		 {
			 echo "<div class='pagination'>";
			 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
			 if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
	
			 for ($i=1; $i <= $pages; $i++)
			 {
				 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				 {
					 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
				 }
			 }
	
			 if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
			 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
			 echo "</div>\n";
		 }
	}
	
	
	// Change Footer Text in Admin Page
	function change_footer_admin () {
	echo '<p>This site is designed and developed by Adjie</p>';
	}
	add_filter('admin_footer_text', 'change_footer_admin');
	
	/* remove version on footer */
	function change_footer_version() {return ' ';}
	add_filter( 'update_footer', 'change_footer_version', 9999);
	
	// Login Failed Redirection ================================================
	add_action( 'wp_login_failed', 'keativa_login_fail' );  // hook failed login
	function keativa_login_fail( $username ) {
		 $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
		 // if there's a valid referrer, and it's not the default log-in screen
		 if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
			  wp_redirect($referrer . '/?login=invalid-user-or-pass' );  // let's append some information (login=failed) to the URL for the theme to use
			  exit;
		 }
	}
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	/* ======================================== hapus komen ini jika theme sudah dipakai di live environment
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	*/
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
	// Custom Excerpt + Content, use: < ?php echo excerpt(25); ? > in template files
	function excerpt($limit) {
	  $excerpt = explode(' ', get_the_excerpt(), $limit);
	  if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	  } else {
		$excerpt = implode(" ",$excerpt);
	  }
	  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	  return $excerpt;
	}
	 
	function content($limit) {
	  $content = explode(' ', get_the_content(), $limit);
	  if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	  } else {
		$content = implode(" ",$content);
	  }
	  $content = preg_replace('/\[.+\]/','', $content);
	  $content = apply_filters('the_content', $content);
	  $content = str_replace(']]>', ']]&gt;', $content);
	  return $content;
	}

?>