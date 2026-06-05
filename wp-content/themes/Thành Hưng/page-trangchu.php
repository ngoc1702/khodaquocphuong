<?php
/**
 * Template Name: Trang chủ ACF
 */

add_filter('genesis_site_layout', function () {
    return 'full-width-content';
});

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_after_header', 'thanh_hung_render_home_acf');
add_action('wp_footer', 'thanh_hung_home_acf_slider_script', 20);

if (!function_exists('thanh_hung_home_render_label')) {
    function thanh_hung_home_render_label($text, $icon_class)
    {
        if (!$text) {
            return;
        }
        ?>
        <div class="home-acf-label">
            <i class="<?php echo esc_attr($icon_class); ?>"></i>
            <span><?php echo esc_html($text); ?></span>
        </div>
        <?php
    }
}

if (!function_exists('thanh_hung_home_render_card')) {
    function thanh_hung_home_render_card($item, $class_name = '')
    {
        $icon = !empty($item['icon_class']) ? $item['icon_class'] : 'fa-solid fa-check';
        $title = !empty($item['title']) ? $item['title'] : '';
        $description = !empty($item['description']) ? $item['description'] : '';

        if (!$title && !$description) {
            return;
        }
        ?>
        <article class="home-acf-card <?php echo esc_attr($class_name); ?>">
            <span class="home-acf-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span>
            <?php if ($title) : ?>
                <h3><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            <?php if ($description) : ?>
                <p><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>
        </article>
        <?php
    }
}

