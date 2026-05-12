<?php
$video_background = hotel_landing_get_field('hotel_video_background');
$video_eyebrow = hotel_landing_get_field('hotel_video_eyebrow', hotel_landing_default('hotel_video_eyebrow'));
$video_title = hotel_landing_get_field('hotel_video_title', hotel_landing_default('hotel_video_title'));
$video_link = hotel_landing_link(
    hotel_landing_get_field('hotel_video_link', hotel_landing_default('hotel_video_link')),
    hotel_landing_default('hotel_video_link')['title'],
    hotel_landing_default('hotel_video_link')['url']
);

$video_background_url = hotel_landing_image_url($video_background);

if (!$video_background_url) {
    $hero_background = hotel_landing_get_field('hotel_hero_background');
    $video_background_url = hotel_landing_image_url($hero_background);
}

if (!$video_background_url) {
    $rooms = hotel_landing_get_field('hotel_rooms', hotel_landing_default('hotel_rooms'));
    if (!empty($rooms) && is_array($rooms)) {
        foreach ($rooms as $room) {
            if (!empty($room['image'])) {
                $video_background_url = hotel_landing_image_url($room['image']);
                if ($video_background_url) {
                    break;
                }
            }
        }
    }
}

$video_style = $video_background_url
    ? sprintf(' style="background-image: linear-gradient(180deg, rgba(16, 13, 10, 0.62) 0%%, rgba(16, 13, 10, 0.62) 100%%), url(%s);"', esc_url($video_background_url))
    : '';
?>

<section class="hotel-video" id="hotel-video"<?php echo $video_style; ?>>
    <div class="hotel-container hotel-video__inner">
        <?php if ($video_eyebrow) : ?>
            <p class="hotel-video__eyebrow"><?php echo esc_html($video_eyebrow); ?></p>
        <?php endif; ?>

        <?php if ($video_title) : ?>
            <h2><?php echo esc_html($video_title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($video_link['url'])) : ?>
            <a class="hotel-video__play js-hotel-video-play" href="<?php echo esc_url($video_link['url']); ?>" data-video-url="<?php echo esc_url($video_link['url']); ?>"<?php echo $video_link['target'] ? ' target="' . esc_attr($video_link['target']) . '"' : ''; ?> aria-label="<?php echo esc_attr($video_link['title']); ?>" aria-haspopup="dialog" aria-controls="hotel-video-modal">
                <i class="fa-solid fa-play" aria-hidden="true"></i>
            </a>
        <?php endif; ?>
    </div>

    <?php if (!empty($video_link['url'])) : ?>
        <div class="hotel-video-modal" id="hotel-video-modal" aria-hidden="true">
            <div class="hotel-video-modal__dialog" role="dialog" aria-modal="true" aria-label="<?php echo esc_attr($video_link['title']); ?>">
                <button class="hotel-video-modal__close" type="button" aria-label="Close video">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
                <div class="hotel-video-modal__player">
                    <div class="hotel-video-modal__frame" data-video-frame></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
