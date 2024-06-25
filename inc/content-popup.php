<?php
$post_slug = get_the_ID();
$cookie_expry = get_field( 'scadenza_cookie' );
//converto ore in giorni
$days_expry = $cookie_expry;

$quando_mostrare_pop_up = get_field( 'quando_mostrare_pop_up' );
$scroll_distance = 0;
if ( $quando_mostrare_pop_up === 'subito' || $quando_mostrare_pop_up === 'scroll-tot' || $quando_mostrare_pop_up === 'scroll-half' ) {
	$pop_up_timer = 0;
	$pop_up_timer_css = 0;
	$scroll_distance = get_field( 'pop_up_scroller' );
} else {
	$pop_up_timer = ( get_field( 'pop_up_timer' ) * 1000 );
	$pop_up_timer_css = get_field( 'pop_up_timer' );
	$scroll_distance = 0;
}


$show_overlay = get_field( 'show_overlay' );
if ( $show_overlay === 'no' ) {
	$pop_up_position = get_field( 'pop_up_position' );
	$popup_verticalize = '';
	$colore_overlay = 'transparent';
	$popup_overlay_class = 'popup-not-overlay';
	$show_close_button = get_field( 'show_close_button' );
	$show_close_button_icon_text = get_field( 'show_close_button_icon_text' );
	if ( $show_close_button_icon_text === 'icon' ) {
		$close_button_shape = 'icon';
		$close_button_position = 'def-set';
	} else {
		$close_button_shape = 'text';
		$close_button_position = 'def-set-text';
	}
	$usare_testi = get_field( 'usare_testi' );
} else {
	$pop_up_position = 'default';
	$popup_verticalize = 'popup-verticalize';
	$colore_overlay = get_field( 'colore_overlay' );
	$popup_overlay_class = 'popup-overlay';
	$show_close_button = get_field( 'show_close_button' );
	$show_close_button_icon_text = get_field( 'show_close_button_icon_text' );
	if ( $show_close_button_icon_text === 'icon' ) {
		$close_button_shape = 'icon';
		$close_button_position = get_field( 'close_button_position' );
	} else {
		$close_button_shape = 'text';
		$close_button_position = 'top-right-text';
	}
	$usare_testi = get_field( 'usare_testi' );
}
$larghezza_max_pop_up = get_field( 'larghezza_max_pop_up' );
$larghezza_min_pop_up = get_field( 'larghezza_min_pop_up' );

$bordo_cornice = get_field( 'bordo_cornice' );
$ingombro_totale = ( get_field( 'distanza_bordo' ) * 2 );



$testo_o_html = get_field( 'testo_o_html' );
$min_height = 0;
$shape_class = '';
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
$ver_desktop = '';
if ( $mostrare_immagine_desktop == 'no' ) {
	$ver_desktop = 'hide-desktop-image';
}
$ver_mobile = '';
if ( $mostrare_immagine_mobile === 'no' ) {
	$ver_mobile = 'hide-mobile-image';
	$scroll_mobile = 'full-text';
} else {
	$scroll_mobile = 'half-text';
}

$bordo_arrotondato = get_field( 'bordi_arrotondati' );
if ( $bordo_arrotondato === 'rounded-all' ) {
	$larghezza_max_pop_up = '400';
	$larghezza_min_pop_up = '400';
	$testo_o_html = 'html-round';
	$usare_testi = 'si';
}

$round_borders = '';
if ( $usare_testi === 'si' && ( $mostrare_immagine_desktop === 'si' || $mostrare_immagine_mobile === 'si' ) ) {
	if ( $bordo_arrotondato === 'rounded' ) {
		$round_borders = 'round-borders-text-image lines';
	} elseif ( $bordo_arrotondato === 'rounded-big' ) {
		$round_borders = 'round-borders-big-text-image lines-big';
	}
}
if ( $usare_testi === 'no' && ( $mostrare_immagine_desktop === 'si' || $mostrare_immagine_mobile === 'si' ) ) {
	if ( $bordo_arrotondato === 'rounded' ) {
		$round_borders = 'round-borders-image lines';
	} elseif ( $bordo_arrotondato === 'rounded-big' ) {
		$round_borders = 'round-borders-big-image lines-big';
	}
}

if ( $usare_testi === 'si' && ( $mostrare_immagine_desktop === 'no' || $mostrare_immagine_mobile === 'no' ) ) {
	if ( $bordo_arrotondato === 'rounded' ) {
		$round_borders = 'round-borders-text lines';
	} elseif ( $bordo_arrotondato === 'rounded-big' ) {
		$round_borders = 'round-borders-big-text lines-big';
	}
}

$ombra_pop_up = get_field( 'ombra_pop_up' );
if ( $ombra_pop_up === 'si' ) {
	$shadow = 'popup-shadow';
} else {
	$shadow = '';
}

include( plugin_dir_path( __FILE__ ) . '../js/popup-scripts.php' );
?>

