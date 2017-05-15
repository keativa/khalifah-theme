              <div class="not-found">
                <h2>Maaf, konten ini belum tersedia!</h2>
                <?php if (is_page('kolom-jurnalis') || is_page('berita') || is_page('sisi-lain')) { ?>
                  <img src="<?php bloginfo("template_url"); ?>/assets/images/not_found_berita_listing_c.jpg" alt="listing">
                  <img src="<?php bloginfo("template_url"); ?>/assets/images/not_found_berita_listing_c.jpg" alt="listing">
                  <img src="<?php bloginfo("template_url"); ?>/assets/images/not_found_berita_listing_c.jpg" alt="listing">
                <?php } elseif (is_page('galeri')) { ?>
                  <img src="<?php bloginfo("template_url"); ?>/assets/images/not_found_gallery_listing_c.jpg" alt="galeri">
                  <img src="<?php bloginfo("template_url"); ?>/assets/images/not_found_gallery_listing_c.jpg" alt="galeri">
                <?php } ?>
              </div>