<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('thanh_hung_home_defaults')) {
    function thanh_hung_home_defaults()
    {
        return array(
            'home_banner_enable' => 1,
            'home_banner_slides' => array(
                array(
                    'image' => '',
                    'eyebrow' => 'Dịch vụ chuyển nhà trọn gói',
                    'title' => 'Taxi Tải Thành Hưng',
                    'description' => 'Chuyển nhà, chuyển văn phòng, chuyển kho xưởng nhanh chóng với đội xe tải đa dạng và đội ngũ bốc xếp chuyên nghiệp.',
                    'primary_text' => 'Nhận báo giá miễn phí',
                    'primary_url' => '#',
                    'secondary_text' => 'Gọi 1800.00.08',
                    'secondary_url' => 'tel:18000008',
                ),
            ),
            'home_intro_enable' => 1,
            'home_intro_badge' => '✓ Thương hiệu chính hãng từ 1996',
            'home_intro_title_highlight' => 'Taxi Tải Thành Hưng',
            'home_intro_title' => 'Dịch Vụ Chuyển Nhà Trọn Gói Thành Hưng',
            'home_intro_description' => 'Thành Hưng Group Since 1996, còn được gọi là <strong>Taxi Tải Thành Hưng, Xe Tải Thành Hưng, Chuyển Nhà Thành Hưng</strong> - công ty vận tải chuyển nghiệp tại TPHCM, Hà Nội và toàn quốc. Thành Hưng chính hãng chuyên cung cấp các dịch vụ: chuyển nhà trọn gói, chuyển văn phòng, dời đổi kho xưởng, cho thuê taxi tải/xe tải chở hàng và vận chuyển đồ đặc thù.',
            'home_intro_primary_text' => 'Nhận báo giá miễn phí',
            'home_intro_primary_url' => '#',
            'home_intro_secondary_text' => 'Gọi 1800.00.08',
            'home_intro_secondary_url' => 'tel:18000008',
            'home_intro_image' => '',
            'home_intro_stats' => array(
                array(
                    'value' => '29+',
                    'label' => 'Năm kinh nghiệm',
                ),
                array(
                    'value' => '1M+',
                    'label' => 'Khách hàng tin tưởng',
                ),
                array(
                    'value' => '24/7',
                    'label' => 'Sẵn sàng phục vụ',
                ),
            ),
            'home_intro_strip_items' => array(
                array(
                    'icon_class' => 'fa-solid fa-shield-halved',
                    'title' => 'Bồi thường 100%',
                ),
                array(
                    'icon_class' => 'fa-solid fa-sack-dollar',
                    'title' => 'Báo giá minh bạch',
                ),
                array(
                    'icon_class' => 'fa-solid fa-handshake-angle',
                    'title' => 'Hỗ trợ sau vận chuyển',
                ),
            ),
            'home_services_enable' => 1,
            'home_services_subtitle' => 'Các Dịch Vụ Chính Tại',
            'home_services_title' => 'Hãng Taxi Tải Thành Hưng',
            'home_services_tabs' => array(
                array(
                    'label' => 'Chuyển nhà TPHCM',
                    'url' => '#',
                    'icon_class' => 'fa-solid fa-house-chimney',
                    'active' => 1,
                ),
                array(
                    'label' => 'Chuyển nhà quận 1',
                    'url' => '#',
                    'icon_class' => '',
                    'active' => 0,
                ),
                array(
                    'label' => 'Chuyển nhà quận 7',
                    'url' => '#',
                    'icon_class' => '',
                    'active' => 0,
                ),
                array(
                    'label' => 'Chuyển nhà quận 12',
                    'url' => '#',
                    'icon_class' => '',
                    'active' => 0,
                ),
                array(
                    'label' => 'Chuyển nhà Thủ Đức',
                    'url' => '#',
                    'icon_class' => '',
                    'active' => 0,
                ),
                array(
                    'label' => 'Chuyển nhà Bình Tân',
                    'url' => '#',
                    'icon_class' => '',
                    'active' => 0,
                ),
            ),
            'home_services_items' => array(
                array('icon_class' => 'fa-solid fa-truck-fast', 'title' => 'Taxi tải', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-house-chimney', 'title' => 'Chuyển nhà trọn gói', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-building', 'title' => 'Chuyển văn phòng', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-warehouse', 'title' => 'Chuyển kho xưởng', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-dolly', 'title' => 'Bốc xếp hàng hóa', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-house-user', 'title' => 'Chuyển phòng trọ', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-broom', 'title' => 'Hoàn trả mặt bằng', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-truck', 'title' => 'Thuê xe tải chở hàng', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-box-open', 'title' => 'Chuyển đồ', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-boxes-stacked', 'title' => 'Vận chuyển hàng hóa', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-vault', 'title' => 'Vận chuyển két sắt', 'url' => '#'),
                array('icon_class' => 'fa-solid fa-music', 'title' => 'Vận chuyển đàn piano', 'url' => '#'),
            ),
            'home_press_enable' => 1,
            'home_press_subtitle' => 'Báo chí nói gì về thương hiệu',
            'home_press_title' => 'Taxi Tải Chuyển Nhà Thành Hưng',
            'home_press_description' => 'Niềm tin tưởng Quý Khách tạo động lực và sự phát triển công ty <strong>Thành Hưng</strong>. Chúng tôi cam kết phục vụ bằng sự tận tâm và chân tình.',
            'home_press_logos' => array(
                array('name' => 'VTV Online', 'logo' => '', 'url' => '#'),
                array('name' => 'VNExpress', 'logo' => '', 'url' => '#'),
                array('name' => 'Thanh Niên', 'logo' => '', 'url' => '#'),
                array('name' => 'Pháp Luật', 'logo' => '', 'url' => '#'),
                array('name' => 'Dân Trí', 'logo' => '', 'url' => '#'),
                array('name' => 'Công An', 'logo' => '', 'url' => '#'),
                array('name' => 'Người Lao Động', 'logo' => '', 'url' => '#'),
                array('name' => 'Tiền Phong', 'logo' => '', 'url' => '#'),
                array('name' => 'VietnamBiz', 'logo' => '', 'url' => '#'),
            ),
            'home_press_articles' => array(
                array(
                    'image' => '',
                    'title' => 'Báo chí nói về chúng tôi',
                    'url' => '#',
                ),
                array(
                    'image' => '',
                    'title' => 'Dịch vụ di dời chuyên dọn kho xưởng trọn gói',
                    'url' => '#',
                ),
                array(
                    'image' => '',
                    'title' => 'Chuyển nhà Thành Hưng tại Hà Nội',
                    'url' => '#',
                ),
                array(
                    'image' => '',
                    'title' => 'Chuyển nhà Thành Hưng TPHCM',
                    'url' => '#',
                ),
            ),
            'home_news_enable' => 1,
            'home_news_subtitle' => 'Tin Chia Sẻ Mới Nhất Về',
            'home_news_title' => 'Taxi Tải Thành Hưng',
            'home_news_category' => '',
            'home_news_count' => 4,
            'home_news_button_text' => 'Xem tất cả tin tức →',
            'home_news_button_url' => '#',
            'home_video_enable' => 1,
            'home_video_subtitle' => 'Video Taxi Tải Thành Hưng',
            'home_video_title' => 'Những khoảnh khắc đẹp được chúng tôi ghi lại hoặc những hướng dẫn chia sẻ liên quan đến dịch vụ chuyển nhà.',
            'home_video_items' => array(
                array(
                    'title' => 'Review về dịch vụ Taxi Tải Thành Hưng',
                    'video_url' => '',
                    'thumbnail' => '',
                ),
                array(
                    'title' => 'Khách hàng chia sẻ sau vận chuyển',
                    'video_url' => '',
                    'thumbnail' => '',
                ),
                array(
                    'title' => 'Dịch vụ chuyển nhà trọn gói',
                    'video_url' => '',
                    'thumbnail' => '',
                ),
            ),
            'home_capabilities_enable' => 1,
            'home_capabilities_eyebrow' => 'Năng lực',
            'home_capabilities_subtitle' => 'Vì Sao Khách Hàng Chọn',
            'home_capabilities_title' => 'Dịch Vụ Chuyển Nhà Thành Hưng',
            'home_capabilities_cards' => array(
                array(
                    'icon_class' => 'fa-solid fa-user-tie',
                    'title' => 'Đội ngũ tận tâm, thân thiện',
                    'description' => 'Chú trọng tuyển dụng và đào tạo đội ngũ nhân viên chuyên nghiệp, thái độ đúng mực và luôn hỗ trợ khách hàng trong mọi tình huống.',
                ),
                array(
                    'icon_class' => 'fa-solid fa-gears',
                    'title' => 'Quy trình chuyên nghiệp',
                    'description' => 'Quy trình chuẩn hóa từ tiếp nhận, khảo sát, báo giá đến vận chuyển giúp hạn chế sai sót và tối ưu thời gian.',
                ),
                array(
                    'icon_class' => 'fa-solid fa-truck-fast',
                    'title' => 'Đội xe đa dạng',
                    'description' => 'Hệ thống xe tải nhiều tải trọng, phù hợp từng nhu cầu chuyển nhà, chuyển văn phòng và vận chuyển hàng hóa.',
                ),
                array(
                    'icon_class' => 'fa-solid fa-award',
                    'title' => 'Kinh nghiệm vận chuyển',
                    'description' => 'Hơn 20 năm kinh nghiệm vận chuyển nhà, kho bãi, căn hộ và hàng hóa cồng kềnh với quy trình xử lý linh hoạt.',
                ),
            ),
            'home_commitments_enable' => 1,
            'home_commitments_eyebrow' => 'Cam kết',
            'home_commitments_cards' => array(
                array(
                    'icon_class' => 'fa-regular fa-clipboard',
                    'title' => 'Khảo sát miễn phí',
                    'description' => 'Nhân viên đến tận nơi đánh giá khối lượng, địa hình thực tế và đưa ra phương án vận chuyển tối ưu.',
                ),
                array(
                    'icon_class' => 'fa-regular fa-file-lines',
                    'title' => 'Hợp đồng rõ ràng',
                    'description' => 'Ký hợp đồng đầy đủ mức giá, trách nhiệm và thời gian thực hiện để khách hàng yên tâm sử dụng dịch vụ.',
                ),
                array(
                    'icon_class' => 'fa-solid fa-magnifying-glass-chart',
                    'title' => 'Giám sát chất lượng',
                    'description' => 'Chuyên viên kiểm soát chất lượng theo sát từng hạng mục, kịp thời xử lý các phát sinh trong ngày vận chuyển.',
                ),
                array(
                    'icon_class' => 'fa-regular fa-face-smile',
                    'title' => 'Chăm sóc sau vận chuyển',
                    'description' => 'Chủ động gọi điện kiểm tra mức độ hài lòng, tiếp nhận yêu cầu bổ sung và hoàn tất hỗ trợ khi khách cần.',
                ),
            ),
            'home_process_enable' => 1,
            'home_process_title' => 'Quy trình vận chuyển tại',
            'home_process_highlight' => 'Taxi Tải Thành Hưng',
            'home_process_steps' => array(
                array(
                    'icon_class' => 'fa-solid fa-phone',
                    'step_label' => 'Bước 1',
                    'title' => 'Tiếp nhận yêu cầu',
                    'description' => 'Tổng đài ghi nhận nhu cầu, địa chỉ, khối lượng và thời gian khách mong muốn.',
                    'badge' => '',
                ),
                array(
                    'icon_class' => 'fa-regular fa-clipboard',
                    'step_label' => 'Bước 2',
                    'title' => 'Khảo sát & báo giá',
                    'description' => 'Nhân viên khảo sát thực tế, tư vấn phương án và báo giá chi tiết.',
                    'badge' => '',
                ),
                array(
                    'icon_class' => 'fa-regular fa-pen-to-square',
                    'step_label' => 'Bước 3',
                    'title' => 'Ký hợp đồng',
                    'description' => 'Thống nhất chi phí, phương án thực hiện và các điều khoản vận chuyển.',
                    'badge' => '',
                ),
                array(
                    'icon_class' => 'fa-solid fa-truck-ramp-box',
                    'step_label' => 'Bước 4',
                    'title' => 'Tiến hành thực hiện',
                    'description' => 'Đóng gói, bốc xếp, vận chuyển và sắp xếp đồ đạc theo kế hoạch.',
                    'badge' => '',
                ),
                array(
                    'icon_class' => 'fa-solid fa-check',
                    'step_label' => 'Bước 5',
                    'title' => 'Nghiệm thu bàn giao',
                    'description' => 'Khách hàng kiểm tra hiện trạng đồ đạc, xác nhận bàn giao hoàn tất.',
                    'badge' => '',
                ),
                array(
                    'icon_class' => 'fa-solid fa-headset',
                    'step_label' => 'Bước 6',
                    'title' => 'Hỗ trợ sau vận chuyển',
                    'description' => 'Chăm sóc sau dịch vụ và tiếp nhận phản hồi để hỗ trợ kịp thời.',
                    'badge' => 'Chăm sóc Thành Hưng',
                ),
            ),
            'home_faq_enable' => 1,
            'home_faq_eyebrow' => 'FAQ',
            'home_faq_subtitle' => 'Câu Hỏi Thường Gặp Về',
            'home_faq_title' => 'Dịch Vụ Chuyển Nhà Thành Hưng',
            'home_faq_items' => array(
                array(
                    'question' => 'Số điện thoại chính hãng của Taxi Tải Thành Hưng là bao nhiêu?',
                    'answer' => 'Khách hàng nên liên hệ qua số hotline được công bố trên website chính thức để được xác nhận thông tin dịch vụ và báo giá.',
                ),
                array(
                    'question' => 'Làm sao phân biệt Thành Hưng chính hãng và giả mạo?',
                    'answer' => 'Hãy kiểm tra tên thương hiệu, thông tin liên hệ, hợp đồng dịch vụ và yêu cầu nhân viên xuất trình thông tin khi khảo sát.',
                ),
                array(
                    'question' => 'Dịch vụ chuyển nhà trọn gói Thành Hưng bao gồm những gì?',
                    'answer' => 'Dịch vụ thường bao gồm khảo sát, tư vấn phương án, đóng gói, bốc xếp, vận chuyển, sắp xếp và nghiệm thu sau khi hoàn tất.',
                ),
                array(
                    'question' => 'Thành Hưng có cam kết bồi thường khi đồ đạc bị hư hỏng không?',
                    'answer' => 'Các hạng mục trách nhiệm được thể hiện trong hợp đồng. Khách hàng nên kiểm tra kỹ điều khoản bồi thường trước ngày vận chuyển.',
                ),
                array(
                    'question' => 'Nhân viên chuyển nhà có phải người của công ty Thành Hưng không?',
                    'answer' => 'Đội ngũ thực hiện được điều phối theo quy trình nội bộ, có giám sát và người phụ trách để khách hàng dễ dàng trao đổi.',
                ),
                array(
                    'question' => 'Thành Hưng có chuyển nhà ngoài giờ, cuối tuần, ngày lễ không?',
                    'answer' => 'Có thể sắp xếp theo lịch khách hàng yêu cầu. Với lịch ngoài giờ hoặc ngày lễ, chi phí sẽ được báo rõ trước khi thực hiện.',
                ),
                array(
                    'question' => 'Cần chuẩn bị gì trước ngày Thành Hưng đến chuyển nhà?',
                    'answer' => 'Khách hàng nên phân loại đồ quan trọng, giấy tờ cá nhân, vật dụng dễ vỡ và xác nhận lại thời gian, địa chỉ với nhân viên phụ trách.',
                ),
                array(
                    'question' => 'Thành Hưng có hỗ trợ tư vấn ngày tốt nhập trạch không?',
                    'answer' => 'Nhân viên có thể hỗ trợ sắp xếp lịch vận chuyển theo ngày giờ khách hàng đã chọn để quá trình chuyển nhà thuận tiện hơn.',
                ),
            ),
        );
    }
}

