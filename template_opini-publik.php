<?php
/*
Template Name: Opini Publik
*/
?>
<?php get_header(); ?>
  
  <!-- START wrap-grid, grid-3-1 -->
  <div class='wrap-grid listing'>
    <div class='wrap'>
      <div class='grid-3-1'>
        <div class='each'>
          
          <h1 class="head wow fadeInDown"><i class="icon-comment"></i> Opini Publik</h1>
          <div class='grid-2 porto wow fadeIn'>
            
            <?php
            //$k_posts_beritahome = $data['k_posts_beritahome'];
            $my_query = null;
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            //$my_query = new WP_Query(array('posts_per_page' => $k_posts_beritahome));
            $my_query = new WP_Query(array('category_name' => 'opini-publik', 'paged' => $paged, 'posts_per_page' => 8));
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
    
              <div class='each'>
                <div class="v1">
                  <div class="well"><div class="quote"><?php echo the_content(); ?><p>&mdash; <strong><?php the_title(); ?></strong></p></div></div>
                </div>
              </div>
              
            <?php endwhile; ?>
            
            <?php keativa_pagination($my_query->max_num_pages); ?>
            
            <?php else : ?>
    
              <?php include ( TEMPLATEPATH . '/inc-not-found.php'); ?>
            
            <?php endif; wp_reset_query(); ?>
          </div>
        </div>
        <div class='each'>
          <?php include ( TEMPLATEPATH . '/inc-sosok.php'); ?>
          <?php include ( TEMPLATEPATH . '/inc-berita-terpopuler.php'); ?>
          <?php include ( TEMPLATEPATH . '/inc-facebook.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- END wrap-grid, grid-3-1
  ================================================== -->
              
<?php get_footer(); ?>