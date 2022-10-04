<?php
add_filter( 'rwmb_meta_boxes', 'google_customfield' );

function google_customfield( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( 'Google', 'your-text-domain' ),
        'id'         => 'google',
        'post_types' => ['page'],
        'include'    => [
            'relation' => 'OR',
            'ID'       => [2016],
        ],
        'fields'     => [
            [
                'id'          => $prefix . 'img_group',
                'type'        => 'group',
                'group_title' => '圖片',
                'collapsible' => true,
                'clone'       => true,
                'sort_clone'  => true,
                'add_button'  => __( '新增圖片', 'hitechtw' ),
                'fields'      => [
                    [
                        'name'    => __( '桌機圖片', 'your-text-domain' ),
                        'id'      => $prefix . 'g_img_pc',
                        'type'    => 'single_image',
                        'columns' => 6,
                    ],
                    [
                        'name'    => __( '手機圖片', 'your-text-domain' ),
                        'id'      => $prefix . 'g_img_mobile',
                        'type'    => 'single_image',
                        'columns' => 6,
                    ],
                ],
            ],
        ],
    ];

    return $meta_boxes;
}