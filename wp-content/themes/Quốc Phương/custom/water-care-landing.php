<?php
/**
 * Aquira Water Care landing page configuration and rendering helpers.
 */

if (!function_exists('aquira_landing_has_value')) {
    function aquira_landing_has_value($value)
    {
        return !($value === null || $value === false || $value === '' || (is_array($value) && empty($value)));
    }
}

if (!function_exists('aquira_landing_default')) {
    function aquira_landing_default($key)
    {
        static $defaults = null;

        if ($defaults === null) {
            $defaults = array(
                'water_brand_name' => 'Aquira',
                'water_brand_full_name' => 'Aquira Water Care',
                'water_header_button' => array('title' => 'Dành riêng cho cư dân', 'url' => '#khaosat', 'target' => ''),
                'water_nav_items' => array(
                    array('label' => 'Quy trình', 'url' => '#quytrinh'),
                    array('label' => 'Khảo sát', 'url' => '#khaosat'),
                    array('label' => 'Ưu điểm', 'url' => '#uudiem'),
                    array('label' => 'Cam kết', 'url' => '#camket'),
                ),

                'water_hero_eyebrow' => 'Bảo vệ nguồn nước gia đình',
                'water_hero_title' => "Trải nghiệm & chăm sóc hệ thống\nđường ống nước sinh hoạt",
                'water_hero_description' => 'Chương trình khảo sát dành riêng cho căn hộ tại tòa nhà nhằm nâng cao chất lượng cuộc sống và bảo vệ tài sản thiết bị vệ sinh của cư dân thông qua giải pháp lọc nước tổng trung tâm cao cấp.',

                'water_benefits_title' => 'Ưu điểm của giải pháp Aquira',
                'water_benefits' => array(
                    array(
                        'icon_class' => 'fa-solid fa-shield-halved',
                        'title' => 'Bảo vệ toàn diện',
                        'description' => 'Ngăn chặn cặn bẩn tích tụ, bảo vệ tối ưu các thiết bị vệ sinh cao cấp.',
                    ),
                    array(
                        'icon_class' => 'fa-solid fa-shield-heart',
                        'title' => 'An toàn sức khỏe',
                        'description' => 'Loại bỏ triệt để các tác nhân gây hại tiềm ẩn trong nước sinh hoạt.',
                    ),
                    array(
                        'icon_class' => 'fa-solid fa-spa',
                        'title' => 'Chăm sóc da & tóc',
                        'description' => 'Nước mềm hơn, mang lại cảm giác dễ chịu, không còn khô da sau khi tắm.',
                    ),
                    array(
                        'icon_class' => 'fa-solid fa-piggy-bank',
                        'title' => 'Tiết kiệm chi phí',
                        'description' => 'Kéo dài tuổi thọ hệ thống đường ống và các thiết bị sử dụng nước.',
                    ),
                ),

                'water_process_title' => 'Quy trình thực hiện',
                'water_process_steps' => array(
                    array('number' => '1', 'title' => 'Khảo sát trực tuyến', 'description' => 'Chia sẻ nhu cầu và hiện trạng căn hộ của bạn thông qua form khảo sát.'),
                    array('number' => '2', 'title' => 'Chuyên gia liên hệ tư vấn', 'description' => 'Đội ngũ kỹ thuật sẽ gọi điện hỗ trợ giải đáp thắc mắc chuyên sâu.'),
                    array('number' => '3', 'title' => 'Kiểm tra thực tế', 'description' => 'Đánh giá hệ thống trực tiếp tại căn hộ và đề xuất giải pháp tối ưu nhất.'),
                ),

                'water_survey_shortcode' => '',
                'water_survey_title' => 'Khảo sát nhu cầu chăm sóc nguồn nước',
                'water_contact_title' => 'Q7: Thông tin liên hệ',
                'water_contact_description' => 'Vui lòng để lại thông tin chính xác để Aquira có thể gửi tặng bạn Mã dự thưởng và bản tóm tắt Kết quả khảo sát ngay sau khi hoàn tất.',
                'water_privacy_title' => 'Cam kết bảo mật thông tin',
                'water_privacy_description' => 'Dữ liệu của bạn chỉ được sử dụng cho chương trình khảo sát và chăm sóc cư dân tại tòa nhà.',
                'water_submit_text' => 'Gửi khảo sát & nhận mã dự thưởng ngay',

                'water_trust_items' => array(
                    array('icon_class' => 'fa-solid fa-award', 'eyebrow' => 'Dịch vụ', 'title' => 'Chuyên nghiệp'),
                    array('icon_class' => 'fa-solid fa-shield-halved', 'eyebrow' => 'Thông tin', 'title' => 'Tuyệt đối bảo mật'),
                    array('icon_class' => 'fa-solid fa-hand-holding-heart', 'eyebrow' => 'Hỗ trợ', 'title' => 'Tận tâm 24/7'),
                ),
                
                'water_footer_contacts' => array(
                    array('icon_class' => 'fa-solid fa-location-dot', 'text' => '21 Mỹ Đa Đông 4, Ngũ Hành Sơn, Đà Nẵng', 'url' => ''),
                    array('icon_class' => 'fa-solid fa-phone', 'text' => '0822335343', 'url' => 'tel:0822335343'),
                    array('icon_class' => 'fa-solid fa-envelope', 'text' => 'xhomedananghotelsuite@gmail.com', 'url' => 'mailto:xhomedananghotelsuite@gmail.com'),
                ),
                'water_footer_description' => 'Giải pháp chăm sóc và bảo vệ hệ thống nước sinh hoạt tiêu chuẩn quốc tế cho căn hộ cao cấp.',
                'water_footer_links' => array(
                    array('label' => 'Quy trình', 'url' => '#quytrinh'),
                    array('label' => 'Khảo sát', 'url' => '#khaosat'),
                    array('label' => 'Ưu điểm', 'url' => '#uudiem'),
                    array('label' => 'Cam kết', 'url' => '#camket'),
                ),
                'water_footer_support_links' => array(
                    array('label' => 'Trung tâm trợ giúp', 'url' => '#khaosat'),
                    array('label' => 'Điều khoản dịch vụ', 'url' => '#footer'),
                    array('label' => 'Chính sách bảo mật', 'url' => '#footer'),
                ),
                'water_footer_socials' => array(
                    array('label' => 'Facebook', 'icon_class' => 'fa-brands fa-facebook-f', 'url' => '#'),
                    array('label' => 'Instagram', 'icon_class' => 'fa-brands fa-instagram', 'url' => '#'),
                ),
                'water_copyright' => '© 2024 Aquira Water Care. Resident Support Program. All rights reserved.',
            );
        }

        return array_key_exists($key, $defaults) ? $defaults[$key] : null;
    }
}

