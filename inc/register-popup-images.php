<?php
add_action( 'init', 'paperplanepopup_register_image_size' );
function paperplanepopup_register_image_size() {
    add_image_size( 'paperplanepopup_desktop_image', 1920, 9999);
    add_image_size( 'paperplanepopup_desktop_image_vertical', 447, 650, true);
    add_image_size( 'paperplanepopup_mobile_image', 768, 9999);
}
