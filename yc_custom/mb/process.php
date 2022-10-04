<?php
add_filter( 'rwmb_meta_boxes', 'process_customfield' );

function process_customfield( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( '驗屋流程', 'hitechtw' ),
        'id'         => 'process',
        'post_types' => ['page'],
        'include'    => [
            'relation' => 'OR',
            'ID'       => [1918],
        ],
        'fields'     => [
            [
                'id'     => $prefix . 'steps',
                'type'   => 'group',
                'fields' => [
                    [
                        'name' => __( '標題', 'hitechtw' ),
                        'id'   => $prefix . 'title',
                        'type' => 'text',
                    ],
                    [
                        'name' => __( '步驟一', 'hitechtw' ),
                        'id'   => $prefix . 'step1',
                        'type' => 'textarea',
                    ],
                    [
                        'name' => __( '步驟二', 'hitechtw' ),
                        'id'   => $prefix . 'step2',
                        'type' => 'textarea',
                    ],
                    [
                        'name' => __( '步驟三', 'hitechtw' ),
                        'id'   => $prefix . 'step3',
                        'type' => 'textarea',
                    ],
                    [
                        'name' => __( '步驟四', 'hitechtw' ),
                        'id'   => $prefix . 'step4',
                        'type' => 'textarea',
                    ],
                    [
                        'name' => __( '步驟五', 'hitechtw' ),
                        'id'   => $prefix . 'step5',
                        'type' => 'textarea',
                    ],
                ],
            ],
            [
                'type' => 'divider',
            ],
            [
                'id'     => $prefix . 'content',
                'type'   => 'group',
                'fields' => [
                    [
                        'name' => __( '標題', 'hitechtw' ),
                        'id'   => $prefix . 'title',
                        'type' => 'text',
                    ],
                    [
                        'id'         => $prefix . 'items',
                        'type'       => 'group',
                        'clone'      => true,
                        'sort_clone' => true,
                        'fields'     => [
                            [
                                'name' => __( '項目名稱', 'hitechtw' ),
                                'id'   => $prefix . 'name',
                                'type' => 'text',
                            ],
                            [
                                'name'    => __( '圖片', 'hitechtw' ),
                                'id'      => $prefix . 'image',
                                'type'    => 'single_image',
                                'columns' => 4,
                            ],
                            [
                                'name'       => __( '中間列表', 'hitechtw' ),
                                'id'         => $prefix . 'list1',
                                'type'       => 'text_list',
                                'options'    => [
                                    '' => '檢驗項目',
                                ],
                                'clone'      => true,
                                'sort_clone' => true,
                                'columns'    => 4,
                            ],
                            [
                                'name'       => __( '右間列表', 'hitechtw' ),
                                'id'         => $prefix . 'list2',
                                'type'       => 'text_list',
                                'options'    => [
                                    '' => '檢驗項目',
                                ],
                                'clone'      => true,
                                'sort_clone' => true,
                                'columns'    => 4,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];

    return $meta_boxes;
}