if (!function_exists('aquira_landing_get_field')) {
    function aquira_landing_get_field($name, $default = null)
    {
        if (!function_exists('get_field')) {
            return $default;
        }

        $value = get_field($name);

        if (aquira_landing_has_value($value)) {
            return $value;
        }

        $option_value = get_field($name, 'option');

        return aquira_landing_has_value($option_value) ? $option_value : $default;
    }
}

if (!function_exists('aquira_landing_image_url')) {
    function aquira_landing_image_url($image, $size = 'full')
    {
        if (is_array($image) && !empty($image['sizes'][$size])) {
            return $image['sizes'][$size];
        }

        if (is_array($image) && !empty($image['url'])) {
            return $image['url'];
        }

        if (is_numeric($image)) {
            return wp_get_attachment_image_url($image, $size);
        }

        return is_string($image) ? $image : '';
    }
}

if (!function_exists('aquira_landing_image_alt')) {
    function aquira_landing_image_alt($image, $fallback = '')
    {
        if (is_array($image) && !empty($image['alt'])) {
            return $image['alt'];
        }

        if (is_array($image) && !empty($image['title'])) {
            return $image['title'];
        }

        return $fallback;
    }
}

if (!function_exists('aquira_landing_link')) {
    function aquira_landing_link($link, $default_title = '', $default_url = '#')
    {
        if (is_array($link)) {
            return array(
                'title' => !empty($link['title']) ? $link['title'] : $default_title,
                'url' => !empty($link['url']) ? $link['url'] : $default_url,
                'target' => !empty($link['target']) ? $link['target'] : '',
            );
        }

        if (is_string($link) && $link !== '') {
            return array('title' => $default_title, 'url' => $link, 'target' => '');
        }

        return array('title' => $default_title, 'url' => $default_url, 'target' => '');
    }
}

