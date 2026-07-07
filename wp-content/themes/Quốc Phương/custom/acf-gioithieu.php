<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key' => 'group_about_page_sections',
        'title' => 'Trang giới thiệu - Quản lý section',
        'fields' => [
            [
                'key' => 'field_about_tab_banner',
                'label' => 'Banner',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_about_banner_enable',
                'label' => 'Hiển thị Banner',
                'name' => 'about_banner_enable',
                'type' => 'true_false',
                'ui' => 1,
                'default_value' => 1,
            ],
            [
                'key' => 'field_about_banner',
                'label' => 'Section Banner',
                'name' => 'about_banner',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'key' => 'field_about_banner_bg',
                        'label' => 'Ảnh nền banner',
                        'name' => 'background',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                    ],
                    [
                        'key' => 'field_about_banner_label',
                        'label' => 'Label nhỏ',
                        'name' => 'label',
                        'type' => 'text',
                        'default_value' => 'GIỚI THIỆU',
                    ],
                    [
                        'key' => 'field_about_banner_title',
                        'label' => 'Tiêu đề chính',
                        'name' => 'title',
                        'type' => 'text',
                        'default_value' => 'Tinh hoa đá tự nhiên',
                    ],
                    [
                        'key' => 'field_about_banner_subtitle',
                        'label' => 'Tiêu đề phụ',
                        'name' => 'subtitle',
                        'type' => 'text',
                        'default_value' => 'Kiến tạo không gian sống đẳng cấp',
                    ],
                    [
                        'key' => 'field_about_banner_description',
                        'label' => 'Mô tả',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 4,
                    ],
                    [
                        'key' => 'field_about_banner_button_1_text',
                        'label' => 'Nút 1 - Text',
                        'name' => 'button_1_text',
                        'type' => 'text',
                        'default_value' => 'Khám phá sản phẩm',
                    ],
                    [
                        'key' => 'field_about_banner_button_1_link',
                        'label' => 'Nút 1 - Link',
                        'name' => 'button_1_link',
                        'type' => 'url',
                    ],
                    [
                        'key' => 'field_about_banner_button_2_text',
                        'label' => 'Nút 2 - Text',
                        'name' => 'button_2_text',
                        'type' => 'text',
                        'default_value' => 'Liên hệ ngay',
                    ],
                    [
                        'key' => 'field_about_banner_button_2_link',
                        'label' => 'Nút 2 - Link',
                        'name' => 'button_2_link',
                        'type' => 'url',
                    ],
                    [
                        'key' => 'field_about_banner_stats',
                        'label' => 'Thông số',
                        'name' => 'stats',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Thêm thông số',
                        'sub_fields' => [
                            [
                                'key' => 'field_about_banner_stat_icon',
                                'label' => 'Icon ảnh',
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'thumbnail',
                            ],
                            [
                                'key' => 'field_about_banner_stat_number',
                                'label' => 'Số',
                                'name' => 'number',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_about_banner_stat_text',
                                'label' => 'Nội dung',
                                'name' => 'text',
                                'type' => 'text',
                            ],
                        ],
                    ],
                ],
            ],

            [
                'key' => 'field_about_tab_intro',
                'label' => 'Giới thiệu',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_about_intro_enable',
                'label' => 'Hiển thị section giới thiệu',
                'name' => 'about_intro_enable',
                'type' => 'true_false',
                'ui' => 1,
                'default_value' => 1,
            ],
            [
                'key' => 'field_about_intro',
                'label' => 'Section giới thiệu',
                'name' => 'about_intro',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'key' => 'field_about_intro_image',
                        'label' => 'Ảnh bên trái',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                    ],
                    [
                        'key' => 'field_about_intro_title',
                        'label' => 'Tiêu đề',
                        'name' => 'title',
                        'type' => 'text',
                        'default_value' => 'Kho đá Quốc Phương',
                    ],
                    [
                        'key' => 'field_about_intro_subtitle',
                        'label' => 'Tiêu đề phụ màu đỏ',
                        'name' => 'subtitle',
                        'type' => 'text',
                        'default_value' => 'GRANITE - MARBLE',
                    ],
                    [
                        'key' => 'field_about_intro_description',
                        'label' => 'Mô tả',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 8,
                    ],
                ],
            ],


         [
    'key' => 'field_about_tab_granite',
    'label' => 'Đá Granite',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
],
[
    'key' => 'field_about_granite_enable',
    'label' => 'Hiển thị section Đá Granite',
    'name' => 'about_granite_enable',
    'type' => 'true_false',
    'ui' => 1,
    'default_value' => 1,
],
[
    'key' => 'field_about_granite',
    'label' => 'Section Đá Granite',
    'name' => 'about_granite',
    'type' => 'group',
    'layout' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_about_granite_label',
            'label' => 'Label nhỏ',
            'name' => 'label',
            'type' => 'text',
            'default_value' => 'ĐÁ GRANITE HAY CÒN GỌI LÀ ĐÁ HOA CƯƠNG',
        ],
        [
            'key' => 'field_about_granite_title',
            'label' => 'Tiêu đề',
            'name' => 'title',
            'type' => 'text',
            'default_value' => 'ĐÁ GRANITE',
        ],
        [
            'key' => 'field_about_granite_description',
            'label' => 'Mô tả',
            'name' => 'description',
            'type' => 'textarea',
            'rows' => 6,
        ],
        [
            'key' => 'field_about_granite_image',
            'label' => 'Ảnh đá bên phải',
            'name' => 'image',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
        ],
        [
            'key' => 'field_about_granite_features',
            'label' => 'Ưu điểm',
            'name' => 'features',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm ưu điểm',
            'sub_fields' => [
                [
                    'key' => 'field_about_granite_feature_icon',
                    'label' => 'Icon',
                    'name' => 'icon',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ],
                [
                    'key' => 'field_about_granite_feature_title',
                    'label' => 'Tiêu đề',
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_about_granite_feature_text',
                    'label' => 'Mô tả ngắn',
                    'name' => 'text',
                    'type' => 'text',
                ],
            ],
        ],
        [
            'key' => 'field_about_granite_colors_title',
            'label' => 'Tiêu đề mẫu đá',
            'name' => 'colors_title',
            'type' => 'text',
            'default_value' => 'MẪU ĐÁ GRANITE',
        ],
        [
            'key' => 'field_about_granite_colors_desc',
            'label' => 'Mô tả mẫu đá',
            'name' => 'colors_desc',
            'type' => 'textarea',
            'rows' => 3,
        ],
        [
            'key' => 'field_about_granite_colors',
            'label' => 'Danh sách mẫu đá',
            'name' => 'colors',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm mẫu đá',
            'sub_fields' => [
                [
                    'key' => 'field_about_granite_color_image',
                    'label' => 'Ảnh mẫu đá',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ],
                [
                    'key' => 'field_about_granite_color_name',
                    'label' => 'Tên mẫu',
                    'name' => 'name',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_about_granite_color_origin',
                    'label' => 'Xuất xứ',
                    'name' => 'origin',
                    'type' => 'text',
                ],
            ],
        ],

        [
    'key' => 'field_about_granite_commit_icon',
    'label' => 'Cam kết - Icon ảnh',
    'name' => 'commit_icon',
    'type' => 'image',
    'return_format' => 'array',
    'preview_size' => 'thumbnail',
],
[
    'key' => 'field_about_granite_commit_title',
    'label' => 'Cam kết - Tiêu đề',
    'name' => 'commit_title',
    'type' => 'text',
    'default_value' => 'CAM KẾT CHẤT LƯỢNG',
],
[
    'key' => 'field_about_granite_commit_desc',
    'label' => 'Cam kết - Mô tả',
    'name' => 'commit_desc',
    'type' => 'textarea',
    'rows' => 3,
    'default_value' => 'Sản phẩm đá Granite tự nhiên 100%, được kiểm định chất lượng nghiêm ngặt.',
],
        [
            'key' => 'field_about_granite_specs',
            'label' => 'Thông số dưới cùng',
            'name' => 'specs',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm thông số',
            'sub_fields' => [
                [
                    'key' => 'field_about_granite_spec_label',
                    'label' => 'Tên',
                    'name' => 'label',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_about_granite_spec_value',
                    'label' => 'Giá trị',
                    'name' => 'value',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_about_granite_spec_note',
                    'label' => 'Ghi chú',
                    'name' => 'note',
                    'type' => 'text',
                ],
            ],
        ],
    ],
],


