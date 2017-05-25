
          
          <h1 class="head wow fadeInDown"><!-- <i class="icon-user"></i>  -->Berita Terpopuler</h1>
          <div class="side-block wow fadeIn">
            <?php
              $cat_id_exclude = $smof_data['k_cat_id_exclude'];
              $my_query = null;
              $my_query = new WP_Query(array('posts_per_page' => 5, 'meta_key' => 'post_views_count',  'orderby' => 'meta_value_num', 'order' => 'DESC', 'cat'=> $cat_id_exclude));
              if( $my_query->have_posts() ) : ?>
                <ul class="listing-sidebar">
                  <?php
                  while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                  <li><h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2><span class="meta"><i class="icon-clock-o"></i> <?php the_time('F Y') ?><!-- | Views: <?php echo getPostViews(get_the_ID()); ?>--></span></li>
                  <?php
                  endwhile; ?>
                </ul>
              <?php endif; wp_reset_query(); ?>
          </div>