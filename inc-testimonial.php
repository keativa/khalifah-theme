
          <h1 class="head wow fadeInDown"><i class="icon-comment"></i> Testimonial</h1>
          <div class="side-block wow fadeIn">
            <?php
            $my_query = null;
            $my_query = new WP_Query(array('category_name' => 'testimonial', 'posts_per_page' => 1));
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
            
            <div class="well">
              <div class="quote"><?php echo the_content(); ?><p>&mdash; <strong><?php the_title(); ?></strong></p><p><a href="<?php bloginfo('url'); ?>/testimonial">Selengkapnya <i class="icon-rarr"></i></a></p></div>
            </div>
            
            <?php endwhile; else : ?>
    
              <?php include ( TEMPLATEPATH . '/inc-not-found.php'); ?>
            
            <?php endif; wp_reset_query(); ?>
          </div>