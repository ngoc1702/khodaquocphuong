<?php
/**
 * Template Name: Trang chủ ACF
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('genesis_site_layout', function () {
    return 'full-width-content';
});

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_after_header', 'quoc_phuong_render_home_acf');

if (!function_exists('quoc_phuong_render_home_acf')) {
    function quoc_phuong_render_home_acf()
    {
        ?>
        <main class="home-acf-main">
            <?php if (quoc_phuong_home_field('home_banner_enable')): ?>
                <?php
                $banner_image = quoc_phuong_home_field('home_banner_image');
                $banner_image_url = $banner_image ? quoc_phuong_home_image_url($banner_image) : '';
                $banner_stats = quoc_phuong_home_items('home_banner_stats');
                ?>

                <section class="home-banner-section" <?php if ($banner_image_url): ?>
                    style="background-image: url('<?php echo esc_url($banner_image_url); ?>');"
                <?php endif; ?>>
                    <div class="home-banner-overlay">
                        <div class="home-banner-inner">
                            <div class="home-banner-content">
                                <?php if (quoc_phuong_home_field('home_banner_eyebrow')): ?>
                                    <div class="home-banner-eyebrow">
                                        <?php echo esc_html(quoc_phuong_home_field('home_banner_eyebrow')); ?>
                                    </div>
                                <?php endif; ?>

                                <h1>
                                    <?php if (quoc_phuong_home_field('home_banner_title_highlight')): ?>
                                        <span><?php echo esc_html(quoc_phuong_home_field('home_banner_title_highlight')); ?></span>
                                    <?php endif; ?>
                                </h1>

                                <h3>
                                      <?php if (quoc_phuong_home_field('home_banner_title')): ?>
                                        <?php echo esc_html(quoc_phuong_home_field('home_banner_title')); ?>
                                    <?php endif; ?>
                                </h3>

                                <?php if (quoc_phuong_home_field('home_banner_description')): ?>
                                    <div class="home-banner-description">
                                        <?php echo wp_kses_post(wpautop(quoc_phuong_home_field('home_banner_description'))); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="home-banner-actions">
                                    <?php if (quoc_phuong_home_field('home_banner_primary_text')): ?>
                                        <a class="home-btn home-btn--primary"
                                            href="<?php echo esc_url(quoc_phuong_home_field('home_banner_primary_url') ?: '#'); ?>">
                                            <?php echo esc_html(quoc_phuong_home_field('home_banner_primary_text')); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (quoc_phuong_home_field('home_banner_secondary_text')): ?>
                                        <a class="home-btn home-btn--outline"
                                            href="<?php echo esc_url(quoc_phuong_home_field('home_banner_secondary_url') ?: '#'); ?>">
                                            <?php echo esc_html(quoc_phuong_home_field('home_banner_secondary_text')); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (!empty($banner_stats)): ?>
                                <div class="home-banner-stats">
                                    <?php foreach ($banner_stats as $stat): ?>
                                        <?php
                                        $icon_image = !empty($stat['icon_image']) ? quoc_phuong_home_image_url($stat['icon_image'], 'thumbnail') : '';
                                        $icon_class = !empty($stat['icon_class']) ? $stat['icon_class'] : 'fa-solid fa-gem';

                                        if (empty($stat['value']) && empty($stat['label']) && empty($stat['description'])) {
                                            continue;
                                        }
                                        ?>

                                        <div class="home-banner-stat">
                                            <div class="home-banner-stat-icon">
                                                <?php if ($icon_image): ?>
                                                    <img src="<?php echo esc_url($icon_image); ?>" alt="<?php echo esc_attr($stat['label'] ?? ''); ?>">
                                                <?php else: ?>
                                                    <i class="<?php echo esc_attr($icon_class); ?>"></i>
                                                <?php endif; ?>
                                            </div>

                                            <div>
                                                <?php if (!empty($stat['value'])): ?>
                                                    <strong><?php echo esc_html($stat['value']); ?></strong>
                                                <?php endif; ?>

                                                <?php if (!empty($stat['label'])): ?>
                                                    <span><?php echo esc_html($stat['label']); ?></span>
                                                <?php endif; ?>

                                                <?php if (!empty($stat['description'])): ?>
                                                    <small><?php echo esc_html($stat['description']); ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <!-- Giới thiệu -->
                 <?php if (quoc_phuong_home_field('home_intro_enable')): ?>
    <?php
    $intro_image = quoc_phuong_home_field('home_intro_image');
    $intro_image_url = $intro_image ? quoc_phuong_home_image_url($intro_image) : '';
    $intro_features = quoc_phuong_home_items('home_intro_features');
    $intro_bottom_image = quoc_phuong_home_field('home_intro_bottom_image');
     $intro_bottom_image_url = $intro_bottom_image ? quoc_phuong_home_image_url($intro_bottom_image) : '';
    ?>

    <section class="home-intro-section" <?php if ($intro_image_url): ?>
        style="background-image: url('<?php echo esc_url($intro_image_url); ?>');"
    <?php endif; ?>>
        <div class="home-intro-overlay">
            <div class="home-intro-inner">
                <div class="home-intro-content">
                    <?php if (quoc_phuong_home_field('home_intro_eyebrow')): ?>
                        <div class="home-intro-eyebrow">
                            <?php echo esc_html(quoc_phuong_home_field('home_intro_eyebrow')); ?>
                        </div>
                    <?php endif; ?>

                    <h2>
                        <?php if (quoc_phuong_home_field('home_intro_title')): ?>
                            <span><?php echo esc_html(quoc_phuong_home_field('home_intro_title')); ?></span>
                        <?php endif; ?>

                        <?php if (quoc_phuong_home_field('home_intro_title_red')): ?>
                            <em><?php echo esc_html(quoc_phuong_home_field('home_intro_title_red')); ?></em>
                        <?php endif; ?>
                    </h2>

                    <?php if (quoc_phuong_home_field('home_intro_description')): ?>
                        <div class="home-intro-description">
                            <?php echo wp_kses_post(wpautop(quoc_phuong_home_field('home_intro_description'))); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($intro_features)): ?>
                <div class="home-intro-features-wrap">
                    <div class="home-intro-features">
                        <?php foreach ($intro_features as $feature): ?>
                            <?php
                            $icon_image = !empty($feature['icon_image']) ? quoc_phuong_home_image_url($feature['icon_image'], 'thumbnail') : '';
                            $icon_class = !empty($feature['icon_class']) ? $feature['icon_class'] : 'fa-solid fa-gem';

                            if (empty($feature['title']) && empty($feature['description'])) {
                                continue;
                            }
                            ?>

                            <div class="home-intro-feature">
                                <div class="home-intro-feature-icon">
                                    <?php if ($icon_image): ?>
                                        <img src="<?php echo esc_url($icon_image); ?>" alt="<?php echo esc_attr($feature['title'] ?? ''); ?>">
                                    <?php else: ?>
                                        <i class="<?php echo esc_attr($icon_class); ?>"></i>
                                    <?php endif; ?>
                                </div>

                                <div>
                                    <?php if (!empty($feature['title'])): ?>
                                        <strong><?php echo esc_html($feature['title']); ?></strong>
                                    <?php endif; ?>

                                  <div class="home-intro-feature-desc">
    <?php echo wpautop(esc_html($feature['description'])); ?>
</div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </section>
            <?php if ($intro_bottom_image_url): ?>
    <div class="home-intro-bottom-image">
        <img src="<?php echo esc_url($intro_bottom_image_url); ?>" alt="">
    </div>
<?php endif; ?>


<!-- Sản phẩm nổi bật -->
 <?php if (quoc_phuong_home_field('home_featured_products_enable')): ?>
    <?php
    $featured_bg = quoc_phuong_home_field('home_featured_products_background_image');
    $featured_bg_url = $featured_bg ? quoc_phuong_home_image_url($featured_bg) : '';
    $featured_products = quoc_phuong_home_field('home_featured_products');
    ?>

    <section class="home-featured-products-section" <?php if ($featured_bg_url): ?>
        style="background-image: url('<?php echo esc_url($featured_bg_url); ?>');"
    <?php endif; ?>>
        <div class="home-featured-products-inner">
            <div class="home-section-heading">
                <?php if (quoc_phuong_home_field('home_featured_products_eyebrow')): ?>
                    <div class="home-section-eyebrow">
                        <?php echo esc_html(quoc_phuong_home_field('home_featured_products_eyebrow')); ?>
                    </div>
                <?php endif; ?>

                <h2>
                    <?php echo esc_html(quoc_phuong_home_field('home_featured_products_title')); ?>
                    <span><?php echo esc_html(quoc_phuong_home_field('home_featured_products_title_red')); ?></span>
                </h2>
            </div>

            <?php if (!empty($featured_products)): ?>
                <div class="home-featured-products-grid">
                    <?php foreach ($featured_products as $product_post): ?>
                        <?php
                        $product_id = is_object($product_post) ? $product_post->ID : (int) $product_post;
                        $product_title = get_the_title($product_id);
                        $product_link = get_permalink($product_id);
                        $product_image = get_the_post_thumbnail_url($product_id, 'large');
                        ?>

                        <article class="home-featured-product-card">
                            <a class="home-featured-product-image" href="<?php echo esc_url($product_link); ?>">
                                <?php if ($product_image): ?>
                                    <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>">
                                <?php endif; ?>
                            </a>

                            <h3>
                                <a href="<?php echo esc_url($product_link); ?>">
                                    <?php echo esc_html($product_title); ?>
                                </a>
                            </h3>

                            <a class="home-featured-product-btn" href="<?php echo esc_url($product_link); ?>">
                                Nhận tư vấn
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (quoc_phuong_home_field('home_featured_products_button_text')): ?>
                <div class="home-featured-products-more">
                    <a href="<?php echo esc_url(quoc_phuong_home_field('home_featured_products_button_url') ?: '#'); ?>">
                        <?php echo esc_html(quoc_phuong_home_field('home_featured_products_button_text')); ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>


 <!-- Form tư vấn -->
<?php if (quoc_phuong_home_field('home_consult_form_enable')): ?>
    <?php
    $consult_bg = quoc_phuong_home_field('home_consult_form_background_image');
    $consult_bg_url = $consult_bg ? quoc_phuong_home_image_url($consult_bg) : '';
    $consult_shortcode = quoc_phuong_home_field('home_consult_form_shortcode');
    ?>

    <section class="home-consult-form-section" <?php if ($consult_bg_url): ?>
        style="background-image: url('<?php echo esc_url($consult_bg_url); ?>');"
    <?php endif; ?>>
        <div class="home-consult-form-overlay">
            <div class="home-consult-form-box">
                <?php if (quoc_phuong_home_field('home_consult_form_eyebrow')): ?>
                    <div class="home-consult-form-eyebrow">
                        <?php echo esc_html(quoc_phuong_home_field('home_consult_form_eyebrow')); ?>
                    </div>
                <?php endif; ?>

                <?php if (quoc_phuong_home_field('home_consult_form_title')): ?>
                    <h2><?php echo esc_html(quoc_phuong_home_field('home_consult_form_title')); ?></h2>
                <?php endif; ?>

                <div class="home-consult-form-line"></div>

                <?php if ($consult_shortcode): ?>
                    <div class="home-consult-form-content">
                        <?php echo do_shortcode($consult_shortcode); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>



<!-- Tin tức + Video nổi bật -->
<?php if (quoc_phuong_home_field('home_news_video_enable')): ?>
    <?php
    $news_video_bg = quoc_phuong_home_field('home_news_video_bg');
    $news_video_bg_url = $news_video_bg ? quoc_phuong_home_image_url($news_video_bg) : '';
    $news_posts = quoc_phuong_home_field('home_news_video_posts');
    $main_video_url = quoc_phuong_home_field('home_news_video_main_url');

    $video_thumbs = array(
        array(
            'image' => quoc_phuong_home_field('home_news_video_thumb_1'),
            'url' => quoc_phuong_home_field('home_news_video_url_1'),
        ),
        array(
            'image' => quoc_phuong_home_field('home_news_video_thumb_2'),
            'url' => quoc_phuong_home_field('home_news_video_url_2'),
        ),
        array(
            'image' => quoc_phuong_home_field('home_news_video_thumb_3'),
            'url' => quoc_phuong_home_field('home_news_video_url_3'),
        ),
    );

    $main_video_url = !empty($video_thumbs[0]['url']) ? $video_thumbs[0]['url'] : $main_video_url;
    ?>

    <section class="home-news-video-section" <?php if ($news_video_bg_url): ?>
        style="background-image: url('<?php echo esc_url($news_video_bg_url); ?>');"
    <?php endif; ?>>
        <div class="home-news-video-inner">
            <div class="home-news-column">
                <div class="home-news-video-heading">
                    <h2>
                        <?php echo esc_html(quoc_phuong_home_field('home_news_video_news_eyebrow')); ?>
                        <span><?php echo esc_html(quoc_phuong_home_field('home_news_video_news_highlight')); ?></span>
                    </h2>
                    <p><?php echo esc_html(quoc_phuong_home_field('home_news_video_news_desc')); ?></p>
                </div>

                <?php if (!empty($news_posts)): ?>
                    <div class="home-news-list">
                        <?php $i = 1; ?>
                        <?php foreach (array_slice($news_posts, 0, 3) as $post_item): ?>
                            <?php
                            $post_id = is_object($post_item) ? $post_item->ID : (int) $post_item;
                            $post_title = get_the_title($post_id);
                            $post_link = get_permalink($post_id);
                            $post_img = get_the_post_thumbnail_url($post_id, 'medium_large');
                            $post_excerpt = get_the_excerpt($post_id);
                            ?>

                            <article class="home-news-item">
                                <a class="home-news-img" href="<?php echo esc_url($post_link); ?>">
                                    <?php if ($post_img): ?>
                                        <img src="<?php echo esc_url($post_img); ?>" alt="<?php echo esc_attr($post_title); ?>">
                                    <?php endif; ?>
                                </a>

                                <div class="home-news-index"><?php echo esc_html($i); ?></div>

                                <div class="home-news-content">
                                    <h3>
                                        <a href="<?php echo esc_url($post_link); ?>">
                                            <?php echo esc_html($post_title); ?>
                                        </a>
                                    </h3>

                                   <?php if ($post_excerpt): ?>
    <p class="news-excerpt">
        <?php echo esc_html($post_excerpt); ?>
    </p>
<?php endif; ?>
                                </div>
                            </article>

                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="home-video-column">
                <div class="home-news-video-heading">
                    <h2>
                        <?php echo esc_html(quoc_phuong_home_field('home_news_video_video_eyebrow')); ?>
                        <span><?php echo esc_html(quoc_phuong_home_field('home_news_video_video_highlight')); ?></span>
                    </h2>
                    <p><?php echo esc_html(quoc_phuong_home_field('home_news_video_video_desc')); ?></p>
                </div>

                <?php
                $main_video_thumb = quoc_phuong_home_field('home_news_video_thumb_1');
                $main_video_thumb_url = $main_video_thumb ? quoc_phuong_home_image_url($main_video_thumb, 'large') : '';
                ?>

                <?php if ($main_video_url || $main_video_thumb_url): ?>
                    <div class="home-main-video js-home-main-video" role="button" tabindex="0"
                        data-video-url="<?php echo esc_url($main_video_url); ?>"
                        data-video-thumb="<?php echo esc_url($main_video_thumb_url); ?>"
                        aria-label="Phát video nổi bật">
                        <?php if ($main_video_thumb_url): ?>
                            <img src="<?php echo esc_url($main_video_thumb_url); ?>" alt="">
                        <?php endif; ?>

                        <span><i class="fa-solid fa-play"></i></span>
                    </div>
                <?php endif; ?>

                <div class="home-video-thumbs">
                    <?php foreach ($video_thumbs as $index => $video): ?>
                        <?php
                        $thumb_url = !empty($video['image']) ? quoc_phuong_home_image_url($video['image'], 'medium') : '';
                        $url = !empty($video['url']) ? $video['url'] : '#';
                        ?>

                        <?php if ($thumb_url): ?>
                            <button class="home-video-thumb js-home-video-thumb <?php echo $index === 0 ? 'is-active' : ''; ?>"
                                type="button"
                                data-video-url="<?php echo esc_url($url); ?>"
                                data-video-thumb="<?php echo esc_url($thumb_url); ?>"
                                aria-label="<?php echo esc_attr('Phát video ' . ($index + 1)); ?>">
                                <img src="<?php echo esc_url($thumb_url); ?>" alt="">
                                <span><i class="fa-solid fa-play"></i></span>
                            </button>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="home-youtube-box">
                    <div class="home-youtube-icon">
                        <i class="fa-brands fa-youtube"></i>
                    </div>

                    <div>
                        <strong>CẬP NHẬT VIDEO MỚI NHẤT</strong>
                        <p>Đăng ký kênh Youtube để không bỏ lỡ những video mới nhất.</p>
                    </div>

                    <?php if (quoc_phuong_home_field('home_news_video_youtube_url')): ?>
                        <a href="<?php echo esc_url(quoc_phuong_home_field('home_news_video_youtube_url')); ?>" target="_blank" rel="noopener">
                            Đăng ký
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<!-- Map -->
<?php if (quoc_phuong_home_field('home_map_enable')): ?>
    <?php
    $map_iframe = quoc_phuong_home_field('home_map_iframe');
    $map_height = quoc_phuong_home_field('home_map_height') ?: 360;
    ?>

    <?php if ($map_iframe): ?>
        <section class="home-map-section" style="--home-map-height: <?php echo esc_attr((int) $map_height); ?>px;">
            <div class="home-map-wrap">
                <?php
                echo wp_kses($map_iframe, array(
                    'iframe' => array(
                        'src' => true,
                        'width' => true,
                        'height' => true,
                        'style' => true,
                        'allowfullscreen' => true,
                        'loading' => true,
                        'referrerpolicy' => true,
                        'title' => true,
                    ),
                ));
                ?>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
<?php endif; ?>
            <?php endif; ?>
        </main>
        <?php
    }
}

genesis();
