<script>
$(document).ready(function() {
  function popupTextsShow() {
    var popWindowHeight = 0;
    var popTotalHeight = 0
    var popImageHeight = 0;
    var popWindowWidth = 0;
    var popTotalWidth = 0;
    popWindowHeight = $(window).height();
    popWindowWidth = $(window).width();
    $( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
      popTotalHeight = $( this ).find( '.popup-shape' ).height();
      popImageHeight = $( this ).find( '.popup-shape-image' ).height();
      popTotalWidth = $( this ).find( '.popup-shape' ).width();
      if ( popWindowHeight < popTotalHeight ) {
        popTextsHeight = (popWindowHeight - popImageHeight - 45);
        $(".popup-shape-texts").addClass('text-scroller');
        $(".popup-shape-texts").css({'height': popTextsHeight+"px" });
      }
      else {
        $(".popup-shape-texts").removeClass('text-scroller');
        $(".popup-shape-texts").css({'height': "auto" });
      }
      if ( popWindowWidth < popTotalWidth ) {
        popTextsWidth = popWindowWidth;
        $('.popup-shape, .popup-wrapper').css({'width': popTextsWidth+"px" });
      }
    });
  }
  popupTextsShow();
  $( window ).resize(function() {
    popupTextsShow();
  });
  alreayHappened = 0;

  function checkPopupScroll() {
    fromTop = $( document ).scrollTop();
    $( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
      var comparsionScroll = '<?php the_field( 'quando_mostrare_pop_up' ); ?>';
      var effectiveScroll = '';
      if ( comparsionScroll === 'scroll-tot' ) {
        effectiveScroll = '<?php echo $scroll_distance; ?>';
      }
      if ( comparsionScroll === 'scroll-half' ) {
        effectiveScroll = ( $(document).height() / 2);
      }

      if ( fromTop > effectiveScroll && alreayHappened == 0 ) {
        alreayHappened = 1;
        $( this ).fadeTo( 300, 1 ).removeClass('unset-pointer-events');
        $( this ).find( '.popup-wrapper' ).addClass('<?php the_field( 'popup_animation' ); ?>');
      }
    });
  }

  var myCookie<?php echo $post_slug; ?> = Cookies.get('close-forever<?php echo $post_slug; ?>'); // => 'value'
  if ( typeof myCookie<?php echo $post_slug; ?> === 'undefined' || myCookie<?php echo $post_slug; ?> === null || myCookie<?php echo $post_slug; ?> === '' || myCookie<?php echo $post_slug; ?> === 'no' ) {
    var comparsion = '<?php the_field( 'quando_mostrare_pop_up' ); ?>';
    if ( comparsion === 'scroll-tot' || comparsion === 'scroll-half' ) {
      //checkPopupScroll();
      $( document ).scroll(function() {
    		checkPopupScroll();
    	});
    }
    else {
      $( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
        $( this ).delay( <?php echo $pop_up_timer; ?> ).show().fadeTo( 300, 1 ).removeClass('unset-pointer-events');
        $( this ).find( '.popup-wrapper' ).addClass('<?php the_field( 'popup_animation' ); ?>');
      });
    }
  }
  else {
    $( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
      $( this ).hide();
    });
  }
  $( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
    //$( this ).find( '.popup-contents a' ).addClass( 'cookie_box_close_forever<?php echo $post_slug; ?>' );
  });


  $('.cookie_box_close_forever<?php echo $post_slug; ?>').click(function() {
    $('#cookie_box<?php echo $post_slug; ?>').fadeTo( 300, 0 ).delay( 300 ).hide().addClass('unset-pointer-events');
    Cookies.set('close-forever<?php echo $post_slug; ?>', 'yes', { expires: <?php echo $days_expry; ?> });
  });
  $('.cookie_box_close').click(function() {
    $('#cookie_box<?php echo $post_slug; ?>').fadeTo( 300, 0 ).delay( 300 ).hide().addClass('unset-pointer-events');;
    Cookies.set('close-forever<?php echo $post_slug; ?>', 'no', { expires: <?php echo $days_expry; ?> });
  });
  $(document).click(function(e) {
    var $container = $('#cookie_box<?php echo $post_slug; ?>');
    // if the target of the click isn't the container nor a descendant of the container
    if ($container.is(e.target)) {
      $('#cookie_box<?php echo $post_slug; ?>').fadeTo( 300, 0 ).delay( 300 ).hide().addClass('unset-pointer-events');;
      Cookies.set('close-forever<?php echo $post_slug; ?>', 'no', { expires: <?php echo $days_expry; ?> });
    }
  });
});
</script>
