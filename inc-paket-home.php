
  
  <!-- START wrap-grid, grid-3 -->
  <div class='wrap-grid single paket-home'>
    <div class='wrap'>
      
     
        <div class='grid-3'>
          
          <?php
          $pakets = $data['k_paket_home']; //get the pakets array
          foreach ($pakets as $paket) { ?>
          
            <div class='each'>
              <h1 class="wow fadeInDown"><?php echo $paket['title']; ?></h1>
              <a href="<?php
              
              $check_link = $paket['link'];
              
              if($check_link != '') { echo $paket['link']; } else { $default_link = bloginfo('url') . "/paket-umroh"; echo $default_link; } ?>" class="light-img">
                <img src="<?php echo fImg::resize( $paket['url'], 495, 250, true ); ?>" alt="<?php echo $paket['title']; ?>"/>
              </a>
              
                <!--<h2><?php echo $paket['title']; ?></h2>-->
                <p><?php echo $paket['description']; ?></p>
              
            </div>
              
          <?php } ?>


          <div class='each wow'>
            <p><a href="<?php bloginfo('url'); ?>/paket-umroh" style="text-align: center;">Lihat Semua Paket <i class="icon-rarr"></i></a></p> 
          </div>              
          
        </div>
              
      
    </div>
  </div>
  <!-- END wrap-grid, grid-3-1
  ================================================== -->

