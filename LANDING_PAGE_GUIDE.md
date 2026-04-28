# Landing Page - Quick Start Guide (Cấu trúc Mới)

## 🎯 Cách hoạt động

Landing Page được quản lý thông qua **Options Page** trong ACF, không liên kết với page cụ thể nào. Điều này cho phép bạn:
- ✅ Quản lý tất cả nội dung từ một nơi
- ✅ Display landing page ở bất cứ trang nào (dùng shortcode)
- ✅ Không phải lo về template page

---

## 📋 Bước 1: Cài đặt (1 lần duy nhất)

### 1.1 Cài đặt ACF Plugin
1. **Plugins** → **Add New**
2. Tìm "Advanced Custom Fields"
3. Cài đặt + Kích hoạt

### 1.2 Xác nhận ACF Config đã load

Mở `functions.php` của theme, kiểm tra có dòng này chưa:

```php
require_once get_template_directory() . '/acf-landing-config.php';
```

Nếu chưa có, thêm vào cuối file.

### 1.3 Refresh WordPress

- F5 để refresh WordPress
- Kiểm tra xem có menu **"Landing Page"** trong sidebar không

---

## 🖊️ Bước 2: Nhập Nội Dung

Vào **Dashboard** → **Landing Page** (trong sidebar)

Bạn sẽ thấy 6 sections:

### ✏️ Hero Section

```
Tiêu đề chính:        "TRUNG TÂM ANH NGỮ"
Tiêu đề phụ:          "EDUSMART"
Mô tả:                "Nơi giáo dục bạn tiếp nước từ chính phục..."
Hình ảnh:             Upload hình
Nút CTA 1:            Text: "ĐĂNG KÝ HỌC THỬ MIỄN PHÍ", Link: #
Nút CTA 2:            Text: "XEM VIDEO GỢI Ý", Link: #
```

### ✏️ Why Choose Us Section

```
Tiêu đề:              "Tại sao nên chọn"
Mô tả:                "Chúng tôi mang đến..."
```

Click **"Add Row"** để thêm lợi ích:

```
Row 1:
  Icon:               Upload icon
  Tiêu đề:            "GIÁO VIÊN CHẤT LƯỢNG"
  Mô tả:              "100% giáo viên có chứng chỉ..."

Row 2:
  Icon:               Upload icon
  Tiêu đề:            "LỘ TRÌNH KHOA HỌC"
  Mô tả:              "Xây dựng từ cơ bản đến nâng cao..."

Row 3:
  Icon:               Upload icon
  Tiêu đề:            "PHƯƠNG PHÁP HIỆN ĐẠI"
  Mô tả:              "Ứng dụng những phương pháp tối ưu..."

Row 4:
  Icon:               Upload icon
  Tiêu đề:            "CAM KẾT ĐẦU RA"
  Mô tả:              "Cam kết đầu ra tương xứng..."

Row 5:
  Icon:               Upload icon
  Tiêu đề:            "HỖ TRỢ TẬN TÂMM"
  Mô tả:              "Đội ngũ cố vấn sẵn sàng hỗ trợ..."
```

### ✏️ Featured Courses Section

```
Tiêu đề:              "CÁC KHÓA HỌC NỔI BẬT"
Mô tả:                "Đa dạng khóa học phù hợp..."
```

Click **"Add Row"** để thêm khóa học (tối thiểu 4-5):

```
Row 1:
  Ảnh khóa học:       Upload hình (200x150px trở lên)
  Badge:              "4-12 TUỔI"
  Tiêu đề:            "Anh văn thiếu nhi"
  Mô tả:              "Giới thiệu bảng chữ cái..."
  Link chi tiết:      https://...

Row 2:
  Ảnh khóa học:       Upload hình
  Badge:              "13-17 TUỔI"
  Tiêu đề:            "Anh văn thiếu niên"
  Mô tả:              "Nâng cao kỹ năng..."
  Link chi tiết:      https://...

Row 3:
  Ảnh khóa học:       Upload hình
  Badge:              "18+ TUỔI"
  Tiêu đề:            "Anh văn giao tiếp"
  Mô tả:              "Tập trung vào kỹ năng..."
  Link chi tiết:      https://...

Row 4:
  Ảnh khóa học:       Upload hình
  Badge:              "IELTS"
  Tiêu đề:            "Luyện thi IELTS"
  Mô tả:              "Chuẩn bị cho kỳ thi..."
  Link chi tiết:      https://...

Row 5:
  Ảnh khóa học:       Upload hình
  Badge:              "DOANH NGHIỆP"
  Tiêu đề:            "Anh văn doanh nghiệp"
  Mô tả:              "Dành cho nhân viên công ty..."
  Link chi tiết:      https://...
```

### ✏️ Testimonials Section