[
    'key' => 'field_about_tab_marble',
    'label' => 'Đá Marble',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
],
[
    'key' => 'field_about_marble_enable',
    'label' => 'Hiển thị section Đá Marble',
    'name' => 'about_marble_enable',
    'type' => 'true_false',
    'ui' => 1,
    'default_value' => 1,
],
[
    'key' => 'field_about_marble',
    'label' => 'Section Đá Marble',
    'name' => 'about_marble',
    'type' => 'group',
    'layout' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_about_marble_label',
            'label' => 'Label nhỏ',
            'name' => 'label',
            'type' => 'text',
            'default_value' => 'ĐÁ MARBLE HAY CÒN GỌI LÀ ĐÁ CẨM THẠCH',
        ],
        [
            'key' => 'field_about_marble_title',
            'label' => 'Tiêu đề',
            'name' => 'title',
            'type' => 'text',
            'default_value' => 'ĐÁ MARBLE',
        ],
        [
            'key' => 'field_about_marble_description',
            'label' => 'Mô tả',
            'name' => 'description',
            'type' => 'textarea',
            'rows' => 7,
        ],
        [
            'key' => 'field_about_marble_image',
            'label' => 'Ảnh đá bên phải',
            'name' => 'image',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
        ],
        [
            'key' => 'field_about_marble_features',
            'label' => 'Ưu điểm',
            'name' => 'features',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm ưu điểm',
            'sub_fields' => [
                [
                    'key' => 'field_about_marble_feature_icon',
                    'label' => 'Icon',
                    'name' => 'icon',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ],
                [
                    'key' => 'field_about_marble_feature_title',
                    'label' => 'Tiêu đề',
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_about_marble_feature_text',
                    'label' => 'Mô tả ngắn',
                    'name' => 'text',
                    'type' => 'text',
                ],
            ],
        ],
        [
            'key' => 'field_about_marble_samples',
            'label' => 'Mẫu đá Marble',
            'name' => 'samples',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm mẫu đá',
            'sub_fields' => [
                [
                    'key' => 'field_about_marble_sample_image',
                    'label' => 'Ảnh mẫu',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ],
            ],
        ],
    ],
],


