<?php
/**
 * CTA Section Template
 */

$cta_title = get_field('cta_title');
$cta_description = get_field('cta_description');
$cta_button = get_field('cta_button');
$cta_background = get_field('cta_background_image');
?>

<section class="cta-section"
    <?php if ($cta_background): ?>
        style="background-image: url('<?php echo esc_url($cta_background['url']); ?>');"
    <?php endif; ?>
>
    <div class="container">

        <div class="cta-wrapper">

            <div class="cta-content">

                <?php if ($cta_title): ?>
                    <h2 class="cta-title">
                        <?php echo esc_html($cta_title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($cta_description): ?>
                    <p class="cta-description">
                        <?php echo esc_html($cta_description); ?>
                    </p>
                <?php endif; ?>

            </div>

            <?php if ($cta_button): ?>
                <div class="cta-button">
                    <button type="button" class="btn-cta js-cta-button">
    <?php echo esc_html($cta_button); ?>
</button>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>