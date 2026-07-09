<?php
/**
 * Template Name: Trang liên hệ ACF
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('genesis_site_layout', function () {
    return 'full-width-content';
});

add_filter('body_class', function ($classes) {
    $classes[] = 'qp-contact-template';

    return $classes;
});

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_after_header', 'qp_render_contact_page');

function qp_contact_field($name, $default = '', $format_value = true)
{
    if (function_exists('get_field')) {
        $value = get_field($name, false, $format_value);

        if ($value !== null && $value !== '' && $value !== false) {
            return $value;
        }
    }

    return $default;
}

function qp_contact_image_url($image, $size = 'full')
{
    if (function_exists('quoc_phuong_home_image_url')) {
        return quoc_phuong_home_image_url($image, $size);
    }

    if (is_array($image) && !empty($image['sizes'][$size])) {
        return $image['sizes'][$size];
    }

    if (is_array($image) && !empty($image['url'])) {
        return $image['url'];
    }

    if (is_numeric($image)) {
        return wp_get_attachment_image_url((int) $image, $size);
    }

    return is_string($image) ? $image : '';
}

function qp_contact_allowed_map_tags()
{
    return array(
        'iframe' => array(
            'src' => true,
            'width' => true,
            'height' => true,
            'style' => true,
            'frameborder' => true,
            'allowfullscreen' => true,
            'allow' => true,
            'loading' => true,
            'referrerpolicy' => true,
            'title' => true,
        ),
    );
}

function qp_render_contact_item($icon_class, $title, $content, $url = '')
{
    if (!$content) {
        return;
    }
    ?>
    <div class="qp-contact-item">
        <div class="qp-contact-icon">
            <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
        </div>
        <div>
            <strong><?php echo esc_html($title); ?></strong>
            <?php if ($url) : ?>
                <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($content); ?></a>
            <?php else : ?>
                <p><?php echo nl2br(esc_html($content)); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

function qp_render_contact_page()
{
    $company_name = qp_contact_field('contact_company_name', get_the_title());
    $address = qp_contact_field('contact_address', '', false);
    $phone_fax = qp_contact_field('contact_phone_fax');
    $hotline = qp_contact_field('contact_hotline');
    $email = qp_contact_field('contact_email');
    $social_label = qp_contact_field('contact_social_label', 'Kết nối với chúng tôi:');
    $facebook_url = qp_contact_field('contact_facebook_url');
    $linkedin_url = qp_contact_field('contact_linkedin_url');
    $youtube_url = qp_contact_field('contact_youtube_url');
    $map_iframe = qp_contact_field('contact_map_iframe');
    $map_height = absint(qp_contact_field('contact_map_height', 420));
    $consult_enable_raw = function_exists('get_field') ? get_field('contact_consult_enable') : null;

    if ($consult_enable_raw === null || ($consult_enable_raw === false && !metadata_exists('post', get_the_ID(), 'contact_consult_enable'))) {
        $consult_enable_raw = 1;
    }

    $consult_enable = (bool) $consult_enable_raw;
    $consult_eyebrow = qp_contact_field('contact_consult_eyebrow', 'ĐĂNG KÝ');
    $consult_title = qp_contact_field('contact_consult_title', 'ĐĂNG KÝ NHẬN TƯ VẤN');
    $consult_shortcode = qp_contact_field('contact_consult_shortcode');
    $consult_bg = qp_contact_field('contact_consult_background');
    $consult_bg_url = qp_contact_image_url($consult_bg);
    ?>
    <main class="qp-contact-page">
        <section class="qp-contact-main">
            <div class="qp-contact-wrap <?php echo $map_iframe ? '' : 'is-single'; ?>">
                <div class="qp-contact-info">
                    <?php if ($company_name) : ?>
                        <h1><?php echo esc_html($company_name); ?></h1>
                    <?php endif; ?>

                    <div class="qp-contact-list">
                        <?php
                        qp_render_contact_item('fa-solid fa-location-dot', 'Địa chỉ:', $address);
                        qp_render_contact_item('fa-solid fa-fax', 'Điện thoại/ Fax:', $phone_fax, $phone_fax ? 'tel:' . preg_replace('/[^0-9+]/', '', $phone_fax) : '');
                        qp_render_contact_item('fa-solid fa-phone', 'Hotline:', $hotline, $hotline ? 'tel:' . preg_replace('/[^0-9+]/', '', $hotline) : '');
                        qp_render_contact_item('fa-solid fa-envelope', 'Email:', $email, $email ? 'mailto:' . $email : '');
                        ?>
                    </div>

                    <?php if ($facebook_url || $linkedin_url || $youtube_url) : ?>
                        <div class="qp-contact-social">
                            <span><?php echo esc_html($social_label); ?></span>

                            <?php if ($facebook_url) : ?>
                                <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                                    <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ($linkedin_url) : ?>
                                <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ($youtube_url) : ?>
                                <a href="<?php echo esc_url($youtube_url); ?>" target="_blank" rel="noopener" aria-label="Youtube">
                                    <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($map_iframe) : ?>
                    <div class="qp-contact-map" style="--qp-contact-map-height: <?php echo esc_attr($map_height ?: 420); ?>px;">
                        <?php echo wp_kses($map_iframe, qp_contact_allowed_map_tags()); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <?php if ($consult_enable) : ?>
            <section class="home-consult-form-section qp-contact-consult" <?php if ($consult_bg_url) : ?>
                style="background-image: url('<?php echo esc_url($consult_bg_url); ?>');"
            <?php endif; ?>>
                <div class="home-consult-form-overlay">
                    <div class="home-consult-form-box">
                        <?php if ($consult_eyebrow) : ?>
                            <div class="home-consult-form-eyebrow"><?php echo esc_html($consult_eyebrow); ?></div>
                        <?php endif; ?>

                        <?php if ($consult_title) : ?>
                            <h2><?php echo esc_html($consult_title); ?></h2>
                        <?php endif; ?>

                        <div class="home-consult-form-line"></div>

                        <?php if ($consult_shortcode) : ?>
                            <div class="home-consult-form-content">
                                <?php echo do_shortcode($consult_shortcode); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>
    <?php
}

genesis();
