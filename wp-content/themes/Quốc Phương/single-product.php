<?php

if (!defined('ABSPATH')) {
    exit;
}

add_filter('genesis_site_layout', function () {
    return 'full-width-content';
});

add_filter('body_class', function ($classes) {
    $classes[] = 'single-product-detail';

    return $classes;
});

remove_action('genesis_loop', 'genesis_do_loop');
remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_footer', 'genesis_post_meta');

add_action('genesis_after_header', 'quoc_phuong_render_single_product_page');
add_action('wp_footer', 'quoc_phuong_single_product_gallery_script', 30);

if (!function_exists('quoc_phuong_single_product_remove_caia_extras')) {
    function quoc_phuong_single_product_remove_caia_extras()
    {
        global $caia_rating, $caia_social;

        if (is_object($caia_rating)) {
            $rating_priority = has_filter('the_content', array($caia_rating, 'add_rating_content_bottom'));

            if ($rating_priority !== false) {
                remove_filter('the_content', array($caia_rating, 'add_rating_content_bottom'), $rating_priority);
            }
        }

        if (is_object($caia_social)) {
            $social_priority = has_filter('the_content', array($caia_social, 'add_native_share_button_at_bottom'));

            if ($social_priority !== false) {
                remove_filter('the_content', array($caia_social, 'add_native_share_button_at_bottom'), $social_priority);
            }
        }

        if (class_exists('WC_Template_Loader')) {
            remove_filter('the_content', array('WC_Template_Loader', 'unsupported_theme_product_content_filter'), 10);
        }

        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    }
}

if (!function_exists('quoc_phuong_product_add_gallery_image')) {
    function quoc_phuong_product_add_gallery_image(&$images, &$seen, $image_id = 0, $full_url = '', $thumb_url = '', $alt = '')
    {
        $image_id = absint($image_id);

        if ($image_id) {
            $full_url = $full_url ?: wp_get_attachment_image_url($image_id, 'full');
            $thumb_url = $thumb_url ?: wp_get_attachment_image_url($image_id, 'product-avatar');
            $alt = $alt ?: get_post_meta($image_id, '_wp_attachment_image_alt', true);
        }

        if (!$full_url) {
            return;
        }

        $key = $image_id ? 'id-' . $image_id : 'url-' . md5($full_url);

        if (isset($seen[$key])) {
            return;
        }

        $seen[$key] = true;
        $images[] = array(
            'full' => $full_url,
            'thumb' => $thumb_url ?: $full_url,
            'alt' => $alt,
        );
    }
}

if (!function_exists('quoc_phuong_get_single_product_gallery')) {
    function quoc_phuong_get_single_product_gallery($product_id, $product)
    {
        $images = array();
        $seen = array();
        $featured_id = get_post_thumbnail_id($product_id);

        if ($featured_id) {
            quoc_phuong_product_add_gallery_image($images, $seen, $featured_id, '', '', get_the_title($product_id));
        }

        if (function_exists('rwmb_meta')) {
            $meta_images = rwmb_meta('anhsp', array('size' => 'full'), $product_id);

            if (is_array($meta_images)) {
                foreach ($meta_images as $image) {
                    $image_id = !empty($image['ID']) ? $image['ID'] : (!empty($image['id']) ? $image['id'] : 0);
                    $full_url = !empty($image['full_url']) ? $image['full_url'] : (!empty($image['url']) ? $image['url'] : '');
                    $thumb_url = !empty($image['sizes']['product-avatar']['url']) ? $image['sizes']['product-avatar']['url'] : '';
                    $alt = !empty($image['alt']) ? $image['alt'] : get_the_title($product_id);

                    quoc_phuong_product_add_gallery_image($images, $seen, $image_id, $full_url, $thumb_url, $alt);
                }
            }
        }

        if ($product && is_a($product, 'WC_Product')) {
            foreach ($product->get_gallery_image_ids() as $gallery_image_id) {
                quoc_phuong_product_add_gallery_image($images, $seen, $gallery_image_id, '', '', get_the_title($product_id));
            }
        }

        if (empty($images) && function_exists('wc_placeholder_img_src')) {
            $images[] = array(
                'full' => wc_placeholder_img_src('woocommerce_single'),
                'thumb' => wc_placeholder_img_src('woocommerce_thumbnail'),
                'alt' => get_the_title($product_id),
            );
        }

        return $images;
    }
}

if (!function_exists('quoc_phuong_get_single_product_terms')) {
    function quoc_phuong_get_single_product_terms($product_id)
    {
        $terms = get_the_terms($product_id, 'product_cat');

        if (empty($terms) || is_wp_error($terms)) {
            return array();
        }

        return array_filter($terms, function ($term) {
            return !in_array($term->slug, array('uncategorized', 'chua-phan-loai'), true);
        });
    }
}

