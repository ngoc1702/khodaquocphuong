<?php
/**
 * Featured Courses Section Template
 */

$courses_title = get_field('courses_title', 'option');
$courses_description = get_field('courses_description', 'option');
$courses = get_field('featured_courses', 'option');
?>

<section class="featured-courses-section">
    <div class="container">
        <?php if ($courses_title || $courses_description): ?>
            <div class="section-header">
                <?php if ($courses_title): ?>
                    <h2 class="section-title"><?php echo esc_html($courses_title); ?></h2>
                <?php endif; ?>
                
                <?php if ($courses_description): ?>
                    <p class="section-description"><?php echo esc_html($courses_description); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php if (have_rows('featured_courses')): ?>
            <div class="courses-slider">
                <?php while (have_rows('featured_courses')): the_row();
                    $course_image = get_sub_field('course_image');
                    $course_badge = get_sub_field('course_badge');
                    $course_title = get_sub_field('course_title');
                    $course_description = get_sub_field('course_description');
                    $course_link = get_sub_field('course_link');
                    ?>
                    <div class="course-card">
                        <div class="course-image-wrapper">
                            <?php if ($course_image): ?>
                                <img src="<?php echo esc_url($course_image['url']); ?>" alt="<?php echo esc_attr($course_title); ?>" class="course-image" />
                            <?php endif; ?>
                            
                            <?php if ($course_badge): ?>
                                <span class="course-badge"><?php echo esc_html($course_badge); ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="course-content">
                            <?php if ($course_title): ?>
                                <h3 class="course-title"><?php echo esc_html($course_title); ?></h3>
                            <?php endif; ?>
                            
                            <?php if ($course_description): ?>
                                <p class="course-description"><?php echo esc_html($course_description); ?></p>
                            <?php endif; ?>
                            
                            <?php if ($course_link): ?>
                                <a href="<?php echo esc_url($course_link); ?>" class="course-link">
                                    Xem chi tiết <span class="arrow">→</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        
        <div class="courses-footer">
            <a href="#" class="btn-view-all">XEM TẤT CẢ CÁC KHÓA HỌC</a>
        </div>
    </div>
</section>
