<?php get_header(); ?>
  
  <!-- START wrap-grid, grid-3-1 -->
  <div class='wrap-grid single'>
    <div class='wrap'>
        
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
        <div class='grid-2-1'>
          <div class='each'>
          
            <h1 class="head wow fadeInDown"><i class="icon-user"></i> <?php the_title(); ?></h1>
            <div class='grid-1 porto wow fadeIn'>
              
              <?php if (is_page('tentang-kami')) { ?>
                <?php
                $check = rwmb_meta( 'k_foto_profil' );
                $foto_profil = rwmb_meta( 'k_foto_profil', 'type=plupload_image' );
                if($check != '') { ?>
                        
                  <div class="foto-profil">
                    <img src="<?php foreach ( $foto_profil as $image ){ echo $image['full_url']; } ?>" alt="<?php the_title(); ?>">
                  </div>
                  
                <?php } ?>
              <?php } ?>
              
              <?php the_content(); ?>
              
            </div>
          
          </div>
          <div class='each'>
            <h1 class="head wow fadeInDown"><i class="icon-resume"></i> Profil</h1>
            <div class="side-block wow fadeInUp">
              <?php
              	$biodata = rwmb_meta( 'k_biodata' );
              	echo $biodata;
              ?>
            </div>
          </div>
        </div>
              
      <?php endwhile; endif; wp_reset_query(); ?>
      
    </div>
  </div>
  <!-- END wrap-grid, grid-3-1
  ================================================== -->

<?php get_footer(); ?>