if (!function_exists('aquira_landing_class_list')) {
    function aquira_landing_class_list($classes)
    {
        return trim(preg_replace('/[^A-Za-z0-9_\-\s]/', '', (string) $classes));
    }
}

if (!function_exists('aquira_landing_default_hero_image_url')) {
    function aquira_landing_default_hero_image_url()
    {
        return get_stylesheet_directory_uri() . '/assets/images/aquira-water-system.jpg';
    }
}

if (!function_exists('aquira_landing_can_render_fluent_form')) {
    function aquira_landing_can_render_fluent_form($shortcode)
    {
        return is_string($shortcode)
            && preg_match('/\[fluentform\b/i', $shortcode)
            && shortcode_exists('fluentform');
    }
}

if (!function_exists('aquira_water_care_landing_render_parts')) {
    function aquira_water_care_landing_render_parts()
    {
        $parts = array('header', 'hero', 'process',  'survey', 'benefits', 'trust-strip', 'footer');

        foreach ($parts as $part) {
            get_template_part('template-parts/water-care/' . $part);
        }
    }
}

add_shortcode('landing_page', function () {
    ob_start();
    ?>
    <main id="main-landing" class="landing-page water-care-landing">
        <?php aquira_water_care_landing_render_parts(); ?>
    </main>
    <?php
    return ob_get_clean();
});

if (!function_exists('aquira_landing_acf_locations')) {
    function aquira_landing_acf_locations()
    {
        $locations = array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-landing.php',
                ),
            ),
        );

        if (function_exists('acf_add_options_page')) {
            $locations[] = array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'aquira-water-care-landing',
                ),
            );
        }

        return $locations;
    }
}

if (!function_exists('aquira_landing_acf_text')) {
    function aquira_landing_acf_text($key, $label, $name, $default = '', $type = 'text', $instructions = '')
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => $type,
            'instructions' => $instructions,
            'default_value' => is_string($default) ? $default : '',
            'placeholder' => is_string($default) ? $default : '',
            'rows' => $type === 'textarea' ? 3 : null,
        );
    }
}

if (!function_exists('aquira_landing_acf_image')) {
    function aquira_landing_acf_image($key, $label, $name, $instructions = '')
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'image',
            'instructions' => $instructions,
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        );
    }
}

if (!function_exists('aquira_landing_acf_link')) {
    function aquira_landing_acf_link($key, $label, $name)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'link',
            'return_format' => 'array',
        );
    }
}

if (!function_exists('aquira_landing_acf_simple_links')) {
    function aquira_landing_acf_simple_links($key, $label, $name)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm liên kết',
            'sub_fields' => array(
                aquira_landing_acf_text($key . '_label', 'Nhãn', 'label'),
                aquira_landing_acf_text($key . '_url', 'URL / Anchor', 'url', '#'),
            ),
        );
    }
}

if (!function_exists('aquira_landing_register_group')) {
    function aquira_landing_register_group($key, $title, $fields)
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        acf_add_local_field_group(array(
            'key' => $key,
            'title' => $title,
            'fields' => $fields,
            'location' => aquira_landing_acf_locations(),
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
        ));
    }
}

