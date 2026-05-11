<?php
$intro_eyebrow = hotel_landing_get_field('hotel_intro_eyebrow', hotel_landing_default('hotel_intro_eyebrow'));
$intro_title = hotel_landing_get_field('hotel_intro_title', hotel_landing_default('hotel_intro_title'));
$intro_description = hotel_landing_get_field('hotel_intro_description', hotel_landing_default('hotel_intro_description'));
$intro_button = hotel_landing_link(
    hotel_landing_get_field('hotel_intro_button', hotel_landing_default('hotel_intro_button')),
    hotel_landing_default('hotel_intro_button')['title'],
    hotel_landing_default('hotel_intro_button')['url']
);
$intro_image = hotel_landing_get_field('hotel_intro_image', hotel_landing_default('hotel_intro_image'));
$intro_image_url = hotel_landing_image_url($intro_image);
$intro_image_alt = hotel_landing_image_alt($intro_image, $intro_title);
$intro_reviews = hotel_landing_get_field('hotel_intro_reviews', hotel_landing_default('hotel_intro_reviews'));
?>

<section class="hotel-section hotel-intro" id="gioi-thieu">
    <div class="hotel-container">
        <div class="hotel-intro__layout">
            <div class="hotel-intro__media" aria-label="Hotel intro image">
                <?php if ($intro_image_url) : ?>
                    <figure class="hotel-intro__image">
                        <img src="<?php echo esc_url($intro_image_url); ?>" alt="<?php echo esc_attr($intro_image_alt); ?>">
                    </figure>
                <?php else : ?>
                    <figure class="hotel-intro__image hotel-intro__image--placeholder" aria-hidden="true"></figure>
                <?php endif; ?>
            </div>

            <div class="hotel-intro__content">
                <?php if ($intro_eyebrow) : ?>
                    <p class="hotel-eyebrow"><?php echo esc_html($intro_eyebrow); ?></p>
                <?php endif; ?>

                <?php if ($intro_title) : ?>
                    <h2><?php echo esc_html($intro_title); ?></h2>
                <?php endif; ?>

                <?php if ($intro_description) : ?>
                    <p><?php echo esc_html($intro_description); ?></p>
                <?php endif; ?>

                <?php if (!empty($intro_button['title'])) : ?>
                    <a class="hotel-btn hotel-btn--gold hotel-btn--small" href="<?php echo esc_url($intro_button['url']); ?>"<?php echo $intro_button['target'] ? ' target="' . esc_attr($intro_button['target']) . '"' : ''; ?>>
                        <?php echo esc_html($intro_button['title']); ?>
                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 18 12" fill="none"><path d="M-2.18557e-07 6L15.6008 6.00004M11.0001 1L16 6.00004L11 11" stroke="white" stroke-width="1.5"></path></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($intro_reviews) && is_array($intro_reviews)) : ?>
            <div class="hotel-review-strip" aria-label="Review summaries">
                <?php foreach ($intro_reviews as $review) :
                    $logo = !empty($review['logo']) ? $review['logo'] : null;
                    $logo_url = hotel_landing_image_url($logo);
                    $logo_text = !empty($review['logo_text']) ? $review['logo_text'] : '';
                    $rating = !empty($review['rating']) ? $review['rating'] : '';
                    $label = !empty($review['label']) ? $review['label'] : '';
                    $description = !empty($review['description']) ? $review['description'] : '';
                    ?>
                    <article class="hotel-review-summary">
                        <div class="hotel-review-summary__logo">
                            <?php if ($logo_url) : ?>
                                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($logo, $logo_text)); ?>">
                            <?php else : ?>
                                <span><?php echo esc_html($logo_text); ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php if ($rating || $label) : ?>
                                <strong>
                                    <?php echo esc_html($rating); ?>
                                    <?php if ($label) : ?>
                                        <span>&#9733; <?php echo esc_html($label); ?></span>
                                    <?php endif; ?>
                                </strong>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <p><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
