# Landing Page Project - WordPress + ACF

## 1. Tổng quan dự án

**Tên dự án:** Ladingoaingu Landing Page  
**Nền tảng:** WordPress  
**Công cụ:** Advanced Custom Fields (ACF)  
**Mục đích:** Tạo landing page chuyên nghiệp với các thành phần tái sử dụng và dễ quản lý

---

## 2. Cấu trúc trang Landing Page (Theo design Edusmart)

### 2.1 Hero Section
- **Tiêu đề chính (Main Title):** Text field
- **Tiêu đề phụ (Sub Title):** Text field
- **Mô tả (Description):** Text area
- **Hình ảnh hero (Hero Image):** Image field
- **Nút CTA 1 (Primary Button):** Group field
  - Văn bản: Text field
  - Link: URL field
- **Nút CTA 2 (Secondary Button):** Group field
  - Văn bản: Text field
  - Link: URL field
  - Icon: Select field

### 2.2 Why Choose Us Section
- **Tiêu đề section:** Text field
- **Mô tả:** Text area
- **Danh sách lý do (Benefits):** Repeater field
  - Icon: Image field
  - Tiêu đề: Text field
  - Mô tả: Text area

### 2.3 Featured Courses Section
- **Tiêu đề:** Text field
- **Mô tả:** Text area
- **Khóa học nổi bật (Courses):** Repeater field
  - Ảnh khóa học: Image field
  - Badge (Tuổi/cấp độ): Text field
  - Tiêu đề: Text field
  - Mô tả ngắn: Text area
  - Nút xem chi tiết: URL field

### 2.4 Testimonials Section
- **Tiêu đề:** Text field
- **Mô tả:** Text area
- **Đánh giá/Bình luận:** Repeater field
  - Ảnh người dùng (Avatar): Image field
  - Tên: Text field
  - Chức vụ/Vị trí: Text field
  - Nội dung bình luận: Text area
  - Số sao (Rating): Number field (1-5)

### 2.5 CTA Section (Call to Action)
- **Tiêu đề:** Text field
- **Mô tả:** Text area
- **Nút CTA:** Group field
  - Văn bản: Text field
  - Link: URL field
  - Icon/Badge: Text field

### 2.6 Statistics Section (Thống kê)
- **Danh sách thống kê:** Repeater field
  - Số lượng: Text field
  - Mô tả: Text field
  - Icon: Image field

### 2.7 General Settings
- **Màu chủ đạo (Primary Color):** Color picker
- **Màu phụ (Secondary Color):** Color picker
- **Màu trắng:** Color picker

---

## 3. Cấu hình ACF

### 3.1 Field Groups
```
✓ Hero Fields
✓ Features Fields
✓ Pricing Fields
✓ Testimonials Fields
✓ FAQ Fields
✓ Footer Fields
✓ General Settings
```

### 3.2 Locations
- Áp dụng cho: Post Type = Page (Landing Page)
- Hoặc tạo Options Page cho cài đặt chung

---

## 4. Database Structure

### Custom Post Types
- `landing_page` - Landing page posts

### Custom Taxonomies
- `pricing_category` - Phân loại gói giá (Starter, Business, Enterprise)
- `feature_category` - Phân loại tính năng

---

## 5. Chức năng & Tính năng

### 5.1 Frontend
- ✓ Responsive design (Mobile, Tablet, Desktop)
- ✓ Smooth scroll navigation
- ✓ Dynamic content từ ACF
- ✓ Contact form (tùy chọn tích hợp Gravity Forms/WPForms)
- ✓ Modal/Popup cho CTA
- ✓ Lightbox cho hình ảnh

### 5.2 Backend
- ✓ Quản lý trang dễ dàng qua ACF
- ✓ Preview chuyên nghiệp
- ✓ Sắp xếp lại các phần tử (Drag & Drop cho Repeater)
- ✓ Backup/Restore cấu hình

### 5.3 Performance
- ✓ Lazy loading hình ảnh
- ✓ Caching ACF values
- ✓ Minify CSS/JS
- ✓ Optimization hình ảnh

---

