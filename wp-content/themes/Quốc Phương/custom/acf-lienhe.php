<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_qp_contact_page',
        'title' => 'Trang liên hệ - Quản lý nội dung',
        'fields' => array(
            array(
                'key' => 'field_qp_contact_tab_info',
                'label' => 'Thông tin liên hệ',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'field_qp_contact_company_name',
                'label' => 'Tên công ty',
                'name' => 'contact_company_name',
                'type' => 'text',
                'default_value' => 'KHO ĐÁ QUỐC PHƯƠNG',
                'wrapper' => array('width' => 50),
            ),
            array(
                'key' => 'field_qp_contact_address',
                'label' => 'Địa chỉ',
                'name' => 'contact_address',
                'type' => 'textarea',
                'rows' => 2,
                'new_lines' => 'br',
                'wrapper' => array('width' => 50),
            ),
            array(
                'key' => 'field_qp_contact_phone_fax',
                'label' => 'Điện thoại/Fax',
                'name' => 'contact_phone_fax',
                'type' => 'text',
                'wrapper' => array('width' => 33),
            ),
            array(
                'key' => 'field_qp_contact_hotline',
                'label' => 'Hotline',
                'name' => 'contact_hotline',
                'type' => 'text',
                'wrapper' => array('width' => 33),
            ),
            array(
                'key' => 'field_qp_contact_email',
                'label' => 'Email',
                'name' => 'contact_email',
                'type' => 'email',
                'wrapper' => array('width' => 34),
            ),
            array(
                'key' => 'field_qp_contact_social_label',
                'label' => 'Nhãn mạng xã hội',
                'name' => 'contact_social_label',
                'type' => 'text',
                'default_value' => 'Kết nối với chúng tôi:',
                'wrapper' => array('width' => 25),
            ),
            array(
                'key' => 'field_qp_contact_facebook',
                'label' => 'Facebook URL',
                'name' => 'contact_facebook_url',
                'type' => 'url',
                'wrapper' => array('width' => 25),
            ),
            array(
                'key' => 'field_qp_contact_linkedin',
                'label' => 'LinkedIn URL',
                'name' => 'contact_linkedin_url',
                'type' => 'url',
                'wrapper' => array('width' => 25),
            ),
            array(
                'key' => 'field_qp_contact_youtube',
                'label' => 'Youtube URL',
                'name' => 'contact_youtube_url',
                'type' => 'url',
                'wrapper' => array('width' => 25),
            ),
            array(
                'key' => 'field_qp_contact_tab_map',
                'label' => 'Bản đồ',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'field_qp_contact_map_iframe',
                'label' => 'Iframe Google Map',
                'name' => 'contact_map_iframe',
                'type' => 'textarea',
                'rows' => 5,
                'new_lines' => '',
                'instructions' => 'Dán nguyên iframe Google Map vào đây.',
            ),
            array(
                'key' => 'field_qp_contact_map_height',
                'label' => 'Chiều cao map',
                'name' => 'contact_map_height',
                'type' => 'number',
                'default_value' => 420,
                'min' => 260,
                'step' => 10,
                'wrapper' => array('width' => 33),
            ),
            array(
                'key' => 'field_qp_contact_tab_consult',
                'label' => 'Form tư vấn',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'field_qp_contact_consult_enable',
                'label' => 'Hiển thị form tư vấn',
                'name' => 'contact_consult_enable',
                'type' => 'true_false',
                'ui' => 1,
                'default_value' => 1,
            ),
            array(
                'key' => 'field_qp_contact_consult_eyebrow',
                'label' => 'Text nhỏ',
                'name' => 'contact_consult_eyebrow',
                'type' => 'text',
                'default_value' => 'ĐĂNG KÝ',
                'wrapper' => array('width' => 33),
            ),
            array(
                'key' => 'field_qp_contact_consult_title',
                'label' => 'Tiêu đề',
                'name' => 'contact_consult_title',
                'type' => 'text',
                'default_value' => 'ĐĂNG KÝ NHẬN TƯ VẤN',
                'wrapper' => array('width' => 34),
            ),
            array(
                'key' => 'field_qp_contact_consult_shortcode',
                'label' => 'Shortcode form',
                'name' => 'contact_consult_shortcode',
                'type' => 'text',
                'instructions' => 'Dán shortcode form vào đây, ví dụ: [fluentform id="1"]',
                'wrapper' => array('width' => 33),
            ),
            array(
                'key' => 'field_qp_contact_consult_background',
                'label' => 'Ảnh nền form',
                'name' => 'contact_consult_background',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-lienhe.php',
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
