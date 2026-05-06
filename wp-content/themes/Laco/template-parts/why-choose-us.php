<?php
$why_title = get_field('why_choose_title');
$why_description = get_field('why_choose_description');
?>

<section class="why-choose-us-section" id="lydo">
    <div class="container wrap">
        <div class="why-header">
            <?php if ($why_title): ?>
                <h2><?php echo wp_kses_post($why_title); ?></h2>
            <?php endif; ?>

            <?php if ($why_description): ?>
                <p><?php echo esc_html($why_description); ?></p>
            <?php endif; ?>
        </div>

        <?php if (have_rows('why_choose')): ?>
            <div class="why-benefits-grid">
                <?php while (have_rows('why_choose')): the_row();
                    $icon = get_sub_field('why_icon');
                    $title = get_sub_field('why_title');
                    $description = get_sub_field('why_description');
                ?>
                    <div class="why-benefit-item">
                        <?php if ($icon): ?>
                            <div class="why-benefit-icon">
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($title); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if ($title): ?>
                            <h3><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if ($description): ?>
                            <p><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>