<?php get_header(); ?>
  
  <!-- START wrap-grid, porto v3 -->
  <div class='wrap-grid single'>
    <div class='wrap'>
      <?php if (have_posts()) : while (have_posts()) : the_post(); setPostViews(get_the_ID()); ?>
      <div class="grid-2">
        
        <div class="summary">
          <h1 class="wow fadeInDown head"><i class="icon-photo"></i> <a href="<?php bloginfo('url') ?>/gallery">Galeri</a> &nbsp;&nbsp;&nbsp;<i class="icon-rarr"></i>&nbsp;&nbsp;  <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
          <p class="wow fadeInUp" data-wow-delay="0.2s"><?php echo the_content(); ?></p>
        </div>
      </div>
      <div class='grid-2 mylightbox porto wow fadeIn'>
      
                  <?php
              		$check = rwmb_meta( 'k_gallery_foto' );
                  $galeri_photo = rwmb_meta( 'k_gallery_foto', 'type=plupload_image' );
				          if($check != '') {
                        
                          foreach ( $galeri_photo as $image ){ ?>
        
          <div class='each'>
            <div class="v1">
              <div class="img-thumb">
                <a href="<?php echo $image['full_url']; ?>" class="light-img">
                <span class='mask'><i class='icon-plus'></i></span>
                          <img src="<?php echo fImg::resize( $image['full_url'], 400, 273, true ); ?>" alt="<?php the_title(); ?>">
                  </a>
              </div>
            </div>
          </div>
          
                      <?php } ?>
                      
                  <?php } ?>
                  
        <?php endwhile; endif; wp_reset_query(); ?>
          
      </div>
    </div>
  </div>
  <!-- END wrap-grid, porto v3
  ================================================== -->
  
<?php get_footer(); ?>