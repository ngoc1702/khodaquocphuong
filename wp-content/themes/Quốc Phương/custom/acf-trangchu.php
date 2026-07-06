<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('quoc_phuong_home_defaults')) {
    function quoc_phuong_home_defaults()
    {
        return array(
            'home_banner_enable' => 1,
            'home_banner_eyebrow' => 'KHO ĐÁ TỰ NHIÊN QUỐC PHƯƠNG',
            'home_banner_title_highlight' => 'Tinh hoa đá tự nhiên',
            'home_banner_title' => 'Nâng tầm không gian sống',
            'home_banner_description' => 'Nhập khẩu và phân phối các loại đá tự nhiên cao cấp: Marble, Granite, Quartzite... cùng giải pháp thi công trọn gói cho mọi công trình.',
            'home_banner_primary_text' => 'Khám phá sản phẩm',
            'home_banner_primary_url' => '#sanpham',
            'home_banner_secondary_text' => 'Liên hệ ngay',
            'home_banner_secondary_url' => 'tel:0919101868',
            'home_banner_image' => '',
            'home_banner_stats' => array(
                array(
                    'icon_image' => '',
                    'icon_class' => 'fa-solid fa-gem',
                    'value' => '1000+',
                    'label' => 'Mẫu đá đa dạng',
                    'description' => 'Đáp ứng mọi nhu cầu',
                ),
                array(
                    'icon_image' => '',
                    'icon_class' => 'fa-solid fa-users',
                    'value' => '15+',
                    'label' => 'Năm kinh nghiệm',
                    'description' => 'Uy tín tạo nên thương hiệu',
                ),
                array(
                    'icon_image' => '',
                    'icon_class' => 'fa-solid fa-layer-group',
                    'value' => 'Nhập khẩu',
                    'label' => 'Chính hãng 100%',
                    'description' => 'Cam kết chất lượng',
                ),
            ),
            // Giới thiệu
            'home_intro_enable' => 1,
            'home_intro_eyebrow' => 'LỜI GIỚI THIỆU',
            'home_intro_title' => 'KHO ĐÁ HOA CƯƠNG',
            'home_intro_title_red' => 'QUỐC PHƯƠNG',
            'home_intro_description' => "Kho đá hoa cương Quốc Phương chuyên cung cấp các loại đá Granite, đá Marble chất lượng và uy tín tại TPHCM. Đến với Kho đá Quốc Phương các bạn sẽ được lựa chọn nhiều mẫu đá đa dạng về kích thước, màu sắc, hoa văn tinh tế, sang trọng và phù hợp với từng công trình khác nhau.\n\nĐá hoa cương được cung cấp có độ bền cao, phù hợp thi công nhiều hạng mục công trình ví dụ như đá ốp lát cầu thang, đá lát nền, đá ốp mặt tiền, Tranh đá. Sản phẩm không chỉ có được chất lượng vượt trội mà còn có giá thành cạnh tranh trên thị trường.",
            'home_intro_image' => '',
            'home_intro_bottom_image' => '',
            'home_intro_features' => array(
                array(
                    'icon_image' => '',
                    'icon_class' => 'fa-solid fa-gem',
                    'title' => 'Đa dạng mẫu mã',
                    'description' => 'Hàng trăm mẫu đá tự nhiên cao cấp, độc đáo',
                ),
                array(
                    'icon_image' => '',
                    'icon_class' => 'fa-solid fa-award',
                    'title' => '100% Chất lượng',
                    'description' => 'Đá nhập khẩu chính hãng, đạt chuẩn quốc tế',
                ),
                array(
                    'icon_image' => '',
                    'icon_class' => 'fa-solid fa-warehouse',
                    'title' => 'Kho hàng lớn',
                    'description' => 'Luôn sẵn số lượng lớn, đáp ứng nhanh mọi nhu cầu',
                ),
            ),

            // Sản phẩm nổi bật
            'home_featured_products_enable' => 1,
            'home_featured_products_eyebrow' => 'NỔI BẬT',
            'home_featured_products_title' => 'SẢN PHẨM',
            'home_featured_products_title_red' => 'TIÊU BIỂU',
            'home_featured_products_button_text' => 'Xem tất cả',
            'home_featured_products_button_url' => '/san-pham',
            'home_featured_products_background_image' => '',
            'home_featured_products' => array(),
        );
    }
}

