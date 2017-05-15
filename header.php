<?php global $smof_data; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" />
	<?php } ?>

    <title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Berita dengan label &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' - '; }
		      elseif (is_search()) {
		         echo 'Hasil pencarian dengan kata kunci &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Tidak ditemukan - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - halaman '. $paged; }
		   ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Khalifah Umroh & Tour, Khalifah, Umroh, Tour">
    
    <?php if (  (is_home()) || (is_front_page())  ) { ?>
    <meta name="description" content="Official Website Khalifah Umroh & Tour" />
    <?php } elseif (is_single()) { ?>
    <meta name="description" content="<?php the_excerpt();?>"/>
    <?php } ?>
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    
    <?php $check = $smof_data['k_favicon']; if($check != '') { ?>
    <link rel='icon' href='<?php echo $smof_data['k_favicon']; ?>'>
    <?php } ?>
    
    <link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/assets/css/font-icon.css'>
    <link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/assets/ie7/ie7.css'>
    <link rel='stylesheet' href='<?php bloginfo('stylesheet_url'); ?>'>
    <link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/assets/css/grid.css'>
    <link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/assets/css/component.css'>
    <link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/assets/css/style.css'>
    <link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/assets/css/animate.min.css'>
    <link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/assets/css/keativa-framework-page.css'>

    <?php include ( TEMPLATEPATH . '/inc-styling-options.php'); ?>
  	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
    <?php wp_head(); ?>

  </head>
  <body>
  
    <div id='fb-root'></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'http://connect.facebook.net/en_US/all.js#xfbml=1';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
    
    <!-- START wrap-nav-1 -->
    <div class='wrap-nav-1'>
      <div class='wrap'>
        <div class='nav-1'>
          <a href='<?php bloginfo('url'); ?>' class='logo wow fadeInDown'>
          
            <img src='<?php
          
            $check = $smof_data["k_logo"];
            
            if($check != "") {
            
              echo $smof_data["k_logo"];
              
            } else {
            
              $logo_default = bloginfo("template_url") . "/assets/images/logo_khalifah.png";
              
              echo $logo_default;
              
            } ?>' alt='<?php bloginfo("name"); ?>'/>
            
          </a>
          <div id='mobile-nav'></div>
          <nav>
            <ul id='knav' class="wow fadeInDown" data-wow-delay="0.4s">
              
              <?php
                  $menuutama = array(
                      'theme_location'  => 'top_menu',
                      'menu'            => '',
                      'container'       => false,
                      'container_class' => '',
                      'container_id'    => '',
                      'menu_class'      => '',
                      'menu_id'         => '',
                      'echo'            => true,
                      'fallback_cb'     => false,
                      'before'          => '',
                      'after'           => '',
                      'link_before'     => '',
                      'link_after'      => '',
                      'items_wrap'      => '%3$s',
                      'depth'           => 0,
                      'walker'          => ''
                  );
                  wp_nav_menu( $menuutama );
                ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- END wrap-nav-1
    ================================================== -->
        
        <!--
          <form action="<?php bloginfo('siteurl'); ?>" method="get">
            <input type="text" id="s" name="s" placeholder="search" />
          </form>
        -->
    