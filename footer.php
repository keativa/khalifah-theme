  <!-- START wrap-footer-cr -->
  <div class='wrap-footer-cr'>
    <div class='wrap'>
      <div class='footer-text'>
        <div class='left wow fadeInDown'>Copyright &#169; <?php echo date("Y"); ?> <a href='<?php bloginfo('url'); ?>'>Khalifah Umroh & Tour</a>. All Rights Reserved.</div>
        <div class='right wow fadeInDown'>Site by Adjie</div>
      </div>
    </div>
  </div>
  <!-- END wrap-footer-cr
  ================================================== -->
  
  <script src='<?php bloginfo('template_url'); ?>/assets/js/jquery.js'></script>
  <script src='<?php bloginfo('template_url'); ?>/assets/js/modernizr.min.js'></script>
  <script src='<?php bloginfo('template_url'); ?>/assets/js/slicknav.min.js'></script>
  <script src='<?php bloginfo('template_url'); ?>/assets/js/unslider.min.js'></script>
  <script src='<?php bloginfo('template_url'); ?>/assets/js/simple-lightbox-min.js'></script>
  <script src='<?php bloginfo('template_url'); ?>/assets/js/wow.min.js'></script>
  <script src='<?php bloginfo('template_url'); ?>/assets/js/retina.js'></script>
  <script type='text/javascript'>
    //<![CDATA[
    
      // slicknav
      $(document).ready(function(){
          $('#knav').slicknav();
      });
      
      wow = new WOW({
		  offset: 50
	  })
	  wow.init();
      
    $(function() {
		  $('.slide-sosok').unslider({
			  //speed: 500,
			  delay: 4000,
			  dots: false,
			  keys: true,
			  fade: true,
			  fluid: true
		  });
	  });
	  
    //]]>
  </script>
  
  
</body>
</html>