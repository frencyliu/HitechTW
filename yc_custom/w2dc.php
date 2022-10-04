<?php

require_once 'w2dc-metabox.php';

add_filter('w2dc_page_default_template', 'relocate_default_template');

function relocate_default_template($default_template){
    $new_template = get_stylesheet_directory() . '/page-w2dc.php';

    return $new_template;
}

/**
 * 因為w2dc 沒有feature image跟editor
 * 所以額外創欄位，然後同步
 */
add_action( 'wp_insert_post', 'save_to_page_feature_img', 200,3 );

function save_to_page_feature_img($post_id, $post, $update){
    // Only set for post_type = post!
    if ( 'w2dc_listing' !== $post->post_type) {
        return;
    }
    $featured_image = get_post_meta( $post_id, 'featured_image', true );
    update_post_meta($post_id, '_thumbnail_id', $featured_image);
}

//移除meta box
add_action('add_meta_boxes', 'ht_remove_metabox', 200);
function ht_remove_metabox()
{
    if( WP_DEBUG || ( YC_TECH::$current_user_level == 0 ) ) return;
    remove_meta_box(
        'w2dc_listing_info',
        'w2dc_listing',
        'side'
    );
    remove_meta_box(
        'tagsdiv-w2dc-tag',
        'w2dc_listing',
        'side'
    );
    remove_meta_box(
        'w2dc-category',
        'w2dc_listing',
        'normal'
    );
    remove_meta_box(
        'w2dc_media_metabox',
        'w2dc_listing',
        'advanced'
    );
    remove_meta_box(
        'w2dc_media_metabox',
        'w2dc_listing',
        'normal'
    );
    remove_meta_box(
        'w2dc_content_fields',
        'w2dc_listing',
        'normal'
    );
    remove_meta_box(
        'authordiv',
        'w2dc_listing',
        'normal'
    );


}

//後台CSS
add_action( 'admin_head', 'ht_admin_script', 200 );
function ht_admin_script() {
    ?>

<style>
#w2dc_locations .w2dc-content > .w2dc-location-input,
select[name="w2dc_post_status_filter"],
select[name="w2dc_listing_status_filter"],
select[name="w2dc_level_filter"]{
    display: none !important;
}

#menu-posts-w2dc_listing .uip-icon-image{
    background-image: unset !important;
}
#menu-posts-w2dc_listing .uip-icon-image::before{
    content: "\f541";
    font-family: dashicons;
display: inline-block;
line-height: 1;
font-weight: 400;
font-style: normal;
width: 20px;
height: 20px;
font-size: 16px;
vertical-align: top;
text-align: center;
transition: color .1s ease-in;
}
</style>

<?php
}

//選單
add_action('admin_menu', 'ht_amp_setting', 200);
function ht_amp_setting(){
        if( WP_DEBUG || ( YC_TECH::$current_user_level == 0 ) ) return;
        remove_menu_page('edit.php?post_type=wcsearch_form');
        remove_menu_page('w2dc_settings');
        remove_submenu_page('edit.php?post_type=w2dc_listing', 'edit-tags.php?taxonomy=w2dc-tag&amp;post_type=w2dc_listing');
        remove_submenu_page('edit.php?post_type=w2dc_listing', 'edit-tags.php?taxonomy=w2dc-category&amp;post_type=w2dc_listing');
        remove_submenu_page('edit.php?post_type=w2dc_listing', 'edit-tags.php?taxonomy=w2dc-location&amp;post_type=w2dc_listing');

}

//columns
add_filter("manage_w2dc_listing_posts_columns", function ($columns) {
   // YC_TECH::DEBUG($columns, true);
    unset($columns['w2dc_level']);
    unset($columns['w2dc_expiration_date']);
    unset($columns['w2dc_status']);

    return $columns;
}, 200, 1);


