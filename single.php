<?php get_header(); ?>
  
  <!-- START wrap-grid, grid-3-1 -->
  <div class='wrap-grid single'>
    <div class='wrap'>
      <div class='grid-3-1'>
        <div class='each'>
        
          <?php if (have_posts()) : while (have_posts()) : the_post(); setPostViews(get_the_ID()); ?>
          
          <h1 class="head wow fadeInDown title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            <div class='share wow fadeInUp'>
              <span class="meta wow fadeInUp"><i class="icon-clock-o"></i> <?php the_time('F Y') ?><!-- &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Views: <?php echo getPostViews(get_the_ID()); ?>--></span>
              <div class='share-pin'>
                <a data-pin-do='buttonBookmark' href='//www.pinterest.com/pin/create/button/'>
                  <img src='http://assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png'/>
                </a>
                <script src='http://assets.pinterest.com/js/pinit.js' type='text/javascript'></script>
              </div>
              <div class='share-gp'>
                <div class='g-plusone' data-annotation='none' data-size='medium'></div>
                <script type='text/javascript'>
                						(function() {
                						  var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                						  po.src = 'https://apis.google.com/js/platform.js';
                						  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                						})();
                					  </script>
              </div>
              <div class='share-tw'>
                <a class='twitter-share-button' data-count='none' data-lang='en' data-via='InstantShop' href='https://twitter.com/share'>Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script>
              </div>
              <div class='share-fb'>
                <div class='fb-like' data-action='like' data-layout='button_count' data-share='true' data-show-faces='false' data-width='200' style='margin-bottom:20px'>
                  
              </div>
            </div>
          </div>
          <div class='grid-1 mylightbox porto wow fadeIn'>
            <div class='each'>
              <div class="v1">
                
                  <div class="list">
                    
                      
                    <?php
              			$check = rwmb_meta( 'k_berita_foto' );
                    $post_foto = rwmb_meta( 'k_berita_foto', 'type=thickbox_image' );
                    $attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order') );
                    $check_image = catch_that_image(); // check if there is an image within the_content()
                    
                    if($check_image != '') { ?>
                      
                      <style>.single .grid-1 .list .caption div:first-child img,.single .grid-1 .list .caption div:first-child {display:none}</style>
                      
                      <div class="img-thumb" style="display:block !important">
                        <a href="<?php echo $check_image; ?>" class="light-img">
                        
                        <span class='mask'><i class='icon-plus'></i></span>
                        
                            <img src="<?php echo fImg::resize( $check_image, 430, 350, false ); ?>" alt="<?php the_title(); ?>">
                        
                        </a>
                      <small><em>*klik foto untuk memperbesar.</em></small>
                      </div>
                    
                    <?php } elseif ($check != '') { ?>
                      
                      <div class="img-thumb">
                        <a href="<?php foreach ( $post_foto as $image ){ echo $image['full_url']; } ?>" class="light-img">
                        
                        <span class='mask'><i class='icon-plus'></i></span>
                        
                            <img src="<?php
                            foreach ( $post_foto as $image ){
                            
                            echo fImg::resize( $image['full_url'], 430, 350, false );
                            
                            } ?>" alt="<?php the_title(); ?>">
                        
                        </a>
                      <small><em>*klik foto untuk memperbesar.</em></small>
                      </div>
                              
                    <?php } elseif ( $attachments ) { // check if the post has image attachment
                                                    
                      $get_first_image = array_shift($attachments);
                    	$get_image_url = wp_get_attachment_url($get_first_image->ID); ?>
                      
                      <div class="img-thumb">
                        <a href="<?php echo $get_image_url; ?>" class="light-img">
                        
                        <span class='mask'><i class='icon-plus'></i></span>
                        
                            <img src="<?php echo fImg::resize( $get_image_url, 430, 350, false ); ?>" alt="<?php the_title(); ?>">
                        
                        </a>
                      <small><em>*klik foto untuk memperbesar.</em></small>
                      </div>
                              
                    <?php } else { ?>
                      
                    <?php } ?>
                    
                    <div class="caption">
                      <?php the_content(); ?>
                    </div>
                  </div>
                  
                <?php endwhile; endif; wp_reset_query(); ?>
                
              </div>
            </div>
          </div>
          
          <?php
          $orig_post = $post;
          global $post;
          $categories = get_the_category($post->ID);
          if ($categories) { ?>
            
            <?php
            $category_ids = array();
            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
              $args=array(
              'category__in' => $category_ids,
              'post__not_in' => array($post->ID),
              'posts_per_page'=> 6,
              'caller_get_posts'=>1
              );
              $my_query = new wp_query( $args );
              if( $my_query->have_posts() ) {
              echo '<h1 class="head wow fadeInDown"><i class="icon-portfolio"></i> Berita Terkait</h1><div class="grid-3 related porto wow fadeIn">';
              while( $my_query->have_posts() ) {
                $my_query->the_post(); ?>
                  
                  <div class='each'>
                    <div class="v1">
                      <div class="img-thumb">
                        <a href="<?php the_permalink() ?>" class="light-img">
                        <span class='mask'><i class='icon-plus'></i></span>
                            <?php
                    				$check = rwmb_meta( 'k_berita_foto' );
                            $post_foto = rwmb_meta( 'k_berita_foto', 'type=plupload_image' );
                            $attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order') );
                            
                            if($check != '') { ?>
                            
                                <img src="<?php
                                foreach ( $post_foto as $image ){
                                echo fImg::resize( $image['full_url'], 272, 163, true );
                                } ?>" alt="<?php the_title(); ?>">
                              
                            <?php } elseif ( $attachments ) { // check if the post has image attachment
                                                      
                                $get_first_image = array_shift($attachments);
                              	$get_image_url = wp_get_attachment_url($get_first_image->ID); ?>
                              	<img src="<?php echo fImg::resize( $get_image_url, 272, 163, true ); ?>" alt="<?php the_title(); ?>">
                                
                            <?php } else { ?>
                                <img src="http://placehold.it/272x163/eee/bbb&text=no+image" alt="<?php the_title(); ?>">
                            <?php } ?>
                        </a>
                      </div>
                      <div class="caption">
                        <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                      </div>
                    </div>
                  </div>
                  
                <?php
              } ?>
              </div>
            <?php } ?>
            
          <?php }
          $post = $orig_post;
          wp_reset_query(); ?>
          
        </div>
        <div class='each'>
          <?php include ( TEMPLATEPATH . '/inc-sosok.php'); ?>
          <?php include ( TEMPLATEPATH . '/inc-berita-terpopuler.php'); ?>
          <?php include ( TEMPLATEPATH . '/inc-opini-publik.php'); ?>
          <?php include ( TEMPLATEPATH . '/inc-facebook.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- END wrap-grid, grid-3-1
  ================================================== -->
              
<?php get_footer(); ?>