[
    'key' => 'field_about_tab_stone_picture',
    'label' => 'Tranh đá',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
],
[
    'key' => 'field_about_stone_picture_enable',
    'label' => 'Hiển thị section Tranh đá',
    'name' => 'about_stone_picture_enable',
    'type' => 'true_false',
    'ui' => 1,
    'default_value' => 1,
],
[
    'key' => 'field_about_stone_picture',
    'label' => 'Section Tranh đá',
    'name' => 'about_stone_picture',
    'type' => 'group',
    'layout' => 'block',
    'sub_fields' => [

        [
            'key'=>'field_picture_bg',
            'label'=>'Ảnh nền',
            'name'=>'background',
            'type'=>'image',
            'return_format'=>'array'
        ],

        [
            'key'=>'field_picture_title_small',
            'label'=>'Tiêu đề đỏ',
            'name'=>'title_small',
            'type'=>'text',
            'default_value'=>'TRANH ĐÁ ỐP TƯỜNG'
        ],

        [
            'key'=>'field_picture_title',
            'label'=>'Tiêu đề',
            'name'=>'title',
            'type'=>'text',
            'default_value'=>'TRANH ĐÁ <span>TỰ NHIÊN</span>'
        ],

        [
            'key'=>'field_picture_desc',
            'label'=>'Mô tả',
            'name'=>'description',
            'type'=>'textarea',
            'rows'=>6
        ],

    ]
],
        
        ],

        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-gioithieu.php',
                ],
            ],
        ],
    ]);
});