```
Tiêu đề:              "HỌC VIÊN NÓI GÌ VỀ CHÚNG TÔI?"
Mô tả:                "Chúng tôi mang đến..."
```

Click **"Add Row"** để thêm testimonials (tối thiểu 3):

```
Row 1:
  Ảnh đại diện:       Upload ảnh (100x100px)
  Tên:                "Nguyễn Hoài An"
  Vị trí/Chức vụ:     "Bố mẹ học viên - Lớp K4"
  Bình luận:          "Mình rất hài lòng với chất lượng..."
  Số sao:             5

Row 2:
  Ảnh đại diện:       Upload ảnh
  Tên:                "Trần Minh Tâm"
  Vị trí/Chức vụ:     "Học viên - Lớp 7"
  Bình luận:          "Giáo viên rất giỏi..."
  Số sao:             5

Row 3:
  Ảnh đại diện:       Upload ảnh
  Tên:                "Lê Thủy Linh"
  Vị trí/Chức vụ:     "Bố mẹ học viên - Lớp 5"
  Bình luận:          "Đã thấy sự tiến bộ..."
  Số sao:             4
```

### ✏️ CTA Section

```
Tiêu đề:              "SẴN SÀNG BẮT ĐẦU?"
Mô tả:                "Đăng ký hôm nay để nhận..."
Nút CTA:              Text: "ĐĂNG KÝ NGAY", Link: #
Hình nền (tuỳ chọn):  Upload ảnh hoặc để trống
```

### ✏️ Statistics Section

Click **"Add Row"** để thêm thống kê (4 cái):

```
Row 1:
  Icon:               Upload icon (50x50px)
  Số lượng:           "10,000+"
  Mô tả:              "Học viên đã tham gia"

Row 2:
  Icon:               Upload icon
  Số lượng:           "50+"
  Mô tả:              "Đạo tạo chương trình"

Row 3:
  Icon:               Upload icon
  Số lượng:           "95%"
  Mô tả:              "Học viên hài lòng"

Row 4:
  Icon:               Upload icon
  Số lượng:           "8+"
  Mô tả:              "Năm kinh nghiệm giảng dạy"
```

---

## 🌐 Bước 3: Display Landing Page

### Cách 1: Dùng Shortcode (Khuyến khích)

1. Vào **Pages** → **Add New** (hoặc edit trang hiện có)
2. Thêm shortcode: `[landing_page]`
3. Publish
4. Xong! Landing page sẽ hiển thị

### Cách 2: Dùng Page Template

1. Tạo page mới
2. Chọn Template: "Landing Page"
3. Publish

---

## 🔍 Kiểm Tra

1. Truy cập landing page từ frontend
2. Kiểm tra các section:
   - [ ] Hero section hiển thị đúng
   - [ ] Why Choose Us cards
   - [ ] Courses carousel (có sliding)
   - [ ] Testimonials carousel
   - [ ] CTA section với màu xanh
   - [ ] Statistics ở dưới (màu xanh đậm)
3. Test trên mobile, tablet, desktop
4. Test carousel hoạt động

---

## ❌ Xử lý sự cố

### ACF Fields không hiện
- Kiểm tra plugin ACF đã Active
- Clear cache browser (Ctrl+Shift+Delete)
- Refresh page (F5)

### Landing Page Menu không hiện
- Kiểm tra acf-landing-config.php đã được include
- Kiểm tra functions.php có dòng require
- Refresh WordPress

### Slider không hoạt động
- Kiểm tra jQuery có load
- Mở F12 → Console xem có error không
- Kiểm tra Internet connection (Slick từ CDN)

### Styling không hiển thị
- Clear browser cache
- Kiểm tra landing.css file tồn tại
- Kiểm tra file path chính xác

---

## 📱 Responsive

Landing page đã responsive cho:
- ✅ Desktop (1200px+)
- ✅ Tablet (768px - 1199px)
- ✅ Mobile (320px - 767px)

---

## 💡 Tips

1. **Hình ảnh nên kích thước:**
   - Hero: 600x500px
   - Course: 300x200px
   - Avatar: 100x100px
   - Icons: 50-60px
   - Stats icons: 50x50px

2. **Tối ưu hóa:**
   - Compress hình trước upload
   - Dùng JPG cho photos, PNG cho graphics
   - Giữ dung lượng file nhỏ

3. **Sắp xếp lại:**
   - Drag & drop các row trong repeater để sắp xếp lại thứ tự

---

## 📞 Support

- Xem browser console (F12)
- Kiểm tra WordPress debug log
- Xem file acf-landing-config.php có syntax error không

---

**Phiên bản:** 2.0 (Options Page)  
**Ngày cập nhật:** 2026-04-28  
**Status:** ✅ Production Ready
