<?php get_header(); ?>
  
  <!-- START wrap-grid, grid-3-1 -->
  <div class='wrap-grid listing'>
    <div class='wrap'>
      <div class='grid-3-1'>
        <div class='each'>
          <?php if (have_posts()) : ?>
          <h1 class="head wow fadeInDown"><i class="icon-portfolio"></i> Hasil Pencarian '<?php the_search_query(); ?>'</h1>
          
          <div class='grid-1 porto wow fadeIn'>
            <div class='each'>
              <div class="v1">
              
                <?php while (have_posts()) : the_post(); ?>
                
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
          <?php include ( TEMPLATEPATH . '/inc-opini-publik.php'); ?>
          <?php include ( TEMPLATEPATH . '/inc-facebook.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- END wrap-grid, grid-3-1
  ================================================== -->
              
<?php get_footer(); ?>