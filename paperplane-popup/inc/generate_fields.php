<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5afc37d0a76e7',
	'title' => 'Pop up settings',
	'fields' => array(
		array(
			'key' => 'field_5afc3ab045532',
			'label' => 'Gestione comportamento',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 1,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b0830b9304fc',
			'label' => 'Test mode',
			'name' => 'test_mode',
			'type' => 'true_false',
			'instructions' => 'Con il test mode attivo solo gli utenti loggati potranno vedere i pop up. Utile per fare dei test.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5afc39c44552d',
			'label' => 'Scegli una URL di destinazione',
			'name' => 'scegli_url',
			'type' => 'url',
			'instructions' => 'Questo è il link di destinazione se viene impostata un\'immagine o una CTA.<br />Cliccando l\'immagine, la CTA o uno qualsiasi dei link all\'interno del pop up l\'utente verrà mandato alla pagina di destinazione e il pop up non si aprirà più (fino alla scadenza dei cookie) in quanto l\'obbiettivo è stato raggiunto.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5b07c92778ef1',
			'label' => 'Aprire il link nella stessa finestra o in una nuova finestra?',
			'name' => 'scegli_url_target',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'_self' => 'Stessa',
				'_blank' => 'Nuova',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5afc3ac845533',
			'label' => 'Scadenza cookie',
			'name' => 'scadenza_cookie',
			'type' => 'number',
			'instructions' => 'Il pop-up genera un cookie per ogni utente che visita il sito. Quando l\'utente chiude il pop-up (o clicca uno dei link al suo interno) il cookie viene impostato per avere un intervallo in modo tale da non far comparire continuamente il pop-up allo stesso visitatore. Scegliere qui quanto deve durare l\'intervallo (in ore) che di default è impostato a 7 ore.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 7,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5afc3af545534',
			'label' => 'Data e ora di scadenza pop up',
			'name' => 'data_ora_di_scadenza_pop_up',
			'type' => 'date_time_picker',
			'instructions' => 'Impostare una data oltre la quale il pop up non sarà più visibile ai visitatori.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y g:i a',
			'return_format' => 'Y-m-d H:i:s',
			'first_day' => 1,
		),
		array(
			'key' => 'field_5b06d2d4b577e',
			'label' => 'Dove vuoi mostrare il pop up?',
			'name' => 'dove_mostrare_pop_up',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'onepage' => 'Una pagina specifica',
				'everywhere' => 'In tutte le pagine',
				'homepage' => 'Solo in homepage',
				'onectp' => 'In tutti gli elementi di un tipo di contenuto specifico',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5afc3b3745535',
			'label' => 'Scegli una o più pagine nelle quali mostrare il pop up',
			'name' => 'scegli_pagina',
			'type' => 'post_object',
			'instructions' => 'Se questo campo non viene compilato il pop up comparirà in tutte le pagine.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b06d2d4b577e',
						'operator' => '==',
						'value' => 'onepage',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'page',
				1 => 'portfolio_item',
				2 => 'post',
				3 => 'lp',
			),
			'taxonomy' => '',
			'allow_null' => 0,
			'multiple' => 1,
			'return_format' => 'id',
			'ui' => 1,
		),
		array(
			'key' => 'field_5b2a3a53fe20a',
			'label' => 'Scegli in quale tipo di contenuto mostrare il pop up',
			'name' => 'scegli_cpt',
			'type' => 'post_type_selector',
			'instructions' => 'Se questo campo non viene compilato il pop up comparirà in tutte le pagine.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b06d2d4b577e',
						'operator' => '==',
						'value' => 'onectp',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'select_type' => 0,
		),
		array(
			'key' => 'field_5b0956b11ae51',
			'label' => 'Dopo quanto vuoi far comparire il pop up?',
			'name' => 'pop_up_timer',
			'type' => 'number',
			'instructions' => 'Inserire un numero che corrisponde ai secondi di ritardo con i quai il pop up comparirà. 0 = immediatamente.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '0.5',
		),
		array(
			'key' => 'field_5bf950b00e536',
			'label' => 'Gestione immagini',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5afc388f3d607',
			'label' => 'Mostrare l\'immagine su desktop?',
			'name' => 'mostrare_immagine_desktop',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'si' => 'Sì',
				'no' => 'No',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c4ed890ce93b',
			'label' => 'Posizionamento immagine / testo',
			'name' => 'posizionamento_immagine_testo',
			'type' => 'select',
			'instructions' => 'Scegliendo l\'opzione "Immagine a sinistra e testo a destra" o "Testo a sinistra e immagine a destra" sarà possibile impostare un\'altezza minima del pop up e nella maggior parte dei casi l\'immagine sarà adattata allo spazio disponibile.',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc388f3d607',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'immagine-testo' => 'Immagine sopra e testo sotto',
				'testo-immagine' => 'Testo sopra e immagine sotto',
				'immagine-testo-side' => 'Immagine a sinistra e testo a destra',
				'testo-immagine-side' => 'Testo a sinistra e immagine a destra',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c4efa21a82f5',
			'label' => 'Altezza minima pop up',
			'name' => 'altezza_minima_pop_up',
			'type' => 'number',
			'instructions' => 'L\'altezza minima del pop up in pixerl. Inserire un valore compreso tra 300 e 600.',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc388f3d607',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 350,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 300,
			'max' => 600,
			'step' => '',
		),
		array(
			'key' => 'field_5afc38dc3d609',
			'label' => 'Scegli immagine desktop',
			'name' => 'immagine_desktop',
			'type' => 'image',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc388f3d607',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5afc38bd3d608',
			'label' => 'Mostrare l\'immagine su mobile?',
			'name' => 'mostrare_immagine_mobile',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'si' => 'Sì',
				'no' => 'No',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5afc39083d60a',
			'label' => 'Scegli immagine mobile',
			'name' => 'immagine_mobile',
			'type' => 'image',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc38bd3d608',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5c4f06899b4d2',
			'label' => 'Scegli un colore di sfondo per l\'immagine',
			'name' => 'colore_sfondo_immagine',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc38bd3d608',
						'operator' => '==',
						'value' => 'si',
					),
				),
				array(
					array(
						'field' => 'field_5afc388f3d607',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5c546a64b47e4',
			'label' => 'Gestione testi e contenuti',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5afc3a4745531',
			'label' => 'Usare i testi?',
			'name' => 'usare_testi',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'si' => 'Sì',
				'no' => 'No',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5afc39934552a',
			'label' => 'Titolo',
			'name' => 'titolo',
			'type' => 'text',
			'instructions' => 'Max. 60 caratteri.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc3a4745531',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => 60,
		),
		array(
			'key' => 'field_5afc3a044552f',
			'label' => 'Colore titolo',
			'name' => 'colore_titolo',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc3a4745531',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5b2a749112c13',
			'label' => 'Scegli se inserire testo, codice HTML o embed',
			'name' => 'testo_o_html',
			'type' => 'select',
			'instructions' => 'Max. 300 caratteri.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc3a4745531',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'txt' => 'Testo',
				'html' => 'Codice HTML',
				'embed' => 'Embed',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5afc399d4552b',
			'label' => 'Testo',
			'name' => 'testo',
			'type' => 'wysiwyg',
			'instructions' => 'Lunghezza massima testo suggerita: 300 caratteri.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc3a4745531',
						'operator' => '==',
						'value' => 'si',
					),
					array(
						'field' => 'field_5b2a749112c13',
						'operator' => '==',
						'value' => 'txt',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5b2a74d212c15',
			'label' => 'Codice HTML',
			'name' => 'html',
			'type' => 'textarea',
			'instructions' => 'Scegliendo questa opzione consigliamo di rimuovere le immagini nella sezione "Gesione immagini" per una corretta visualizzazione su tutti gli schermi.',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc3a4745531',
						'operator' => '==',
						'value' => 'si',
					),
					array(
						'field' => 'field_5b2a749112c13',
						'operator' => '==',
						'value' => 'html',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5b2a767cffe73',
			'label' => 'Embed',
			'name' => 'embed',
			'type' => 'oembed',
			'instructions' => 'Scegliendo questa opzione consigliamo di rimuovere le immagini nella sezione "Gesione immagini" per una corretta visualizzazione su tutti gli schermi.',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc3a4745531',
						'operator' => '==',
						'value' => 'si',
					),
					array(
						'field' => 'field_5b2a749112c13',
						'operator' => '==',
						'value' => 'embed',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'width' => '',
			'height' => '',
		),
		array(
			'key' => 'field_5b07c4cbfe2c1',
			'label' => 'Colore testo',
			'name' => 'colore_testo',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc3a4745531',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5afc39ba4552c',
			'label' => 'CTA',
			'name' => 'cta',
			'type' => 'text',
			'instructions' => 'Max. 60 caratteri.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc3a4745531',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => 60,
		),
		array(
			'key' => 'field_5afc3a3345530',
			'label' => 'Colore link',
			'name' => 'colore_link',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5afc3a4745531',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5b12901e6d6ff',
			'label' => 'Mostrare il bottone per chiudere il pop up?',
			'name' => 'show_close_button',
			'type' => 'select',
			'instructions' => 'Non preoccuparti: se scegli di non mostrare il bottone sarà comunque possibile chiudere il pop up cliccando al di fuori di esso.<br />
Note sul comportamento del pop up:<br />
cliccando il pulsante chiudi, cliccando l\'immagine o cliccando la CTA il pop up verrà chiuso e non mostrato più per il periodo impostato nel campo "Scadenza cookie".<br />
Cliccando invece al di fuori del pop up, questo comparirà nuovamente durante la navigazione.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'si' => 'Sì',
				'no' => 'No',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c4ee4f0bfa4e',
			'label' => 'Usare un\'icona o un testo?',
			'name' => 'show_close_button_icon_text',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b12901e6d6ff',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'icon' => 'Icona',
				'text' => 'Text',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c4ee545bfa4f',
			'label' => 'Testo bottone chiudi',
			'name' => 'testo_bottone_chiudi',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b12901e6d6ff',
						'operator' => '==',
						'value' => 'si',
					),
					array(
						'field' => 'field_5c4ee4f0bfa4e',
						'operator' => '==',
						'value' => 'text',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5c4ee9213c25b',
			'label' => 'Colore testo bottone chiudi',
			'name' => 'colore_chiudi',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b12901e6d6ff',
						'operator' => '==',
						'value' => 'si',
					),
					array(
						'field' => 'field_5c4ee4f0bfa4e',
						'operator' => '==',
						'value' => 'text',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5b08437b50eef',
			'label' => 'Icona per il pulsante chiudi',
			'name' => 'close_button',
			'type' => 'image',
			'instructions' => 'Se non vuoi utilizzare un pulsante personalizzato verrà utilizzato quello predefinito. Se vuoi usarne uno personalizzato utilizza un\'immagine png di 30x30px',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b12901e6d6ff',
						'operator' => '==',
						'value' => 'si',
					),
					array(
						'field' => 'field_5c4ee4f0bfa4e',
						'operator' => '==',
						'value' => 'icon',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => 30,
			'min_height' => 30,
			'min_size' => '',
			'max_width' => 30,
			'max_height' => 30,
			'max_size' => '',
			'mime_types' => 'png',
		),
		array(
			'key' => 'field_5b1292e360ba3',
			'label' => 'Posizione pulsante chiudi',
			'name' => 'close_button_position',
			'type' => 'select',
			'instructions' => 'Scegli dove posizionare il pulsante',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b12901e6d6ff',
						'operator' => '==',
						'value' => 'si',
					),
					array(
						'field' => 'field_5c4ee4f0bfa4e',
						'operator' => '==',
						'value' => 'icon',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'top-right' => 'In alto a destra',
				'top-left' => 'In alto a sinistra',
				'bottom-right' => 'In basso a destra',
				'bottom-left' => 'In basso a sinistra',
				'top-center' => 'In alto al centro',
				'bottom-center' => 'In basso al centro',
				'left-center' => 'A sinistra al centro',
				'right-center' => 'A destra al centro',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c5472553a4d7',
			'label' => 'Gestione bordi',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5c54693f67cfa',
			'label' => 'Usare un bordo / cornice all\'interno del blocco di testo?',
			'name' => 'bordo_cornice',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'no' => 'No',
				'si' => 'Sì',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c5474285bb88',
			'label' => 'Distanza del bordo (in pixel)',
			'name' => 'distanza_bordo',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c54693f67cfa',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => 10,
			'step' => 2,
		),
		array(
			'key' => 'field_5c54697e67cfb',
			'label' => 'Spessore del bordo (in pixel)',
			'name' => 'spessore_bordo',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c54693f67cfa',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 1,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 5,
			'step' => '',
		),
		array(
			'key' => 'field_5c54728c3a4d8',
			'label' => 'Stile del bordo',
			'name' => 'stile_bordo',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c54693f67cfa',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'solid' => 'Solid',
				'dotted' => 'Puntinato',
				'dashed' => 'Tratteggiato',
				'double' => 'Doppio',
				'groove' => 'Scanalato',
				'ridge' => 'Increspato',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c5469b667cfc',
			'label' => 'Colore del bordo',
			'name' => 'colore_bordo',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c54693f67cfa',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5c546ba14ce72',
			'label' => 'Gestione colore overlay e colore di sfondo',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b3634c5a0bfd',
			'label' => 'Mostrare overlay?',
			'name' => 'show_overlay',
			'type' => 'select',
			'instructions' => 'Scegli dove posizionare il pop up',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b12901e6d6ff',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'si' => 'Sì',
				'no' => 'No',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5afd4395f373e',
			'label' => 'Colore overlay',
			'name' => 'colore_overlay',
			'type' => 'extended-color-picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b3634c5a0bfd',
						'operator' => '==',
						'value' => 'si',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'color_palette' => '',
			'hide_palette' => 0,
		),
		array(
			'key' => 'field_5afc39f34552e',
			'label' => 'Colore di sfondo',
			'name' => 'colore_sfondo',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5c546b894ce71',
			'label' => 'Gestione dimensione e posizione',
			'name' => '',
			'type' => 'accordion',
			'instructions' => 'È possibile posizionare il pop up se nella tab "Gestione colore overlay e colore di sfondo" si è scelto "No" come valore per il campo "Mostrare overlay?".',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b083472c2f81',
			'label' => 'Larghezza massima pop up',
			'name' => 'larghezza_max_pop_up',
			'type' => 'number',
			'instructions' => 'Inserire un valore in pixel che verrà utilizzato solo su desktop. Usare un valore compreso tra 400 e 980px.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 450,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 400,
			'max' => 980,
			'step' => '',
		),
		array(
			'key' => 'field_5b363091a0bfc',
			'label' => 'Posizione pop up',
			'name' => 'pop_up_position',
			'type' => 'select',
			'instructions' => 'Scegli dove posizionare il pop up.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b3634c5a0bfd',
						'operator' => '==',
						'value' => 'no',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'top-right' => 'In alto a destra',
				'top-left' => 'In alto a sinistra',
				'bottom-right' => 'In basso a destra',
				'bottom-left' => 'In basso a sinistra',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'popup',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
