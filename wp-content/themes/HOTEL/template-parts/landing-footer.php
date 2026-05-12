<?php
$footer_logo = hotel_landing_get_field('hotel_footer_logo');
$footer_logo_url = hotel_landing_image_url($footer_logo);
$brand_name = hotel_landing_get_field('hotel_brand_name', hotel_landing_default('hotel_brand_name'));
$brand_subtitle = hotel_landing_get_field('hotel_brand_subtitle', hotel_landing_default('hotel_brand_subtitle'));
$footer_title = hotel_landing_get_field('hotel_footer_title', hotel_landing_default('hotel_footer_title'));
$contacts = hotel_landing_get_field('hotel_footer_contacts', hotel_landing_default('hotel_footer_contacts'));
$socials = hotel_landing_get_field('hotel_footer_socials', hotel_landing_default('hotel_footer_socials'));
$footer_map_title = hotel_landing_get_field('hotel_footer_map_title', hotel_landing_default('hotel_footer_map_title'));
$footer_map_embed = hotel_landing_get_field('hotel_footer_map_embed', hotel_landing_default('hotel_footer_map_embed'));
$footer_map_image = hotel_landing_get_field('hotel_footer_map_image');
$footer_map_image_url = hotel_landing_image_url($footer_map_image);
$footer_map_caption = hotel_landing_get_field('hotel_footer_map_caption', hotel_landing_default('hotel_footer_map_caption'));
$footer_map_link = hotel_landing_get_field('hotel_footer_map_link', hotel_landing_default('hotel_footer_map_link'));
$copyright = hotel_landing_get_field('hotel_copyright', hotel_landing_default('hotel_copyright'));
$policy_links = hotel_landing_get_field('hotel_policy_links', hotel_landing_default('hotel_policy_links'));

$social_fallback_labels = array('Facebook', 'Instagram', 'YouTube', 'Tik Tok', 'Booking', 'Agoda', 'Traveloka', 'TripAdvisor');
$social_icon_labels = array(
    'facebook' => 'Facebook',
    'instagram' => 'Instagram',
    'youtube' => 'YouTube',
    'tiktok' => 'Tik Tok',
    'booking' => 'Booking',
    'agoda' => 'Agoda',
    'traveloka' => 'Traveloka',
    'tripadvisor' => 'TripAdvisor',
);

if ($footer_map_embed && preg_match('/src=["\']([^"\']+)["\']/', $footer_map_embed, $footer_map_match)) {
    $footer_map_embed = $footer_map_match[1];
}
?>

<footer class="hotel-footer" id="lien-he">
    <div class="hotel-container">
        <div class="hotel-footer__grid">
            <div class="hotel-footer__brand">
                <a class="hotel-brand hotel-brand--footer" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ($footer_logo_url) : ?>
                        <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($footer_logo, $brand_name)); ?>">
                    <?php else : ?>
                        <span class="hotel-brand__name"><?php echo esc_html($brand_name); ?></span>
                        <span class="hotel-brand__subtitle"><?php echo esc_html($brand_subtitle); ?></span>
                    <?php endif; ?>
                </a>

                <?php if ($footer_title) : ?>
                    <h3 class="hotel-footer__brand-title"><?php echo esc_html($footer_title); ?></h3>
                <?php endif; ?>

                <?php if (!empty($contacts) && is_array($contacts)) : ?>
                    <ul class="hotel-footer__list">
                        <?php foreach ($contacts as $contact) :
                            $icon_class = !empty($contact['icon_class']) ? hotel_landing_class_list($contact['icon_class']) : '';
                            $text = !empty($contact['text']) ? $contact['text'] : '';
                            $url = !empty($contact['url']) ? $contact['url'] : '';
                            $is_map_link = strpos($icon_class, 'map-location') !== false;

                            if (!$text || $is_map_link) {
                                continue;
                            }
                            ?>
                            <li>
                                <?php if ($icon_class) : ?>
                                    <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                                <?php endif; ?>
                                <?php if ($url) : ?>
                                    <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($text); ?></a>
                                <?php else : ?>
                                    <span><?php echo esc_html($text); ?></span>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="hotel-footer__column">
                <h3>Liên kết social</h3>
                <?php if (!empty($socials) && is_array($socials)) : ?>
                    <ul class="hotel-footer__links hotel-footer__social-list">
                        <?php foreach ($socials as $index => $social) :
                            $icon_class = !empty($social['icon_class']) ? hotel_landing_class_list($social['icon_class']) : '';
                            $label = !empty($social['label']) ? $social['label'] : '';
                            $url = !empty($social['url']) ? $social['url'] : '#';

                            if (!$label) {
                                foreach ($social_icon_labels as $icon_key => $icon_label) {
                                    if ($icon_class && strpos($icon_class, $icon_key) !== false) {
                                        $label = $icon_label;
                                        break;
                                    }
                                }
                            }

                            if (!$label && isset($social_fallback_labels[$index])) {
                                $label = $social_fallback_labels[$index];
                            }

                            if (!$label) {
                                continue;
                            }
                            ?>
                            <li>
                                <a href="<?php echo esc_url($url); ?>">
                                    <?php if ($icon_class) : ?>
                                        <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                                    <?php endif; ?>
                                    <span><?php echo esc_html($label); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="hotel-footer__column hotel-footer__map">
                <?php if ($footer_map_title) : ?>
                    <h3><?php echo esc_html($footer_map_title); ?></h3>
                <?php endif; ?>

                <?php if ($footer_map_embed) : ?>
                    <div class="hotel-footer__map-frame">
                        <iframe
                            src="<?php echo esc_url($footer_map_embed); ?>"
                            title="<?php echo esc_attr($footer_map_title ? $footer_map_title : $brand_name); ?>"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen></iframe>
                    </div>
                <?php elseif ($footer_map_image_url) : ?>
                    <?php if ($footer_map_link) : ?>
                        <a class="hotel-footer__map-frame hotel-footer__map-link" href="<?php echo esc_url($footer_map_link); ?>" target="_blank" rel="noopener">
                    <?php else : ?>
                        <div class="hotel-footer__map-frame">
                    <?php endif; ?>
                        <img src="<?php echo esc_url($footer_map_image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($footer_map_image, $footer_map_title)); ?>">
                    <?php if ($footer_map_link) : ?>
                        </a>
                    <?php else : ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($footer_map_caption) : ?>
                    <p><?php echo esc_html($footer_map_caption); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="hotel-footer__bottom">
            <?php if ($copyright) : ?>
                <p><?php echo esc_html($copyright); ?></p>
            <?php endif; ?>
            <?php if (!empty($policy_links) && is_array($policy_links)) : ?>
                <div class="hotel-footer__policies">
                    <?php foreach ($policy_links as $link) :
                        $label = !empty($link['label']) ? $link['label'] : '';
                        $url = !empty($link['url']) ? $link['url'] : '#';

                        if (!$label) {
                            continue;
                        }
                        ?>
                        <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>
