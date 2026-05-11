<?php
$hero_background = hotel_landing_get_field('hotel_hero_background');
$hero_title = hotel_landing_get_field('hotel_hero_title', hotel_landing_default('hotel_hero_title'));
$hero_subtitle = hotel_landing_get_field('hotel_hero_script_title', hotel_landing_default('hotel_hero_script_title'));
$hero_description = hotel_landing_get_field('hotel_hero_description', hotel_landing_default('hotel_hero_description'));
$hero_button = hotel_landing_link(
    hotel_landing_get_field('hotel_hero_button', hotel_landing_default('hotel_hero_button')),
    hotel_landing_default('hotel_hero_button')['title'],
    hotel_landing_default('hotel_hero_button')['url']
);
$hero_rating = hotel_landing_get_field('hotel_hero_rating', hotel_landing_default('hotel_hero_rating'));
$hero_since = hotel_landing_get_field('hotel_hero_since_label', hotel_landing_default('hotel_hero_since_label'));
$hero_story = hotel_landing_link(
    hotel_landing_get_field('hotel_hero_story_button', hotel_landing_default('hotel_hero_story_button')),
    hotel_landing_default('hotel_hero_story_button')['title'],
    hotel_landing_default('hotel_hero_story_button')['url']
);
$hero_bookings = hotel_landing_get_field('hotel_hero_booking_stat', hotel_landing_default('hotel_hero_booking_stat'));
$hero_reviews = hotel_landing_get_field('hotel_hero_review_stat', hotel_landing_default('hotel_hero_review_stat'));

$hero_background_url = hotel_landing_image_url($hero_background);
$hero_style = $hero_background_url
    ? sprintf(' style="background-image: linear-gradient(180deg, rgba(15, 13, 12, 0.46) 0%%, rgba(15, 13, 12, 0.48) 45%%, rgba(15, 13, 12, 0.78) 100%%), url(%s);"', esc_url($hero_background_url))
    : '';
?>

<section class="hotel-hero" id="top"<?php echo $hero_style; ?>>


    <div class="hotel-container hotel-hero__inner">
        <div class="hotel-hero__content">
            <?php if ($hero_rating) : ?>
                <div class="hotel-hero__stars" aria-label="<?php echo esc_attr($hero_rating); ?>">
                    <span aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                </div>
            <?php endif; ?>

            <?php if ($hero_title) : ?>
                <h1 class="hotel-hero__title"><?php echo nl2br(esc_html($hero_title)); ?></h1>
            <?php endif; ?>

            <?php if ($hero_subtitle) : ?>
                <p class="hotel-hero__subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            <?php endif; ?>

            <!-- <?php if ($hero_description) : ?>
                <p class="hotel-hero__description"><?php echo esc_html($hero_description); ?></p>
            <?php endif; ?> -->

            <?php if (!empty($hero_button['title'])) : ?>
                <a class="hotel-hero__explore" href="<?php echo esc_url($hero_button['url']); ?>"<?php echo $hero_button['target'] ? ' target="' . esc_attr($hero_button['target']) . '"' : ''; ?>>
                    <?php echo esc_html($hero_button['title']); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 18 12" fill="none"><path d="M-2.18557e-07 6L15.6008 6.00004M11.0001 1L16 6.00004L11 11" stroke="white" stroke-width="1.5"></path></svg>
                </a>
            <?php endif; ?>
        </div>
    </div>



    <div class="hotel-hero__scroll" aria-hidden="true">
        <span>Scroll</span>
    </div>

    <div class="hotel-hero__meta">
        <div class="hotel-container hotel-hero__meta-inner">
            <?php if ($hero_since) : ?>
                <div class="hotel-hero__since">
                    <?php echo esc_html($hero_since); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($hero_story['title'])) : ?>
                <a class="hotel-hero__story" href="<?php echo esc_url($hero_story['url']); ?>"<?php echo $hero_story['target'] ? ' target="' . esc_attr($hero_story['target']) . '"' : ''; ?>>
                    <?php echo esc_html($hero_story['title']); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 18 12" fill="none"><path d="M-2.18557e-07 6L15.6008 6.00004M11.0001 1L16 6.00004L11 11" stroke="white" stroke-width="1.5"></path></svg>
                </a>
            <?php endif; ?>

            <div class="hotel-hero__stats">
                <?php if ($hero_bookings) : ?>
                    <span><?php echo esc_html($hero_bookings); ?></span>
                <?php endif; ?>
                <?php if ($hero_reviews) : ?>
                    <span><?php echo esc_html($hero_reviews); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