if (!function_exists('quoc_phuong_get_related_product_ids')) {
    function quoc_phuong_get_related_product_ids($product_id, $limit = 4)
    {
        $related_ids = array();

        if (function_exists('wc_get_related_products')) {
            $related_ids = wc_get_related_products($product_id, $limit);
        }

        if (count($related_ids) < $limit) {
            $terms = quoc_phuong_get_single_product_terms($product_id);
            $term_ids = wp_list_pluck($terms, 'term_id');

            if ($term_ids) {
                $fallback_query = new WP_Query(array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => $limit,
                    'post__not_in' => array_merge(array($product_id), array_map('absint', $related_ids)),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => array_map('absint', $term_ids),
                        ),
                    ),
                    'orderby' => array(
                        'menu_order' => 'ASC',
                        'date' => 'DESC',
                    ),
                ));

                $related_ids = array_merge($related_ids, wp_list_pluck($fallback_query->posts, 'ID'));
                wp_reset_postdata();
            }
        }

        $related_ids = array_values(array_unique(array_map('absint', $related_ids)));

        return array_slice($related_ids, 0, $limit);
    }
}

if (!function_exists('quoc_phuong_render_single_product_card')) {
    function quoc_phuong_render_single_product_card($product_id)
    {
        $product_title = get_the_title($product_id);
        $product_link = get_permalink($product_id);
        $product_image = get_the_post_thumbnail_url($product_id, 'large');

        if (!$product_image && function_exists('wc_placeholder_img_src')) {
            $product_image = wc_placeholder_img_src('woocommerce_thumbnail');
        }
        ?>
        <article class="home-featured-product-card qp-product-related-card">
            <a class="home-featured-product-image" href="<?php echo esc_url($product_link); ?>">
                <?php if ($product_image) : ?>
                    <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>" loading="lazy" decoding="async">
                <?php endif; ?>
            </a>

            <h3>
                <a href="<?php echo esc_url($product_link); ?>">
                    <?php echo esc_html($product_title); ?>
                </a>
            </h3>

            <a class="home-featured-product-btn" href="<?php echo esc_url($product_link); ?>">Nhận tư vấn</a>
        </article>
        <?php
    }
}

