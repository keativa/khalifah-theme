<?php get_header(); ?>
  
  <!-- START wrap-grid, porto v3 -->
  <div class='wrap-grid gal-home'>
    <div class='wrap'>
      <div class="grid-4">
        <div class="summary">
          <h1 class="wow fadeInDown head"><i class="icon-photo"></i> Galeri</h1>
        </div>
      </div>
      <div class='grid-4 porto wow fadeIn'>
            
        <?php
        $my_query = null;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $my_query = new WP_Query(array('post_type' => 'gallery', 'paged' => $paged, 'posts_per_page' => 12));
        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
        
          <div class='each'>
            <div class="v3">
              <div class="img-thumb">
                <a href="<?php the_permalink() ?>" class="light-img">
                <span class='mask'><i class='icon-plus'></i></span>
                  <?php
              		$check = rwmb_meta( 'k_gallery_cover' );
                  $galeri_cover = rwmb_meta( 'k_gallery_cover', 'type=plupload_image' );
                  $attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order') );
				          if($check != '') {
                      
                      if($check != '') { ?>
                      
                          <img src="<?php
                          foreach ( $galeri_cover as $image ){
                          echo fImg::resize( $image['full_url'], 400, 273, true );
                          } ?>" alt="<?php the_title(); ?>">
                          
                      <?php } elseif ( $attachments ) { // check if the post has image attachment
                                                
                          $get_first_image = array_shift($attachments);
                        	$get_image_url = wp_get_attachment_url($get_first_image->ID); ?>
                        	<img src="<?php echo fImg::resize( $get_image_url, 400, 273, true ); ?>" alt="<?php the_title(); ?>">
                          
                      <?php } else { ?>
                          <img src="<?php bloginfo('template_url'); ?>/images/no_image.gif" alt="<?php the_title(); ?>">
                      <?php } ?>
                      
                  <?php } ?>
                  </a>
              </div>
              <div class="caption">
                <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
          
        <?php keativa_pagination($my_query->max_num_pages); ?>
          
        <?php else : ?>
    
          <?php include ( TEMPLATEPATH . '/inc-not-found.php'); ?>
            
        <?php endif; wp_reset_query(); ?>
          
      </div>
    </div>
  </div>
  <!-- END wrap-grid, porto v3
  ================================================== -->
    
<?php get_footer(); ?>