if (!function_exists('quoc_phuong_home_field')) {
    function quoc_phuong_home_field($name)
    {
        $defaults = quoc_phuong_home_defaults();
        $has_default = array_key_exists($name, $defaults);

        if (function_exists('get_field')) {
            $value = get_field($name);

            if (substr($name, -7) === '_enable' && $value !== null) {
                $post_id = get_the_ID();
                $raw_value = $post_id ? get_post_meta($post_id, $name, true) : null;

                if ($value === false && $raw_value === '' && $has_default) {
                    return (bool) $defaults[$name];
                }

                return (bool) $value;
            }

            if ($has_default && is_array($defaults[$name])) {
                $post_id = get_the_ID();

                if ($post_id && metadata_exists('post', $post_id, $name) && ($value === null || $value === '' || $value === false)) {
                    return array();
                }
            }

            if ($value !== null && $value !== '' && $value !== false) {
                return $value;
            }
        }

        return $has_default ? $defaults[$name] : null;
    }
}

if (!function_exists('quoc_phuong_home_items')) {
    function quoc_phuong_home_items($name)
    {
        $items = quoc_phuong_home_field($name);
        return is_array($items) ? array_values(array_filter($items, 'is_array')) : array();
    }
}

if (!function_exists('quoc_phuong_home_image_url')) {
    function quoc_phuong_home_image_url($image, $size = 'full')
    {
        if (is_array($image) && !empty($image['sizes'][$size])) {
            return $image['sizes'][$size];
        }

        if (is_array($image) && !empty($image['url'])) {
            return $image['url'];
        }

        if (is_numeric($image)) {
            $url = wp_get_attachment_image_url((int) $image, $size);
            return $url ? $url : '';
        }

        return is_string($image) ? $image : '';
    }
}

if (!function_exists('quoc_phuong_home_acf_with_wrapper')) {
    function quoc_phuong_home_acf_with_wrapper($field, $width = 0)
    {
        if ($width > 0) {
            $field['wrapper'] = array(
                'width' => $width,
                'class' => '',
                'id' => '',
            );
        }

        return $field;
    }
}

if (!function_exists('quoc_phuong_home_acf_text')) {
    function quoc_phuong_home_acf_text($key, $label, $name, $default = '', $type = 'text', $instructions = '', $width = null)
    {
        $field = array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => $type,
            'default_value' => $default,
            'instructions' => $instructions,
        );

        if ($type === 'textarea') {
            $field['rows'] = 3;
            $field['new_lines'] = '';
        }

        return quoc_phuong_home_acf_with_wrapper($field, $width !== null ? $width : ($type === 'textarea' ? 100 : 50));
    }
}

if (!function_exists('quoc_phuong_home_acf_image')) {
    function quoc_phuong_home_acf_image($key, $label, $name, $instructions = '', $width = 50, $preview_size = 'large')
    {
        return quoc_phuong_home_acf_with_wrapper(array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => $preview_size,
            'library' => 'all',
            'instructions' => $instructions,
        ), $width);
    }
}

if (!function_exists('quoc_phuong_home_acf_relationship')) {
    function quoc_phuong_home_acf_relationship($key, $label, $name, $post_type = 'product', $width = 100)
    {
        return quoc_phuong_home_acf_with_wrapper(array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'relationship',
            'post_type' => array($post_type),
            'filters' => array('search', 'taxonomy'),
            'return_format' => 'object',
            'min' => 0,
            'max' => 12,
            'elements' => array('featured_image'),
        ), $width);
    }
}

if (!function_exists('quoc_phuong_home_acf_true_false')) {
    function quoc_phuong_home_acf_true_false($key, $label, $name)
    {
        return quoc_phuong_home_acf_with_wrapper(array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'true_false',
            'ui' => 1,
            'default_value' => 1,
        ), 25);
    }
}

if (!function_exists('quoc_phuong_home_acf_tab')) {
    function quoc_phuong_home_acf_tab($key, $label)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'type' => 'tab',
            'placement' => 'top',
        );
    }
}

if (!function_exists('quoc_phuong_home_acf_repeater_collapsed_key')) {
    function quoc_phuong_home_acf_repeater_collapsed_key($sub_fields)
    {
        foreach (array('value', 'label', 'title', 'name') as $name) {
            foreach ($sub_fields as $sub_field) {
                if (!empty($sub_field['name']) && $sub_field['name'] === $name && !empty($sub_field['key'])) {
                    return $sub_field['key'];
                }
            }
        }

        return '';
    }
}