## 6. File Structure

```
/wp-content/themes/ladingoaingu-theme/
├── template-parts/
│   ├── hero.php
│   ├── features.php
│   ├── pricing.php
│   ├── testimonials.php
│   ├── faq.php
│   └── footer-cta.php
├── assets/
│   ├── css/
│   │   ├── style.css
│   │   └── responsive.css
│   ├── js/
│   │   ├── main.js
│   │   └── animations.js
│   └── images/
├── functions.php
├── acf-config.php (ACF Field Groups export)
└── page-landing.php (Template chính)
```

---

## 7. Công nghệ sử dụng

- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **CSS Framework:** Tailwind CSS hoặc Bootstrap
- **Animation:** AOS (Animate On Scroll) hoặc GSAP
- **Plugin:** ACF Pro, WPForms/Gravity Forms
- **SEO:** Yoast SEO hoặc Rank Math

---

## 8. Bước triển khai

1. **Cài đặt & Cấu hình:**
   - Cài đặt WordPress
   - Cài đặt ACF Pro
   - Tạo Custom Theme

2. **Tạo ACF Field Groups:**
   - Định nghĩa tất cả các field theo spec
   - Thiết lập locations và validation rules
   - Export field group JSON

3. **Phát triển Theme:**
   - Tạo page template
   - Xây dựng template parts
   - Viết CSS/JS

4. **Kiểm thử:**
   - Test responsive
   - Test cross-browser
   - Performance audit
   - SEO check

5. **Deployment:**
   - Migrate dữ liệu
   - Backup database
   - Go live

---

## 9. Ghi chú phát triển

### 9.1 ACF Tips
- Sử dụng `get_field()` để lấy dữ liệu
- Dùng `have_rows()` để loop repeater
- Validate input trước khi hiển thị
- Sử dụng ACF filters để tùy chỉnh

### 9.2 Security
- Sanitize tất cả output: `sanitize_text_field()`, `wp_kses_post()`
- Escape output: `esc_html()`, `esc_attr()`, `esc_url()`
- Kiểm tra capabilities trước khi hiển thị

### 9.3 Performance
- Cache kết quả query
- Lazy load repeater items
- Optimize hình ảnh trước khi upload
- Giảm số DB queries

---

## 10. Ví dụ Code

### Lấy Hero Section Data
```php
<?php
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_image = get_field('hero_background_image');
$hero_button = get_field('hero_cta_button');
?>
<section class="hero" style="background-image: url(<?php echo esc_url($hero_image['url']); ?>)">
    <h1><?php echo esc_html($hero_title); ?></h1>
    <p><?php echo esc_html($hero_subtitle); ?></p>
    <a href="<?php echo esc_url($hero_button['url']); ?>" class="btn">
        <?php echo esc_html($hero_button['text']); ?>
    </a>
</section>
```

### Loop Features
```php
<?php
if (have_rows('features')):
    while (have_rows('features')): the_row();
        $feature_icon = get_sub_field('feature_icon');
        $feature_title = get_sub_field('feature_title');
        $feature_desc = get_sub_field('feature_description');
        ?>
        <div class="feature-card">
            <img src="<?php echo esc_url($feature_icon['url']); ?>" alt="<?php echo esc_attr($feature_title); ?>">
            <h3><?php echo esc_html($feature_title); ?></h3>
            <p><?php echo esc_html($feature_desc); ?></p>
        </div>
        <?php
    endwhile;
endif;
?>
```

---

## 11. Checklist Phát triển

- [ ] ACF Field Groups created
- [ ] Theme template created
- [ ] Template parts built
- [ ] Styling completed
- [ ] JavaScript functionality added
- [ ] Responsive tested
- [ ] Cross-browser tested
- [ ] Performance optimized
- [ ] SEO configured
- [ ] Security reviewed
- [ ] Documentation completed
- [ ] Client approved

---

## 12. Liên hệ & Support

**Dự án:** Ladingoaingu Landing Page  
**Phiên bản:** 1.0  
**Ngày tạo:** 2026-04-28  
**Cập nhật lần cuối:** 2026-04-28
