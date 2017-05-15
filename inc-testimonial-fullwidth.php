
  
  <!-- START wrap-grid, grid-3 -->
  <div class='wrap-grid single paket-home testi'>
    <div class='wrap'>

      <div class="grid-2">
        <div class="summary">
          <h1 class="wow fadeInDown head" style="border-bottom: none;"><i class="icon-comment"></i> Testimonial</h1>
        </div>
      </div>      
     
      <div class='grid-2'>

          <?php
          $my_query = null;
          $my_query = new WP_Query(array('category_name' => 'testimonial', 'posts_per_page' => 4));
          if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
          
          <div class='each wow'>
            <div class="well ">
              <div class="quote"><?php echo the_content(); ?><p>&mdash; <strong><?php the_title(); ?></strong></p></div>
            </div>
          </div>
          
          <?php endwhile; else : ?>
  
            <?php include ( TEMPLATEPATH . '/inc-not-found.php'); ?>
          
          <?php endif; wp_reset_query(); ?>  

            <p><a href="<?php bloginfo('url'); ?>/testimonial">Lihat Semua Testimonial <i class="icon-rarr"></i></a></p> 
        
      </div>

    </div>
  </div>
  <!-- END wrap-grid, grid-3-1
  ================================================== -->

