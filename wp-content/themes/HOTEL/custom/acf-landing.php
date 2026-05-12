<?php

/**
 * Hotel landing page ACF configuration and rendering helpers.
 * Location: /custom/acf-landing.php
 */

if (!function_exists('hotel_landing_has_value')) {
    function hotel_landing_has_value($value)
    {
        return !($value === null || $value === false || $value === '' || (is_array($value) && empty($value)));
    }
}

if (!function_exists('hotel_landing_default')) {
    function hotel_landing_default($key)
    {
        static $defaults = null;

        if ($defaults === null) {
            $defaults = array(
                'hotel_brand_name' => 'XHOME',
                'hotel_brand_subtitle' => 'DA NANG',
                'hotel_booking_button' => array('title' => 'Booking ngay', 'url' => '#booking', 'target' => ''),
                'hotel_nav_items' => array(
                    array('label' => 'Giới thiệu', 'url' => '#gioi-thieu'),
                    array('label' => 'Hạng phòng', 'url' => '#hang-phong'),
                    array('label' => 'Tiện ích', 'url' => '#tien-ich'),
                    array('label' => 'Nhà hàng', 'url' => '#nha-hang'),
                    array('label' => 'Ưu đãi', 'url' => '#uu-dai'),
                    array('label' => 'Tin tức', 'url' => '#tin-tuc'),
                    array('label' => 'Liên hệ', 'url' => '#lien-he'),
                ),
                'hotel_hero_title' => "Relax, Refresh.\nReconnect.",
                'hotel_hero_script_title' => 'Feel at Home, Stay in Style.',
                'hotel_hero_description' => 'Không gian nghỉ dưỡng hiện đại giữa lòng Đà Nẵng, nơi mọi trải nghiệm đều được chăm chút cho bạn.',
                'hotel_hero_button' => array('title' => 'Khám phá ngay', 'url' => '#gioi-thieu', 'target' => ''),
                'hotel_quick_features' => array(
                    array('icon_class' => 'fa-solid fa-location-dot', 'title' => 'Vị trí trung tâm', 'description' => 'Gần biển, cầu Rồng và các điểm tham quan'),
                    array('icon_class' => 'fa-solid fa-wifi', 'title' => 'Wi-Fi miễn phí', 'description' => 'Kết nối tốc độ cao trong toàn bộ khách sạn'),
                    array('icon_class' => 'fa-solid fa-utensils', 'title' => 'Bữa sáng hấp dẫn', 'description' => 'Buffet đa dạng mỗi ngày'),
                    array('icon_class' => 'fa-solid fa-headset', 'title' => 'Dịch vụ 24/7', 'description' => 'Đội ngũ nhân viên luôn sẵn sàng hỗ trợ'),
                    array('icon_class' => 'fa-solid fa-calendar-check', 'title' => 'Miễn phí hủy phòng', 'description' => 'Linh hoạt thay đổi kế hoạch dễ dàng'),
                    array('icon_class' => 'fa-solid fa-percent', 'title' => 'Ưu đãi hội viên', 'description' => 'Giảm giá khi đặt trực tiếp'),
                ),
                'hotel_intro_title' => 'Giới thiệu về XHOME Đà Nẵng Hotel & Suites',
                'hotel_intro_description' => 'XHOME Đà Nẵng Hotel & Suites mang đến không gian nghỉ dưỡng hiện đại, tiện nghi với tầm nhìn tuyệt đẹp. Vị trí trung tâm giúp bạn dễ dàng khám phá thành phố đáng sống nhất Việt Nam.',
                'hotel_intro_items' => array(
                    array('icon_class' => 'fa-solid fa-building', 'title' => 'Vị trí trung tâm', 'description' => 'Nằm ngay trung tâm thành phố, gần biển, cầu Rồng và các điểm tham quan nổi tiếng.'),
                    array('icon_class' => 'fa-solid fa-bed', 'title' => 'Phòng nghỉ hiện đại', 'description' => 'Thiết kế sang trọng, tiện nghi đầy đủ, mang đến cảm giác thoải mái như ở nhà.'),
                    array('icon_class' => 'fa-solid fa-bell-concierge', 'title' => 'Dịch vụ chuyên nghiệp', 'description' => 'Đội ngũ nhân viên tận tâm, phục vụ 24/7 và luôn sẵn sàng đáp ứng mọi nhu cầu.'),
                    array('icon_class' => 'fa-regular fa-star', 'title' => 'Trải nghiệm đẳng cấp', 'description' => 'Tận hưởng kỳ nghỉ hoàn hảo với tiện ích cao cấp và dịch vụ chuẩn 4 sao.'),
                ),
                'hotel_rooms_title' => 'Các hạng phòng nổi bật',
                'hotel_rooms_description' => 'Khám phá những hạng phòng được thiết kế tinh tế, đầy đủ tiện nghi và phù hợp cho mọi nhu cầu lưu trú.',
                'hotel_rooms' => array(
                    array(
                        'title' => 'Classic One-Bedroom',
                        'description' => 'Không gian lý tưởng dành cho những ai tìm kiếm sự riêng tư và tiện nghi trong một thiết kế tinh tế. Classic One-Bedroom mang đến cảm giác ấm cúng với giường ngủ cực lớn, khu vực sinh hoạt thoải mái và nội thất hiện đại.',
                        'link' => array('title' => 'Khám phá chi tiết', 'url' => '#booking', 'target' => ''),
                    ),
                    array(
                        'title' => 'Standard Double Room',
                        'description' => 'Được thiết kế tối giản nhưng vẫn đầy đủ tiện nghi, Standard Double Room phù hợp cho du khách yêu thích sự gọn gàng, tiện lợi và không gian ấm cúng.',
                        'link' => array('title' => 'Khám phá chi tiết', 'url' => '#booking', 'target' => ''),
                    ),
                    array(
                        'title' => 'Premier Double Room',
                        'description' => 'Nâng tầm trải nghiệm với không gian rộng rãi hơn, thiết kế sang trọng và tầm nhìn tuyệt đẹp ra thành phố hoặc sông Hàn.',
                        'link' => array('title' => 'Khám phá chi tiết', 'url' => '#booking', 'target' => ''),
                    ),
                    array(
                        'title' => 'Family Suite',
                        'description' => 'Lựa chọn lý tưởng cho gia đình hoặc nhóm bạn với không gian rộng rãi gồm 2 phòng ngủ riêng biệt, phòng khách sang trọng và tiện ích đầy đủ.',
                        'link' => array('title' => 'Khám phá chi tiết', 'url' => '#booking', 'target' => ''),
                    ),
                ),
                'hotel_amenities_title' => 'Tiện ích khách sạn',
                'hotel_amenities' => array(
                    array('icon_class' => 'fa-solid fa-water-ladder', 'title' => 'Hồ bơi vô cực', 'description' => 'Tầm nhìn panorama tuyệt đẹp'),
                    array('icon_class' => 'fa-solid fa-martini-glass-citrus', 'title' => 'Nhà hàng & Bar', 'description' => 'Ẩm thực đa dạng, phong phú'),
                    array('icon_class' => 'fa-solid fa-dumbbell', 'title' => 'Phòng gym', 'description' => 'Trang thiết bị hiện đại, miễn phí'),
                    array('icon_class' => 'fa-solid fa-spa', 'title' => 'Spa & Massage', 'description' => 'Thư giãn, tái tạo năng lượng'),
                    array('icon_class' => 'fa-solid fa-wifi', 'title' => 'Wi-Fi miễn phí', 'description' => 'Kết nối tốc độ cao khắp khách sạn'),
                    array('icon_class' => 'fa-solid fa-car', 'title' => 'Đưa đón sân bay', 'description' => 'Dịch vụ đưa đón chuyên nghiệp'),
                    array('icon_class' => 'fa-solid fa-square-parking', 'title' => 'Bãi đỗ xe', 'description' => 'An toàn, rộng rãi, miễn phí'),
                ),
                'hotel_dining_eyebrow' => 'Ẩm thực & trải nghiệm',
                'hotel_dining_title' => 'Nhà hàng & Ẩm thực',
                'hotel_dining_description' => 'Khám phá không gian ẩm thực tinh tế, dịch vụ chu đáo và những trải nghiệm thư giãn được chuẩn bị riêng cho kỳ nghỉ của bạn.',
                'hotel_dining_button' => array('title' => 'Booking now', 'url' => '#booking', 'target' => ''),
                'hotel_dining_items' => array(
                    array('title' => 'Buffet sáng', 'description' => 'Đa dạng món Á - Âu, nguyên liệu tươi ngon'),
                    array('title' => 'Nhà hàng', 'description' => 'Thực đơn phong phú, không gian sang trọng'),
                    array('title' => 'Sky Bar', 'description' => 'Thưởng thức đồ uống cùng view thành phố'),
                    array('title' => 'Private Dining', 'description' => 'Không gian riêng tư cho bữa tối thân mật và các dịp đặc biệt'),
                ),
                'hotel_offers_eyebrow' => 'Ưu đãi tháng này',
                'hotel_offers_title' => 'Ưu đãi dành cho khách hàng',
                'hotel_offers_description' => 'Đừng bỏ lỡ cơ hội tận hưởng kỳ nghỉ lý tưởng với mức giá ưu đãi nhất.',
                'hotel_offers_button' => array('title' => 'Xem thêm', 'url' => '#booking', 'target' => ''),
                'hotel_offers' => array(
                    array('eyebrow' => 'Early Bird', 'title' => 'Giảm 15%', 'description' => 'Đặt phòng trước 15 ngày để nhận ưu đãi hấp dẫn.', 'link' => array('title' => 'Booking now', 'url' => '#booking', 'target' => '')),
                    array('eyebrow' => 'Stay longer', 'title' => 'Giảm 10%', 'description' => 'Dành cho khách lưu trú từ 3 đêm trở lên. Ưu đãi áp dụng cho mọi hạng phòng.', 'link' => array('title' => 'Booking now', 'url' => '#booking', 'target' => '')),
                    array('eyebrow' => 'Honeymoon Package', 'title' => 'Giảm ngay 15%', 'description' => 'Dành cho khách lưu trú đặt gói trang trí honeymoon. Tận hưởng kỳ nghỉ lãng mạn.', 'link' => array('title' => 'Booking CTA', 'url' => '#booking', 'target' => '')),
                ),
                'hotel_testimonials_title' => 'Đánh giá khách hàng',
                'hotel_testimonials' => array(
                    array('rating' => 5, 'comment' => 'Khách sạn tuyệt vời! Phòng sạch sẽ, nhân viên thân thiện và vị trí rất thuận tiện.', 'name' => 'Nguyễn Minh Anh', 'location' => 'Hà Nội'),
                    array('rating' => 5, 'comment' => 'Trải nghiệm tuyệt vời từ dịch vụ đến tiện nghi. Bữa sáng ngon và đa dạng.', 'name' => 'Trần Quốc Bảo', 'location' => 'TP. Hồ Chí Minh'),
                    array('rating' => 5, 'comment' => 'Không gian đẹp, view thành phố ấn tượng. Nhân viên hỗ trợ nhiệt tình và chuyên nghiệp.', 'name' => 'Lê Thị Hương', 'location' => 'Đà Nẵng'),
                    array('rating' => 5, 'comment' => 'Everything was excellent from room, service to location. Will come back.', 'name' => 'John Smith', 'location' => 'Australia'),
                ),
                'hotel_footer_description' => 'XHOME Đà Nẵng Hotel & Suites mang đến không gian nghỉ dưỡng hiện đại, sang trọng và tiện nghi ngay giữa lòng thành phố đáng sống nhất Việt Nam.',
                'hotel_footer_title' => 'Thông tin liên hệ',
                'hotel_footer_map_title' => 'Bản đồ',
                'hotel_footer_map_embed' => 'https://www.google.com/maps?q=21%20My%20Da%20Dong%204%2C%20Ngu%20Hanh%20Son%2C%20Da%20Nang&output=embed',
                'hotel_footer_map_caption' => '',
                'hotel_footer_map_link' => 'https://www.google.com/maps/search/?api=1&query=21%20My%20Da%20Dong%204%2C%20Ngu%20Hanh%20Son%2C%20Da%20Nang',
                'hotel_footer_contacts' => array(
                    array('icon_class' => 'fa-solid fa-location-dot', 'text' => '21 Mỹ Đa Đông 4, Ngũ Hành Sơn, Đà Nẵng', 'url' => ''),
                    array('icon_class' => 'fa-solid fa-phone', 'text' => '0822335343', 'url' => 'tel:0822335343'),
                    array('icon_class' => 'fa-solid fa-envelope', 'text' => 'xhomedananghotelsuite@gmail.com', 'url' => 'mailto:xhomedananghotelsuite@gmail.com'),
                    array('icon_class' => 'fa-solid fa-map-location-dot', 'text' => 'Xem trên Google Maps', 'url' => '#'),
                ),
                'hotel_footer_socials' => array(
                    array('icon_class' => 'fa-brands fa-facebook-f', 'url' => '#'),
                    array('icon_class' => 'fa-brands fa-instagram', 'url' => '#'),
                    array('icon_class' => 'fa-brands fa-youtube', 'url' => '#'),
                    array('icon_class' => 'fa-brands fa-tripadvisor', 'url' => '#'),
                ),
                'hotel_footer_links' => array(
                    array('label' => 'Giới thiệu', 'url' => '#gioi-thieu'),
                    array('label' => 'Hạng phòng', 'url' => '#hang-phong'),
                    array('label' => 'Tiện ích', 'url' => '#tien-ich'),
                    array('label' => 'Nhà hàng', 'url' => '#nha-hang'),
                    array('label' => 'Ưu đãi', 'url' => '#uu-dai'),
                    array('label' => 'Tin tức', 'url' => '#tin-tuc'),
                    array('label' => 'Liên hệ', 'url' => '#lien-he'),
                ),
                'hotel_newsletter_title' => 'Đăng ký nhận ưu đãi',
                'hotel_newsletter_text' => 'Nhận thông tin ưu đãi mới nhất từ XHOME Đà Nẵng Hotel & Suites.',
                'hotel_newsletter_placeholder' => 'Nhập email của bạn',
                'hotel_newsletter_button' => 'Đăng ký',
                'hotel_copyright' => '© 2024 XHOME Đà Nẵng Hotel & Suites. All rights reserved.',
                'hotel_policy_links' => array(
                    array('label' => 'Chính sách bảo mật', 'url' => '#'),
                    array('label' => 'Điều khoản sử dụng', 'url' => '#'),
                ),
                'hotel_brand_name' => 'LARITA',
                'hotel_brand_subtitle' => 'Luxury Hotel',
                'hotel_booking_button' => array('title' => 'Reservation', 'url' => '#booking', 'target' => ''),
                'hotel_nav_items' => array(
                    array('label' => 'Home', 'url' => '#top'),
                    array('label' => 'Rooms & Suites', 'url' => '#hang-phong'),
                    array('label' => 'Explore Larita', 'url' => '#gioi-thieu'),
                    array('label' => 'News & Offers', 'url' => '#uu-dai'),
                    array('label' => 'Contact', 'url' => '#lien-he'),
                ),
                'hotel_hero_title' => 'LARITA LUXURY HOTEL',
                'hotel_hero_description' => 'Located in the heart of the city, this luxurious, modern hotel offers top-notch amenities for a perfect stay.',
                'hotel_hero_button' => array('title' => 'Explore', 'url' => '#gioi-thieu', 'target' => ''),
                'hotel_hero_rating' => '5 star hotel',
                'hotel_hero_since_label' => 'Since 1970 - 54 years of operation',
                'hotel_hero_story_button' => array('title' => 'Larita story', 'url' => '#gioi-thieu', 'target' => ''),
                'hotel_hero_booking_stat' => '+6.4K Bookings',
                'hotel_hero_review_stat' => '4.9/5 - 3.5K Reviews',
                'hotel_quick_features' => array(
                    array('icon_class' => 'fa-solid fa-location-dot', 'title' => 'Located in the heart of the city', 'description' => 'Ideally located in the city heart for easy access and convenience.'),
                    array('icon_class' => 'fa-solid fa-bath', 'title' => 'Luxurious, modern, and comfortable', 'description' => 'Experience a modern and fully equipped space for comfort.'),
                    array('icon_class' => 'fa-solid fa-bell-concierge', 'title' => 'Friendly and welcoming staff', 'description' => 'Our friendly staff ensure a delightful stay every time.'),
                    array('icon_class' => 'fa-solid fa-sack-dollar', 'title' => 'Best prices and great offers', 'description' => 'Enjoy unbeatable prices with fantastic offers tailored for you.'),
                ),
                'hotel_intro_eyebrow' => 'Welcome to Larita',
                'hotel_intro_title' => 'Luxury hotel in the heart of the city.',
                'hotel_intro_description' => 'Larita Luxury Hotel, in the heart of the city, offers over 500 modern, luxurious rooms. Enjoy premium facilities, perfect for relaxation and indulgence. Our friendly staff ensures a seamless, personalized experience with stunning city views.',
                'hotel_intro_button' => array('title' => 'Read more', 'url' => '#gioi-thieu', 'target' => ''),
                'hotel_intro_image' => array(),
                'hotel_reviews_title' => 'Đánh giá khách hàng',
                'hotel_intro_reviews' => array(
                    array('logo_text' => 'B.', 'rating' => '4.8/5', 'label' => 'Excellent', 'description' => 'Booking', 'url' => '#'),
                    array('logo_text' => 'a.', 'rating' => '4.7/5', 'label' => 'Excellent', 'description' => 'Agoda', 'url' => '#'),
                    array('logo_text' => 'T.', 'rating' => '4.8/5', 'label' => 'Excellent', 'description' => 'Traveloka', 'url' => '#'),
                    array('logo_text' => 'OO', 'rating' => '4.7/5', 'label' => 'Good', 'description' => 'TripAdvisor', 'url' => '#'),
                ),
                'hotel_rooms_eyebrow' => 'Exquisite and luxurious',
                'hotel_rooms_title' => 'Room and suite collection',
                'hotel_rooms_description' => 'Choose from refined rooms and suites designed for comfort, privacy, and memorable city stays.',
                'hotel_rooms' => array(
                    array(
                        'title' => 'Standard room',
                        'description' => 'Cozy and modern, this room offers essential amenities for a comfortable stay, perfect for solo travelers or couples seeking relaxation.',
                        'guest_count' => '2 adults - 1 child',
                        'facts' => array(
                            array('icon_class' => 'fa-regular fa-object-group', 'label' => 'Room size 28 m2'),
                            array('icon_class' => 'fa-solid fa-city', 'label' => 'Street view'),
                            array('icon_class' => 'fa-solid fa-bed', 'label' => '1 king bed'),
                            array('icon_class' => 'fa-solid fa-ban-smoking', 'label' => 'Smoking - no'),
                            array('icon_class' => 'fa-solid fa-mug-saucer', 'label' => 'Breakfast - yes'),
                        ),
                        'link' => array('title' => 'Booking now', 'url' => '#booking', 'target' => ''),
                    ),
                ),
                'hotel_room_booking_button' => array('title' => 'Booking now', 'url' => '#booking', 'target' => ''),
                'hotel_room_facts' => array(
                    array('icon_class' => 'fa-regular fa-object-group', 'label' => 'Room size 28 m2'),
                    array('icon_class' => 'fa-solid fa-city', 'label' => 'Street view'),
                    array('icon_class' => 'fa-solid fa-bed', 'label' => '1 king bed'),
                    array('icon_class' => 'fa-solid fa-ban-smoking', 'label' => 'Smoking - no'),
                    array('icon_class' => 'fa-solid fa-mug-saucer', 'label' => 'Breakfast - yes'),
                ),
                'hotel_amenities_eyebrow' => 'Modern and comfortable',
                'hotel_amenities_title' => 'Facilities and amenities',
                'hotel_amenities' => array(
                    array('icon_class' => 'fa-solid fa-wifi', 'title' => 'High Speed Wifi', 'description' => 'Enjoy seamless, high-speed internet access throughout the hotel.'),
                    array('icon_class' => 'fa-solid fa-square-parking', 'title' => 'Parking Space', 'description' => 'Ample and secure parking space provided for all hotel guests.'),
                    array('icon_class' => 'fa-solid fa-utensils', 'title' => 'Restaurant & Bar', 'description' => 'Savor gourmet dishes and cocktails at our elegant restaurant and bar.'),
                    array('icon_class' => 'fa-solid fa-spa', 'title' => 'Spa Center', 'description' => 'Indulge in relaxing and rejuvenating treatments at our spa.'),
                    array('icon_class' => 'fa-solid fa-dumbbell', 'title' => 'Fitness Center', 'description' => 'Stay active with state-of-the-art fitness equipment in our modern gym.'),
                    array('icon_class' => 'fa-solid fa-person-swimming', 'title' => 'Swimming Pool', 'description' => 'Refresh and unwind in our pristine outdoor swimming pool.'),
                ),
                'hotel_video_eyebrow' => 'Hotel video',
                'hotel_video_title' => 'Explore Larita Luxury Hotel',
                'hotel_video_link' => array('title' => 'Play hotel video', 'url' => '#', 'target' => ''),
            );
        }

        return array_key_exists($key, $defaults) ? $defaults[$key] : null;
    }
}

