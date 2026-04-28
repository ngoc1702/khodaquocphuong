<?php
/**
 * CTA Section Template
 */

$cta_title = get_field('cta_title', 'option');
$cta_description = get_field('cta_description', 'option');
$cta_button = get_field('cta_button', 'option');
$cta_background = get_field('cta_background_image', 'option');
?>

<section class="cta-section" 
    <?php if ($cta_background): ?>
        style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('<?php echo esc_url($cta_background['url']); ?>'); background-size: cover; background-position: center;"
    <?php else: ?>
        style="background: linear-gradient(135deg, #5B9EF5 0%, #1F5BA8 100%);"
    <?php endif; ?>
>
    <div class="container">
        <div class="cta-content">
            <?php if ($cta_title): ?>
                <h2 class="cta-title"><?php echo esc_html($cta_title); ?></h2>
            <?php endif; ?>
            
            <?php if ($cta_description): ?>
                <p class="cta-description"><?php echo esc_html($cta_description); ?></p>
            <?php endif; ?>
            
            <?php if ($cta_button): ?>
                <a href="<?php echo esc_url($cta_button['url']); ?>" class="btn btn-cta">
                    <?php echo esc_html($cta_button['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
