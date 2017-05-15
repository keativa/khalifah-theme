
<style>

body,.not-found h2 {
  color:<?php echo $smof_data['k_color_body']; ?>
}

.wrap-nav-1,nav ul {
  background:<?php echo $smof_data['k_color_main']; ?>
}

.hero h1 span {
  color:<?php echo $smof_data['k_color_main']; ?>
}

.wrap-nav-1 a,.slicknav_menu .slicknav_menutxt {
  color:<?php echo $smof_data['k_color_menu']; ?>
}

nav ul li a.active,nav .current-menu-item a {
  color:<?php echo $smof_data['k_color_menu_active']; ?>
}

.wrap-nav-1 {
  border-bottom:3px solid <?php echo $smof_data['k_color_menu_border']; ?>
}

nav ul ul li a:hover {
  background: <?php echo $smof_data['k_color_menu_bg_hover']; ?>;
}

.hero {
  color:<?php echo $smof_data['k_color_hero']; ?>;
  background-color:<?php echo $smof_data['k_color_hero_bg']; ?>;
  <?php
  $hero_bg = $smof_data['k_hero_bg'];
  if ($hero_bg != ''){
    ?>
    background-image:url(<?php echo $hero_bg; ?>);
    background-repeat:no-repeat;
    background-position:center center;
    background-size:cover;
    <?php
  } ?>
}

.ava {
  border:7px solid <?php echo $smof_data['k_color_border_ava']; ?>;
  background: #eee url(<?php echo $smof_data['k_ava']; ?>) center center no-repeat;
}

.hero h1,.hero a {
  color:<?php echo $smof_data['k_color_hero_title']; ?>
}

.hero a:hover {
  color:<?php echo $smof_data['k_color_hero']; ?>
}

ul.social li {
  border: 2px solid <?php echo $smof_data['k_color_sosmed_icon']; ?>
}

ul.social li a {
  color:<?php echo $smof_data['k_color_sosmed_icon']; ?>
}

ul.social li:hover {
  border: 2px solid <?php echo $smof_data['k_color_sosmed_icon_hover']; ?>
}

ul.social li a:hover {
  color:<?php echo $smof_data['k_color_sosmed_icon_hover']; ?>
}

.wrap-footer-cr {
  color:<?php echo $smof_data['k_color_footer']; ?>;
  background:<?php echo $smof_data['k_color_footer_bg']; ?>
}

.wrap-footer-cr a {
  color:<?php echo $smof_data['k_color_footer_link']; ?>
}

.wrap-footer-cr a:hover {
  color:<?php echo $smof_data['k_color_footer']; ?>
}

a {
  color:<?php echo $smof_data['k_color_link']; ?>
}

a:hover {
  color:<?php echo $smof_data['k_color_link_hover']; ?>
}

.porto .caption h2 a,.grid-4 h2, .listing-sidebar h2 a {
  color:<?php echo $smof_data['k_color_link_berita']; ?>
}

.porto .caption h2 a:hover, .listing-sidebar h2 a:hover {
  color:<?php echo $smof_data['k_color_link_hover_berita']; ?>
}

.meta {
  color:<?php echo $smof_data['k_color_meta']; ?>
}

.well,.porto .v3,.porto .v2 .caption,.pagination a,.pagination .current {
  background:<?php echo $smof_data['k_color_galeri_bg']; ?>
}

h1.head {
  color: <?php echo $smof_data['k_color_h1']; ?>;
  border-bottom: 2px solid <?php echo $smof_data['k_color_h1_border']; ?>
}

.btn {
  color:<?php echo $smof_data['k_color_btn']; ?>;
  background:<?php echo $smof_data['k_color_btn_bg']; ?>;
}

.hero a.btn {
  color:<?php echo $smof_data['k_color_btn']; ?>;
}

.btn:hover,.hero .btn:hover {
  background:<?php echo $smof_data['k_color_btn_hover']; ?>
}

</style>