if (!function_exists('hotel_landing_get_field')) {
    function hotel_landing_get_field($name, $default = null)
    {
        if (!function_exists('get_field')) {
            return $default;
        }

        $value = get_field($name);

        if (hotel_landing_has_value($value)) {
            return $value;
        }

        $option_value = get_field($name, 'option');

        return hotel_landing_has_value($option_value) ? $option_value : $default;
    }
}

if (!function_exists('hotel_landing_image_url')) {
    function hotel_landing_image_url($image, $size = 'full')
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

if (!function_exists('hotel_landing_image_alt')) {
    function hotel_landing_image_alt($image, $fallback = '')
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

if (!function_exists('hotel_landing_link')) {
    function hotel_landing_link($link, $default_title = '', $default_url = '#')
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

if (!function_exists('hotel_landing_class_list')) {
    function hotel_landing_class_list($classes)
    {
        return trim(preg_replace('/[^A-Za-z0-9_\-\s]/', '', (string) $classes));
    }
}

if (!function_exists('hotel_landing_acf_locations')) {
    function hotel_landing_acf_locations()
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
                    'value' => 'hotel-landing',
                ),
            );
        }

        return $locations;
    }
}

if (!function_exists('hotel_landing_acf_text')) {
    function hotel_landing_acf_text($key, $label, $name, $default = '', $type = 'text')
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => $type,
            'default_value' => '',
            'placeholder' => $default,
        );
    }
}