if (!function_exists('quoc_phuong_home_acf_repeater')) {
    function quoc_phuong_home_acf_repeater($key, $label, $name, $sub_fields, $button_label, $max = 0)
    {
        $field = array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => $button_label,
            'sub_fields' => $sub_fields,
        );

        $collapsed_key = quoc_phuong_home_acf_repeater_collapsed_key($sub_fields);

        if ($max > 0) {
            $field['max'] = $max;
        }

        if ($collapsed_key) {
            $field['collapsed'] = $collapsed_key;
        }

        return $field;
    }
}

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    $defaults = quoc_phuong_home_defaults();

    acf_add_local_field_group(array(
        'key' => 'group_quoc_phuong_home_sections',
        'title' => 'Trang chủ - Quản lý section',
        'fields' => array(
            quoc_phuong_home_acf_tab('field_qp_home_tab_banner', 'Banner'),

            quoc_phuong_home_acf_true_false('field_qp_home_banner_enable', 'Hiển thị banner', 'home_banner_enable'),

            quoc_phuong_home_acf_text('field_qp_home_banner_eyebrow', 'Text nhỏ phía trên', 'home_banner_eyebrow', $defaults['home_banner_eyebrow']),

            quoc_phuong_home_acf_text('field_qp_home_banner_title_highlight', 'Tiêu đề lớn', 'home_banner_title_highlight', $defaults['home_banner_title_highlight']),

            quoc_phuong_home_acf_text('field_qp_home_banner_title', 'Tiêu đề phụ', 'home_banner_title', $defaults['home_banner_title']),

            quoc_phuong_home_acf_text('field_qp_home_banner_description', 'Mô tả', 'home_banner_description', $defaults['home_banner_description'], 'textarea'),

            quoc_phuong_home_acf_text('field_qp_home_banner_primary_text', 'Text nút chính', 'home_banner_primary_text', $defaults['home_banner_primary_text']),

            quoc_phuong_home_acf_text('field_qp_home_banner_primary_url', 'Link nút chính', 'home_banner_primary_url', $defaults['home_banner_primary_url']),

            quoc_phuong_home_acf_text('field_qp_home_banner_secondary_text', 'Text nút phụ', 'home_banner_secondary_text', $defaults['home_banner_secondary_text']),

            quoc_phuong_home_acf_text('field_qp_home_banner_secondary_url', 'Link nút phụ', 'home_banner_secondary_url', $defaults['home_banner_secondary_url']),

            quoc_phuong_home_acf_image(
                'field_qp_home_banner_image',
                'Ảnh banner',
                'home_banner_image',
                'Ảnh ngang khoảng 1920x700 hoặc 1920x800.',
                100,
                'large'
            ),

            quoc_phuong_home_acf_repeater(
                'field_qp_home_banner_stats',
                '3 khối thống kê banner',
                'home_banner_stats',
                array(
                    quoc_phuong_home_acf_image(
                        'field_qp_home_banner_stat_icon_image',
                        'Ảnh icon',
                        'icon_image',
                        'Có thể tải icon PNG/SVG.',
                        50,
                        'thumbnail'
                    ),

                    quoc_phuong_home_acf_text(
                        'field_qp_home_banner_stat_icon_class',
                        'FontAwesome class dự phòng',
                        'icon_class',
                        'fa-solid fa-gem',
                        'Nếu không tải ảnh icon thì dùng class này.',
                        50
                    ),

                    quoc_phuong_home_acf_text(
                        'field_qp_home_banner_stat_value',
                        'Số liệu / Giá trị',
                        'value',
                        '',
                        'text',
                        '',
                        50
                    ),

                    quoc_phuong_home_acf_text(
                        'field_qp_home_banner_stat_label',
                        'Nhãn chính',
                        'label',
                        '',
                        'text',
                        '',
                        50
                    ),

                    quoc_phuong_home_acf_text(
                        'field_qp_home_banner_stat_description',
                        'Mô tả nhỏ',
                        'description',
                        '',
                        'text',
                        '',
                        50
                    ),
                ),
                'Thêm khối',
                3
            ),

            // Giới thiệu
            quoc_phuong_home_acf_tab('field_qp_home_tab_intro', 'Giới thiệu'),

            quoc_phuong_home_acf_true_false(
                'field_qp_home_intro_enable',
                'Hiển thị giới thiệu',
                'home_intro_enable'
            ),

            quoc_phuong_home_acf_text(
                'field_qp_home_intro_eyebrow',
                'Text nhỏ phía trên',
                'home_intro_eyebrow',
                $defaults['home_intro_eyebrow']
            ),

            quoc_phuong_home_acf_text(
                'field_qp_home_intro_title',
                'Tiêu đề chính',
                'home_intro_title',
                $defaults['home_intro_title']
            ),

            quoc_phuong_home_acf_text(
                'field_qp_home_intro_title_red',
                'Tiêu đề màu đỏ',
                'home_intro_title_red',
                $defaults['home_intro_title_red']
            ),

            quoc_phuong_home_acf_text(
                'field_qp_home_intro_description',
                'Nội dung giới thiệu',
                'home_intro_description',
                $defaults['home_intro_description'],
                'textarea',
                '',
                100
            ),

            quoc_phuong_home_acf_image(
                'field_qp_home_intro_image',
                'Ảnh nền giới thiệu',
                'home_intro_image',
                'Ảnh ngang giống mẫu, khoảng 1920x760.',
                100,
                'large'
            ),

            quoc_phuong_home_acf_image(
                'field_qp_home_intro_bottom_image',
                'Ảnh bên dưới',
                'home_intro_bottom_image',
                'Ảnh hiển thị phía dưới section giới thiệu.',
                100,
                'large'
            ),

            quoc_phuong_home_acf_repeater(
                'field_qp_home_intro_features',
                '3 khối cam kết giới thiệu',
                'home_intro_features',
                array(
                    quoc_phuong_home_acf_image(
                        'field_qp_home_intro_feature_icon_image',
                        'Ảnh icon',
                        'icon_image',
                        'Có thể tải icon PNG/SVG.',
                        50,
                        'thumbnail'
                    ),

                    quoc_phuong_home_acf_text(
                        'field_qp_home_intro_feature_icon_class',
                        'FontAwesome class dự phòng',
                        'icon_class',
                        'fa-solid fa-gem',
                        '',
                        50
                    ),

                    quoc_phuong_home_acf_text(
                        'field_qp_home_intro_feature_title',
                        'Tiêu đề',
                        'title',
                        '',
                        'text',
                        '',
                        50
                    ),

                    quoc_phuong_home_acf_text(
                        'field_qp_home_intro_feature_description',
                        'Mô tả',
                        'description',
                        '',
                        'textarea',
                        '',
                        100
                    ),
                ),
                'Thêm khối',
                3
            ),

            // Sản phẩm nổi bật
            quoc_phuong_home_acf_tab('field_qp_home_tab_featured_products', 'Sản phẩm nổi bật'),

            quoc_phuong_home_acf_true_false(
                'field_qp_home_featured_products_enable',
                'Hiển thị section',
                'home_featured_products_enable'
            ),

            quoc_phuong_home_acf_text(
                'field_qp_home_featured_products_eyebrow',
                'Text nhỏ',
                'home_featured_products_eyebrow',
                $defaults['home_featured_products_eyebrow']
            ),

            quoc_phuong_home_acf_text(
                'field_qp_home_featured_products_title',
                'Tiêu đề đen',
                'home_featured_products_title',
                $defaults['home_featured_products_title']
            ),

            quoc_phuong_home_acf_text(
                'field_qp_home_featured_products_title_red',
                'Tiêu đề đỏ',
                'home_featured_products_title_red',
                $defaults['home_featured_products_title_red']
            ),

            quoc_phuong_home_acf_image(
                'field_qp_home_featured_products_background_image',
                'Ảnh nền section',
                'home_featured_products_background_image',
                'Ảnh nền vân đá nhẹ.',
                100,
                'large'
            ),

            quoc_phuong_home_acf_relationship(
                'field_qp_home_featured_products',
                'Chọn sản phẩm WooCommerce',
                'home_featured_products',
                'product',
                100
            ),

            quoc_phuong_home_acf_text(
                'field_qp_home_featured_products_button_text',
                'Text nút xem tất cả',
                'home_featured_products_button_text',
                $defaults['home_featured_products_button_text'],
                'text',
                '',
                50
            ),

            quoc_phuong_home_acf_text(
                'field_qp_home_featured_products_button_url',
                'Link nút xem tất cả',
                'home_featured_products_button_url',
                $defaults['home_featured_products_button_url'],
                'text',
                '',
                50
            ),
        ),

        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-trangchu.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));
});