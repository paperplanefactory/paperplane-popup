<?php
$immagine_desktop = get_field( 'immagine_desktop' );
if ( $posizionamento_immagine_testo === 'immagine-testo-side' || $posizionamento_immagine_testo === 'testo-immagine-side' ) {
  $immagine_desktop_URL = $immagine_desktop['sizes']['paperplanepopup_desktop_image_vertical'];
}
else {
  $immagine_desktop_URL = $immagine_desktop['sizes']['paperplanepopup_desktop_image'];
}

$immagine_mobile = get_field( 'immagine_mobile' );
$immagine_mobile_URL = $immagine_mobile['sizes']['paperplanepopup_mobile_image'];
 ?>

 <div class="popup-desktop-image">
   <?php if ( $posizionamento_immagine_testo === 'immagine-testo-side' || $posizionamento_immagine_testo === 'testo-immagine-side' ) : ?>
     <div class="popup-bg-handler" style="background-image: url(<?php echo $immagine_desktop_URL; ?>)">
     </div>
   <?php else : ?>
     <div class="popup-no-the-100">
       <img src="<?php echo $immagine_desktop_URL; ?>" title="<?php echo $immagine_mobile['title']; ?> - <?php echo get_bloginfo( 'name' ); ?>" alt="<?php echo $immagine_mobile['alt']; ?> - <?php echo get_bloginfo( 'name' ); ?>" />
     </div>
   <?php endif; ?>
 </div>

<div class="popup-mobile-image">
  <div class="popup-no-the-100">
    <img src="<?php echo $immagine_mobile_URL; ?>" title="<?php echo $immagine_mobile['title']; ?> - <?php echo get_bloginfo( 'name' ); ?>" alt="<?php echo $immagine_mobile['alt']; ?> - <?php echo get_bloginfo( 'name' ); ?>" />
  </div>
</div>