if (!function_exists('hotel_landing_acf_image')) {
    function hotel_landing_acf_image($key, $label, $name)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        );
    }
}

if (!function_exists('hotel_landing_acf_link')) {
    function hotel_landing_acf_link($key, $label, $name)
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

if (!function_exists('hotel_landing_register_group')) {
    function hotel_landing_register_group($key, $title, $fields)
    {
        acf_add_local_field_group(array(
            'key' => $key,
            'title' => $title,
            'fields' => $fields,
            'location' => hotel_landing_acf_locations(),
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
        ));
    }
}

add_action('acf/init', function () {
  

    hotel_landing_register_group('group_hotel_landing_header', 'Landing - Header', array(
        hotel_landing_acf_image('field_hotel_logo', 'Logo', 'hotel_logo'),
        hotel_landing_acf_text('field_hotel_brand_name', 'Tên thương hiệu fallback', 'hotel_brand_name', hotel_landing_default('hotel_brand_name')),
        hotel_landing_acf_text('field_hotel_brand_subtitle', 'Dòng phụ thương hiệu fallback', 'hotel_brand_subtitle', hotel_landing_default('hotel_brand_subtitle')),
        array(
            'key' => 'field_hotel_nav_items',
            'label' => 'Menu landing',
            'name' => 'hotel_nav_items',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm menu',
            'sub_fields' => array(
                hotel_landing_acf_text('field_hotel_nav_label', 'Nhãn', 'label'),
                hotel_landing_acf_text('field_hotel_nav_url', 'Link/Anchor', 'url', '#'),
            ),
        ),
        hotel_landing_acf_link('field_hotel_booking_button', 'Nút booking', 'hotel_booking_button'),
    ));

    hotel_landing_register_group('group_hotel_landing_hero', 'Landing - Hero', array(
        hotel_landing_acf_image('field_hotel_hero_background', 'Ảnh nền hero', 'hotel_hero_background'),
        hotel_landing_acf_text('field_hotel_hero_title', 'Tiêu đề chính', 'hotel_hero_title', hotel_landing_default('hotel_hero_title'), 'textarea'),
        hotel_landing_acf_text('field_hotel_hero_script_title', 'Tiêu đề phụ', 'hotel_hero_script_title', hotel_landing_default('hotel_hero_script_title')),
        hotel_landing_acf_text('field_hotel_hero_description', 'Mô tả', 'hotel_hero_description', hotel_landing_default('hotel_hero_description'), 'textarea'),
        hotel_landing_acf_link('field_hotel_hero_button', 'Nút hero', 'hotel_hero_button'),
        array(
            'key' => 'field_hotel_quick_features',
            'label' => 'Dải tiện ích dưới hero',
            'name' => 'hotel_quick_features',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm tiện ích',
            'sub_fields' => array(
                hotel_landing_acf_image('field_hotel_quick_feature_icon', 'Icon ảnh', 'icon'),
                hotel_landing_acf_text('field_hotel_quick_feature_icon_class', 'FontAwesome class', 'icon_class', 'fa-solid fa-star'),
                hotel_landing_acf_text('field_hotel_quick_feature_title', 'Tiêu đề', 'title'),
                hotel_landing_acf_text('field_hotel_quick_feature_description', 'Mô tả', 'description', '', 'textarea'),
            ),
        ),
    ));

    hotel_landing_register_group('group_hotel_landing_intro', 'Landing - Giới thiệu', array(
        hotel_landing_acf_image('field_hotel_intro_image', 'Ảnh bên trái', 'hotel_intro_image'),
        hotel_landing_acf_text('field_hotel_intro_eyebrow', 'Tiêu đề phụ', 'hotel_intro_eyebrow', hotel_landing_default('hotel_intro_eyebrow')),
        hotel_landing_acf_text('field_hotel_intro_title', 'Tiêu đề', 'hotel_intro_title', hotel_landing_default('hotel_intro_title')),
        hotel_landing_acf_text('field_hotel_intro_description', 'Mô tả', 'hotel_intro_description', hotel_landing_default('hotel_intro_description'), 'textarea'),    
        hotel_landing_acf_link('field_hotel_intro_button', 'Nút liên kết', 'hotel_intro_button'),
      
    ));

    hotel_landing_register_group('group_hotel_landing_rooms', 'Landing - Hạng phòng', array(
        hotel_landing_acf_text('field_hotel_rooms_eyebrow', 'Tiêu đề phụ', 'hotel_rooms_eyebrow', hotel_landing_default('hotel_rooms_eyebrow')),
        hotel_landing_acf_text('field_hotel_rooms_title', 'Tiêu đề', 'hotel_rooms_title', hotel_landing_default('hotel_rooms_title')),
        hotel_landing_acf_text('field_hotel_rooms_description', 'Mô tả', 'hotel_rooms_description', hotel_landing_default('hotel_rooms_description'), 'textarea'),
        array(
            'key' => 'field_hotel_rooms',
            'label' => 'Danh sách hạng phòng',
            'name' => 'hotel_rooms',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm phòng',
            'sub_fields' => array(
                hotel_landing_acf_image('field_hotel_room_image', 'Ảnh phòng', 'image'),
                hotel_landing_acf_text('field_hotel_room_title', 'Tên phòng', 'title'),
                hotel_landing_acf_text('field_hotel_room_description', 'Mô tả', 'description', '', 'textarea'),
                hotel_landing_acf_text('field_hotel_room_guest_count', 'Số người/phòng', 'guest_count', '2 adults - 1 child'),
                array(
                    'key' => 'field_hotel_room_facts',
                    'label' => 'Room facts',
                    'name' => 'facts',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Add fact',
                    'sub_fields' => array(
                        hotel_landing_acf_text('field_hotel_room_fact_icon_class', 'FontAwesome class', 'icon_class', 'fa-regular fa-circle-check'),
                        hotel_landing_acf_text('field_hotel_room_fact_label', 'Label', 'label'),
                    ),
                ),
                hotel_landing_acf_link('field_hotel_room_link', 'Link chi tiết', 'link'),
            ),
        ),
    ));

    hotel_landing_register_group('group_hotel_landing_amenities', 'Landing - Tiện ích', array(
        hotel_landing_acf_text('field_hotel_amenities_eyebrow', 'Tiêu đề phụ', 'hotel_amenities_eyebrow', hotel_landing_default('hotel_amenities_eyebrow')),
        hotel_landing_acf_text('field_hotel_amenities_title', 'Tiêu đề', 'hotel_amenities_title', hotel_landing_default('hotel_amenities_title')),
        array(
            'key' => 'field_hotel_amenities',
            'label' => 'Danh sách tiện ích',
            'name' => 'hotel_amenities',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm tiện ích',
            'sub_fields' => array(
                hotel_landing_acf_image('field_hotel_amenity_icon', 'Icon ảnh', 'icon'),
                hotel_landing_acf_text('field_hotel_amenity_icon_class', 'FontAwesome class', 'icon_class', 'fa-solid fa-star'),
                hotel_landing_acf_text('field_hotel_amenity_title', 'Tiêu đề', 'title'),
                hotel_landing_acf_text('field_hotel_amenity_description', 'Mô tả', 'description', '', 'textarea'),
            ),
        ),
    ));

    hotel_landing_register_group('group_hotel_landing_dining', 'Landing - Nhà hàng & Ẩm thực', array(
        hotel_landing_acf_text('field_hotel_dining_eyebrow', 'Tiêu đề phụ', 'hotel_dining_eyebrow', hotel_landing_default('hotel_dining_eyebrow')),
        hotel_landing_acf_text('field_hotel_dining_title', 'Tiêu đề', 'hotel_dining_title', hotel_landing_default('hotel_dining_title')),
        hotel_landing_acf_text('field_hotel_dining_description', 'Mô tả', 'hotel_dining_description', hotel_landing_default('hotel_dining_description'), 'textarea'),
        hotel_landing_acf_link('field_hotel_dining_button', 'Nút booking', 'hotel_dining_button'),
        array(
            'key' => 'field_hotel_dining_items',
            'label' => 'Danh sách không gian ẩm thực',
            'name' => 'hotel_dining_items',
            'type' => 'repeater',
            'layout' => 'row',
            'max' => 4,
            'button_label' => 'Thêm mục',
            'sub_fields' => array(
                hotel_landing_acf_image('field_hotel_dining_image', 'Ảnh', 'image'),
                hotel_landing_acf_text('field_hotel_dining_item_title', 'Tiêu đề', 'title'),
                hotel_landing_acf_text('field_hotel_dining_item_description', 'Mô tả', 'description', '', 'textarea'),
            ),
        ),
    ));

    hotel_landing_register_group('group_hotel_landing_offers', 'Landing - Ưu đãi', array(
        hotel_landing_acf_text('field_hotel_offers_eyebrow', 'Tiêu đề phụ', 'hotel_offers_eyebrow', hotel_landing_default('hotel_offers_eyebrow')),
        hotel_landing_acf_text('field_hotel_offers_title', 'Tiêu đề', 'hotel_offers_title', hotel_landing_default('hotel_offers_title')),
        hotel_landing_acf_text('field_hotel_offers_description', 'Mô tả', 'hotel_offers_description', hotel_landing_default('hotel_offers_description'), 'textarea'),
        array(
            'key' => 'field_hotel_offers',
            'label' => 'Danh sách ưu đãi',
            'name' => 'hotel_offers',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm ưu đãi',
            'sub_fields' => array(
                hotel_landing_acf_image('field_hotel_offer_image', 'Ảnh', 'image'),
                hotel_landing_acf_text('field_hotel_offer_eyebrow', 'Nhãn nhỏ', 'eyebrow'),
                hotel_landing_acf_text('field_hotel_offer_title', 'Tiêu đề ưu đãi', 'title'),
                hotel_landing_acf_text('field_hotel_offer_description', 'Mô tả', 'description', '', 'textarea'),
                hotel_landing_acf_link('field_hotel_offer_link', 'Link đặt ngay', 'link'),
            ),
        ),
    ));

    hotel_landing_register_group('group_hotel_landing_testimonials', 'Landing - Đánh giá', array(
        hotel_landing_acf_text('field_hotel_reviews_eyebrow', 'Tiêu đề phụ', 'hotel_reviews_eyebrow', hotel_landing_default('hotel_reviews_eyebrow')),
        hotel_landing_acf_text('field_hotel_reviews_title', 'Tiêu đề đánh giá', 'hotel_reviews_title', hotel_landing_default('hotel_reviews_title')),
        hotel_landing_acf_text('field_hotel_reviews_description', 'Mô tả', 'hotel_reviews_description', hotel_landing_default('hotel_reviews_description'), 'textarea'),
        array(
            'key' => 'field_hotel_intro_reviews',
            'label' => 'Danh sách đánh giá',
            'name' => 'hotel_intro_reviews',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm kênh đánh giá',
            'sub_fields' => array(
                hotel_landing_acf_image('field_hotel_intro_review_logo', 'Logo OTA', 'logo'),
                hotel_landing_acf_text('field_hotel_intro_review_logo_text', 'Text logo fallback', 'logo_text'),
                hotel_landing_acf_text('field_hotel_intro_review_rating', 'Rating', 'rating'),
                hotel_landing_acf_text('field_hotel_intro_review_label', 'Label', 'label'),
                hotel_landing_acf_text('field_hotel_intro_review_description', 'Tên kênh OTA', 'description'),
                hotel_landing_acf_text('field_hotel_intro_review_url', 'Link OTA', 'url', '#'),
            ),
        ),
    ));

    hotel_landing_register_group('group_hotel_landing_video', 'Landing - Video', array(
        hotel_landing_acf_image('field_hotel_video_background', 'Ảnh nền video', 'hotel_video_background'),
        hotel_landing_acf_text('field_hotel_video_eyebrow', 'Tiêu đề phụ', 'hotel_video_eyebrow', hotel_landing_default('hotel_video_eyebrow')),
        hotel_landing_acf_text('field_hotel_video_title', 'Tiêu đề', 'hotel_video_title', hotel_landing_default('hotel_video_title')),
        hotel_landing_acf_link('field_hotel_video_link', 'Link video', 'hotel_video_link'),
    ));

    hotel_landing_register_group('group_hotel_landing_larita_extras', 'Landing - Larita Layout Extras', array(
        hotel_landing_acf_text('field_hotel_hero_rating', 'Hero rating text', 'hotel_hero_rating', hotel_landing_default('hotel_hero_rating')),
        hotel_landing_acf_text('field_hotel_hero_since_label', 'Hero since label', 'hotel_hero_since_label', hotel_landing_default('hotel_hero_since_label')),
        hotel_landing_acf_link('field_hotel_hero_story_button', 'Hero story button', 'hotel_hero_story_button'),
        hotel_landing_acf_text('field_hotel_hero_booking_stat', 'Hero booking stat', 'hotel_hero_booking_stat', hotel_landing_default('hotel_hero_booking_stat')),
        hotel_landing_acf_text('field_hotel_hero_review_stat', 'Hero review stat', 'hotel_hero_review_stat', hotel_landing_default('hotel_hero_review_stat')),
        hotel_landing_acf_link('field_hotel_room_booking_button', 'Room booking button', 'hotel_room_booking_button'),
    ));

    hotel_landing_register_group('group_hotel_landing_footer', 'Landing - Footer', array(
        hotel_landing_acf_image('field_hotel_footer_logo', 'Logo footer', 'hotel_footer_logo'),
        hotel_landing_acf_text('field_hotel_footer_title', 'Tiêu đề cột liên hệ', 'hotel_footer_title', hotel_landing_default('hotel_footer_title')),
        hotel_landing_acf_text('field_hotel_footer_description', 'Mô tả', 'hotel_footer_description', hotel_landing_default('hotel_footer_description'), 'textarea'),
        array(
            'key' => 'field_hotel_footer_contacts',
            'label' => 'Thông tin liên hệ',
            'name' => 'hotel_footer_contacts',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm liên hệ',
            'sub_fields' => array(
                hotel_landing_acf_text('field_hotel_footer_contact_icon_class', 'FontAwesome class', 'icon_class', 'fa-solid fa-circle-info'),
                hotel_landing_acf_text('field_hotel_footer_contact_text', 'Nội dung', 'text'),
                hotel_landing_acf_text('field_hotel_footer_contact_url', 'Link', 'url'),
            ),
        ),
        array(
            'key' => 'field_hotel_footer_socials',
            'label' => 'Mạng xã hội',
            'name' => 'hotel_footer_socials',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm mạng xã hội',
            'sub_fields' => array(
                hotel_landing_acf_text('field_hotel_footer_social_icon_class', 'FontAwesome class', 'icon_class', 'fa-brands fa-facebook-f'),
                hotel_landing_acf_text('field_hotel_footer_social_url', 'Link', 'url', '#'),
            ),
        ),
        hotel_landing_acf_text('field_hotel_footer_map_title', 'Tiêu đề bản đồ', 'hotel_footer_map_title', hotel_landing_default('hotel_footer_map_title')),
        hotel_landing_acf_text('field_hotel_footer_map_embed', 'Google Maps embed URL', 'hotel_footer_map_embed', hotel_landing_default('hotel_footer_map_embed'), 'textarea'),
        hotel_landing_acf_image('field_hotel_footer_map_image', 'Ảnh bản đồ fallback', 'hotel_footer_map_image'),
        hotel_landing_acf_text('field_hotel_footer_map_caption', 'Chú thích bản đồ', 'hotel_footer_map_caption', hotel_landing_default('hotel_footer_map_caption')),
        hotel_landing_acf_text('field_hotel_footer_map_link', 'Link mở Google Maps', 'hotel_footer_map_link', hotel_landing_default('hotel_footer_map_link')),
        array(
            'key' => 'field_hotel_footer_links',
            'label' => 'Liên kết nhanh',
            'name' => 'hotel_footer_links',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm link',
            'sub_fields' => array(
                hotel_landing_acf_text('field_hotel_footer_link_label', 'Nhãn', 'label'),
                hotel_landing_acf_text('field_hotel_footer_link_url', 'Link', 'url', '#'),
            ),
        ),
        hotel_landing_acf_text('field_hotel_newsletter_title', 'Tiêu đề nhận ưu đãi', 'hotel_newsletter_title', hotel_landing_default('hotel_newsletter_title')),
        hotel_landing_acf_text('field_hotel_newsletter_text', 'Mô tả nhận ưu đãi', 'hotel_newsletter_text', hotel_landing_default('hotel_newsletter_text'), 'textarea'),
        hotel_landing_acf_text('field_hotel_newsletter_shortcode', 'Shortcode form nhận email', 'hotel_newsletter_shortcode'),
        hotel_landing_acf_text('field_hotel_newsletter_placeholder', 'Placeholder email', 'hotel_newsletter_placeholder', hotel_landing_default('hotel_newsletter_placeholder')),
        hotel_landing_acf_text('field_hotel_newsletter_button', 'Text nút đăng ký', 'hotel_newsletter_button', hotel_landing_default('hotel_newsletter_button')),
        hotel_landing_acf_text('field_hotel_copyright', 'Copyright', 'hotel_copyright', hotel_landing_default('hotel_copyright')),
        array(
            'key' => 'field_hotel_policy_links',
            'label' => 'Link chính sách',
            'name' => 'hotel_policy_links',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm link',
            'sub_fields' => array(
                hotel_landing_acf_text('field_hotel_policy_link_label', 'Nhãn', 'label'),
                hotel_landing_acf_text('field_hotel_policy_link_url', 'Link', 'url', '#'),
            ),
        ),
    ));
});

if (!function_exists('hotel_landing_render_parts')) {
    function hotel_landing_render_parts()
    {
        get_template_part('template-parts/landing-header');
        get_template_part('template-parts/hero');
        get_template_part('template-parts/quick-features');
        get_template_part('template-parts/hotel-intro');
        get_template_part('template-parts/featured-rooms');
        get_template_part('template-parts/hotel-amenities');
        get_template_part('template-parts/dining-section');
        get_template_part('template-parts/offers-section');
        get_template_part('template-parts/reviews-section');
        get_template_part('template-parts/video-section');
        get_template_part('template-parts/landing-footer');
    }
}

add_shortcode('landing_page', function () {
    ob_start();
    ?>
    <main id="main-landing" class="landing-page hotel-landing">
        <?php hotel_landing_render_parts(); ?>
    </main>
    <?php
    return ob_get_clean();
});
