<?php
add_filter( 'rwmb_meta_boxes', 'mb_htselect' );

function mb_htselect( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( '高澄嚴選', 'hitechtw' ),
        'id'         => 'htselect',
        'post_types' => ['page'],
        'include'    => [
            'relation' => 'OR',
            'template' => [
                'page-template-slick.php',
                'page-template-simple.php',
                'page-template-portfolio.php',
            ],
        ],
        'fields'     => [
            [
                'type' => 'heading',
                'name' => __( '品牌介紹', 'hitechtw' ),
            ],
            [
                'id'      => $prefix . 'brand_data_left',
                'type'    => 'group',
                'columns' => 6,
                'fields'  => [
                    [
                        'name' => __( '品牌名稱', 'hitechtw' ),
                        'id'   => $prefix . 'brand_name',
                        'type' => 'text',
                    ],
                    [
                        'name'       => __( '品牌圖片', 'hitechtw' ),
                        'id'         => $prefix . 'brand_image',
                        'type'       => 'single_image',
                        'image_size' => 'large',
                    ],
                ],
            ],
            [
                'id'      => $prefix . 'brand_data_right',
                'type'    => 'group',
                'columns' => 6,
                'fields'  => [
                    [
                        'name'        => __( '說明標題', 'hitechtw' ),
                        'id'          => $prefix . 'title_name',
                        'type'        => 'text',
                        'std'         => '關於我們',
                        'placeholder' => __( '關於我們', 'hitechtw' ),
                    ],
                    [
                        'name'    => __( '臉書網站連結', 'hitechtw' ),
                        'id'      => $prefix . 'fb_link',
                        'type'    => 'url',
                        'columns' => 6,
                    ],
                    [
                        'name'    => __( '網站連結', 'hitechtw' ),
                        'id'      => $prefix . 'site_link',
                        'type'    => 'url',
                        'columns' => 6,
                    ],
                    [
                        'name' => __( '內容', 'hitechtw' ),
                        'id'   => $prefix . 'brand_content',
                        'type' => 'wysiwyg',
                    ],
                ],
            ],
        ],
    ];

    return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'mb_slick_slide' );

function mb_slick_slide( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( '說明 & Slide', 'hitechtw' ),
        'id'         => 'slick-slide',
        'post_types' => ['page'],
        'include'    => [
            'relation' => 'OR',
            'template' => ['page-template-slick.php'],
        ],
        'fields'     => [
            [
                'name'        => __( '可以在底下新增區域', 'hitechtw' ),
                'id'          => $prefix . 'slide_area',
                'type'        => 'group',
                'collapsible' => true,
                'group_title' => '說明 & Slide區域',
                'clone'       => true,
                'sort_clone'  => true,
                'max_clone'   => 11,
                'add_button'  => __( '新增一個區域', 'hitechtw' ),
                'fields'      => [
                    [
                        'id'      => $prefix . 'slide_left',
                        'type'    => 'group',
                        'columns' => 6,
                        'fields'  => [
                            [
                                'name' => __( '說明標題', 'hitechtw' ),
                                'id'   => $prefix . 'slide_title',
                                'type' => 'text',
                            ],
                            [
                                'name' => __( '說明內文', 'hitechtw' ),
                                'id'   => $prefix . 'slide_content',
                                'type' => 'wysiwyg',
                            ],
                            [
                                'name'    => __( '按鈕文字', 'hitechtw' ),
                                'id'      => $prefix . 'btn_text',
                                'type'    => 'text',
                                'columns' => 5,
                            ],
                            [
                                'name'    => __( '按鈕連結', 'hitechtw' ),
                                'id'      => $prefix . 'btn_link',
                                'type'    => 'url',
                                'columns' => 5,
                            ],
                            [
                                'name'    => __( '開新分頁', 'hitechtw' ),
                                'id'      => $prefix . 'in_new_window',
                                'type'    => 'checkbox',
                                'columns' => 2,
                            ],
                        ],
                    ],
                    [
                        'id'      => $prefix . 'slide_right',
                        'type'    => 'group',
                        'columns' => 6,
                        'fields'  => [
                            [
                                'name'              => __( 'Slide圖片', 'hitechtw' ),
                                'id'                => $prefix . 'slide',
                                'type'              => 'image_advanced',
                                'label_description' => __( 'Slide 比例是 1:1 ，如果只有一張就以純圖片呈現', 'hitechtw' ),
                                'image_size'        => 'large',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];

    return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'mb_portfolio' );

function mb_portfolio( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( '人氣設計版型', 'hitechtw' ),
        'id'         => 'portfolio',
        'post_types' => ['page'],
        'include'    => [
            'relation' => 'OR',
            'template' => ['page-template-portfolio.php'],
        ],
        'fields'     => [
            [
                'type' => 'heading',
                'name' => __( '標題', 'hitechtw' ),
            ],
            [
                'id'          => $prefix . 'portfolio_title',
                'type'        => 'text',
                'placeholder' => __( '人氣設計', 'hitechtw' ),
            ],
            [
                'name'              => __( '選擇高澄嚴選的公司分類', 'hitechtw' ),
                'id'                => $prefix . 'portfolio_ht_company',
                'type'              => 'taxonomy',
                'label_description' => __( '如果要新增公司，可以到 [高澄嚴選案例] > [公司名稱] 來新增', 'hitechtw' ),
                'taxonomy'          => ['ht-company'],
                'field_type'        => 'radio_list',
                'required'          => true,
                'columns'           => 8,
            ],
            [
                'name'              => __( '抓取多少數量', 'hitechtw' ),
                'id'                => $prefix . 'portfolio_number',
                'type'              => 'number',
                'label_description' => __( '建議是4的倍數，4/8/12', 'hitechtw' ),
                'std'               => 8,
                'columns'           => 4,
            ],
        ],
    ];

    return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'mb_simple' );

function mb_simple( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( '簡單版型', 'hitechtw' ),
        'id'         => 'simple_template',
        'post_types' => ['page'],
        'include'    => [
            'relation' => 'OR',
            'template' => ['page-template-simple.php'],
        ],
        'fields'     => [
            [
                'id'          => $prefix . 'simple_group_left',
                'type'        => 'group',
                'collapsible' => true,
                'group_title' => '文字區塊',
                'clone'       => true,
                'columns'     => 6,
                'fields'      => [
                    [
                        'name' => __( '標題', 'hitechtw' ),
                        'id'   => $prefix . 'title',
                        'type' => 'text',
                    ],
                    [
                        'name' => __( '內文', 'hitechtw' ),
                        'id'   => $prefix . 'content',
                        'type' => 'wysiwyg',
                    ],
                    [
                        'name'    => __( '按鈕文字', 'hitechtw' ),
                        'id'      => $prefix . 'btn_text',
                        'type'    => 'text',
                        'columns' => 5,
                    ],
                    [
                        'name'    => __( '按鈕連結', 'hitechtw' ),
                        'id'      => $prefix . 'btn_link',
                        'type'    => 'url',
                        'columns' => 5,
                    ],
                    [
                        'name'    => __( '新視窗開啟', 'hitechtw' ),
                        'id'      => $prefix . 'in_new_window',
                        'type'    => 'checkbox',
                        'columns' => 2,
                    ],
                ],
            ],
            [
                'name'       => __( '圖片', 'hitechtw' ),
                'id'         => $prefix . 'img',
                'type'       => 'image_advanced',
                'image_size' => 'large',
                'columns'    => 6,
            ],
        ],
    ];

    return $meta_boxes;
}