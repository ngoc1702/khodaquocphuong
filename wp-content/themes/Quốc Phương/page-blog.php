<?php
/**
 * Template Name: Blog
 */

add_filter('genesis_site_layout', function () {
    return 'full-width-content';
});

add_filter('body_class', function ($classes) {
    $classes[] = 'page_blog';
    $classes[] = 'thanh-hung-blog-template';

    return $classes;
});

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_after_header', 'thanh_hung_render_blog_template');

if (!function_exists('thanh_hung_render_blog_template')) {
    function thanh_hung_render_blog_template()
    {
        $paged = max(1, absint(get_query_var('paged')), absint(get_query_var('page')));
        $blog_query = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 12,
            'paged' => $paged,
        ));
        $page_title = get_the_title() ? get_the_title() : 'Blog';
        $page_content = get_post_field('post_content', get_queried_object_id());
        ?>
        <main class="blog-page">
            <section class="blog-hero">
                <div class="blog-wrap">
                    <header class="blog-heading">
                        <p>Tin tức mới nhất</p>
                        <h1><?php echo esc_html($page_title); ?></h1>
                        <?php if ($page_content) : ?>
                            <div class="blog-intro">
                                <?php echo wp_kses_post(apply_filters('the_content', $page_content)); ?>
                            </div>
                        <?php endif; ?>
                    </header>
                </div>
            </section>

            <section class="blog-list-section">
                <div class="blog-wrap">
                    <?php if ($blog_query->have_posts()) : ?>
                        <div class="blog-grid">
                            <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                                <?php
                                $categories = get_the_category();
                                $category_name = !empty($categories) ? $categories[0]->name : 'Tin tức';
                                ?>
                                <article class="blog-card">
                                    <a class="blog-card-image" href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('large', array('loading' => 'lazy')); ?>
                                        <?php else : ?>
                                            <span><?php the_title(); ?></span>
                                        <?php endif; ?>
                                    </a>
                                    <div class="blog-card-body">
                                        <span class="blog-card-category"><?php echo esc_html($category_name); ?></span>
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 26, '...')); ?></p>
                                        <a class="blog-card-link" href="<?php the_permalink(); ?>">
                                            <span>Xem thêm</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>

                        <?php
                        $pagination_links = paginate_links(array(
                            'total' => $blog_query->max_num_pages,
                            'current' => $paged,
                            'mid_size' => 1,
                            'prev_text' => '&laquo;',
                            'next_text' => '&raquo;',
                            'type' => 'array',
                        ));
                        ?>

                        <?php if ($pagination_links) : ?>
                            <nav class="blog-pagination" aria-label="Phân trang bài viết">
                                <ul class="pagination">
                                    <?php foreach ($pagination_links as $link) : ?>
                                        <li><?php echo wp_kses_post($link); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="blog-empty">
                            <p>Chưa có bài viết nào.</p>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </section>
        </main>
        <?php
    }
}

genesis();
