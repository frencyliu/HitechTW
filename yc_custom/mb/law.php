<?php
add_filter( 'rwmb_meta_boxes', 'law_customfield' );

function law_customfield( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( '法律諮詢', 'hitechtw' ),
        'id'         => 'law',
        'post_types' => ['page'],
        'include'    => [
            'relation' => 'OR',
            'ID'       => [1957],
        ],
        'fields'     => [
            [
                'id'     => $prefix . 'sec',
                'type'   => 'group',
                'fields' => [
                    [
                        'name'    => __( '圖片', 'hitechtw' ),
                        'id'      => $prefix . 'image',
                        'type'    => 'single_image',
                        'columns' => 4,
                    ],
                    [
                        'name'    => __( '標題', 'hitechtw' ),
                        'id'      => $prefix . 'title',
                        'type'    => 'text',
                        'columns' => 4,
                    ],
                    [
                        'name'    => __( '副標題', 'hitechtw' ),
                        'id'      => $prefix . 'subtitle',
                        'type'    => 'text',
                        'columns' => 4,
                    ],
                ],
            ],
            [
                'id'         => $prefix . 'lawer',
                'type'       => 'group',
                'clone'      => true,
                'sort_clone' => true,
                'fields'     => [
                    [
                        'name'    => __( '照片', 'hitechtw' ),
                        'id'      => $prefix . 'photo',
                        'type'    => 'single_image',
                        'columns' => 4,
                    ],
                    [
                        'name'    => __( '職稱', 'hitechtw' ),
                        'id'      => $prefix . 'job_title',
                        'type'    => 'text',
                        'columns' => 4,
                    ],
                    [
                        'name'    => __( '姓名', 'hitechtw' ),
                        'id'      => $prefix . 'name',
                        'type'    => 'text',
                        'columns' => 4,
                    ],
                    [
                        'name'    => __( '左區塊', 'hitechtw' ),
                        'id'      => $prefix . 'html1',
                        'type'    => 'wysiwyg',
                        'columns' => 6,
                    ],
                    [
                        'name'    => __( '右區塊', 'hitechtw' ),
                        'id'      => $prefix . 'html2',
                        'type'    => 'wysiwyg',
                        'columns' => 6,
                    ],
                ],
            ],
        ],
    ];

    return $meta_boxes;
}