
  
  <!-- START wrap-grid, grid-3-1 -->
  <div class='wrap-grid'>
    <div class='wrap'>
      <div class='grid-3-1'>
        <div class='each'>
          
          <h1 class="head wow fadeInDown"><i class="icon-portfolio"></i> Berita</h1>
          <div class='grid-3 porto wow fadeIn'>
            
            <?php
            $cat_id_exclude = $smof_data['k_cat_id_exclude'];
            $my_query = null;
            $my_query = new WP_Query(array('posts_per_page' => 6, 'cat'=> $cat_id_exclude));
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
    
            <div class='each'>
              <div class="v1">
                <div class="img-thumb">
                  <a href="<?php the_permalink() ?>" class="light-img">
                  <span class='mask'><i class='icon-plus'></i></span>
                      
                      <?php
              				$check = rwmb_meta( 'k_berita_foto' );
                      $post_foto = rwmb_meta( 'k_berita_foto', 'type=thickbox_image' );
                      $attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order') );
                      
                      if($check != '') { /* check if photo is not empty */ ?>
                      
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
                  <span class="meta"><i class="icon-clock-o"></i> <?php the_time('F Y') ?> | Views: <?php echo getPostViews(get_the_ID()); ?></span>
                  <p><?php echo excerpt(20); ?></p>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
        
            <?php else : ?>
    
              <?php include ( TEMPLATEPATH . '/inc-not-found.php'); ?>
            
            <?php endif; wp_reset_query(); ?>
          </div>
          <a href="<?php bloginfo('url'); ?>/berita">Lihat Semua Berita <i class="icon-rarr"></i></a>
        </div>
        <div class='each'>
          <?php include ( TEMPLATEPATH . '/inc-sosok.php'); ?>
          <?php include ( TEMPLATEPATH . '/inc-opini-publik.php'); ?>
          <?php include ( TEMPLATEPATH . '/inc-facebook.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- END wrap-grid, grid-3-1
  ================================================== -->