add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            // 'page_title' => 'Landing Aquira Water Care',
            // 'menu_title' => 'Landing Aquira Water Care',
            // 'menu_slug' => 'aquira-water-care-landing',
            // 'capability' => 'edit_posts',
            // 'redirect' => false,
            // 'position' => 30,
            // 'icon_url' => 'dashicons-filter',
        ));
    }

    aquira_landing_register_group('group_aquira_water_header', 'Aquira Water Care - Header & Hero', array(
        aquira_landing_acf_image('field_water_logo', 'Logo', 'water_logo', 'Có thể để trống để dùng biểu tượng giọt nước mặc định.'),
        aquira_landing_acf_text('field_water_brand_name', 'Tên thương hiệu', 'water_brand_name', aquira_landing_default('water_brand_name')),
        array(
            'key' => 'field_water_nav_items',
            'label' => 'Menu landing',
            'name' => 'water_nav_items',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm menu',
            'sub_fields' => array(
                aquira_landing_acf_text('field_water_nav_label', 'Nhãn', 'label'),
                aquira_landing_acf_text('field_water_nav_url', 'Link/Anchor', 'url', '#'),
            ),
        ),
        aquira_landing_acf_link('field_water_header_button', 'Nút trên header', 'water_header_button'),
        aquira_landing_acf_image('field_water_hero_background', 'Ảnh nền hero', 'water_hero_background', 'Khuyến nghị ảnh hệ thống lọc nước/đường ống ngang, tối thiểu 1440px.'),
        aquira_landing_acf_text('field_water_hero_eyebrow', 'Dòng nhỏ hero', 'water_hero_eyebrow', aquira_landing_default('water_hero_eyebrow')),
        aquira_landing_acf_text('field_water_hero_title', 'Tiêu đề hero', 'water_hero_title', aquira_landing_default('water_hero_title'), 'textarea'),
        aquira_landing_acf_text('field_water_hero_description', 'Mô tả trong khung hero', 'water_hero_description', aquira_landing_default('water_hero_description'), 'textarea'),
    ));

    aquira_landing_register_group('group_aquira_water_benefits', 'Aquira Water Care - Ưu điểm', array(
        aquira_landing_acf_text('field_water_benefits_title', 'Tiêu đề', 'water_benefits_title', aquira_landing_default('water_benefits_title')),
        array(
            'key' => 'field_water_benefits',
            'label' => 'Danh sách ưu điểm',
            'name' => 'water_benefits',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm ưu điểm',
            'sub_fields' => array(
                aquira_landing_acf_text('field_water_benefit_icon_class', 'FontAwesome class', 'icon_class', 'fa-solid fa-shield-halved'),
                aquira_landing_acf_text('field_water_benefit_title', 'Tiêu đề', 'title'),
                aquira_landing_acf_text('field_water_benefit_description', 'Mô tả', 'description', '', 'textarea'),
            ),
        ),
    ));

    aquira_landing_register_group('group_aquira_water_process', 'Aquira Water Care - Quy trình', array(
        aquira_landing_acf_text('field_water_process_title', 'Tiêu đề', 'water_process_title', aquira_landing_default('water_process_title')),
        array(
            'key' => 'field_water_process_steps',
            'label' => 'Các bước thực hiện',
            'name' => 'water_process_steps',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm bước',
            'sub_fields' => array(
                aquira_landing_acf_text('field_water_process_number', 'Số thứ tự', 'number', '1'),
                aquira_landing_acf_text('field_water_process_step_title', 'Tiêu đề', 'title'),
                aquira_landing_acf_text('field_water_process_step_description', 'Mô tả', 'description', '', 'textarea'),
            ),
        ),
    ));

    aquira_landing_register_group('group_aquira_water_survey', 'Aquira Water Care - Khảo sát Fluent Forms', array(
        aquira_landing_acf_text('field_water_survey_title', 'Tiêu đề khảo sát', 'water_survey_title', aquira_landing_default('water_survey_title')),
        aquira_landing_acf_text('field_water_survey_shortcode', 'Shortcode Fluent Forms', 'water_survey_shortcode', '', 'text', 'Dán shortcode dạng [fluentform id="1"]. Nội dung câu hỏi và submission quản trị trong Fluent Forms.'),
        
        // aquira_landing_acf_text('field_water_contact_title', 'Tiêu đề thông tin liên hệ fallback', 'water_contact_title', aquira_landing_default('water_contact_title')),
        // aquira_landing_acf_text('field_water_contact_description', 'Mô tả thông tin liên hệ fallback', 'water_contact_description', aquira_landing_default('water_contact_description'), 'textarea'),
        // aquira_landing_acf_text('field_water_privacy_title', 'Tiêu đề cam kết bảo mật fallback', 'water_privacy_title', aquira_landing_default('water_privacy_title')),
        // aquira_landing_acf_text('field_water_privacy_description', 'Mô tả bảo mật fallback', 'water_privacy_description', aquira_landing_default('water_privacy_description'), 'textarea'),
        // aquira_landing_acf_text('field_water_submit_text', 'Text nút gửi fallback', 'water_submit_text', aquira_landing_default('water_submit_text')),
    ));

    aquira_landing_register_group('group_aquira_water_footer', 'Aquira Water Care - Cam kết & Footer', array(  
        array(
            'key' => 'field_water_trust_items',
            'label' => 'Dải cam kết',
            'name' => 'water_trust_items',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm cam kết',
            'sub_fields' => array(
                aquira_landing_acf_text('field_water_trust_icon_class', 'FontAwesome class', 'icon_class', 'fa-solid fa-award'),
                aquira_landing_acf_text('field_water_trust_eyebrow', 'Dòng nhỏ', 'eyebrow'),
                aquira_landing_acf_text('field_water_trust_title', 'Tiêu đề', 'title'),
            ),
        ),
        aquira_landing_acf_image('field_water_footer_logo', 'Logo footer', 'water_footer_logo'),
        aquira_landing_acf_text('field_water_brand_full_name', 'Tên thương hiệu footer', 'water_brand_full_name', aquira_landing_default('water_brand_full_name')),
        aquira_landing_acf_text('field_water_footer_description', 'Mô tả footer', 'water_footer_description', aquira_landing_default('water_footer_description'), 'textarea'),
        array(
            'key' => 'field_water_footer_contacts',
            'label' => 'Thông tin liên hệ',
            'name' => 'water_footer_contacts',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm liên hệ',
            'sub_fields' => array(
                aquira_landing_acf_text('field_water_footer_contact_icon_class', 'FontAwesome class', 'icon_class', 'fa-solid fa-circle-info'),
                aquira_landing_acf_text('field_water_footer_contact_text', 'Nội dung', 'text'),
                aquira_landing_acf_text('field_water_footer_contact_url', 'Link', 'url'),
            ),
        ),
        aquira_landing_acf_simple_links('field_water_footer_links', 'Cột Liên kết', 'water_footer_links'),
        aquira_landing_acf_simple_links('field_water_footer_support_links', 'Cột Hỗ trợ', 'water_footer_support_links'),
        array(
            'key' => 'field_water_footer_socials',
            'label' => 'Mạng xã hội',
            'name' => 'water_footer_socials',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm mạng xã hội',
            'sub_fields' => array(
                aquira_landing_acf_text('field_water_footer_social_label', 'Nhãn', 'label'),
                aquira_landing_acf_text('field_water_footer_social_icon_class', 'FontAwesome class', 'icon_class', 'fa-brands fa-facebook-f'),
                aquira_landing_acf_text('field_water_footer_social_url', 'URL', 'url', '#'),
            ),
        ),
        aquira_landing_acf_text('field_water_copyright', 'Copyright', 'water_copyright', aquira_landing_default('water_copyright')),
    ));
});
