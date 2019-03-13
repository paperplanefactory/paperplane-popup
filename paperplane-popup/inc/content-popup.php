<?php
$post_slug = get_the_ID();
$cookie_expry = get_field( 'scadenza_cookie' );
//converto ore in giorni
$days_expry = ($cookie_expry / 24);
$pop_up_timer = ( get_field( 'pop_up_timer' ) * 1000 );
$show_overlay = get_field( 'show_overlay' );
if ( $show_overlay === 'no' ) {
  $pop_up_position = get_field( 'pop_up_position' );
  $popup_verticalize = '';
  $colore_overlay = 'transparent';
  $popup_overlay_class = 'popup-not-overlay';
  $larghezza_min_pop_up = 1;
  $show_close_button = get_field( 'show_close_button' );
  $show_close_button_icon_text = get_field( 'show_close_button_icon_text' );
  if ( $show_close_button_icon_text === 'icon' ) {
    $close_button_shape = 'icon';
    $close_button_position = 'def-set';
  }
  else {
    $close_button_shape = 'text';
    $close_button_position = 'def-set-text';
  }
  $usare_testi = get_field( 'usare_testi' );
}
else {
  $pop_up_position = 'default';
  $popup_verticalize = 'popup-verticalize';
  $colore_overlay = get_field( 'colore_overlay' );
  $popup_overlay_class = 'popup-overlay';
  $larghezza_min_pop_up = 1;
  $show_close_button = get_field( 'show_close_button' );
  $show_close_button_icon_text = get_field( 'show_close_button_icon_text' );
  if ( $show_close_button_icon_text === 'icon' ) {
    $close_button_shape = 'icon';
    $close_button_position = get_field( 'close_button_position' );
  }
  else {
    $close_button_shape = 'text';
    $close_button_position = 'top-right-text';
  }
  $usare_testi = get_field( 'usare_testi' );
}
$larghezza_max_pop_up = get_field( 'larghezza_max_pop_up' );

$bordo_cornice = get_field( 'bordo_cornice' );
$ingombro_totale = ( get_field( 'distanza_bordo' )*2 + get_field( 'spessore_bordo' )*2 );



$testo_o_html = get_field( 'testo_o_html' );
$min_height = 0;
$posizionamento_immagine_testo = get_field( 'posizionamento_immagine_testo' );
if ( $posizionamento_immagine_testo === 'immagine-testo' ) {
  $shape_class = 'popup-shape-image-text-horizontal';
}
if ( $posizionamento_immagine_testo === 'testo-immagine' ) {
  $shape_class = 'popup-shape-text-image-horizontal';
}
if ( $posizionamento_immagine_testo === 'immagine-testo-side' ) {
  $shape_class = 'popup-shape-image-text-vertical';
  $min_height = get_field( 'altezza_minima_pop_up' );
}
if ( $posizionamento_immagine_testo === 'testo-immagine-side' ) {
  $shape_class = 'popup-shape-text-image-vertical';
  $min_height = get_field( 'altezza_minima_pop_up' );
}
$mostrare_immagine_desktop = get_field( 'mostrare_immagine_desktop' );
$mostrare_immagine_mobile = get_field( 'mostrare_immagine_mobile' );
if ( $mostrare_immagine_desktop == 'no' ) {
  $ver_desktop = 'hide-desktop-image';
}
if ( $mostrare_immagine_mobile === 'no' ) {
  $ver_mobile = 'hide-mobile-image';
  $scroll_mobile = 'full-text';
}
else {
  $scroll_mobile = 'half-text';
}

$bordo_arrotondato = get_field( 'bordi_arrotondati' );
if ( $usare_testi === 'si' && ( $mostrare_immagine_desktop === 'si' || $mostrare_immagine_mobile === 'si' ) ) {
  if ( $bordo_arrotondato === 'rounded' ) {
    $round_borders = 'round-borders-text-image lines';
  }
  elseif ( $bordo_arrotondato === 'rounded-big' ) {
    $round_borders = 'round-borders-big-text-image lines-big';
  }
}
if ( $usare_testi === 'no' && ( $mostrare_immagine_desktop === 'si' || $mostrare_immagine_mobile === 'si' ) ) {
  if ( $bordo_arrotondato === 'rounded' ) {
    $round_borders = 'round-borders-image lines';
  }
  elseif ( $bordo_arrotondato === 'rounded-big' ) {
    $round_borders = 'round-borders-big-image lines-big';
  }
}

if ( $usare_testi === 'si' && ( $mostrare_immagine_desktop === 'no' || $mostrare_immagine_mobile === 'no' ) ) {
  if ( $bordo_arrotondato === 'rounded' ) {
    $round_borders = 'round-borders-text lines';
  }
  elseif ( $bordo_arrotondato === 'rounded-big' ) {
    $round_borders = 'round-borders-big-text lines-big';
  }

}

$ombra_pop_up = get_field( 'ombra_pop_up' );
if ( $ombra_pop_up === 'si' ) {
  $shadow = 'popup-shadow';
}
else {
  $shadow = '';
}

 ?>
