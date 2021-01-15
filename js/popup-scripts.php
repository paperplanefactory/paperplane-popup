<script type="text/javascript">
jQuery(document).ready(function() {
  function popupTextsShow() {
    var popWindowHeight = 0;
    var popTotalHeight = 0
    var popImageHeight = 0;
    var popWindowWidth = 0;
    var popTotalWidth = 0;
    popWindowHeight = jQuery(window).height();
    popWindowWidth = jQuery(window).width();
    jQuery( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
      popTotalHeight = jQuery( this ).find( '.popup-shape' ).height();
      popImageHeight = jQuery( this ).find( '.popup-shape-image' ).height();
      popTotalWidth = jQuery( this ).find( '.popup-shape' ).width();
      if ( popWindowHeight < popTotalHeight ) {
        popTextsHeight = (popWindowHeight - popImageHeight - 45);
        jQuery(".popup-shape-texts").addClass('text-scroller');
        jQuery(".popup-shape-texts").css({'height': popTextsHeight+"px" });
      }
      else {
        jQuery(".popup-shape-texts").removeClass('text-scroller');
        jQuery(".popup-shape-texts").css({'height': "auto" });
      }
      if ( popWindowWidth < popTotalWidth ) {
        popTextsWidth = popWindowWidth;
        jQuery('.popup-shape, .popup-wrapper').css({'width': popTextsWidth+"px" });
      }
      if ( popWindowWidth < 768 ) {
        jQuery('.popup-wrapper').css({'width': popWindowWidth+"px" });
      }
    });
  }
  popupTextsShow();
  jQuery( window ).resize(function() {
    popupTextsShow();
  });
  alreayHappened = 0;

  function checkPopupScroll() {
    fromTop = jQuery( document ).scrollTop();
    jQuery( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
      var comparsionScroll = '<?php the_field( 'quando_mostrare_pop_up' ); ?>';
      var effectiveScroll = '';
      if ( comparsionScroll === 'scroll-tot' ) {
        effectiveScroll = '<?php echo $scroll_distance; ?>';
      }
      if ( comparsionScroll === 'scroll-half' ) {
        effectiveScroll = ( jQuery(document).height() / 2);
      }

      if ( fromTop > effectiveScroll && alreayHappened == 0 ) {
        alreayHappened = 1;
        jQuery( this ).fadeTo( 300, 1 ).removeClass('unset-pointer-events');
        jQuery( this ).find( '.popup-wrapper' ).addClass('<?php the_field( 'popup_animation' ); ?>');
      }
    });
  }

  function createExpryLocalStorage() {
    var localStorageExpryDate = new Date();
    localStorageExpryDate.setHours(localStorageExpryDate.getHours()+<?php echo $days_expry; ?>);
    window.localStorage.setItem('exprypopup<?php echo $post_slug; ?>', localStorageExpryDate);
  }
  var exprypopup<?php echo $post_slug; ?> = window.localStorage.getItem('exprypopup<?php echo $post_slug; ?>');
  if ( typeof exprypopup<?php echo $post_slug; ?> === 'undefined' || exprypopup<?php echo $post_slug; ?> === null || exprypopup<?php echo $post_slug; ?> === '' ) {
    window.localStorage.setItem('exprypopup<?php echo $post_slug; ?>', new Date());
  }

  function checkExpryLocalStorage() {
    var today = new Date();
    if(new Date() > new Date(exprypopup<?php echo $post_slug; ?>)) {
      //console.log('il cookie e scaduto');
      window.localStorage.removeItem('closeopoup<?php echo $post_slug; ?>');
      window.localStorage.setItem('closeopoup<?php echo $post_slug; ?>', 'no');
    }
    else {
      //console.log('il cookie non e scaduto');
    }
  }
  checkExpryLocalStorage();
  var myCookie<?php echo $post_slug; ?> = window.localStorage.getItem('closeopoup<?php echo $post_slug; ?>');
  if ( typeof myCookie<?php echo $post_slug; ?> === 'undefined' || myCookie<?php echo $post_slug; ?> === null || myCookie<?php echo $post_slug; ?> === '' || myCookie<?php echo $post_slug; ?> === 'no' ) {
    window.localStorage.setItem('closeopoup<?php echo $post_slug; ?>', 'no');
    var comparsion = '<?php the_field( 'quando_mostrare_pop_up' ); ?>';
    if ( comparsion === 'scroll-tot' || comparsion === 'scroll-half' ) {
      //checkPopupScroll();
      jQuery( document ).scroll(function() {
    		checkPopupScroll();
    	});
    }
    else {
      jQuery( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
        jQuery( this ).delay( <?php echo $pop_up_timer; ?> ).show().fadeTo( 300, 1 ).removeClass('unset-pointer-events');
        jQuery( this ).find( '.popup-wrapper' ).addClass('<?php the_field( 'popup_animation' ); ?>');
      });
    }
  }
  else {
    jQuery( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
      jQuery( this ).hide();
    });
  }
  jQuery( '#cookie_box<?php echo $post_slug; ?>' ).each(function (index, value) {
    //jQuery( this ).find( '.popup-contents a' ).addClass( 'cookie_box_close_forever<?php echo $post_slug; ?>' );
  });


  jQuery('.cookie_box_close_forever<?php echo $post_slug; ?>').click(function() {
    jQuery('#cookie_box<?php echo $post_slug; ?>').fadeTo( 300, 0 ).delay( 300 ).hide().addClass('unset-pointer-events');
    window.localStorage.removeItem('closeopoup<?php echo $post_slug; ?>');
    window.localStorage.setItem('closeopoup<?php echo $post_slug; ?>', 'yes');
    createExpryLocalStorage();
  });
  jQuery('.cookie_box_close').click(function() {
    jQuery('#cookie_box<?php echo $post_slug; ?>').fadeTo( 300, 0 ).delay( 300 ).hide().addClass('unset-pointer-events');;
    window.localStorage.removeItem('closeopoup<?php echo $post_slug; ?>');
    window.localStorage.setItem('closeopoup<?php echo $post_slug; ?>', 'no');
  });
  jQuery(document).click(function(e) {
    var $container = jQuery('#cookie_box<?php echo $post_slug; ?>');
    // if the target of the click isn't the container nor a descendant of the container
    if ($container.is(e.target)) {
      jQuery('#cookie_box<?php echo $post_slug; ?>').fadeTo( 300, 0 ).delay( 300 ).hide().addClass('unset-pointer-events');;
      window.localStorage.removeItem('closeopoup<?php echo $post_slug; ?>');
      window.localStorage.setItem('closeopoup<?php echo $post_slug; ?>', 'no');
    }
  });
});
</script>
