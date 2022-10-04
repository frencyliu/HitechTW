<?php
add_filter( 'rwmb_meta_boxes', 'home_mb' );

function home_mb( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( '首頁', 'hitechtw' ),
        'id'         => null,
        'post_types' => ['page'],
        'include'    => [
            'relation' => 'OR',
            'ID'       => [1138],
        ],
        'tabs'       => [
            'tab_home_slide' => [
                'label' => '首頁輪播',
                'icon'  => '',
            ],
            'tab_feature'    => [
                'label' => '還好有找高澄驗屋',
                'icon'  => '',
            ],
            'tab_feature2'   => [
                'label' => '最完整的驗屋服務',
                'icon'  => '',
            ],
            'tab_google'   => [
                'label' => 'Google好評',
                'icon'  => '',
            ],
        ],
        'fields'     => [
            [
                'id'         => $prefix . 'slide',
                'type'       => 'group',
                'clone'      => true,
                'sort_clone' => true,
                'fields'     => [
                    [
                        'name'       => __( '圖片', 'hitechtw' ),
                        'id'         => $prefix . 'slide_img',
                        'type'       => 'single_image',
                        'image_size' => 'large',
                        'label_description' => '圖片尺寸11:5  例如:1920x873',
                        'columns'    => 3,
                    ],
                    [
                        'name'       => __( '手機板圖片', 'hitechtw' ),
                        'id'         => $prefix . 'slide_img_mobile',
                        'type'       => 'single_image',
                        'image_size' => 'large',
                        'label_description' => '圖片尺寸11:5  例如:770x350',
                        'columns'    => 3,
                    ],
                    [
                        'name'    => __( '連結', 'hitechtw' ),
                        'id'      => $prefix . 'slide_link',
                        'type'    => 'url',
                        'columns' => 6,
                    ],
                ],
                'tab'        => 'tab_home_slide',
            ],
            [
                'name' => __( '標題', 'hitechtw' ),
                'id'   => $prefix . 'title_1',
                'type' => 'text',
                'tab'  => 'tab_feature',
            ],
            [
                'name'    => __( '副標題', 'hitechtw' ),
                'id'      => $prefix . 'subtitle_1',
                'type'    => 'textarea',
                'columns' => 9,
                'tab'     => 'tab_feature',
            ],
            [
                'name'    => __( '圖片', 'hitechtw' ),
                'id'      => $prefix . 'img_1',
                'type'    => 'single_image',
                'columns' => 3,
                'tab'     => 'tab_feature',
            ],
            [
                'id'     => $prefix . 'count_group',
                'type'   => 'group',
                'fields' => [
                    [
                        'id'      => $prefix . 'icon_group_1',
                        'type'    => 'group',
                        'columns' => 4,
                        'fields'  => [
                            [
                                'name'    => __( 'ICON', 'hitechtw' ),
                                'id'      => $prefix . 'icon',
                                'type'    => 'single_image',
                                'columns' => 6,
                            ],
                            [
                                'name'    => __( '數字', 'hitechtw' ),
                                'id'      => $prefix . 'count',
                                'type'    => 'number',
                                'columns' => 6,
                            ],
                            [
                                'name' => __( '文字', 'hitechtw' ),
                                'id'   => $prefix . 'icon_text',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'id'      => $prefix . 'icon_group_2',
                        'type'    => 'group',
                        'columns' => 4,
                        'fields'  => [
                            [
                                'name'    => __( 'ICON', 'hitechtw' ),
                                'id'      => $prefix . 'icon',
                                'type'    => 'single_image',
                                'columns' => 6,
                            ],
                            [
                                'name'    => __( '數字', 'hitechtw' ),
                                'id'      => $prefix . 'count',
                                'type'    => 'number',
                                'columns' => 6,
                            ],
                            [
                                'name' => __( '文字', 'hitechtw' ),
                                'id'   => $prefix . 'icon_text',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'id'      => $prefix . 'icon_group_3',
                        'type'    => 'group',
                        'columns' => 4,
                        'fields'  => [
                            [
                                'name'    => __( 'ICON', 'hitechtw' ),
                                'id'      => $prefix . 'icon',
                                'type'    => 'single_image',
                                'columns' => 6,
                            ],
                            [
                                'name'    => __( '數字', 'hitechtw' ),
                                'id'      => $prefix . 'count',
                                'type'    => 'number',
                                'columns' => 6,
                            ],
                            [
                                'name' => __( '文字', 'hitechtw' ),
                                'id'   => $prefix . 'icon_text',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'name' => __( '計算毫秒數', 'hitechtw' ),
                        'id'   => $prefix . 'ms',
                        'type' => 'number',
                    ],
                ],
                'tab'    => 'tab_feature',
            ],
            [
                'name' => __( '圖片', 'hitechtw' ),
                'id'   => $prefix . 'img_2_1',
                'type' => 'single_image',
                'tab'  => 'tab_feature2',
            ],
            [
                'name'    => __( '標題', 'hitechtw' ),
                'id'      => $prefix . 'title_2_1',
                'type'    => 'text',
                'columns' => 9,
                'tab'     => 'tab_feature2',
            ],
            [
                'name'    => __( '副標題', 'hitechtw' ),
                'id'      => $prefix . 'subtitle_2_1',
                'type'    => 'textarea',
                'columns' => 9,
                'tab'     => 'tab_feature2',
            ],
            [
                'id'      => $prefix . 'group_6a',
                'type'    => 'group',
                'columns' => 6,
                'fields'  => [
                    [
                        'name' => __( 'Text', 'hitechtw' ),
                        'id'   => $prefix . 'text_6a',
                        'type' => 'text',
                    ],
                    [
                        'name'       => __( 'Group', 'hitechtw' ),
                        'id'         => $prefix . 'subgroup_6a',
                        'type'       => 'group',
                        'clone'      => true,
                        'sort_clone' => true,
                        'fields'     => [
                            [
                                'name' => __( '6大優勢', 'hitechtw' ),
                                'id'   => $prefix . '6a',
                                'type' => 'text',
                            ],
                        ],
                    ],
                ],
                'tab'     => 'tab_feature2',
            ],
            [
                'id'      => $prefix . 'group_5p',
                'type'    => 'group',
                'columns' => 6,
                'fields'  => [
                    [
                        'name' => __( 'Text', 'hitechtw' ),
                        'id'   => $prefix . 'text_5p',
                        'type' => 'text',
                    ],
                    [
                        'name'       => __( 'Group', 'hitechtw' ),
                        'id'         => $prefix . 'subgroup_5p',
                        'type'       => 'group',
                        'clone'      => true,
                        'sort_clone' => true,
                        'fields'     => [
                            [
                                'name' => __( '5大保證', 'hitechtw' ),
                                'id'   => $prefix . '5p',
                                'type' => 'text',
                            ],
                        ],
                    ],
                ],
                'tab'     => 'tab_feature2',
            ],
            [
                'name'    => __( '按鈕文字', 'hitechtw' ),
                'id'      => $prefix . 'btn_text_2_1',
                'type'    => 'text',
                'columns' => 6,
                'tab'     => 'tab_feature2',
            ],
            [
                'name'    => __( '按鈕連結', 'hitechtw' ),
                'id'      => $prefix . 'btn_link_2_1',
                'type'    => 'url',
                'columns' => 6,
                'tab'     => 'tab_feature2',
            ],
            [
                'name' => __( '背景', 'hitechtw' ),
                'id'   => $prefix . 'google_bg',
                'type' => 'single_image',
                'columns' => 2,
                'tab'  => 'tab_google',
            ],
            [
                'name'    => __( '標題1', 'hitechtw' ),
                'id'      => $prefix . 'google_title1',
                'type'    => 'text',
                'columns' => 5,
                'tab'     => 'tab_google',
            ],
            [
                'name'    => __( '標題2', 'hitechtw' ),
                'id'      => $prefix . 'google_title2',
                'type'    => 'text',
                'columns' => 5,
                'tab'     => 'tab_google',
            ],
        ],
    ];

    return $meta_boxes;
}