if (!function_exists('thanh_hung_home_field')) {
    function thanh_hung_home_field($name)
    {
        $defaults = thanh_hung_home_defaults();

        if (function_exists('get_field')) {
            $value = get_field($name);

            if (substr($name, -7) === '_enable' && $value !== null) {
                $post_id = get_the_ID();
                $raw_value = $post_id ? get_post_meta($post_id, $name, true) : null;

                if ($value === false && $raw_value === '' && array_key_exists($name, $defaults)) {
                    return (bool) $defaults[$name];
                }

                return (bool) $value;
            }

            if ($value !== null && $value !== '' && $value !== false) {
                return $value;
            }
        }

        return array_key_exists($name, $defaults) ? $defaults[$name] : null;
    }
}

if (!function_exists('thanh_hung_home_items')) {
    function thanh_hung_home_items($name)
    {
        $items = thanh_hung_home_field($name);

        return is_array($items) ? array_values(array_filter($items, 'is_array')) : array();
    }
}

if (!function_exists('thanh_hung_home_image_url')) {
    function thanh_hung_home_image_url($image, $size = 'full')
    {
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

if (!function_exists('thanh_hung_home_image_alt')) {
    function thanh_hung_home_image_alt($image, $fallback = '')
    {
        if (is_array($image) && !empty($image['alt'])) {
            return $image['alt'];
        }

        if (is_numeric($image)) {
            $alt = get_post_meta((int) $image, '_wp_attachment_image_alt', true);
            return $alt ? $alt : $fallback;
        }

        return $fallback;
    }
}

if (!function_exists('thanh_hung_home_acf_text')) {
    function thanh_hung_home_acf_text($key, $label, $name, $default = '', $type = 'text', $instructions = '')
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

        return $field;
    }
}

if (!function_exists('thanh_hung_home_acf_image')) {
    function thanh_hung_home_acf_image($key, $label, $name, $instructions = '')
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'instructions' => $instructions,
        );
    }
}

