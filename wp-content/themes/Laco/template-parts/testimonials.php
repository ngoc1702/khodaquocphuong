<?php
/**
 * Testimonials Section Template
 */

$testimonials_title = get_field('testimonials_title', 'option');
$testimonials_description = get_field('testimonials_description', 'option');
?>

<section class="testimonials-section">
    <div class="container">
        <?php if ($testimonials_title || $testimonials_description): ?>
            <div class="section-header">
                <?php if ($testimonials_title): ?>
                    <h2 class="section-title"><?php echo esc_html($testimonials_title); ?></h2>
                <?php endif; ?>
                
                <?php if ($testimonials_description): ?>
                    <p class="section-description"><?php echo esc_html($testimonials_description); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php if (have_rows('testimonials')): ?>
            <div class="testimonials-slider">
                <?php while (have_rows('testimonials')): the_row();
                    $avatar = get_sub_field('testimonial_avatar');
                    $name = get_sub_field('testimonial_name');
                    $position = get_sub_field('testimonial_position');
                    $comment = get_sub_field('testimonial_comment');
                    $rating = get_sub_field('testimonial_rating');
                    ?>
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <?php if ($avatar): ?>
                                <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr($name); ?>" class="testimonial-avatar" />
                            <?php endif; ?>
                            
                            <div class="testimonial-info">
                                <?php if ($name): ?>
                                    <h3 class="testimonial-name"><?php echo esc_html($name); ?></h3>
                                <?php endif; ?>
                                
                                <?php if ($position): ?>
                                    <p class="testimonial-position"><?php echo esc_html($position); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <?php if ($rating): ?>
                            <div class="testimonial-rating">
                                <?php for ($i = 0; $i < intval($rating); $i++): ?>
                                    <span class="star">★</span>
                                <?php endfor; ?>
                                <?php for ($i = intval($rating); $i < 5; $i++): ?>
                                    <span class="star empty">★</span>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($comment): ?>
                            <p class="testimonial-comment"><?php echo esc_html($comment); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