if (!function_exists('quoc_phuong_render_single_product_page')) {
    function quoc_phuong_render_single_product_page()
    {
        quoc_phuong_single_product_remove_caia_extras();

        if (!have_posts()) {
            return;
        }

        while (have_posts()) :
            the_post();

            $product_id = get_the_ID();
            $product = function_exists('wc_get_product') ? wc_get_product($product_id) : null;

            if (!$product || !is_a($product, 'WC_Product')) {
                continue;
            }

            $images = quoc_phuong_get_single_product_gallery($product_id, $product);
            $product_image_url = !empty($images[0]['full']) ? $images[0]['full'] : get_the_post_thumbnail_url($product_id, 'full');
            $terms = quoc_phuong_get_single_product_terms($product_id);
            $short_description = $product->get_short_description();
            $short_description = $short_description ? apply_filters('woocommerce_short_description', $short_description) : wpautop(get_the_excerpt());
            $product_content = get_post_field('post_content', $product_id);
            $price_html = $product->get_price_html();
            $sku = $product->get_sku();
            $related_ids = quoc_phuong_get_related_product_ids($product_id, 4);
            $phone = '0919101868';
            ?>
            <main class="qp-product-detail-page">
                <section class="qp-product-hero">
                    <div class="qp-product-wrap">
                        <div class="qp-product-hero-grid">
                            <div class="qp-product-gallery" aria-label="Ảnh sản phẩm">
                                <div class="slider-for qp-product-gallery-main">
                                    <?php foreach ($images as $image) : ?>
                                        <div class="qp-product-gallery-slide">
                                            <img src="<?php echo esc_url($image['full']); ?>" alt="<?php echo esc_attr($image['alt'] ?: get_the_title()); ?>" loading="eager" decoding="async">
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php if (count($images) > 1) : ?>
                                    <div class="slider-nav qp-product-gallery-nav" aria-label="Chọn ảnh sản phẩm">
                                        <?php foreach ($images as $image) : ?>
                                            <button class="qp-product-gallery-thumb" type="button">
                                                <img src="<?php echo esc_url($image['thumb']); ?>" alt="<?php echo esc_attr($image['alt'] ?: get_the_title()); ?>" loading="lazy" decoding="async">
                                            </button>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <aside class="qp-product-summary">
                                <div class="qp-product-eyebrow">Kho đá Quốc Phương</div>
                                <h1><?php the_title(); ?></h1>

                                <?php if ($terms) : ?>
                                    <div class="qp-product-categories">
                                        <?php foreach ($terms as $term) : ?>
                                            <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="qp-product-short-desc">
                                    <?php echo wp_kses_post($short_description); ?>
                                </div>

                                <!-- <dl class="qp-product-meta-grid">
                                    <div>
                                        <dt>Giá</dt>
                                        <dd><?php echo $price_html ? wp_kses_post($price_html) : 'Liên hệ'; ?></dd>
                                    </div>

                                    <?php if ($sku) : ?>
                                        <div>
                                            <dt>Mã sản phẩm</dt>
                                            <dd><?php echo esc_html($sku); ?></dd>
                                        </div>
                                    <?php endif; ?>

                                    <div>
                                        <dt>Tư vấn</dt>
                                        <dd><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></dd>
                                    </div>
                                </dl> -->

                                <div class="qp-product-actions">
                                    <a class="qp-product-btn qp-product-btn--primary" href="tel:<?php echo esc_attr($phone); ?>">
                                        <i class="fa-solid fa-phone"></i>
                                        Gọi tư vấn
                                    </a>
                                    <a class="qp-product-btn qp-product-btn--outline btn-cta" href="#nhantuvan" aria-controls="nhantuvan" aria-haspopup="dialog">
                                        <i class="fa-solid fa-file-signature"></i>
                                        Báo giá
                                    </a>
                                </div>

                                <ul class="qp-product-highlights">
                                    <li><i class="fa-solid fa-circle-check"></i>Đá Granite, Marble tự nhiên cao cấp</li>
                                    <li><i class="fa-solid fa-circle-check"></i>Tư vấn mẫu đá phù hợp công trình</li>
                                    <li><i class="fa-solid fa-circle-check"></i>Gia công, thi công theo kích thước thực tế</li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </section>

                <section class="qp-product-content-section">
                    <div class="qp-product-wrap">
                        <article class="qp-product-article" itemscope itemtype="https://schema.org/Article">
                            <meta itemprop="mainEntityOfPage" content="<?php echo esc_url(get_permalink()); ?>">
                            <meta itemprop="headline" content="<?php echo esc_attr(get_the_title()); ?>">
                            <meta itemprop="datePublished" content="<?php echo esc_attr(get_the_date('c')); ?>">
                            <meta itemprop="dateModified" content="<?php echo esc_attr(get_the_modified_date('c')); ?>">
                            <?php if ($product_image_url) : ?>
                                <meta itemprop="image" content="<?php echo esc_url($product_image_url); ?>">
                            <?php endif; ?>
                            <span itemprop="author" itemscope itemtype="https://schema.org/Organization">
                                <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </span>
                            <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                                <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </span>

                            <header class="qp-product-section-heading">
                                <h2>Th&ocirc;ng tin s&#7843;n ph&#7849;m <?php echo esc_html(get_the_title()); ?></h2>
                            </header>

                            <div class="single-blog-content qp-product-content" itemprop="articleBody">
                                <?php
                                if (trim($product_content)) {
                                    echo apply_filters('the_content', $product_content);
                                } else {
                                    echo '<p>Th&ocirc;ng tin chi ti&#7871;t s&#7843;n ph&#7849;m &#273;ang &#273;&#432;&#7907;c c&#7853;p nh&#7853;t.</p>';
                                }
                                ?>
                            </div>
                        </article>
                    </div>
                </section>

                <?php if ($related_ids) : ?>
                    <section class="qp-product-related-section">
                        <div class="qp-product-wrap">
                            <div class="home-section-heading qp-product-related-heading">
                                <div class="home-section-eyebrow">Gợi ý thêm</div>
                                <h2>Sản phẩm <span>liên quan</span></h2>
                            </div>

                            <div class="home-featured-products-grid qp-product-related-grid">
                                <?php foreach ($related_ids as $related_id) : ?>
                                    <?php quoc_phuong_render_single_product_card($related_id); ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            </main>
            <?php
        endwhile;
    }
}

if (!function_exists('quoc_phuong_single_product_gallery_script')) {
    function quoc_phuong_single_product_gallery_script()
    {
        if (!is_singular('product')) {
            return;
        }
        ?>
        <script>
            (function() {
                function wrapProductContentTables() {
                    document.querySelectorAll('.qp-product-content table').forEach(function(table) {
                        if (table.closest('.wp-block-table, .single-table-scroll')) {
                            return;
                        }

                        var wrapper = document.createElement('div');
                        wrapper.className = 'single-table-scroll';
                        table.parentNode.insertBefore(wrapper, table);
                        wrapper.appendChild(table);
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', wrapProductContentTables);
                } else {
                    wrapProductContentTables();
                }
            })();

            jQuery(function($) {
                var $main = $('.qp-product-gallery-main');
                var $nav = $('.qp-product-gallery-nav');

                if (!$main.length || !$.fn.slick || $main.hasClass('slick-initialized')) {
                    return;
                }

                $main.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: false,
                    fade: true,
                    adaptiveHeight: false,
                    asNavFor: $nav.length ? '.qp-product-gallery-nav' : null,
                    prevArrow: '<button class="qp-product-gallery-arrow qp-product-gallery-arrow--prev" type="button" aria-label="Ảnh trước"><i class="fa-solid fa-chevron-left"></i></button>',
                    nextArrow: '<button class="qp-product-gallery-arrow qp-product-gallery-arrow--next" type="button" aria-label="Ảnh sau"><i class="fa-solid fa-chevron-right"></i></button>'
                });

                if ($nav.length && !$nav.hasClass('slick-initialized')) {
                    $nav.slick({
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false,
                        focusOnSelect: true,
                        asNavFor: '.qp-product-gallery-main',
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 4
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 3
                                }
                            }
                        ]
                    });
                }
            });
        </script>
        <?php
    }
}

genesis();
