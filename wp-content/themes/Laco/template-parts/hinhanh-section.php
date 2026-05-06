<?php
$activity_title = get_field('activity_title');
$activity_description = get_field('activity_description');
$row1 = get_field('gallery_row_1');
$row2 = get_field('gallery_row_2');
?>

<?php if ($activity_title || $activity_description || $row1 || $row2): ?>
<section class="activity-gallery-section" id="hinhanh">

    <div class="container">
        <div class="activity-header">

            <?php if ($activity_title): ?>
                <h2><?php echo wp_kses_post($activity_title); ?></h2>
            <?php endif; ?>

            <?php if ($activity_description): ?>
                <p><?php echo esc_html($activity_description); ?></p>
            <?php endif; ?>

        </div>
    </div>

    <?php if ($row1): ?>
        <div class="gallery-marquee marquee-left">
            <div class="gallery-track">

                <?php foreach ($row1 as $image): ?>
                    <div class="gallery-item">
                        <img 
                            src="<?php echo esc_url($image['url']); ?>" 
                            alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
                        >
                    </div>
                <?php endforeach; ?>

                <?php foreach ($row1 as $image): ?>
                    <div class="gallery-item">
                        <img 
                            src="<?php echo esc_url($image['url']); ?>" 
                            alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
                        >
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    <?php endif; ?>

    <?php if ($row2): ?>
        <div class="gallery-marquee marquee-right">
            <div class="gallery-track">

                <?php foreach ($row2 as $image): ?>
                    <div class="gallery-item">
                        <img 
                            src="<?php echo esc_url($image['url']); ?>" 
                            alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
                        >
                    </div>
                <?php endforeach; ?>

                <?php foreach ($row2 as $image): ?>
                    <div class="gallery-item">
                        <img 
                            src="<?php echo esc_url($image['url']); ?>" 
                            alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
                        >
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    <?php endif; ?>

</section>
<?php endif; ?>