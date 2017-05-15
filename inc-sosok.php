
          <h1 class="head wow fadeInDown"><i class="icon-user"></i> Paket Umroh</h1>
          <div class="side-block wow fadeIn">
            <div class="slide-sosok">
              <ul>
                
                <?php
                $slides = $data['k_slide_sosok']; //get the slides array
                foreach ($slides as $slide) { ?>
                
                  <li>
                    <a href="<?php
                    
                    $check_link = $slide['link'];
                    
                    if($check_link != '') { echo $slide['link']; } else { $default_link = bloginfo('url') . "/paket-umroh"; echo $default_link; } ?>" class="light-img">
                      <img src="<?php echo fImg::resize( $slide['url'], 280, 250, true ); ?>" alt="<?php echo $slide['title']; ?>"/>
                    </a>
                    <div class="well">
                      <h2><?php echo $slide['title']; ?></h2>
                    </div>
                  </li>
                    
                <?php } ?>
                
              </ul>
            </div>
          </div>