if (!function_exists('thanh_hung_home_acf_number')) {
    function thanh_hung_home_acf_number($key, $label, $name, $default = 0, $min = 0, $max = 0)
    {
        $field = array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'number',
            'default_value' => $default,
            'min' => $min,
            'step' => 1,
        );

        if ($max > 0) {
            $field['max'] = $max;
        }

        return $field;
    }
}

if (!function_exists('thanh_hung_home_acf_taxonomy')) {
    function thanh_hung_home_acf_taxonomy($key, $label, $name)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'taxonomy',
            'taxonomy' => 'category',
            'field_type' => 'select',
            'allow_null' => 1,
            'add_term' => 0,
            'save_terms' => 0,
            'load_terms' => 0,
            'return_format' => 'id',
        );
    }
}

if (!function_exists('thanh_hung_home_acf_true_false')) {
    function thanh_hung_home_acf_true_false($key, $label, $name)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'true_false',
            'ui' => 1,
            'default_value' => 1,
        );
    }
}

if (!function_exists('thanh_hung_home_acf_tab')) {
    function thanh_hung_home_acf_tab($key, $label)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'type' => 'tab',
            'placement' => 'top',
        );
    }
}

if (!function_exists('thanh_hung_home_acf_repeater')) {
    function thanh_hung_home_acf_repeater($key, $label, $name, $sub_fields, $button_label, $max = 0)
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

        if ($max > 0) {
            $field['max'] = $max;
        }

        return $field;
    }
}

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    $defaults = thanh_hung_home_defaults();

    acf_add_local_field_group(array(
        'key' => 'group_thanh_hung_home_sections',
        'title' => 'Trang chủ - Quản lý section',
        'fields' => array(
            thanh_hung_home_acf_tab('field_th_home_tab_banner', 'Banner slide'),
            thanh_hung_home_acf_true_false('field_th_home_banner_enable', 'Hiển thị section', 'home_banner_enable'),
            thanh_hung_home_acf_repeater(
                'field_th_home_banner_slides',
                'Danh sách slide',
                'home_banner_slides',
                array(
                    thanh_hung_home_acf_image('field_th_home_banner_image', 'Ảnh banner', 'image', 'Khuyến nghị ảnh ngang 1920x650 trở lên.'),
                    thanh_hung_home_acf_text('field_th_home_banner_eyebrow', 'Dòng nhỏ', 'eyebrow'),
                    thanh_hung_home_acf_text('field_th_home_banner_title', 'Tiêu đề', 'title'),
                    thanh_hung_home_acf_text('field_th_home_banner_description', 'Mô tả', 'description', '', 'textarea'),
                    thanh_hung_home_acf_text('field_th_home_banner_primary_text', 'Text nút chính', 'primary_text'),
                    thanh_hung_home_acf_text('field_th_home_banner_primary_url', 'Link nút chính', 'primary_url', '#'),
                    thanh_hung_home_acf_text('field_th_home_banner_secondary_text', 'Text nút phụ', 'secondary_text'),
                    thanh_hung_home_acf_text('field_th_home_banner_secondary_url', 'Link nút phụ', 'secondary_url', '#'),
                ),
                'Thêm slide'
            ),

            thanh_hung_home_acf_tab('field_th_home_tab_intro', 'Giới thiệu'),
            thanh_hung_home_acf_true_false('field_th_home_intro_enable', 'Hiển thị section', 'home_intro_enable'),
            thanh_hung_home_acf_text('field_th_home_intro_badge', 'Nhãn xanh', 'home_intro_badge', $defaults['home_intro_badge']),
            thanh_hung_home_acf_text('field_th_home_intro_title_highlight', 'Phần tiêu đề màu đỏ', 'home_intro_title_highlight', $defaults['home_intro_title_highlight']),
            thanh_hung_home_acf_text('field_th_home_intro_title', 'Tiêu đề chính', 'home_intro_title', $defaults['home_intro_title']),
            thanh_hung_home_acf_text('field_th_home_intro_description', 'Mô tả', 'home_intro_description', $defaults['home_intro_description'], 'textarea', 'Có thể dùng thẻ <strong> để in đậm.'),
            thanh_hung_home_acf_text('field_th_home_intro_primary_text', 'Text nút chính', 'home_intro_primary_text', $defaults['home_intro_primary_text']),
            thanh_hung_home_acf_text('field_th_home_intro_primary_url', 'Link nút chính', 'home_intro_primary_url', $defaults['home_intro_primary_url']),
            thanh_hung_home_acf_text('field_th_home_intro_secondary_text', 'Text nút phụ', 'home_intro_secondary_text', $defaults['home_intro_secondary_text']),
            thanh_hung_home_acf_text('field_th_home_intro_secondary_url', 'Link nút phụ', 'home_intro_secondary_url', $defaults['home_intro_secondary_url']),
            thanh_hung_home_acf_image('field_th_home_intro_image', 'Ảnh giới thiệu', 'home_intro_image', 'Ảnh như poster/đội xe trong section giới thiệu.'),
            thanh_hung_home_acf_repeater(
                'field_th_home_intro_stats',
                'Thông số',
                'home_intro_stats',
                array(
                    thanh_hung_home_acf_text('field_th_home_intro_stat_value', 'Số liệu', 'value'),
                    thanh_hung_home_acf_text('field_th_home_intro_stat_label', 'Nhãn', 'label'),
                ),
                'Thêm thông số',
                3
            ),
            thanh_hung_home_acf_repeater(
                'field_th_home_intro_strip_items',
                'Thanh cam kết đỏ',
                'home_intro_strip_items',
                array(
                    thanh_hung_home_acf_text('field_th_home_intro_strip_icon', 'FontAwesome class', 'icon_class', 'fa-solid fa-shield-halved'),
                    thanh_hung_home_acf_text('field_th_home_intro_strip_title', 'Nội dung', 'title'),
                ),
                'Thêm cam kết',
                3
            ),

            thanh_hung_home_acf_tab('field_th_home_tab_services', 'Dịch vụ'),
            thanh_hung_home_acf_true_false('field_th_home_services_enable', 'Hiển thị section', 'home_services_enable'),
            thanh_hung_home_acf_text('field_th_home_services_subtitle', 'Dòng tiêu đề nhỏ', 'home_services_subtitle', $defaults['home_services_subtitle']),
            thanh_hung_home_acf_text('field_th_home_services_title', 'Tiêu đề đỏ', 'home_services_title', $defaults['home_services_title']),
            thanh_hung_home_acf_repeater(
                'field_th_home_services_tabs',
                'Danh sách nút link nhanh',
                'home_services_tabs',
                array(
                    thanh_hung_home_acf_text('field_th_home_services_tab_label', 'Nhãn', 'label'),
                    thanh_hung_home_acf_text('field_th_home_services_tab_url', 'Link trang dịch vụ', 'url', '#'),
                    thanh_hung_home_acf_text('field_th_home_services_tab_icon', 'FontAwesome class', 'icon_class', ''),
                    array(
                        'key' => 'field_th_home_services_tab_active',
                        'label' => 'Nút nổi bật màu đỏ',
                        'name' => 'active',
                        'type' => 'true_false',
                        'ui' => 1,
                        'default_value' => 0,
                    ),
                ),
                'Thêm nút link'
            ),
            thanh_hung_home_acf_repeater(
                'field_th_home_services_items',
                'Danh sách dịch vụ',
                'home_services_items',
                array(
                    thanh_hung_home_acf_text('field_th_home_services_item_icon', 'FontAwesome class', 'icon_class', 'fa-solid fa-truck-fast'),
                    thanh_hung_home_acf_text('field_th_home_services_item_title', 'Tên dịch vụ', 'title'),
                    thanh_hung_home_acf_text('field_th_home_services_item_url', 'Link trang dịch vụ', 'url', '#'),
                ),
                'Thêm dịch vụ'
            ),

            thanh_hung_home_acf_tab('field_th_home_tab_capabilities', 'Năng lực'),
            thanh_hung_home_acf_true_false('field_th_home_capabilities_enable', 'Hiển thị section', 'home_capabilities_enable'),
            thanh_hung_home_acf_text('field_th_home_capabilities_eyebrow', 'Nhãn section', 'home_capabilities_eyebrow', $defaults['home_capabilities_eyebrow']),
            thanh_hung_home_acf_text('field_th_home_capabilities_subtitle', 'Dòng tiêu đề nhỏ', 'home_capabilities_subtitle', $defaults['home_capabilities_subtitle']),
            thanh_hung_home_acf_text('field_th_home_capabilities_title', 'Tiêu đề đỏ', 'home_capabilities_title', $defaults['home_capabilities_title']),
            thanh_hung_home_acf_repeater(
                'field_th_home_capabilities_cards',
                'Danh sách năng lực',
                'home_capabilities_cards',
                array(
                    thanh_hung_home_acf_text('field_th_home_capabilities_icon', 'FontAwesome class', 'icon_class', 'fa-solid fa-user-tie'),
                    thanh_hung_home_acf_text('field_th_home_capabilities_card_title', 'Tiêu đề', 'title'),
                    thanh_hung_home_acf_text('field_th_home_capabilities_card_description', 'Mô tả', 'description', '', 'textarea'),
                ),
                'Thêm năng lực',
                4
            ),

            thanh_hung_home_acf_tab('field_th_home_tab_commitments', 'Cam kết'),
            thanh_hung_home_acf_true_false('field_th_home_commitments_enable', 'Hiển thị section', 'home_commitments_enable'),
            thanh_hung_home_acf_text('field_th_home_commitments_eyebrow', 'Nhãn section', 'home_commitments_eyebrow', $defaults['home_commitments_eyebrow']),
            thanh_hung_home_acf_repeater(
                'field_th_home_commitments_cards',
                'Danh sách cam kết',
                'home_commitments_cards',
                array(
                    thanh_hung_home_acf_text('field_th_home_commitments_icon', 'FontAwesome class', 'icon_class', 'fa-regular fa-clipboard'),
                    thanh_hung_home_acf_text('field_th_home_commitments_card_title', 'Tiêu đề', 'title'),
                    thanh_hung_home_acf_text('field_th_home_commitments_card_description', 'Mô tả', 'description', '', 'textarea'),
                ),
                'Thêm cam kết',
                4
            ),

            thanh_hung_home_acf_tab('field_th_home_tab_process', 'Quy trình'),
            thanh_hung_home_acf_true_false('field_th_home_process_enable', 'Hiển thị section', 'home_process_enable'),
            thanh_hung_home_acf_text('field_th_home_process_title', 'Tiêu đề trước phần đỏ', 'home_process_title', $defaults['home_process_title']),
            thanh_hung_home_acf_text('field_th_home_process_highlight', 'Phần tiêu đề màu đỏ', 'home_process_highlight', $defaults['home_process_highlight']),
            thanh_hung_home_acf_repeater(
                'field_th_home_process_steps',
                'Danh sách bước',
                'home_process_steps',
                array(
                    thanh_hung_home_acf_text('field_th_home_process_icon', 'FontAwesome class', 'icon_class', 'fa-solid fa-phone'),
                    thanh_hung_home_acf_text('field_th_home_process_step_label', 'Nhãn bước', 'step_label', 'Bước 1'),
                    thanh_hung_home_acf_text('field_th_home_process_step_title', 'Tiêu đề', 'title'),
                    thanh_hung_home_acf_text('field_th_home_process_step_description', 'Mô tả', 'description', '', 'textarea'),
                    thanh_hung_home_acf_text('field_th_home_process_step_badge', 'Nhãn đỏ phía trên', 'badge'),
                ),
                'Thêm bước',
                6
            ),

            thanh_hung_home_acf_tab('field_th_home_tab_faq', 'FAQ'),
            thanh_hung_home_acf_true_false('field_th_home_faq_enable', 'Hiển thị section', 'home_faq_enable'),
            thanh_hung_home_acf_text('field_th_home_faq_eyebrow', 'Dòng nhỏ', 'home_faq_eyebrow', $defaults['home_faq_eyebrow']),
            thanh_hung_home_acf_text('field_th_home_faq_subtitle', 'Dòng tiêu đề nhỏ', 'home_faq_subtitle', $defaults['home_faq_subtitle']),
            thanh_hung_home_acf_text('field_th_home_faq_title', 'Tiêu đề đỏ', 'home_faq_title', $defaults['home_faq_title']),
            thanh_hung_home_acf_repeater(
                'field_th_home_faq_items',
                'Danh sách câu hỏi',
                'home_faq_items',
                array(
                    thanh_hung_home_acf_text('field_th_home_faq_question', 'Câu hỏi', 'question'),
                    thanh_hung_home_acf_text('field_th_home_faq_answer', 'Câu trả lời', 'answer', '', 'textarea'),
                ),
                'Thêm câu hỏi'
            ),

            thanh_hung_home_acf_tab('field_th_home_tab_press', 'Báo chí'),
            thanh_hung_home_acf_true_false('field_th_home_press_enable', 'Hiển thị section', 'home_press_enable'),
            thanh_hung_home_acf_text('field_th_home_press_subtitle', 'Dòng tiêu đề nhỏ', 'home_press_subtitle', $defaults['home_press_subtitle']),
            thanh_hung_home_acf_text('field_th_home_press_title', 'Tiêu đề đỏ', 'home_press_title', $defaults['home_press_title']),
            thanh_hung_home_acf_text('field_th_home_press_description', 'Mô tả', 'home_press_description', $defaults['home_press_description'], 'textarea', 'Có thể dùng thẻ <strong> để in đậm.'),
            thanh_hung_home_acf_repeater(
                'field_th_home_press_logos',
                'Logo báo chí',
                'home_press_logos',
                array(
                    thanh_hung_home_acf_text('field_th_home_press_logo_name', 'Tên báo', 'name'),
                    thanh_hung_home_acf_image('field_th_home_press_logo_image', 'Logo', 'logo'),
                    thanh_hung_home_acf_text('field_th_home_press_logo_url', 'Link', 'url', '#'),
                ),
                'Thêm logo'
            ),
            thanh_hung_home_acf_repeater(
                'field_th_home_press_articles',
                'Bài báo nổi bật',
                'home_press_articles',
                array(
                    thanh_hung_home_acf_image('field_th_home_press_article_image', 'Ảnh bài báo', 'image'),
                    thanh_hung_home_acf_text('field_th_home_press_article_title', 'Tiêu đề', 'title'),
                    thanh_hung_home_acf_text('field_th_home_press_article_url', 'Link', 'url', '#'),
                ),
                'Thêm bài báo'
            ),

            thanh_hung_home_acf_tab('field_th_home_tab_news', 'Tin mới nhất'),
            thanh_hung_home_acf_true_false('field_th_home_news_enable', 'Hiển thị section', 'home_news_enable'),
            thanh_hung_home_acf_text('field_th_home_news_subtitle', 'Dòng tiêu đề nhỏ', 'home_news_subtitle', $defaults['home_news_subtitle']),
            thanh_hung_home_acf_text('field_th_home_news_title', 'Tiêu đề chính', 'home_news_title', $defaults['home_news_title']),
            thanh_hung_home_acf_taxonomy('field_th_home_news_category', 'Danh mục bài viết', 'home_news_category'),
            thanh_hung_home_acf_number('field_th_home_news_count', 'Số bài hiển thị', 'home_news_count', $defaults['home_news_count'], 1, 12),
            thanh_hung_home_acf_text('field_th_home_news_button_text', 'Text nút xem tất cả', 'home_news_button_text', $defaults['home_news_button_text']),
            thanh_hung_home_acf_text('field_th_home_news_button_url', 'Link nút xem tất cả', 'home_news_button_url', $defaults['home_news_button_url']),

            thanh_hung_home_acf_tab('field_th_home_tab_video', 'Video'),
            thanh_hung_home_acf_true_false('field_th_home_video_enable', 'Hiển thị section', 'home_video_enable'),
            thanh_hung_home_acf_text('field_th_home_video_subtitle', 'Dòng tiêu đề nhỏ', 'home_video_subtitle', $defaults['home_video_subtitle']),
            thanh_hung_home_acf_text('field_th_home_video_title', 'Mô tả / tiêu đề lớn', 'home_video_title', $defaults['home_video_title'], 'textarea'),
            thanh_hung_home_acf_repeater(
                'field_th_home_video_items',
                'Danh sách video',
                'home_video_items',
                array(
                    thanh_hung_home_acf_text('field_th_home_video_item_title', 'Tiêu đề video', 'title'),
                    thanh_hung_home_acf_text('field_th_home_video_item_url', 'Link YouTube / video', 'video_url'),
                    thanh_hung_home_acf_image('field_th_home_video_item_thumbnail', 'Ảnh thumbnail', 'thumbnail'),
                ),
                'Thêm video'
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
