<?php
/**
 * ACF Landing Page Configuration
 * Advanced Custom Fields for Landing Page Management
 * Location: /custom/acf-landing.php
 */

// Register ACF Field Groups
add_action('acf/init', function() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }



    // Hero Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_hero',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_main_title',
                'label' => 'Tiêu đề chính',
                'name' => 'hero_main_title',
                'type' => 'text',
                'placeholder' => 'VD: TRUNG TÂM ANH NGỮ',
            ),
            array(
                'key' => 'field_hero_sub_title',
                'label' => 'Tiêu đề phụ (highlight)',
                'name' => 'hero_sub_title',
                'type' => 'text',
                'placeholder' => 'VD: EDUSMART',
            ),
            array(
                'key' => 'field_hero_description',
                'label' => 'Mô tả',
                'name' => 'hero_description',
                'type' => 'textarea',
                'placeholder' => 'Nhập mô tả cho hero section',
            ),
            array(
                'key' => 'field_hero_image',
                'label' => 'Hình ảnh',
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_hero_primary_button',
                'label' => 'Nút CTA chính',
                'name' => 'hero_primary_button',
                'type' => 'link',
            ),
            array(
                'key' => 'field_hero_secondary_button',
                'label' => 'Nút CTA phụ',
                'name' => 'hero_secondary_button',
                'type' => 'link',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-landing.php',
                ),
            ),
        ),
    ));

    // Why Choose Us Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_why_choose_us',
        'title' => 'Why Choose Us Section',
        'fields' => array(
            array(
                'key' => 'field_why_choose_title',
                'label' => 'Tiêu đề',
                'name' => 'why_choose_title',
                'type' => 'text',
                'placeholder' => 'VD: Tại sao nên chọn',
            ),
            array(
                'key' => 'field_why_choose_description',
                'label' => 'Mô tả',
                'name' => 'why_choose_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_why_choose_benefits',
                'label' => 'Danh sách lợi ích',
                'name' => 'why_choose_benefits',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_benefit_icon',
                        'label' => 'Icon',
                        'name' => 'benefit_icon',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_benefit_title',
                        'label' => 'Tiêu đề',
                        'name' => 'benefit_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_benefit_description',
                        'label' => 'Mô tả',
                        'name' => 'benefit_description',
                        'type' => 'textarea',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'landing-page-settings',
                ),
            ),
        ),
    ));

    // Featured Courses Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_featured_courses',
        'title' => 'Featured Courses Section',
        'fields' => array(
            array(
                'key' => 'field_courses_title',
                'label' => 'Tiêu đề',
                'name' => 'courses_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_courses_description',
                'label' => 'Mô tả',
                'name' => 'courses_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_featured_courses',
                'label' => 'Khóa học',
                'name' => 'featured_courses',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_course_image',
                        'label' => 'Ảnh khóa học',
                        'name' => 'course_image',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_course_badge',
                        'label' => 'Badge (VD: 4-12 tuổi)',
                        'name' => 'course_badge',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_course_title',
                        'label' => 'Tiêu đề',
                        'name' => 'course_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_course_description',
                        'label' => 'Mô tả',
                        'name' => 'course_description',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_course_link',
                        'label' => 'Link chi tiết',
                        'name' => 'course_link',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'landing-page-settings',
                ),
            ),
        ),
    ));

    // Testimonials Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_testimonials',
        'title' => 'Testimonials Section',
        'fields' => array(
            array(
                'key' => 'field_testimonials_title',
                'label' => 'Tiêu đề',
                'name' => 'testimonials_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_testimonials_description',
                'label' => 'Mô tả',
                'name' => 'testimonials_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_testimonials',
                'label' => 'Đánh giá',
                'name' => 'testimonials',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_testimonial_avatar',
                        'label' => 'Ảnh đại diện',
                        'name' => 'testimonial_avatar',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_testimonial_name',
                        'label' => 'Tên',
                        'name' => 'testimonial_name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_testimonial_position',
                        'label' => 'Vị trí / Chức vụ',
                        'name' => 'testimonial_position',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_testimonial_comment',
                        'label' => 'Bình luận',
                        'name' => 'testimonial_comment',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_testimonial_rating',
                        'label' => 'Số sao',
                        'name' => 'testimonial_rating',
                        'type' => 'number',
                        'min' => 1,
                        'max' => 5,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'landing-page-settings',
                ),
            ),
        ),
    ));

    // CTA Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_cta',
        'title' => 'CTA Section',
        'fields' => array(
            array(
                'key' => 'field_cta_title',
                'label' => 'Tiêu đề',
                'name' => 'cta_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_cta_description',
                'label' => 'Mô tả',
                'name' => 'cta_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_cta_button',
                'label' => 'Nút CTA',
                'name' => 'cta_button',
                'type' => 'link',
            ),
            array(
                'key' => 'field_cta_background_image',
                'label' => 'Hình nền',
                'name' => 'cta_background_image',
                'type' => 'image',
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'landing-page-settings',
                ),
            ),
        ),
    ));

    // Statistics Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_statistics',
        'title' => 'Statistics Section',
        'fields' => array(
            array(
                'key' => 'field_statistics',
                'label' => 'Thống kê',
                'name' => 'statistics',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_stat_icon',
                        'label' => 'Icon',
                        'name' => 'stat_icon',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_stat_number',
                        'label' => 'Số lượng',
                        'name' => 'stat_number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_stat_description',
                        'label' => 'Mô tả',
                        'name' => 'stat_description',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'landing-page-settings',
                ),
            ),
        ),
    ));
});

// Register Shortcode
add_shortcode('landing_page', function() {
    ob_start();
    ?>
    <main id="main-landing" class="landing-page">
        
        <!-- Hero Section -->
        <?php get_template_part('template-parts/hero'); ?>
        
        <!-- Why Choose Us Section -->
        <?php get_template_part('template-parts/why-choose-us'); ?>
        
        <!-- Featured Courses Section -->
        <?php get_template_part('template-parts/featured-courses'); ?>
        
        <!-- Testimonials Section -->
        <?php get_template_part('template-parts/testimonials'); ?>
        
        <!-- CTA Section -->
        <?php get_template_part('template-parts/cta-section'); ?>
        
        <!-- Statistics Section -->
        <?php get_template_part('template-parts/statistics'); ?>

    </main>
    <?php
    return ob_get_clean();
});
