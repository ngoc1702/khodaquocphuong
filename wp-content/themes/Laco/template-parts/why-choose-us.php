<?php
/**
 * Why Choose Us Section Template
 */

$why_title = get_field('why_choose_title', 'option');
$why_description = get_field('why_choose_description', 'option');
$benefits = get_field('why_choose_benefits', 'option');
?>

<section class="why-choose-us-section">
    <div class="container">
        <?php if ($why_title || $why_description): ?>
            <div class="section-header">
                <?php if ($why_title): ?>
                    <h2 class="section-title">
                        <?php echo esc_html($why_title); ?>
                        <span class="highlight">?</span>
                    </h2>
                <?php endif; ?>
                
                <?php if ($why_description): ?>
                    <p class="section-description"><?php echo esc_html($why_description); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($benefits && have_rows('why_choose_benefits')): ?>
            <div class="benefits-grid">
                <?php while (have_rows('why_choose_benefits')): the_row();
                    $icon = get_sub_field('benefit_icon');
                    $title = get_sub_field('benefit_title');
                    $description = get_sub_field('benefit_description');
                    ?>
                    <div class="benefit-card">
                        <?php if ($icon): ?>
                            <div class="benefit-icon">
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($title); ?>" />
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($title): ?>
                            <h3 class="benefit-title"><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>
                        
                        <?php if ($description): ?>
                            <p class="benefit-description"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
