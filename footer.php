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
  <script src='<?php bloginfo('template_url'); ?>/assets/js/jquery.matchHeight.js'></script>
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
        keys: false,
        fade: true,
        fluid: true
      });
    });

    $(function() {
      $('.slide-main').unslider({
        //speed: 500,
        delay: 4000,
        dots: true,
        keys: true,
        fade: false,
        fluid: true
      });
    });



    // simple carousel

    $('#carousel').each(function(){
        var slideTime = 300;
        var delayTime = 5000;

        var carouselWidth = $(this).width();
        var carouselHeight = $(this).height();
        $(this).append('<div id="carousel_prev"></div><div id="carousel_next"></div>');
        $(this).children('ul').wrapAll('<div id="carousel_wrap"><div id="carousel_move"></div></div>');

        $('#carousel_wrap').css({
          width: (carouselWidth),
          height: (carouselHeight),
          position: 'relative',
          overflow: 'hidden'
        });

        var listWidth = parseInt($('#carousel_move').children('ul').children('li').css('width'));
        var listCount = $('#carousel_move').children('ul').children('li').length;

        var ulWidth = (listWidth)*(listCount);

        $('#carousel_move').css({
          top: '0',
          left: -(ulWidth),
          width: ((ulWidth)*3),
          height: (carouselHeight),
          position: 'absolute'
        });

        $('#carousel_wrap ul').css({
          width: (ulWidth),
          float: 'left'
        });
        $('#carousel_wrap ul').each(function(){
          $(this).clone().prependTo('#carousel_move');
          $(this).clone().appendTo('#carousel_move');
        });

        carouselPosition();

        $('#carousel_prev').click(function(){
          clearInterval(setTimer);
          $('#carousel_move:not(:animated)').animate({left: '+=' + (listWidth)},slideTime,function(){
            carouselPosition();
          });
          timer();
        });

        $('#carousel_next').click(function(){
          clearInterval(setTimer);
          $('#carousel_move:not(:animated)').animate({left: '-=' + (listWidth)},slideTime,function(){
            carouselPosition();
          });
          timer();
        });

        function carouselPosition(){
          var ulLeft = parseInt($('#carousel_move').css('left'));
          var maskWidth = (carouselWidth) - ((listWidth)*(listCount));
          if(ulLeft == ((-(ulWidth))*2) || ulLeft == ((-(ulWidth))*2)+1) {
            $('#carousel_move').css({left:-(ulWidth)});
          } else if(ulLeft == 0) {
            $('#carousel_move').css({left:-(ulWidth)});
          };
        };

        timer();

        function timer() {
          setTimer = setInterval(function(){
            $('#carousel_next').click();
          },delayTime);
        };

      });

      // same height for div

      $(function() {
        $('.testi .each .well').matchHeight();
      });
	  
    //]]>
  </script>
  
  
</body>
</html>