<script>
$(document).ready(function() {
  var myCookie<?php echo $post_slug; ?> = Cookies.get('close-forever<?php echo $post_slug; ?>'); // => 'value'
  if ( typeof myCookie<?php echo $post_slug; ?> === 'undefined' || myCookie<?php echo $post_slug; ?> === null || myCookie<?php echo $post_slug; ?> === '' || myCookie<?php echo $post_slug; ?> === 'no' ) {
    $('#cookie_box<?php echo $post_slug; ?>').delay( <?php echo $pop_up_timer; ?> ).show().fadeTo( 300, 1 );
  }
  else {
    $('#cookie_box<?php echo $post_slug; ?>').hide();
  }
  $( '.popup-contents a' ).addClass( 'cookie_box_close_forever<?php echo $post_slug; ?>' );
  $('.cookie_box_close_forever<?php echo $post_slug; ?>').click(function() {
    $('#cookie_box<?php echo $post_slug; ?>').fadeTo( 300, 0 ).delay( 300 ).hide();
    Cookies.set('close-forever<?php echo $post_slug; ?>', 'yes', { expires: <?php echo $days_expry; ?> });
  });
  $('.cookie_box_close').click(function() {
    $('#cookie_box<?php echo $post_slug; ?>').fadeTo( 300, 0 ).delay( 300 ).hide();
    Cookies.set('close-forever<?php echo $post_slug; ?>', 'no', { expires: <?php echo $days_expry; ?> });
  });
$(document).click(function(e) {
  var $container = $('#cookie_box<?php echo $post_slug; ?>');
  // if the target of the click isn't the container nor a descendant of the container
  if ($container.is(e.target)) {
    $('#cookie_box<?php echo $post_slug; ?>').fadeTo( 300, 0 ).delay( 300 ).hide();
    Cookies.set('close-forever<?php echo $post_slug; ?>', 'no', { expires: <?php echo $days_expry; ?> });
  }
});
});
</script>
<style type="text/css">
.popup-styler p {
  color: <?php the_field('colore_testo'); ?>;
}
.popup-styler a:link, .popup-styler a:visited, .popup-styler a:hover {
  color: <?php the_field('colore_testo'); ?>;
}
</style>

<div id="cookie_box<?php echo $post_slug; ?>" class="<?php echo $popup_overlay_class; ?> <?php echo $popup_verticalize; ?> popup-<?php echo $pop_up_position; ?>" style="background-color: <?php echo $colore_overlay; ?>;">
  <div class="popup-wrapper <?php echo $round_borders; ?>" style="max-width: <?php echo $larghezza_max_pop_up; ?>px; min-width: <?php echo $larghezza_min_pop_up; ?>px;">

    <div class="popup-shape <?php echo $shape_class; ?>" style="min-height: <?php echo $min_height; ?>px">
      <?php if ( $bordo_cornice === 'si' ) : ?>
        <div class="popup-borders" style="left: <?php the_field('distanza_bordo'); ?>px; top: <?php the_field('distanza_bordo'); ?>px; border: <?php the_field('stile_bordo'); ?> <?php the_field('spessore_bordo'); ?>px <?php the_field('colore_bordo'); ?>; width: calc(100% - <?php echo $ingombro_totale; ?>px);  height: calc(100% - <?php echo $ingombro_totale; ?>px);"></div>
      <?php endif; ?>
      <div class="popup-shape-image <?php echo $shadow; ?> <?php echo $ver_desktop; ?> <?php echo $ver_mobile; ?>" style="background-color: <?php the_field('colore_sfondo_immagine'); ?>;">
        <a href="<?php the_field( 'scegli_url' ); ?>" target="<?php the_field( 'scegli_url_target' ); ?>" class="cookie_box_close_forever<?php echo $post_slug; ?>">
          <?php require_once( plugin_dir_path( __FILE__ ) . '/image-display-popup.php'); ?>
        </a>
      </div>
      <?php if ( $show_close_button === 'si' ) : ?>
        <div class="popup-close-<?php echo $close_button_shape; ?> popup-close-<?php echo $close_button_position; ?> cookie_box_close_forever<?php echo $post_slug; ?>">
          <?php if ( $show_close_button_icon_text === 'icon' ) : ?>
            <?php if ( get_field('close_button') ) : ?>
              <img src="<?php the_field('close_button'); ?>;" />
            <?php else : ?>
              <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/popup-close.png'; ?>" />
            <?php endif; ?>
          <?php else : ?>
            <div style="color: <?php the_field('colore_chiudi'); ?>;">
              <?php the_field('testo_bottone_chiudi'); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <?php if ( $usare_testi === 'si' ) : ?>
        <div class="popup-shape-texts <?php echo $shadow; ?> popup-contents " style="background-color: <?php the_field('colore_sfondo'); ?>;">
          <div class="verticalizer">
            <div class="popup-padder <?php echo $scroll_mobile; ?>">
              <div style="color: <?php the_field('colore_titolo'); ?>;">
                <?php if ( get_field('titolo') ) : ?>
                  <h2 style="color: <?php the_field('colore_titolo'); ?>;"><?php the_field('titolo'); ?></h2>
                <?php endif; ?>
              <?php if ( $testo_o_html === 'txt' ) : ?>
                <?php if ( get_field( 'testo' ) ) : ?>
                  <div class="popup-styler">
                    <?php the_field( 'testo' ); ?>
                  </div>
                <?php endif; ?>
              <?php elseif ( $testo_o_html === 'html' ) : ?>
                <div class="popup-styler">
                  <?php the_field( 'html' ); ?>
                </div>
              <?php elseif ( $testo_o_html === 'embed' ) : ?>
                <div class="popup-styler">
                  <?php the_field( 'embed' ); ?>
                </div>
              <?php endif; ?>
              <?php if ( get_field( 'cta' ) ) : ?>
                <div class="popup-cta-btn" style="background-color: <?php the_field('colore_titolo'); ?>;">
                  <a href="<?php the_field( 'scegli_url' ); ?>" target="<?php the_field( 'scegli_url_target' ); ?>" class="cookie_box_close_forever<?php echo $post_slug; ?>" style="color: <?php the_field('colore_sfondo'); ?>;">
                    <?php the_field("cta"); ?>
                  </a>
                </div>
              <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