<style type="text/css">
	.popup-styler p {
		color:
			<?php the_field( 'colore_testo' ); ?>
		;
	}

	.popup-styler a:link,
	.popup-styler a:visited,
	.popup-styler a:hover {
		color:
			<?php the_field( 'colore_testo' ); ?>
		;
	}

	.paperplane-popup-bounce {
		-webkit-animation-delay:
			<?php echo $pop_up_timer_css; ?>
			s;
		animation-delay:
			<?php echo $pop_up_timer_css; ?>
			s;
	}

	.paperplane-popup-rotate {
		-webkit-transition-delay:
			<?php echo $pop_up_timer_css; ?>
			s;
		transition-delay:
			<?php echo $pop_up_timer_css; ?>
			s;
	}
</style>

<div id="cookie_box<?php echo $post_slug; ?>"
	class="def-popup-set unset-pointer-events <?php the_field( 'bordi_arrotondati' ); ?> <?php echo $popup_overlay_class; ?> <?php echo $popup_verticalize; ?> popup-<?php echo $pop_up_position; ?>"
	style="background-color: <?php echo $colore_overlay; ?>;">
	<div class="popup-wrapper"
		style="max-width: <?php echo $larghezza_max_pop_up; ?>px; min-width: <?php echo $larghezza_min_pop_up; ?>px;">
		<?php if ( $show_close_button === 'si' ) : ?>
			<div
				class="popup-close-btn popup-close-<?php echo $close_button_shape; ?> popup-close-<?php echo $close_button_position; ?> cookie_box_close_forever<?php echo $post_slug; ?>">
				<?php if ( $show_close_button_icon_text === 'icon' ) : ?>
					<?php if ( get_field( 'close_button' ) ) : ?>
						<img src="<?php the_field( 'close_button' ); ?>;" />
					<?php else : ?>
						<img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/popup-close.png'; ?>" />
					<?php endif; ?>
				<?php else : ?>
					<div style="color: <?php the_field( 'colore_chiudi' ); ?>;">
						<?php the_field( 'testo_bottone_chiudi' ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div
			class="popup-shape <?php the_field( 'bordi_arrotondati' ); ?> <?php echo $shape_class; ?> <?php echo $shadow; ?>"
			style="min-height: <?php echo $min_height; ?>px">
			<?php if ( $bordo_cornice === 'si' ) : ?>
				<div class="popup-borders"
					style="left: <?php the_field( 'distanza_bordo' ); ?>px; top: <?php the_field( 'distanza_bordo' ); ?>px; border: <?php the_field( 'stile_bordo' ); ?> <?php the_field( 'spessore_bordo' ); ?>px <?php the_field( 'colore_bordo' ); ?>; width: calc(100% - <?php echo $ingombro_totale; ?>px);  height: calc(100% - <?php echo $ingombro_totale; ?>px);">
				</div>
			<?php endif; ?>
			<div class="popup-shape-image <?php echo $ver_desktop; ?> <?php echo $ver_mobile; ?>">
				<?php include( plugin_dir_path( __FILE__ ) . '/image-display-popup.php' ); ?>
				<?php if ( get_field( 'scegli_url' ) ) : ?>
					<a href="<?php the_field( 'scegli_url' ); ?>" target="<?php the_field( 'scegli_url_target' ); ?>"
						class="cookie_box_close_forever<?php echo $post_slug; ?> popup-absl-link"></a>
				<?php endif; ?>
			</div>

			<?php if ( $usare_testi === 'si' ) : ?>
				<div class="popup-shape-texts popup-contents " style="background-color: <?php the_field( 'colore_sfondo' ); ?>;">
					<div class="verticalizer">
						<div class="popup-padder <?php echo $scroll_mobile; ?>">
							<div style="color: <?php the_field( 'colore_titolo' ); ?>;">
								<?php if ( get_field( 'titolo' ) && $bordo_arrotondato != 'rounded-all' ) : ?>
									<h2 style="color: <?php the_field( 'colore_titolo' ); ?>;">
										<?php the_field( 'titolo' ); ?>
									</h2>
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
									<?php
								elseif ( $testo_o_html === 'shortcode' ) :
									$shortcode = get_field( 'shortcode' );
									?>
									<div class="popup-styler">
										<?php echo do_shortcode( '' . $shortcode . '' ); ?>
									</div>
								<?php elseif ( $testo_o_html === 'html-round' ) : ?>
									<div class="popup-styler">
										<?php the_field( 'html-round' ); ?>
									</div>
								<?php endif; ?>
								<?php if ( get_field( 'cta' ) && get_field( 'scegli_url' ) ) : ?>
									<a href="<?php the_field( 'scegli_url' ); ?>" target="<?php the_field( 'scegli_url_target' ); ?>"
										class="cookie_box_close_forever<?php echo $post_slug; ?> popup-cta-btn"
										style="background-color: <?php the_field( 'colore_background_cta' ); ?>; color: <?php the_field( 'colore_link' ); ?>;">
										<?php the_field( "cta" ); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>