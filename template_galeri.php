<?php
/*
Template Name: Galeri
*/
?>
<?php get_header(); ?>
  
  <!-- START wrap-grid, porto v3 -->
  <div class='wrap-grid gal-home'>
    <div class='wrap'>
      <div class="grid-4">
        <div class="summary">
          <h1 class="wow fadeInDown head"><i class="icon-photo"></i> Galeri</h1>
        </div>
      </div>
      <div class='grid-4 mylightbox porto wow fadeIn'>
            
        <?php
        $cat_id_exclude = $smof_data['k_cat_id_exclude'];
        $my_query = null;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        // tampilkan postingan galeri + post? atau hanya dari galeri saja? ...
        // jika hanya galeri pakai ini ---> 'post_type' => 'gallery' dan hapus bagian 'cat' => $cat_id_exclude,
        // tapi ingin galeri + post pakai ini ---> 'post_type' => array('gallery', 'post'), 'cat' => $cat_id_exclude,
        // lalu sesuaikan Line 29-55
        $my_query = new WP_Query(array('post_type' => array(
          'gallery',
          //'post'
          ),
        //'cat' => $cat_id_exclude,
        'paged' => $paged,
        'posts_per_page' => 8));
        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
        
          <?php if (get_post_type($post->ID) == 'post') { ?>
          
            <?php
        		$check = rwmb_meta( 'k_berita_foto' );
            $photo_images = rwmb_meta( 'k_berita_foto', 'type=plupload_image' );
            $attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order') );
				    if($check != '') {
                        
              foreach ( $photo_images as $image ){ ?>
        
                <div class='each'>
                  <div class="v3">
                    <div class="img-thumb">
                      <a href="<?php echo $image['full_url']; ?>" class="light-img">
                      <span class='mask'><i class='icon-plus'></i></span>
                                <img src="<?php echo fImg::resize( $image['full_url'], 400, 273, true ); ?>" alt="<?php the_title(); ?>">
                        </a>
                    </div>
                    <div class="caption">
                      <h2><?php the_title(); ?></h2>
                    </div>
                  </div>
                </div>
          
              <?php } ?>
                      
            <?php } elseif ( $attachments ) { // check if the post has image attachment
                                                    
                $get_first_image = array_shift($attachments);
                $get_image_url = wp_get_attachment_url($get_first_image->ID); ?>
        
                <div class='each'>
                  <div class="v3">
                    <div class="img-thumb">
                      <a href="<?php echo $get_image_url; ?>" class="light-img">
                      <span class='mask'><i class='icon-plus'></i></span>
                        <img src="<?php echo fImg::resize( $get_image_url, 400, 273, true ); ?>" alt="<?php the_title(); ?>">
                      </a>
                    </div>
                    <div class="caption">
                      <h2><?php the_title(); ?></h2>
                    </div>
                  </div>
                </div>
                              
            <?php } else { ?>
        
                <!--<div class='each'>
                  <div class="v3">
                    <div class="img-thumb">
                      <a href="<?php echo $get_image_url; ?>" class="light-img">
                      <span class='mask'><i class='icon-plus'></i></span>
                        <img src="http://placehold.it/400x273/eee/bbb&text=no+image" alt="<?php the_title(); ?>">
                      </a>
                    </div>
                    <div class="caption">
                      <h2><?php the_title(); ?></h2>
                    </div>
                  </div>
                </div>-->
                
            <?php } ?>
          
          <?php } else { ?>
          
            <?php
        		$check = rwmb_meta( 'k_gallery_cover' );
            $galeri_cover = rwmb_meta( 'k_gallery_cover', 'type=plupload_image' );
				    if($check != '') {
                        
              foreach ( $galeri_cover as $image ){ ?>
        
                <div class='each'>
                  <div class="v3">
                    <div class="img-thumb">
                      <a href="<?php echo $image['full_url']; ?>" class="light-img">
                      <span class='mask'><i class='icon-plus'></i></span>
                                <img src="<?php echo fImg::resize( $image['full_url'], 400, 273, true ); ?>" alt="<?php the_title(); ?>">
                        </a>
                    </div>
                    <div class="caption">
                      <h2><?php the_title(); ?></h2>
                    </div>
                  </div>
                </div>
          
              <?php } ?>
                      
            <?php } ?>
          
          <?php } ?>
          
        <?php endwhile; ?>
          
        <?php keativa_pagination($my_query->max_num_pages); ?>
          
        <?php else : ?>
    
          <?php include ( TEMPLATEPATH . '/inc-not-found.php'); ?>
            
        <?php endif; wp_reset_query(); ?>
          
      </div>
    </div>
  </div>
  <!-- END wrap-grid, porto v3
  ================================================== -->
    
<?php get_footer(); ?>