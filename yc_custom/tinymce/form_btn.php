<?php /* Plugin Name: My TinyMCE Buttons */

add_action('init','remove_tinymce_btn', 200 );
function remove_tinymce_btn(){

    global $trustindex_pm_google;
    remove_filter('mce_external_plugins', array($trustindex_pm_google, 'add_tinymce_buttons'));
    remove_filter('mce_buttons', array($trustindex_pm_google, 'register_tinymce_buttons'));
}


add_action( 'admin_init', 'my_tinymce_button' );

function my_tinymce_button() {
     if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
          add_filter( 'mce_buttons', 'my_register_tinymce_button' );
          add_filter( 'mce_external_plugins', 'my_add_tinymce_button' );
     }
}

function my_register_tinymce_button( $buttons ) {
     array_push( $buttons, "button_eek" );
     return $buttons;
}

function my_add_tinymce_button( $plugin_array ) {
     $plugin_array['my_button_script'] = get_stylesheet_directory_uri() . '/yc_custom/tinymce/mybuttons.js';
     return $plugin_array;
}