if (!function_exists('thanh_hung_home_video_embed_url')) {
    function thanh_hung_home_video_embed_url($url)
    {
        if (!$url) {
            return '';
        }

        if (preg_match('~youtu\.be/([A-Za-z0-9_-]{6,})~', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        if (preg_match('~[?&]v=([A-Za-z0-9_-]{6,})~', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        if (preg_match('~/embed/([A-Za-z0-9_-]{6,})~', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        return $url;
    }
}

if (!function_exists('thanh_hung_home_video_thumb_url')) {
    function thanh_hung_home_video_thumb_url($url)
    {
        if (!$url) {
            return '';
        }

        if (preg_match('~youtu\.be/([A-Za-z0-9_-]{6,})~', $url, $matches) || preg_match('~[?&]v=([A-Za-z0-9_-]{6,})~', $url, $matches) || preg_match('~/embed/([A-Za-z0-9_-]{6,})~', $url, $matches)) {
            return 'https://img.youtube.com/vi/' . $matches[1] . '/hqdefault.jpg';
        }

        return '';
    }
}

if (!function_exists('thanh_hung_home_acf_slider_script')) {
    function thanh_hung_home_acf_slider_script()
    {
        ?>
        <script>
            jQuery(function ($) {
                $('.home-banner-slider').each(function () {
                    var $slider = $(this);

                    if ($slider.children().length > 1 && $.fn.slick) {
                        $slider.slick({
                            autoplay: true,
                            autoplaySpeed: 4500,
                            arrows: true,
                            dots: true,
                            fade: true,
                            infinite: true,
                            speed: 700
                        });
                    }
                });

                $('.home-press-articles-slider').each(function () {
                    var $slider = $(this);

                    if ($slider.children().length > 3 && $.fn.slick) {
                        $slider.slick({
                            autoplay: true,
                            autoplaySpeed: 3500,
                            arrows: false,
                            dots: true,
                            infinite: true,
                            speed: 500,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            responsive: [
                                { breakpoint: 1180, settings: { slidesToShow: 3 } },
                                { breakpoint: 768, settings: { slidesToShow: 1 } }
                            ]
                        });
                    }
                });

                $('.home-video-thumb').on('click', function (event) {
                    event.preventDefault();

                    var $thumb = $(this);
                    var embed = $thumb.data('embed');
                    var title = $thumb.data('title');
                    var $section = $thumb.closest('.home-video-section');
                    var $frame = $section.find('.home-video-frame');
                    var $iframe = $frame.find('iframe');

                    if (!embed) {
                        return;
                    }

                    if ($iframe.length) {
                        $iframe.attr('src', embed).attr('title', title);
                    } else {
                        $frame.empty().append($('<iframe>', {
                            src: embed,
                            title: title,
                            allow: 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share',
                            allowfullscreen: 'allowfullscreen'
                        }));
                    }

                    $section.find('.home-video-thumb').removeClass('is-active');
                    $thumb.addClass('is-active');
                });
            });
        </script>
        <?php
    }
}

if (!function_exists('thanh_hung_render_home_acf')) {
    function thanh_hung_render_home_acf()
    {
        ?>
        <main class="home-acf-main">
            <?php if (thanh_hung_home_field('home_banner_enable')) : ?>
                <section class="home-banner-section">
                    <div class="home-banner-slider">
                        <?php foreach (thanh_hung_home_items('home_banner_slides') as $item) : ?>
                            <?php
                            $image_url = !empty($item['image']) ? thanh_hung_home_image_url($item['image']) : '';
                            if (!$image_url) {
                                continue;
                            }
                            $image_alt = !empty($item['image']) ? thanh_hung_home_image_alt($item['image']) : '';
                            ?>
                            <div class="home-banner-slide has-image">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (thanh_hung_home_field('home_intro_enable')) : ?>
                <section class="home-intro-section">
                    <div class="home-intro-wrap">
                        <div class="home-intro-grid">
                            <div class="home-intro-content">
                                <?php if (thanh_hung_home_field('home_intro_badge')) : ?>
                                    <div class="home-intro-badge"><?php echo esc_html(thanh_hung_home_field('home_intro_badge')); ?></div>
                                <?php endif; ?>

                                <h2>
                                    <?php if (thanh_hung_home_field('home_intro_title_highlight')) : ?>
                                        <span><?php echo esc_html(thanh_hung_home_field('home_intro_title_highlight')); ?></span>
                                    <?php endif; ?>
                                    <?php echo esc_html(thanh_hung_home_field('home_intro_title')); ?>
                                </h2>

                                <?php if (thanh_hung_home_field('home_intro_description')) : ?>
                                    <div class="home-intro-description">
                                        <?php echo wp_kses_post(wpautop(thanh_hung_home_field('home_intro_description'))); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="home-intro-actions">
                                    <?php if (thanh_hung_home_field('home_intro_primary_text')) : ?>
                                        <a class="home-btn home-btn--primary" href="<?php echo esc_url(thanh_hung_home_field('home_intro_primary_url') ?: '#'); ?>">
                                            <i class="fa-solid fa-clipboard-list"></i>
                                            <span><?php echo esc_html(thanh_hung_home_field('home_intro_primary_text')); ?></span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (thanh_hung_home_field('home_intro_secondary_text')) : ?>
                                        <a class="home-btn home-btn--outline" href="<?php echo esc_url(thanh_hung_home_field('home_intro_secondary_url') ?: '#'); ?>">
                                            <i class="fa-solid fa-phone"></i>
                                            <span><?php echo esc_html(thanh_hung_home_field('home_intro_secondary_text')); ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="home-intro-media">
                                <?php
                                $intro_image = thanh_hung_home_field('home_intro_image');
                                $intro_image_url = $intro_image ? thanh_hung_home_image_url($intro_image) : '';
                                ?>
                                <?php if ($intro_image_url) : ?>
                                    <img src="<?php echo esc_url($intro_image_url); ?>" alt="<?php echo esc_attr(thanh_hung_home_image_alt($intro_image, thanh_hung_home_field('home_intro_title'))); ?>">
                                <?php else : ?>
                                    <div class="home-intro-placeholder">
                                        <strong>Taxi Tải<br>Thành Hưng</strong>
                                        <span>Since 1996</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="home-intro-stats">
                            <?php foreach (thanh_hung_home_items('home_intro_stats') as $item) : ?>
                                <?php if (empty($item['value']) && empty($item['label'])) { continue; } ?>
                                <div class="home-intro-stat">
                                    <?php if (!empty($item['value'])) : ?>
                                        <strong><?php echo esc_html($item['value']); ?></strong>
                                    <?php endif; ?>
                                    <?php if (!empty($item['label'])) : ?>
                                        <span><?php echo esc_html($item['label']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="home-intro-strip">
                        <div class="home-intro-strip-inner">
                            <?php foreach (thanh_hung_home_items('home_intro_strip_items') as $item) : ?>
                                <?php
                                $icon = !empty($item['icon_class']) ? $item['icon_class'] : 'fa-solid fa-check';
                                if (empty($item['title'])) {
                                    continue;
                                }
                                ?>
                                <div class="home-intro-strip-item">
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                    <span><?php echo esc_html($item['title']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (thanh_hung_home_field('home_services_enable')) : ?>
                <section class="home-services-section">
                    <div class="home-wide-wrap">
                        <header class="home-services-heading">
                            <?php if (thanh_hung_home_field('home_services_subtitle')) : ?>
                                <p><?php echo esc_html(thanh_hung_home_field('home_services_subtitle')); ?></p>
                            <?php endif; ?>
                            <?php if (thanh_hung_home_field('home_services_title')) : ?>
                                <h2><?php echo esc_html(thanh_hung_home_field('home_services_title')); ?></h2>
                            <?php endif; ?>
                        </header>

                        <div class="home-services-grid">
                            <?php foreach (thanh_hung_home_items('home_services_items') as $item) : ?>
                                <?php
                                $title = !empty($item['title']) ? $item['title'] : '';
                                $url = !empty($item['url']) ? $item['url'] : '#';
                                $icon = !empty($item['icon_class']) ? $item['icon_class'] : 'fa-solid fa-truck-fast';
                                $service_image_url = !empty($item['image']) ? thanh_hung_home_image_url($item['image'], 'medium') : '';
                                $service_image_alt = $service_image_url ? thanh_hung_home_image_alt($item['image'], $title) : '';

                                if (!$title) {
                                    continue;
                                }
                                ?>
                                <a class="home-service-card" href="<?php echo esc_url($url); ?>">
                                    <?php if ($service_image_url) : ?>
                                        <span class="home-service-icon home-service-icon--image">
                                            <img src="<?php echo esc_url($service_image_url); ?>" alt="<?php echo esc_attr($service_image_alt); ?>" loading="lazy">
                                        </span>
                                    <?php else : ?>
                                        <span class="home-service-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span>
                                    <?php endif; ?>
                                    <strong><?php echo esc_html($title); ?></strong>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (thanh_hung_home_field('home_capabilities_enable')) : ?>
                <section class="home-acf-section home-acf-capabilities">
                    <div class="home-acf-wrap">
                        <header class="home-acf-title-block">
                            <?php if (thanh_hung_home_field('home_capabilities_subtitle')) : ?>
                                <p><?php echo esc_html(thanh_hung_home_field('home_capabilities_subtitle')); ?></p>
                            <?php endif; ?>
                            <?php if (thanh_hung_home_field('home_capabilities_title')) : ?>
                                <h2><?php echo esc_html(thanh_hung_home_field('home_capabilities_title')); ?></h2>
                            <?php endif; ?>
                        </header>

                        <?php thanh_hung_home_render_label(thanh_hung_home_field('home_capabilities_eyebrow'), 'fa-solid fa-bolt'); ?>

                        <div class="home-acf-grid">
                            <?php foreach (thanh_hung_home_items('home_capabilities_cards') as $item) : ?>
                                <?php thanh_hung_home_render_card($item, 'home-acf-card--soft'); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (thanh_hung_home_field('home_commitments_enable')) : ?>
                <section class="home-acf-section home-acf-commitments">
                    <div class="home-acf-wrap">
                        <?php thanh_hung_home_render_label(thanh_hung_home_field('home_commitments_eyebrow'), 'fa-solid fa-shield-halved'); ?>

                        <div class="home-acf-grid">
                            <?php foreach (thanh_hung_home_items('home_commitments_cards') as $item) : ?>
                                <?php thanh_hung_home_render_card($item, 'home-acf-card--outline'); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (thanh_hung_home_field('home_process_enable')) : ?>
                <section class="home-acf-section home-acf-process">
                    <div class="home-acf-wrap home-acf-wrap--process">
                        <header class="home-acf-title-block home-acf-title-block--process">
                            <h2>
                                <?php echo esc_html(thanh_hung_home_field('home_process_title')); ?>
                                <span><?php echo esc_html(thanh_hung_home_field('home_process_highlight')); ?></span>
                            </h2>
                        </header>

                        <div class="home-process-list">
                            <?php foreach (thanh_hung_home_items('home_process_steps') as $item) : ?>
                                <?php
                                $icon = !empty($item['icon_class']) ? $item['icon_class'] : 'fa-solid fa-check';
                                $badge = !empty($item['badge']) ? $item['badge'] : '';
                                ?>
                                <article class="home-process-step">
                                    <?php if ($badge) : ?>
                                        <span class="home-process-badge"><?php echo esc_html($badge); ?></span>
                                    <?php endif; ?>
                                    <span class="home-process-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span>
                                    <?php if (!empty($item['step_label'])) : ?>
                                        <span class="home-process-index"><?php echo esc_html($item['step_label']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($item['title'])) : ?>
                                        <h3><?php echo esc_html($item['title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($item['description'])) : ?>
                                        <p><?php echo wp_kses_post($item['description']); ?></p>
                                    <?php endif; ?>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (thanh_hung_home_field('home_faq_enable')) : ?>
                <section class="home-acf-section home-acf-faq">
                    <div class="home-acf-wrap">
                        <header class="home-acf-title-block home-acf-title-block--faq">
                            <?php if (thanh_hung_home_field('home_faq_subtitle')) : ?>
                                <p><?php echo esc_html(thanh_hung_home_field('home_faq_subtitle')); ?></p>
                            <?php endif; ?>
                            <?php if (thanh_hung_home_field('home_faq_title')) : ?>
                                <h2><?php echo esc_html(thanh_hung_home_field('home_faq_title')); ?></h2>
                            <?php endif; ?>
                        </header>

                        <div class="home-faq-list">
                            <?php foreach (thanh_hung_home_items('home_faq_items') as $item) : ?>
                                <?php
                                $question = !empty($item['question']) ? $item['question'] : '';
                                $answer = !empty($item['answer']) ? $item['answer'] : '';

                                if (!$question) {
                                    continue;
                                }
                                ?>
                                <details class="home-faq-item">
                                    <summary>
                                        <span><?php echo esc_html($question); ?></span>
                                        <i class="fa-solid fa-plus"></i>
                                    </summary>
                                    <?php if ($answer) : ?>
                                        <div class="home-faq-answer">
                                            <?php echo wp_kses_post(wpautop($answer)); ?>
                                        </div>
                                    <?php endif; ?>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (thanh_hung_home_field('home_press_enable')) : ?>
                <section class="home-press-section">
                    <div class="home-wide-wrap">
                        <?php
                        $press_logos = array_values(array_filter(thanh_hung_home_items('home_press_logos'), function ($item) {
                            return !empty($item['logo']);
                        }));
                        $press_articles = array_values(array_filter(thanh_hung_home_items('home_press_articles'), function ($item) {
                            return !empty($item['image']);
                        }));
                        ?>
                        <header class="home-section-heading">
                            <?php if (thanh_hung_home_field('home_press_subtitle')) : ?>
                                <p><?php echo esc_html(thanh_hung_home_field('home_press_subtitle')); ?></p>
                            <?php endif; ?>
                            <?php if (thanh_hung_home_field('home_press_title')) : ?>
                                <h2><?php echo esc_html(thanh_hung_home_field('home_press_title')); ?></h2>
                            <?php endif; ?>
                            <?php if (thanh_hung_home_field('home_press_description')) : ?>
                                <div class="home-section-desc">
                                    <?php echo wp_kses_post(wpautop(thanh_hung_home_field('home_press_description'))); ?>
                                </div>
                            <?php endif; ?>
                        </header>

                        <?php if ($press_logos) : ?>
                            <div class="home-press-logo-grid">
                                <?php foreach ($press_logos as $item) : ?>
                                    <?php
                                    $logo_url = thanh_hung_home_image_url($item['logo']);
                                    $logo_alt = thanh_hung_home_image_alt($item['logo'], 'Logo báo chí');

                                    if (!$logo_url) {
                                        continue;
                                    }
                                    ?>
                                    <span class="home-press-logo">
                                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($press_articles) : ?>
                            <div class="home-press-articles-slider">
                                <?php foreach ($press_articles as $item) : ?>
                                    <?php
                                    $article_url = !empty($item['url']) ? $item['url'] : '#';
                                    $article_image_url = thanh_hung_home_image_url($item['image']);
                                    $article_alt = thanh_hung_home_image_alt($item['image'], thanh_hung_home_field('home_press_title'));

                                    if (!$article_image_url) {
                                        continue;
                                    }
                                    ?>
                                    <a class="home-press-article" href="<?php echo esc_url($article_url); ?>">
                                        <img src="<?php echo esc_url($article_image_url); ?>" alt="<?php echo esc_attr($article_alt); ?>">
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (thanh_hung_home_field('home_news_enable')) : ?>
                <section class="home-news-section">
                    <div class="home-wide-wrap">
                        <header class="home-section-heading home-section-heading--dark">
                            <?php if (thanh_hung_home_field('home_news_subtitle')) : ?>
                                <p><?php echo esc_html(thanh_hung_home_field('home_news_subtitle')); ?></p>
                            <?php endif; ?>
                            <?php if (thanh_hung_home_field('home_news_title')) : ?>
                                <h2><?php echo esc_html(thanh_hung_home_field('home_news_title')); ?></h2>
                            <?php endif; ?>
                        </header>

                        <?php
                        $news_count = absint(thanh_hung_home_field('home_news_count'));
                        $news_count = $news_count ? min($news_count, 3) : 3;
                        $news_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $news_count,
                            'ignore_sticky_posts' => true,
                        );
                        $news_category = absint(thanh_hung_home_field('home_news_category'));

                        if ($news_category) {
                            $news_args['cat'] = $news_category;
                        }

                        $news_query = new WP_Query($news_args);
                        ?>

                        <?php if ($news_query->have_posts()) : ?>
                            <div class="home-news-grid">
                                <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                                    <?php
                                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                    $categories = get_the_category();
                                    $category_name = !empty($categories) ? $categories[0]->name : 'Tin tức';
                                    ?>
                                    <article class="home-news-card">
                                        <a class="home-news-image" href="<?php the_permalink(); ?>">
                                            <?php if ($thumbnail) : ?>
                                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                            <?php else : ?>
                                                <span><?php echo esc_html(get_the_title()); ?></span>
                                            <?php endif; ?>
                                        </a>
                                        <div class="home-news-body">
                                            <span class="home-news-category"><?php echo esc_html($category_name); ?></span>
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24, '...')); ?></p>
                                        </div>
                                    </article>
                                <?php endwhile; ?>
                            </div>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>

                        <?php if (thanh_hung_home_field('home_news_button_text')) : ?>
                            <div class="home-news-more">
                                <a class="home-btn home-btn--primary" href="<?php echo esc_url(thanh_hung_home_field('home_news_button_url') ?: '#'); ?>">
                                    <span><?php echo esc_html(thanh_hung_home_field('home_news_button_text')); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (thanh_hung_home_field('home_video_enable')) : ?>
                <?php $videos = array_slice(thanh_hung_home_items('home_video_items'), 0, 4); ?>
                <section class="home-video-section">
                    <div class="home-wide-wrap">
                        <header class="home-section-heading home-section-heading--video">
                            <?php if (thanh_hung_home_field('home_video_subtitle')) : ?>
                                <p><?php echo esc_html(thanh_hung_home_field('home_video_subtitle')); ?></p>
                            <?php endif; ?>
                            <?php if (thanh_hung_home_field('home_video_title')) : ?>
                                <h2><?php echo esc_html(thanh_hung_home_field('home_video_title')); ?></h2>
                            <?php endif; ?>
                        </header>

                        <?php if (!empty($videos)) : ?>
                            <?php
                            $main_video = $videos[0];
                            $main_embed = !empty($main_video['video_url']) ? thanh_hung_home_video_embed_url($main_video['video_url']) : '';
                            $video_label = thanh_hung_home_field('home_video_subtitle') ? thanh_hung_home_field('home_video_subtitle') : 'Video';
                            ?>
                            <div class="home-video-layout">
                                <div class="home-video-frame">
                                    <?php if ($main_embed) : ?>
                                        <iframe src="<?php echo esc_url($main_embed); ?>" title="<?php echo esc_attr($video_label); ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <?php else : ?>
                                        <div class="home-video-placeholder">
                                            <i class="fa-solid fa-play"></i>
                                            <span><?php echo esc_html($video_label); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="home-video-thumbs">
                                    <?php foreach ($videos as $index => $item) : ?>
                                        <?php
                                        $video_embed = !empty($item['video_url']) ? thanh_hung_home_video_embed_url($item['video_url']) : '';
                                        $video_thumb = !empty($item['thumbnail']) ? thanh_hung_home_image_url($item['thumbnail']) : thanh_hung_home_video_thumb_url(!empty($item['video_url']) ? $item['video_url'] : '');
                                        ?>
                                        <a class="home-video-thumb <?php echo $index === 0 ? 'is-active' : ''; ?>" href="<?php echo esc_url(!empty($item['video_url']) ? $item['video_url'] : '#'); ?>" data-embed="<?php echo esc_url($video_embed); ?>" data-title="<?php echo esc_attr($video_label); ?>">
                                            <?php if ($video_thumb) : ?>
                                                <img src="<?php echo esc_url($video_thumb); ?>" alt="<?php echo esc_attr($video_label); ?>">
                                            <?php else : ?>
                                                <span><?php echo esc_html($video_label); ?></span>
                                            <?php endif; ?>
                                            <i class="fa-solid fa-play"></i>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
        </main>
        <?php
    }
}

genesis();
