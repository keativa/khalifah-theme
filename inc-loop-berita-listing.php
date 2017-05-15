
                  <div class="list">
                    
                    <div class="img-thumb">
                      <a href="<?php the_permalink() ?>" class="light-img">
                      <span class='mask'><i class='icon-plus'></i></span>
                      
                      <?php
              				$check = rwmb_meta( 'k_berita_foto' );
                      $post_foto = rwmb_meta( 'k_berita_foto', 'type=thickbox_image' );
                      $check_gallery = rwmb_meta( 'k_gallery_cover' );
                      $galeri_cover = rwmb_meta( 'k_gallery_cover', 'type=plupload_image' );
                      $attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order') );
                      
                      if (is_post_type('gallery')) { ?>
                      
                          <?php if($check_gallery != '') { ?>
                          
                              <img src="<?php
                              foreach ( $galeri_cover as $image ){
                              echo fImg::resize( $image['full_url'], 272, 200, true );
                              } ?>" alt="<?php the_title(); ?>">
                              
                          <?php } else { ?>
                              <img src="http://placehold.it/272x200/eee/bbb&text=no+image" alt="<?php the_title(); ?>">
                          <?php }
                        
                      } else { ?>
                      
                          <?php if($check != '') { ?>
                          
                              <img src="<?php
                              foreach ( $post_foto as $image ){
                              echo fImg::resize( $image['full_url'], 272, 200, true );
                              } ?>" alt="<?php the_title(); ?>">
                              
                          <?php } elseif ( $attachments ) { // check if the post has image attachment
                                                    
                              $get_first_image = array_shift($attachments);
                            	$get_image_url = wp_get_attachment_url($get_first_image->ID); ?>
                            	<img src="<?php echo fImg::resize( $get_image_url, 272, 200, true ); ?>" alt="<?php the_title(); ?>">
                              
                          <?php } else { ?>
                              <img src="http://placehold.it/272x200/eee/bbb&text=no+image" alt="<?php the_title(); ?>">
                          <?php } ?>
                      
                      <?php } ?>
                      
                      </a>
                    </div>
                    
                    <div class="caption">
                      <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                      <span class="meta"><i class="icon-clock-o"></i> <?php the_time('F Y') ?><!-- &nbsp;&nbsp;|&nbsp;&nbsp; Views: <?php echo getPostViews(get_the_ID()); ?>--></span>
                      <p><?php echo excerpt(30); ?></p>
                    </div>
                  </div>