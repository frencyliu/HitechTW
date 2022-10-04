<?php
add_filter( 'rwmb_meta_boxes', 'about_customfield' );

function about_customfield( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( 'About', 'hitechtw' ),
        'id'         => 'about',
        'post_types' => ['page'],
        'include'    => [
            'relation' => 'OR',
            'ID'       => [3323], //[2862, 3315] //正式[3323]
        ],
        'fields'     => [
            [
                'type' => 'heading',
                'name' => __( '品牌介紹', 'hitechtw' ),
            ],
            [
                'name'        => __( '區塊', 'hitechtw' ),
                'id'          => $prefix . 'sec',
                'type'        => 'group',
                'collapsible' => true,
                'group_title' => '區塊',
                'clone'       => true,
                'sort_clone'  => true,
                'add_button'  => __( '新增區塊', 'hitechtw' ),
                'fields'      => [
                    [
                        'name'    => __( '圖片', 'hitechtw' ),
                        'id'      => $prefix . 'img',
                        'type'    => 'single_image',
                        'columns' => 3,
                    ],
                    [
                        'name'    => __( '文字', 'hitechtw' ),
                        'id'      => $prefix . 'html',
                        'type'    => 'wysiwyg',
                        'columns' => 9,
                    ],
                ],
            ],
            [
                'name'    => __( '公司證書證照 ISO認證標準流程標題文字', 'hitechtw' ),
                'id'      => $prefix . 'iso_title',
                'type'    => 'text',
                'std'     => '公司證書證照 ISO認證標準流程',
                'columns' => 6,
            ],
            [
                'id'   => $prefix . 'iso_img',
                'type' => 'image_advanced',
            ],
            [
                'type' => 'divider',
            ],
            [
                'name'    => __( '高澄專業職人，層層把關層層用心標題文字', 'hitechtw' ),
                'id'      => $prefix . 'slider_title',
                'type'    => 'text',
                'std'     => '高澄專業職人，層層把關層層用心',
                'columns' => 6,
            ],
            [
                'id'   => $prefix . 'slider',
                'type' => 'image_advanced',
            ],
        ],
    ];

    return $meta_boxes;
}