<?php get_header(); ?>
  
  <!-- START wrap-grid, grid-3-1 -->
  <div class='wrap-grid listing'>
    <div class='wrap'>
      <div class='grid-3-1'>
        <div class='each'>
          <h1 class="head wow fadeInDown"><i class="icon-portfolio"></i> Berita</h1>
          <div class='grid-1 porto wow fadeIn'>
            <div class='each'>
              <div class="v1">
                
                <?php
                $my_query = null;
                $my_query = new WP_Query(array('posts_per_page' => 8));
                if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
    
                  <?php include ( TEMPLATEPATH . '/inc-loop-berita-listing.php'); ?>
                  
                <?php endwhile; ?>
                
                <?php keativa_pagination($my_query->max_num_pages); ?>
                
                <?php else : ?>
    
                  <?php include ( TEMPLATEPATH . '/inc-not-found.php'); ?>
            
                <?php endif; wp_reset_query(); ?>
                
              </div>
            </div>
          </div>
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