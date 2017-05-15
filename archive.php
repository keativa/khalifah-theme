<?php get_header(); ?>
  
  <!-- START wrap-grid, grid-3-1 -->
  <div class='wrap-grid listing'>
    <div class='wrap'>
      <div class='grid-3-1'>
        <div class='each'>
        
          <?php
          if (have_posts()) : ?>
          
          <h1 class="head wow fadeInDown"><i class="icon-portfolio"></i> <?php if (is_category()) { ?>
                  <?php single_cat_title(); ?>
  
              <?php } elseif(is_tag()) { ?>
                  Arsip berita dengan tag &#8216;<strong><?php single_tag_title(); ?></strong>&#8217;
  
              <?php } elseif (is_day()) { ?>
                  Arsip tanggal <?php the_time('F jS, Y'); ?>
  
              <?php } elseif (is_month()) { ?>
                  Arsip bulan <?php the_time('F, Y'); ?>
  
              <?php } elseif (is_year()) { ?>
                  Arsip tahun <?php the_time('Y'); ?>
  
              <?php } elseif (is_author()) { ?>
                  Arsip penulis
  
              <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                  Arsip
              
              <?php } ?></h1>
          <div class='grid-1 porto wow fadeIn'>
            <div class='each'>
              <div class="v1">
              
                <?php
                while (have_posts()) : the_post(); ?>
                
                  <?php include ( TEMPLATEPATH . '/inc-loop-berita-listing.php'); ?>
                  
                <?php endwhile; ?>
                
                <?php keativa_pagination(); ?>
                
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