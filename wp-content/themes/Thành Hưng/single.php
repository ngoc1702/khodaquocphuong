<?php

add_filter('genesis_site_layout', function () {
    return 'full-width-content';
});

add_filter('body_class', function ($classes) {
    $classes[] = 'single-blog-post';

    return $classes;
});

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_after_header', 'thanh_hung_render_single_blog_post');

if (!function_exists('thanh_hung_single_remove_caia_extras')) {
    function thanh_hung_single_remove_caia_extras()
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
    }
}

if (!function_exists('thanh_hung_get_related_posts')) {
    function thanh_hung_get_related_posts($post_id, $limit = 5)
    {
        $related_posts = array();
        $exclude_ids = array($post_id);
        $category_ids = wp_get_post_categories($post_id);

        if ($category_ids) {
            $category_query = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $limit,
                'post__not_in' => $exclude_ids,
                'category__in' => $category_ids,
                'ignore_sticky_posts' => true,
            ));

            foreach ($category_query->posts as $related_post) {
                $related_posts[] = $related_post;
                $exclude_ids[] = $related_post->ID;
            }

            wp_reset_postdata();
        }

        if (count($related_posts) < $limit) {
            $recent_query = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $limit - count($related_posts),
                'post__not_in' => $exclude_ids,
                'ignore_sticky_posts' => true,
            ));

            foreach ($recent_query->posts as $related_post) {
                $related_posts[] = $related_post;
            }

            wp_reset_postdata();
        }

        return $related_posts;
    }
}

if (!function_exists('thanh_hung_render_single_blog_post')) {
    function thanh_hung_render_single_blog_post()
    {
        thanh_hung_single_remove_caia_extras();

        if (!have_posts()) {
            return;
        }

        while (have_posts()) : the_post();
            $post_id = get_the_ID();
            $categories = get_the_category($post_id);
            $related_posts = thanh_hung_get_related_posts($post_id, 5);
            ?>
            <main class="single-blog-page">
                <div class="single-blog-wrap">
                    <div class="single-blog-layout">
                        <article class="single-blog-article" itemscope itemtype="https://schema.org/BlogPosting">
                            <meta itemprop="mainEntityOfPage" content="<?php echo esc_url(get_permalink()); ?>">
                            <meta itemprop="datePublished" content="<?php echo esc_attr(get_the_date('c')); ?>">
                            <meta itemprop="dateModified" content="<?php echo esc_attr(get_the_modified_date('c')); ?>">

                            <header class="single-blog-header">
                                <?php if ($categories) : ?>
                                    <div class="single-blog-categories">
                                        <?php foreach ($categories as $category) : ?>
                                            <a href="<?php echo esc_url(get_category_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <h1 itemprop="headline"><?php the_title(); ?></h1>

                                <div class="single-blog-meta">
                                    <span>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('d/m/Y')); ?></time>
                                    </span>
                                    <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                                        <i class="fa-solid fa-user"></i>
                                        <span itemprop="name"><?php echo esc_html(get_the_author()); ?></span>
                                    </span>
                                </div>
                            </header>

                            <?php if (has_post_thumbnail()) : ?>
                                <figure class="single-blog-featured" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                    <?php the_post_thumbnail('full', array('loading' => 'eager')); ?>
                                    <meta itemprop="url" content="<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'full')); ?>">
                                </figure>
                            <?php endif; ?>

                            <div class="single-blog-content" itemprop="articleBody">
                                <?php the_content(); ?>
                            </div>
                        </article>

                        <aside class="single-blog-sidebar" aria-label="Bai viet lien quan">
                            <section class="single-related-box">
                                <h2>B&agrave;i vi&#7871;t li&ecirc;n quan</h2>

                                <?php if ($related_posts) : ?>
                                    <div class="single-related-list">
                                        <?php foreach ($related_posts as $related_post) : ?>
                                            <article class="single-related-item">
                                                <a class="single-related-thumb" href="<?php echo esc_url(get_permalink($related_post)); ?>">
                                                    <?php if (has_post_thumbnail($related_post->ID)) : ?>
                                                        <?php echo get_the_post_thumbnail($related_post->ID, 'medium', array('loading' => 'lazy')); ?>
                                                    <?php else : ?>
                                                        <span><?php echo esc_html(get_the_title($related_post)); ?></span>
                                                    <?php endif; ?>
                                                </a>
                                                <div class="single-related-body">
                                                    <h3>
                                                        <a href="<?php echo esc_url(get_permalink($related_post)); ?>">
                                                            <?php echo esc_html(get_the_title($related_post)); ?>
                                                        </a>
                                                    </h3>
                                                    <time datetime="<?php echo esc_attr(get_the_date('c', $related_post)); ?>">
                                                        <?php echo esc_html(get_the_date('d/m/Y', $related_post)); ?>
                                                    </time>
                                                </div>
                                            </article>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </section>
                        </aside>
                    </div>
                </div>
            </main>
            <?php
        endwhile;
    }
}

genesis();
