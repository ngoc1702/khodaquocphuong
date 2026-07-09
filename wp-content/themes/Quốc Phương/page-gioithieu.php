<?php
/**
 * Template Name: Trang giới thiệu ACF
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('genesis_site_layout', function () {
    return 'full-width-content';
});

add_filter('body_class', function ($classes) {
    $classes[] = 'qp-about-template';
    return $classes;
});

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_after_header', 'qp_render_about_page');

function qp_get_acf_image_url($image, $size = 'full') {
    if (!$image) {
        return '';
    }

    if (is_array($image)) {
        return $image['sizes'][$size] ?? $image['url'] ?? '';
    }

    if (is_numeric($image)) {
        return wp_get_attachment_image_url((int) $image, $size);
    }

    return $image;
}

function qp_render_about_page() {
    $banner_enable = function_exists('get_field') ? get_field('about_banner_enable') : false;
    $banner = $banner_enable ? get_field('about_banner') : [];

    $intro_enable = function_exists('get_field') ? get_field('about_intro_enable') : false;
    $intro = $intro_enable ? get_field('about_intro') : [];

    $granite_enable = function_exists('get_field') ? get_field('about_granite_enable') : false;
$granite = $granite_enable ? get_field('about_granite') : [];
$commit_icon = qp_get_acf_image_url($granite['commit_icon'] ?? '', 'thumbnail');
$commit_title = $granite['commit_title'] ?? '';
$commit_desc = $granite['commit_desc'] ?? '';

$marble_enable = function_exists('get_field') ? get_field('about_marble_enable') : false;
$marble = $marble_enable ? get_field('about_marble') : [];

$picture_enable = get_field('about_stone_picture_enable');
$picture = $picture_enable ? get_field('about_stone_picture') : [];

    ?>
    <main class="qp-about-page">

        <?php if (!empty($banner) && is_array($banner)) :
            $bg = qp_get_acf_image_url($banner['background'] ?? '', 'full');
            $stats = $banner['stats'] ?? [];
            ?>
            <section class="qp-about-hero" style="<?php echo $bg ? 'background-image:url(' . esc_url($bg) . ');' : ''; ?>">
                <div class="qp-about-hero__shade"></div>

                <div class="qp-about-container qp-about-hero__inner">
                    <div class="qp-about-hero__content">
                        <?php if (!empty($banner['label'])) : ?>
                            <div class="qp-about-hero__label"><?php echo esc_html($banner['label']); ?></div>
                        <?php endif; ?>

                        <?php if (!empty($banner['title'])) : ?>
                            <h1><?php echo esc_html($banner['title']); ?></h1>
                        <?php endif; ?>

                        <?php if (!empty($banner['subtitle'])) : ?>
                            <h2><?php echo esc_html($banner['subtitle']); ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($banner['description'])) : ?>
                            <div class="qp-about-hero__desc">
                                <?php echo wp_kses_post(wpautop($banner['description'])); ?>
                            </div>
                        <?php endif; ?>

                        <div class="qp-about-hero__buttons">
                            <?php if (!empty($banner['button_1_text'])) : ?>
                                <a class="qp-about-btn qp-about-btn--red" href="<?php echo esc_url($banner['button_1_link'] ?: '#'); ?>">
                                    <?php echo esc_html($banner['button_1_text']); ?>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($banner['button_2_text'])) : ?>
                                <a class="qp-about-btn qp-about-btn--outline" href="<?php echo esc_url($banner['button_2_link'] ?: '#'); ?>">
                                    <?php echo esc_html($banner['button_2_text']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (!empty($stats) && is_array($stats)) : ?>
                        <div class="qp-about-stats">
                            <?php foreach ($stats as $stat) :
                                $icon_url = qp_get_acf_image_url($stat['icon'] ?? '', 'thumbnail');
                                ?>
                                <div class="qp-about-stat">
                                    <?php if ($icon_url) : ?>
                                        <img src="<?php echo esc_url($icon_url); ?>" alt="">
                                    <?php endif; ?>

                                    <?php if (!empty($stat['number'])) : ?>
                                        <strong><?php echo esc_html($stat['number']); ?></strong>
                                    <?php endif; ?>

                                    <?php if (!empty($stat['text'])) : ?>
                                        <span><?php echo esc_html($stat['text']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>


        <?php if (!empty($intro) && is_array($intro)) :
            $intro_img = qp_get_acf_image_url($intro['image'] ?? '', 'full');
            ?>
            <section class="qp-about-intro">
                <div class="qp-about-container qp-about-intro__inner">
                    <?php if ($intro_img) : ?>
                        <div class="qp-about-intro__image">
                            <img src="<?php echo esc_url($intro_img); ?>" alt="<?php echo esc_attr($intro['title'] ?? ''); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="qp-about-intro__content">
                        <?php if (!empty($intro['title'])) : ?>
                            <h2><?php echo esc_html($intro['title']); ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($intro['subtitle'])) : ?>
                            <div class="qp-about-intro__subtitle">
                                <?php echo esc_html($intro['subtitle']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($intro['description'])) : ?>
                            <div class="qp-about-intro__desc">
                                <?php echo wp_kses_post(wpautop($intro['description'])); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>



        <?php if (!empty($granite) && is_array($granite)) :
    $granite_img = qp_get_acf_image_url($granite['image'] ?? '', 'full');
    $features = $granite['features'] ?? [];
    $colors = $granite['colors'] ?? [];
    $specs = $granite['specs'] ?? [];
    ?>
    <section class="qp-granite-section">
        <div class="qp-about-container qp-granite-inner">

            <div class="qp-granite-top">
                <div class="qp-granite-content">
                    <?php if (!empty($granite['label'])) : ?>
                        <div class="qp-granite-label"><?php echo esc_html($granite['label']); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($granite['title'])) : ?>
                        <h2><?php echo wp_kses_post($granite['title']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($granite['description'])) : ?>
                        <div class="qp-granite-desc">
                            <?php echo wp_kses_post(wpautop($granite['description'])); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($features)) : ?>
                        <div class="qp-granite-features">
                            <?php foreach ($features as $feature) :
                                $icon = qp_get_acf_image_url($feature['icon'] ?? '', 'thumbnail');
                                ?>
                                <div class="qp-granite-feature">
                                    <?php if ($icon) : ?>
                                        <img src="<?php echo esc_url($icon); ?>" alt="">
                                    <?php endif; ?>

                                    <?php if (!empty($feature['title'])) : ?>
                                        <strong><?php echo esc_html($feature['title']); ?></strong>
                                    <?php endif; ?>

                                    <?php if (!empty($feature['text'])) : ?>
                                        <span><?php echo esc_html($feature['text']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($granite_img) : ?>
                    <div class="qp-granite-image">
                        <span></span>
                        <img src="<?php echo esc_url($granite_img); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($granite['title'] ?? '')); ?>">
                    </div>
                <?php endif; ?>
            </div>

            <div class="qp-granite-colors-head">
                <?php if (!empty($granite['colors_title'])) : ?>
                    <h3><?php echo esc_html($granite['colors_title']); ?></h3>
                <?php endif; ?>

                <?php if (!empty($granite['colors_desc'])) : ?>
                    <p><?php echo esc_html($granite['colors_desc']); ?></p>
                <?php endif; ?>
            </div>

            <?php if (!empty($colors)) : ?>
                <div class="qp-granite-colors">
                    <?php foreach ($colors as $color) :
                        $color_img = qp_get_acf_image_url($color['image'] ?? '', 'medium');
                        ?>
                        <div class="qp-granite-color-card">
                            <?php if ($color_img) : ?>
                                <img src="<?php echo esc_url($color_img); ?>" alt="">
                            <?php endif; ?>

                            <div>
                                <?php if (!empty($color['name'])) : ?>
                                    <strong><?php echo esc_html($color['name']); ?></strong>
                                <?php endif; ?>

                                <?php if (!empty($color['origin'])) : ?>
                                    <span><?php echo esc_html($color['origin']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($specs)) : ?>
                <div class="qp-granite-specs">
                    <div class="qp-granite-commit">
                        <?php if ($commit_icon) : ?>
                            <div class="qp-granite-badge">
                                <img src="<?php echo esc_url($commit_icon); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <div class="qp-granite-commit-body">
                            <?php if ($commit_title) : ?>
                                <strong><?php echo esc_html($commit_title); ?></strong>
                            <?php endif; ?>

                            <?php if ($commit_desc) : ?>
                                <span><?php echo esc_html($commit_desc); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="qp-granite-spec-list">
                        <?php foreach ($specs as $spec) : ?>
                            <div class="qp-granite-spec">
                                <?php if (!empty($spec['label'])) : ?>
                                    <span><?php echo esc_html($spec['label']); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($spec['value'])) : ?>
                                    <strong><?php echo esc_html($spec['value']); ?></strong>
                                <?php endif; ?>

                                <?php if (!empty($spec['note'])) : ?>
                                    <em><?php echo esc_html($spec['note']); ?></em>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>



<?php if (!empty($marble) && is_array($marble)) :
    $marble_img = qp_get_acf_image_url($marble['image'] ?? '', 'full');
    $features = $marble['features'] ?? [];
    $samples = $marble['samples'] ?? [];
    ?>
    <section class="qp-marble-section" <?php if ($marble_img) : ?>
    style="background-image:url('<?php echo esc_url($marble_img); ?>');"
<?php endif; ?>>
        <div class="qp-about-container qp-marble-inner">

            <div class="qp-marble-grid">
                <div class="qp-marble-content">
                    <?php if (!empty($marble['label'])) : ?>
                        <div class="qp-marble-label"><?php echo esc_html($marble['label']); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($marble['title'])) : ?>
                        <h2><?php echo wp_kses_post($marble['title']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($marble['description'])) : ?>
                        <div class="qp-marble-desc">
                            <?php echo wp_kses_post(wpautop($marble['description'])); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($features)) : ?>
                        <div class="qp-marble-features">
                            <?php foreach ($features as $feature) :
                                $icon = qp_get_acf_image_url($feature['icon'] ?? '', 'thumbnail');
                                ?>
                                <div class="qp-marble-feature">
                                    <?php if ($icon) : ?>
                                        <img src="<?php echo esc_url($icon); ?>" alt="">
                                    <?php endif; ?>

                                    <?php if (!empty($feature['title'])) : ?>
                                        <strong><?php echo esc_html($feature['title']); ?></strong>
                                    <?php endif; ?>

                                    <?php if (!empty($feature['text'])) : ?>
                                        <span><?php echo esc_html($feature['text']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

               
            </div>

            <?php if (!empty($samples)) : ?>
                <div class="qp-marble-samples">
                    <?php foreach ($samples as $sample) :
                        $sample_img = qp_get_acf_image_url($sample['image'] ?? '', 'medium');
                        if (!$sample_img) {
                            continue;
                        }
                        ?>
                        <div class="qp-marble-sample">
                            <img src="<?php echo esc_url($sample_img); ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>



<?php
if(!empty($picture)):

$bg = qp_get_acf_image_url($picture['background']);

?>

<section class="qp-picture-section"

<?php if($bg):?>

style="background-image:url('<?php echo esc_url($bg);?>')"

<?php endif;?>

>

<div class="qp-about-container">

<div class="qp-picture-content">

<?php if($picture['title_small']):?>

<div class="qp-picture-small">

<?php echo esc_html($picture['title_small']);?>

</div>

<?php endif;?>


<?php if($picture['title']):?>

<h2>

<?php echo wp_kses_post($picture['title']);?>

</h2>

<?php endif;?>


<?php if($picture['description']):?>

<div class="qp-picture-desc">

<?php echo wpautop($picture['description']);?>

</div>

<?php endif;?>

</div>

</div>

</section>

<?php endif;?>

    </main>
    <?php
}

if (function_exists('genesis')) {
    genesis();
}
