<?php

add_filter('genesis_site_layout', function () {
    return 'full-width-content';
});

add_filter('body_class', function ($classes) {
    $classes[] = 'category-posts-template';

    return $classes;
});

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_after_header', 'quoc_phuong_render_category_posts');

function quoc_phuong_render_category_posts()
{
    $term = get_queried_object();
    $term_name = $term && !is_wp_error($term) ? $term->name : single_cat_title('', false);
    $term_description = category_description();
    $paged = max(1, absint(get_query_var('paged')), absint(get_query_var('page')));
    $category_query = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 12,
        'paged' => $paged,
        'cat' => $term && !is_wp_error($term) ? (int) $term->term_id : 0,
    ));
    ?>
    <main class="category-posts-page">
        <section class="category-posts-hero">
            <div class="category-posts-wrap">
                <header class="category-posts-heading">
                    <h1><?php echo esc_html($term_name); ?></h1>

                    <?php if ($term_description) : ?>
                        <div class="category-posts-description">
                            <?php echo wp_kses_post($term_description); ?>
                        </div>
                    <?php endif; ?>
                </header>
            </div>
        </section>

        <section class="category-posts-section">
            <div class="category-posts-wrap">
                <?php if ($category_query->have_posts()) : ?>
                    <div class="category-posts-grid">
                        <?php while ($category_query->have_posts()) : $category_query->the_post(); ?>
                            <?php
                            $post_id = get_the_ID();
                            $categories = get_the_category($post_id);
                            $category_name = !empty($categories) ? $categories[0]->name : 'Tin tức';
                            ?>
                            <article class="category-post-card" itemscope itemtype="https://schema.org/BlogPosting">
                                <a class="category-post-thumb" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large', array('loading' => 'lazy', 'itemprop' => 'image')); ?>
                                    <?php else : ?>
                                        <span><?php the_title(); ?></span>
                                    <?php endif; ?>
                                </a>

                                <div class="category-post-body">
                                    <!-- <span class="category-post-label"><?php echo esc_html($category_name); ?></span> -->
                                    <h2 itemprop="headline">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <!-- <div class="category-post-meta">
                                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" itemprop="datePublished">
                                            <?php echo esc_html(get_the_date('d/m/Y')); ?>
                                        </time>
                                    </div> -->
                                    <p itemprop="description"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24, '...')); ?></p>
                                    <!-- <a class="category-post-link" href="<?php the_permalink(); ?>">
                                        <span>Đọc thêm</span>
                                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                                    </a> -->
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <?php
                    $pagination_links = paginate_links(array(
                        'total' => $category_query->max_num_pages,
                        'current' => $paged,
                        'mid_size' => 1,
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                        'type' => 'array',
                    ));
                    ?>

                    <?php if ($pagination_links) : ?>
                        <nav class="category-posts-pagination" aria-label="Phân trang bài viết">
                            <ul class="pagination">
                                <?php foreach ($pagination_links as $link) : ?>
                                    <li><?php echo wp_kses_post($link); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="category-posts-empty">
                        <p>Chưa có bài viết nào trong chuyên mục này.</p>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
    </main>
    <?php
}
