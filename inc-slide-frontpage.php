
  
  <!-- START wrap-grid, hero -->
  <div class='wrap-grid slide'>
    <div class='wrap'>
        <?php
        $cat_id_exclude = $smof_data['k_cat_id_exclude'];
        $my_query = null;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $my_query = new WP_Query(array('paged' => $paged, 'posts_per_page' => 4, 'cat'=> $cat_id_exclude));
        
        if ($my_query->have_posts()) : ?>
          <div class="slide-main">
            <ul>
              <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <li>
                  <div class='grid-3-1'>
                    <div class='each'>
                      <?php
              				$check = rwmb_meta( 'k_berita_foto' );
                      $post_foto = rwmb_meta( 'k_berita_foto', 'type=plupload_image' );
                      if($check != '') { ?>
                        <img src="<?php
                        foreach ( $post_foto as $image ){
                        
                        echo fImg::resize( $image['full_url'], 853, 400, true );
                              
                        } ?>" alt="<?php the_title(); ?>">
                      <?php } else { ?>
                        
                          <img src="http://placehold.it/272x200/eee/bbb&text=no+image" alt="<?php the_title(); ?>">
                          
                      <?php } ?>
                          
                    </div>
                    <div class='each'>
                      <div class="well">
                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <span class="meta"><i class="icon-clock-o"></i> <?php the_time('F Y') ?> &nbsp;&nbsp;|&nbsp;&nbsp; Views: <?php echo getPostViews(get_the_ID()); ?></span>
                        <p><?php echo excerpt(20); ?></p>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endwhile; ?>
            </ul>
          </div>
        <?php endif; wp_reset_query(); ?>
        
    </div>
  </div>
  <!-- END wrap-grid, hero
  ================================================== -->