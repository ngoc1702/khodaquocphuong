<?php

// Bật HTML5
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));


// Thêm ACF Trang chủ Configuration
include('acf-trangchu.php');

// Thêm ACF Giới thiệu Configuration
include('acf-gioithieu.php');
include('acf-lienhe.php');

// Thêm caiajs
include('js/caiajs.php');

// Thêm jquery
add_action('wp_enqueue_scripts', 'caia_add_scripts_homes');
function caia_add_scripts_homes()
{
	wp_enqueue_script('caia-slick', CHILD_URL . '/custom/js/slick.js', array('jquery'));
}

function add_swiper_webcomponent_script()
{
	echo '<script type="module">
      import "https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js";
    </script>';
}
add_action('wp_footer', 'add_swiper_webcomponent_script');


add_action('wp_enqueue_scripts', 'custom_override_style', 100);
function custom_override_style()
{
	// Đảm bảo đúng với theme con
	$style_path = get_stylesheet_directory() . '/style.css';
	$version = file_exists($style_path) ? filemtime($style_path) : time();

	// Handle thực tế (cập nhật lại nếu bạn tìm thấy tên khác sau bước kiểm tra)
	$handle = 'caia';

	// Gỡ bỏ và thêm lại
	wp_dequeue_style($handle);
	wp_deregister_style($handle);
	wp_enqueue_style($handle, get_stylesheet_uri(), array(), $version);
}

add_action('wp_enqueue_scripts', 'caia_enqueue_water_care_landing_assets', 120);
function caia_enqueue_water_care_landing_assets()
{
	$is_landing = is_page_template('page-landing.php');

	if (!$is_landing && is_singular()) {
		$post = get_post();
		$is_landing = $post && has_shortcode($post->post_content, 'landing_page');
	}

	if (!$is_landing) {
		return;
	}

	$css_path = get_stylesheet_directory() . '/assets/css/water-care-landing.css';
	$js_path = get_stylesheet_directory() . '/assets/js/water-care-landing.js';

	if (file_exists($css_path)) {
		wp_enqueue_style(
			'aquira-water-care-landing',
			get_stylesheet_directory_uri() . '/assets/css/water-care-landing.css',
			array('caia'),
			filemtime($css_path)
		);
	}

	if (file_exists($js_path)) {
		wp_enqueue_script(
			'aquira-water-care-landing',
			get_stylesheet_directory_uri() . '/assets/js/water-care-landing.js',
			array('jquery'),
			filemtime($js_path),
			true
		);
	}
}
//Cho phép upload ảnh định dạng Svg
add_filter('upload_mimes', 'caia_mime_types', 1, 1);
function caia_mime_types($mime_types)
{
	$mime_types['svg'] = 'image/svg+xml';
	$mime_types['webp'] = 'image/webp';
	return $mime_types;
}

add_filter('wp_check_filetype_and_ext', 'caia_disable_real_mime_check', 10, 4);
function caia_disable_real_mime_check($data, $file, $filename, $mimes)
{
	$wp_filetype = wp_check_filetype($filename, $mimes);
	$ext = $wp_filetype['ext'];
	$type = $wp_filetype['type'];
	$proper_filename = $data['proper_filename'];
	return compact('ext', 'type', 'proper_filename');
}

// Xóa các kích thước mặc định trong Wordpress
add_filter('intermediate_image_sizes_advanced', 'prefix_remove_default_images');
function prefix_remove_default_images($sizes)
{
	unset($sizes['medium']);
	unset($sizes['large']);
	unset($sizes['medium_large']);
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}

// Ẩn hiển thị các kích thước ảnh mặc định
add_filter('intermediate_image_sizes', function ($sizes) {
	return array_filter($sizes, function ($val) {
		return 'medium' !== $val && 'medium_large' !== $val && 'large' !== $val && '1536x1536' !== $val && '2048x2048' !== $val;
	});
});

// Đặt kích thước mặc định cho website
update_option('thumbnail_size_w', 750);
update_option('thumbnail_size_h', 395);

// Thêm kích thước ảnh sản phẩm
add_image_size('product-image', 640, 640, true);
add_image_size('product-avatar', 300, 300, true);

add_filter('image_size_names_choose', 'caia_custom_sizes');
function caia_custom_sizes($sizes)
{
	return array_merge($sizes, array(
		'product-image' => __('Kích thước 640x640'),
	));
}

// WooCommerce product archive layout.
add_filter('loop_shop_per_page', 'quoc_phuong_shop_products_per_page', 20);
function quoc_phuong_shop_products_per_page($per_page)
{
	return 16;
}

add_filter('register_post_type_args', 'quoc_phuong_product_post_type_args', 20, 2);
function quoc_phuong_product_post_type_args($args, $post_type)
{
	if ('product' !== $post_type) {
		return $args;
	}

	$args['has_archive'] = 'san-pham';
	$args['rewrite'] = wp_parse_args(
		isset($args['rewrite']) && is_array($args['rewrite']) ? $args['rewrite'] : array(),
		array(
			'slug' => 'san-pham',
			'with_front' => false,
		)
	);
	$args['rewrite']['slug'] = 'san-pham';
	$args['rewrite']['with_front'] = false;

	return $args;
}

add_filter('post_type_link', 'quoc_phuong_product_single_permalink', 10, 2);
function quoc_phuong_product_single_permalink($link, $post)
{
	if (!$post || 'product' !== $post->post_type || empty($post->post_name)) {
		return $link;
	}

	return home_url(user_trailingslashit('san-pham/' . $post->post_name, 'single-product'));
}

function quoc_phuong_get_product_archive_current_term()
{
	if (is_tax('product_cat')) {
		$term = get_queried_object();

		return ($term && !is_wp_error($term) && !empty($term->term_id)) ? $term : null;
	}

	$request_path = quoc_phuong_get_current_request_path();

	if (quoc_phuong_is_product_single_request_path($request_path)) {
		return null;
	}

	if (preg_match('#^san-pham/([^/]+)(?:/page/[0-9]+)?/?$#', $request_path, $matches)) {
		$term = get_term_by('slug', sanitize_title($matches[1]), 'product_cat');

		return ($term && !is_wp_error($term) && !empty($term->term_id)) ? $term : null;
	}

	return null;
}

function quoc_phuong_get_product_category_path($term)
{
	$term = is_object($term) ? $term : get_term($term, 'product_cat');

	if (!$term || is_wp_error($term) || empty($term->slug)) {
		return '';
	}

	return $term->slug;
}

function quoc_phuong_get_product_category_link($term)
{
	$term_path = quoc_phuong_get_product_category_path($term);

	if (!$term_path) {
		return '';
	}

	return home_url(user_trailingslashit('san-pham/' . $term_path, 'product_cat'));
}

function quoc_phuong_get_current_request_path()
{
	$request_uri = isset($_SERVER['REQUEST_URI']) ? (string) wp_unslash($_SERVER['REQUEST_URI']) : '';
	$request_path = (string) wp_parse_url($request_uri, PHP_URL_PATH);
	$home_path = trim((string) wp_parse_url(home_url('/'), PHP_URL_PATH), '/');
	$request_path = trim($request_path, '/');

	if ($home_path && 0 === strpos($request_path, $home_path . '/')) {
		$request_path = trim(substr($request_path, strlen($home_path)), '/');
	}

	return $request_path;
}

function quoc_phuong_get_product_slug_from_single_path($request_path)
{
	if (!preg_match('#^san-pham/([^/]+)/?$#', trim($request_path, '/'), $matches)) {
		return '';
	}

	return sanitize_title($matches[1]);
}

function quoc_phuong_get_product_id_by_slug($slug)
{
	$slug = sanitize_title($slug);

	if (!$slug) {
		return 0;
	}

	$product = get_page_by_path($slug, OBJECT, 'product');

	if (!$product || is_wp_error($product) || 'publish' !== $product->post_status) {
		return 0;
	}

	return (int) $product->ID;
}

function quoc_phuong_is_product_single_request_path($request_path)
{
	$product_slug = quoc_phuong_get_product_slug_from_single_path($request_path);

	return $product_slug ? (bool) quoc_phuong_get_product_id_by_slug($product_slug) : false;
}

function quoc_phuong_is_product_category_active($term, $current_term)
{
	if (!$term || !$current_term) {
		return false;
	}

	if ((int) $term->term_id === (int) $current_term->term_id) {
		return true;
	}

	$ancestors = get_ancestors($current_term->term_id, 'product_cat');

	return in_array((int) $term->term_id, array_map('intval', $ancestors), true);
}

function quoc_phuong_render_product_categories_nav($current_term = null)
{
	if (!taxonomy_exists('product_cat')) {
		return;
	}

	$terms = get_terms(array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		'parent' => 0,
		'orderby' => 'menu_order',
		'order' => 'ASC',
	));

	if (empty($terms) || is_wp_error($terms)) {
		$terms = get_terms(array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
			'orderby' => 'menu_order',
			'order' => 'ASC',
		));
	}

	if (empty($terms) || is_wp_error($terms)) {
		return;
	}

	$terms = array_filter($terms, function ($term) {
		return !in_array($term->slug, array('uncategorized', 'chua-phan-loai'), true);
	});

	if (empty($terms)) {
		return;
	}

	echo '<nav class="qp-shop-categories" aria-label="Danh mục sản phẩm">';
	echo '<div class="qp-shop-category-grid">';

	foreach ($terms as $term) {
		$term_link = quoc_phuong_get_product_category_link($term);

		if (!$term_link) {
			continue;
		}

		$thumbnail_id = (int) get_term_meta($term->term_id, 'thumbnail_id', true);
		$image_url = $thumbnail_id ? wp_get_attachment_image_url($thumbnail_id, 'large') : '';

		if (!$image_url && function_exists('wc_placeholder_img_src')) {
			$image_url = wc_placeholder_img_src('woocommerce_thumbnail');
		}

		$is_active = quoc_phuong_is_product_category_active($term, $current_term);
		$classes = 'qp-shop-category-card' . ($is_active ? ' is-active' : '');

		echo '<a class="' . esc_attr($classes) . '" href="' . esc_url($term_link) . '">';
		echo '<span class="qp-shop-category-image">';

		if ($image_url) {
			echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($term->name) . '" loading="lazy" decoding="async">';
		}

		echo '</span>';
		echo '<span class="qp-shop-category-name">' . esc_html($term->name) . '</span>';
		echo '</a>';
	}

	echo '</div>';
	echo '</nav>';
}

function quoc_phuong_get_product_archive_query($paged = 1)
{
	$tax_query = array();
	$current_term = quoc_phuong_get_product_archive_current_term();

	if ($current_term) {
		$tax_query[] = array(
			'taxonomy' => 'product_cat',
			'field' => 'term_id',
			'terms' => array((int) $current_term->term_id),
		);
	}

	if (function_exists('wc_get_product_visibility_term_ids')) {
		$product_visibility_terms = wc_get_product_visibility_term_ids();

		if (!empty($product_visibility_terms['exclude-from-catalog'])) {
			$tax_query[] = array(
				'taxonomy' => 'product_visibility',
				'field' => 'term_taxonomy_id',
				'terms' => array((int) $product_visibility_terms['exclude-from-catalog']),
				'operator' => 'NOT IN',
			);
		}
	}

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => 16,
		'paged' => max(1, (int) $paged),
		'orderby' => array(
			'menu_order' => 'ASC',
			'date' => 'DESC',
		),
	);

	if (!empty($tax_query)) {
		$args['tax_query'] = array_merge(array('relation' => 'AND'), $tax_query);
	}

	return new WP_Query($args);
}

function quoc_phuong_render_product_archive_card($product_id)
{
	$product_title = get_the_title($product_id);
	$product_link = get_permalink($product_id);
	$product_image = get_the_post_thumbnail_url($product_id, 'large');

	if (!$product_image && function_exists('wc_placeholder_img_src')) {
		$product_image = wc_placeholder_img_src('woocommerce_thumbnail');
	}

	echo '<article class="home-featured-product-card qp-shop-product-card">';
	echo '<a class="home-featured-product-image" href="' . esc_url($product_link) . '">';

	if ($product_image) {
		echo '<img src="' . esc_url($product_image) . '" alt="' . esc_attr($product_title) . '" loading="lazy" decoding="async">';
	}

	echo '</a>';
	echo '<h3><a href="' . esc_url($product_link) . '">' . esc_html($product_title) . '</a></h3>';
	echo '<a class="home-featured-product-btn" href="' . esc_url($product_link) . '">Nhận tư vấn</a>';
	echo '</article>';
}

function quoc_phuong_render_product_archive_pagination($query)
{
	if (!$query || (int) $query->max_num_pages <= 1) {
		return;
	}

	$current_page = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
	$total_pages = (int) $query->max_num_pages;

	echo '<nav class="qp-shop-pagination" aria-label="Phân trang sản phẩm">';

	if ($current_page > 1) {
		echo '<a class="qp-shop-page-link qp-shop-page-link--edge" href="' . esc_url(get_pagenum_link(1)) . '">Trang đầu</a>';
	} else {
		echo '<span class="qp-shop-page-link qp-shop-page-link--edge is-disabled">Trang đầu</span>';
	}

	echo paginate_links(array(
		'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'format' => '?paged=%#%',
		'current' => $current_page,
		'total' => $total_pages,
		'mid_size' => 2,
		'end_size' => 1,
		'prev_next' => false,
		'type' => 'plain',
	));

	if ($current_page < $total_pages) {
		echo '<a class="qp-shop-page-link qp-shop-page-link--edge" href="' . esc_url(get_pagenum_link($total_pages)) . '">Trang cuối</a>';
	} else {
		echo '<span class="qp-shop-page-link qp-shop-page-link--edge is-disabled">Trang cuối</span>';
	}

	echo '</nav>';
}

function quoc_phuong_render_product_archive_page()
{
	static $rendered = false;

	if ($rendered) {
		return;
	}

	$rendered = true;

	$current_term = quoc_phuong_get_product_archive_current_term();
	$paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
	$products = quoc_phuong_get_product_archive_query($paged);
	$archive_title = $current_term ? $current_term->name : 'Sản phẩm';

	echo '<div class="qp-shop-page">';
	echo '<div class="qp-shop-wrap">';

	quoc_phuong_render_product_categories_nav($current_term);

	echo '<header class="qp-shop-heading">';
	echo '<h1>' . esc_html($archive_title) . '</h1>';
	echo '</header>';

	if ($products->have_posts()) {
		echo '<div class="home-featured-products-grid qp-shop-products-grid">';

		while ($products->have_posts()) {
			$products->the_post();
			quoc_phuong_render_product_archive_card(get_the_ID());
		}

		echo '</div>';
		quoc_phuong_render_product_archive_pagination($products);
	} else {
		echo '<div class="qp-shop-empty">Chưa có sản phẩm trong danh mục này.</div>';
	}

	echo '</div>';
	echo '</div>';

	wp_reset_postdata();
}

add_action('genesis_after_header', 'quoc_phuong_maybe_render_product_archive_from_route', 5);
function quoc_phuong_maybe_render_product_archive_from_route()
{
	$request_path = quoc_phuong_get_current_request_path();

	if (is_singular('product') || quoc_phuong_is_product_single_request_path($request_path)) {
		return;
	}

	$is_product_route = 'san-pham' === $request_path
		|| is_post_type_archive('product')
		|| (function_exists('is_shop') && is_shop())
		|| is_tax('product_cat');

	if (!$is_product_route && preg_match('#^san-pham/([^/]+)(?:/page/[0-9]+)?/?$#', $request_path, $matches)) {
		$product_category = get_term_by('slug', sanitize_title($matches[1]), 'product_cat');
		$is_product_route = $product_category && !is_wp_error($product_category);
	}

	if (!$is_product_route) {
		return;
	}

	quoc_phuong_render_product_archive_page();
}

add_action('init', 'quoc_phuong_register_clean_archive_rewrites', 20);
function quoc_phuong_register_clean_archive_rewrites()
{
	add_rewrite_rule('^san-pham/?$', 'index.php?post_type=product', 'top');
	add_rewrite_rule('^san-pham/page/([0-9]{1,})/?$', 'index.php?post_type=product&paged=$matches[1]', 'top');
	add_rewrite_rule('^san-pham/([^/]+)/?$', 'index.php?post_type=product&name=$matches[1]', 'top');
	add_rewrite_rule('^san-pham/([^/]+)/page/([0-9]{1,})/?$', 'index.php?product_cat=$matches[1]&paged=$matches[2]', 'top');

	$categories = get_categories(array(
		'hide_empty' => false,
	));

	foreach ($categories as $category) {
		$category_path = get_category_parents($category, false, '/', true);

		if (is_wp_error($category_path) || empty($category_path)) {
			continue;
		}

		$category_path = trim($category_path, '/');

		add_rewrite_rule('^' . preg_quote($category_path, '#') . '/?$', 'index.php?category_name=' . $category_path, 'top');
		add_rewrite_rule('^' . preg_quote($category_path, '#') . '/page/([0-9]{1,})/?$', 'index.php?category_name=' . $category_path . '&paged=$matches[1]', 'top');
	}
}

add_action('init', 'quoc_phuong_flush_clean_archive_rewrites_once', 99);
function quoc_phuong_flush_clean_archive_rewrites_once()
{
	$rewrite_version = '20260708_clean_archives_product_single_2';

	if (get_option('quoc_phuong_rewrite_version') === $rewrite_version) {
		return;
	}

	flush_rewrite_rules(false);
	update_option('quoc_phuong_rewrite_version', $rewrite_version, false);
}

add_filter('post_type_archive_link', 'quoc_phuong_product_archive_link', 10, 2);
function quoc_phuong_product_archive_link($link, $post_type)
{
	if ('product' !== $post_type) {
		return $link;
	}

	return home_url('/san-pham/');
}

add_filter('woocommerce_get_shop_page_permalink', 'quoc_phuong_woocommerce_shop_page_permalink');
function quoc_phuong_woocommerce_shop_page_permalink($permalink)
{
	return home_url('/san-pham/');
}

add_filter('page_link', 'quoc_phuong_shop_page_link', 10, 2);
function quoc_phuong_shop_page_link($link, $post_id)
{
	if (!function_exists('wc_get_page_id')) {
		return $link;
	}

	if ((int) $post_id !== (int) wc_get_page_id('shop')) {
		return $link;
	}

	return home_url('/san-pham/');
}

add_filter('term_link', 'quoc_phuong_product_category_term_link', 10, 3);
function quoc_phuong_product_category_term_link($link, $term, $taxonomy)
{
	if ('product_cat' !== $taxonomy) {
		return $link;
	}

	$term_link = quoc_phuong_get_product_category_link($term);

	return $term_link ?: $link;
}

add_filter('template_include', 'quoc_phuong_use_product_archive_template', 99);
function quoc_phuong_use_product_archive_template($template)
{
	if (is_singular('product')) {
		return $template;
	}

	$request_path = quoc_phuong_get_current_request_path();

	if (quoc_phuong_is_product_single_request_path($request_path)) {
		return $template;
	}

	$is_product_category_route = is_tax('product_cat');

	if (!$is_product_category_route && preg_match('#^san-pham/([^/]+)(?:/page/[0-9]+)?/?$#', $request_path, $matches)) {
		$product_category = get_term_by('slug', sanitize_title($matches[1]), 'product_cat');
		$is_product_category_route = $product_category && !is_wp_error($product_category);
	}

	if ($is_product_category_route) {
		$product_category_template = get_stylesheet_directory() . '/taxonomy-product_cat.php';

		return file_exists($product_category_template) ? $product_category_template : $template;
	}

	$is_product_archive = is_post_type_archive('product')
		|| (function_exists('is_shop') && is_shop())
		|| is_page('san-pham')
		|| 'san-pham' === $request_path;

	if (!$is_product_archive) {
		return $template;
	}

	$product_archive_template = get_stylesheet_directory() . '/archive-product.php';

	return file_exists($product_archive_template) ? $product_archive_template : $template;
}

add_filter('category_link', 'quoc_phuong_remove_category_base_link', 10, 2);
function quoc_phuong_remove_category_base_link($link, $term_id)
{
	$category = get_category($term_id);

	if (!$category || is_wp_error($category)) {
		return $link;
	}

	$category_path = get_category_parents($category, false, '/', true);

	if (is_wp_error($category_path) || empty($category_path)) {
		return $link;
	}

	return home_url(user_trailingslashit($category_path, 'category'));
}

add_filter('request', 'quoc_phuong_clean_category_request');
function quoc_phuong_clean_category_request($query_vars)
{
	$request_path = quoc_phuong_get_current_request_path();

	if ('san-pham' === $request_path) {
		unset($query_vars['pagename'], $query_vars['name'], $query_vars['page_id']);
		$query_vars['post_type'] = 'product';

		return $query_vars;
	}

	if (preg_match('#^san-pham/page/([0-9]{1,})/?$#', $request_path, $matches)) {
		unset($query_vars['pagename'], $query_vars['name'], $query_vars['page_id'], $query_vars['product']);
		$query_vars['post_type'] = 'product';
		$query_vars['paged'] = absint($matches[1]);

		return $query_vars;
	}

	if (preg_match('#^san-pham/([^/]+)/?$#', $request_path, $matches)) {
		$product_slug = sanitize_title($matches[1]);
		$product_id = quoc_phuong_get_product_id_by_slug($product_slug);

		if ($product_id) {
			unset($query_vars['pagename'], $query_vars['page_id'], $query_vars['product'], $query_vars['product_cat']);
			$query_vars['post_type'] = 'product';
			$query_vars['name'] = $product_slug;

			return $query_vars;
		}
	}

	if (preg_match('#^san-pham/([^/]+)(?:/page/([0-9]+))?/?$#', $request_path, $matches)) {
		$product_category = get_term_by('slug', sanitize_title($matches[1]), 'product_cat');

		if ($product_category && !is_wp_error($product_category)) {
			unset($query_vars['pagename'], $query_vars['name'], $query_vars['page_id'], $query_vars['product']);
			$query_vars['product_cat'] = $product_category->slug;

			if (!empty($matches[2])) {
				$query_vars['paged'] = absint($matches[2]);
			}

			return $query_vars;
		}
	}

	if (preg_match('#^product-category/([^/]+)(?:/page/([0-9]+))?/?$#', $request_path, $matches)) {
		$product_category = get_term_by('slug', sanitize_title($matches[1]), 'product_cat');

		if ($product_category && !is_wp_error($product_category)) {
			unset($query_vars['pagename'], $query_vars['name'], $query_vars['page_id'], $query_vars['product']);
			$query_vars['product_cat'] = $product_category->slug;

			if (!empty($matches[2])) {
				$query_vars['paged'] = absint($matches[2]);
			}

			return $query_vars;
		}
	}

	if (!empty($query_vars['category_name'])) {
		return $query_vars;
	}

	$category_path = '';

	if (!empty($query_vars['pagename'])) {
		$category_path = $query_vars['pagename'];
	} elseif (!empty($query_vars['name'])) {
		$category_path = $query_vars['name'];
	}

	if (!$category_path) {
		return $query_vars;
	}

	$category = get_category_by_path(trim($category_path, '/'));

	if (!$category || is_wp_error($category)) {
		return $query_vars;
	}

	unset($query_vars['pagename'], $query_vars['name'], $query_vars['page_id']);
	$query_vars['category_name'] = trim($category_path, '/');

	return $query_vars;
}

add_action('template_redirect', 'quoc_phuong_redirect_old_archive_urls', 1);
function quoc_phuong_redirect_old_archive_urls()
{
	if (is_admin() || wp_doing_ajax()) {
		return;
	}

	$request_path = quoc_phuong_get_current_request_path();

	if (preg_match('#^product/([^/]+)/?$#', $request_path, $matches)) {
		$product_id = quoc_phuong_get_product_id_by_slug($matches[1]);

		if ($product_id) {
			wp_safe_redirect(get_permalink($product_id), 301);
			exit;
		}
	}

	if (is_category() && 0 === strpos($request_path, 'category/')) {
		wp_safe_redirect(get_category_link(get_queried_object_id()), 301);
		exit;
	}

	if (preg_match('#^product-category/([^/]+)#', $request_path, $matches)) {
		$product_category = get_term_by('slug', sanitize_title($matches[1]), 'product_cat');
		$term_link = $product_category && !is_wp_error($product_category) ? quoc_phuong_get_product_category_link($product_category) : '';

		if ($term_link) {
			wp_safe_redirect($term_link, 301);
			exit;
		}
	}

	if ((is_post_type_archive('product') || (function_exists('is_shop') && is_shop())) && 'shop' === $request_path) {
		wp_safe_redirect(home_url('/san-pham/'), 301);
		exit;
	}
}

// Widget title markup.
add_filter('genesis_register_widget_area_defaults', 'caia_change_all_widget_titles');
function caia_change_all_widget_titles($defaults)
{
	$defaults['before_title'] = '<div class="widget-title widgettitle">';
	$defaults['after_title'] = "</div>";
	return $defaults;
}

// Thêm thẻ đóng mở cho tiêu đề của widget
add_filter('widget_title', 'caia_add_html_widget_title');
function caia_add_html_widget_title($title)
{
	$title = str_replace('[span]', '<span>', $title);
	$title = str_replace('[/span]', '</span>', $title);
	return $title;
}

// Thêm font
add_action('wp_head', 'caia_add_font_website');
function caia_add_font_website()
{
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
	<?php
}

genesis_register_sidebar(
	array(
		'id' => 'header-menusub',
		'name' => 'Toàn bộ - Thanh trên header',
	)
);

function caia_has_header_menusub()
{
	return is_active_sidebar('header-menusub');
}

add_filter('body_class', function ($classes) {
	if (caia_has_header_menusub()) {
		$classes[] = 'has-header-menusub';
	}

	return $classes;
});

add_action('genesis_before_header', function () {
	if (is_active_sidebar('header-menusub')) {
		echo '<div class="header-menusub-widget-area"><div class="wrap">';
		dynamic_sidebar('header-menusub');
		echo '</div></div>';
	}
}, 1);

genesis_register_sidebar(
	array(
		'id' => 'nhantuvan',
		'name' => 'Toàn bộ - Nhận tư vấn',
	)
);

genesis_register_sidebar(
	array(
		'id' => 'content-cta',
		'name' => 'Form - CTA',
	)
);

genesis_register_sidebar(
	array(
		'id' => 'content-bfooter',
		'name' => 'Toàn bộ - Nội dung trước chân trang',
	)
);

genesis_register_sidebar(
	array(
		'id' => 'content-footer',
		'name' => 'Toàn bộ - Nội dung chân trang',
	)
);

genesis_register_sidebar(
	array(
		'id' => 'content-fix',
		'name' => 'Toàn bộ - Nội dung cố định',
	)
);

add_action('genesis_before_header', 'caia_add_contactus');
function caia_add_contactus()
{
	if (is_active_sidebar('nhantuvan')) {
		echo '<div id="nhantuvan" class="nhantuvan section" aria-hidden="true"><div class="wrap" role="dialog" aria-modal="true" aria-label="Nhan tu van bao gia"><button class="nhantuvan-close" type="button" aria-label="Dong form tu van">&times;</button>';
		dynamic_sidebar('nhantuvan');
		echo '</div></div>';
	}
}


remove_action('genesis_footer', 'genesis_do_footer');
add_action('genesis_footer', 'caia_add_content_footer');
function caia_add_content_footer()
{
	if (is_active_sidebar('content-footer')) {
		dynamic_sidebar('Toàn bộ - Nội dung chân trang');
	}
}

add_action('genesis_before_footer', 'caia_add_content_after_footer', 8);
function caia_add_content_after_footer()
{
	echo '<div data-aos="fade-up" class="content-contact section"><div class="wrap">';
	dynamic_sidebar('Toàn bộ - Liên hệ tư vấn');
	echo '</div></div>';
}

add_action('genesis_before_footer', 'caia_add_content_cta', 9);
function caia_add_content_cta()
{
	if (is_active_sidebar('content-cta')) {
		echo '<div class="content-cta section"><div class="wrap">';
		dynamic_sidebar('content-cta');
		echo '</div></div>';
	}
}

add_action('genesis_before_footer', 'caia_add_content_after_footer2');
function caia_add_content_after_footer2()
{
	if (is_active_sidebar('content-bfooter')) {
		echo '<div class="before_footer section"><div class="wrap">';
		dynamic_sidebar('content-bfooter');
		echo '</div></div>';
	}
}

add_action('genesis_after_footer', 'caia_add_content_fix');
function caia_add_content_fix()
{
	if (is_active_sidebar('content-fix')) {
		echo '<div class="content-fix">';
		dynamic_sidebar('Toàn bộ - Nội dung cố định');
		echo '</div>';
	}
}


add_action('genesis_before', function () {
	// Xóa sidebar mặc định của Genesis trước khi render
	remove_action('genesis_sidebar', 'genesis_do_sidebar');
});

add_action('genesis_sidebar', function () {

	if (is_singular('post')) {
		genesis_widget_area(
			'sidebar',
			['before' => '<aside class="sidebar primary-sidebar widget-area">', 'after' => '</aside>']
		);

		// Các trang khác, trừ sản phẩm
	} elseif (!is_singular('product')) {
		genesis_widget_area(
			'sidebar',
			['before' => '<aside class="sidebar primary-sidebar widget-area">', 'after' => '</aside>']
		);
	}
});

// Chỉnh hiển thị nút Next Page và Previous Page trong phân trang
add_filter('genesis_next_link_text', 'caia_next_page_link');
function caia_next_page_link($text)
{
	return '&#x000BB;';
}

add_filter('genesis_prev_link_text', 'caia_previous_page_link');
function caia_previous_page_link($text)
{
	return '&#x000AB;';
}

// Thay đổi vị trí breadcrumbs
remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');
// add_action( 'genesis_after_header', 'genesis_do_breadcrumbs',9);

// Tùy biến breadcrumbs trong Genesis
// ✅ Shortcode hiển thị breadcrumb tùy chỉnh
function my_custom_breadcrumb_shortcode()
{
	// Thiết lập tham số breadcrumb
	$args = array(
		'home' => '<span class="home">Trang chủ</span>',
		'sep' => '<span aria-label="breadcrumb separator" class="label"> » </span>',
		'list_sep' => ', ',
		'prefix' => '<div class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList"><div class="wrap"><div class="thanhdieuhuong">',
		'suffix' => '</div></div></div>',
		'heirarchial_attachments' => true,
		'heirarchial_categories' => true,
		'labels' => array(
			'prefix' => '',
			'author' => '',
			'category' => '',
			'tag' => '',
			'date' => '',
			'search' => '',
			'tax' => '',
			'post_type' => '',
			'404' => '',
		),
	);

	// Nếu bạn dùng Genesis
	if (function_exists('genesis_breadcrumb')) {
		ob_start();
		genesis_breadcrumb($args);
		return ob_get_clean();
	}

	// Nếu không có Genesis, bạn có thể thay bằng breadcrumb tĩnh hoặc plugin khác
	return '<div class="breadcrumb"><a href="/">Trang chủ</a> » ...</div>';
}
add_shortcode('breadcrumb', 'my_custom_breadcrumb_shortcode');



// Thiết kế lại form comment
add_filter('comment_form_defaults', 'rayno_comment_form_args');
function rayno_comment_form_args($defaults)
{
	global $user_identity, $id;
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? ' aria-required="true"' : '');
	$author = '<div class="popup-comment"><div class="box-comment"><span class="close-popup-comment">✕</span><p>Bạn vui lòng điền thêm thông tin!</p><p class="comment-form-author">' .
		'<input id="author" name="author" type="text" class="author" placeholder="Họ và tên" value="' . esc_attr($commenter['comment_author']) . '" size="30" tabindex="1"' . $aria_req . '/>' .
		'</p>';
	$email = '<p class="comment-form-email">' .
		'<input id="email" name="email" type="text" class="email" placeholder="Email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" tabindex="2"' . $aria_req . ' />' .
		'</p>';
	$comment_field = '<p class="comment-form-comment">' .
		'<textarea id="comment" name="comment" cols="45" rows="8" class="form" tabindex="4" aria-required="true" placeholder="Nội dung bình luận"></textarea>' .
		'</p>';
	$args = array(
		'fields' => array(
			'author' => $author,
			'email' => $email,
		),
		'comment_field' => $comment_field,
		'title_reply' => __('Bình luận của bạn', 'genesis'),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
	);
	$args = wp_parse_args($args, $defaults);
	return apply_filters('raynoblog_comment_form_args', $args, $user_identity, $id, $commenter, $req, $aria_req);
}

// Sửa nút comment
add_filter('comment_form_defaults', 'caia_change_submit_comment');
function caia_change_submit_comment($defaults)
{
	$defaults['label_submit'] = 'Gửi đi';
	return $defaults;
}

// Sửa chữ comment
add_filter('genesis_title_comments', 'caia_title_comments');
function caia_title_comments()
{
	echo '';
}

// Thay đổi chữ says
add_filter('comment_author_says_text', 'caia_change_says');
function caia_change_says($args)
{
	$args = 'đã bình luận';
	return $args;
}

// Sửa thẻ h4 ý kiến của bạn
add_filter('comment_form_defaults', 'caia_custom_reply_title');
function caia_custom_reply_title($defaults)
{
	$defaults['title_reply_before'] = '<p id="reply-title" class="comment-reply-title">';
	$defaults['title_reply_after'] = '</p>';
	return $defaults;
}

// Thêm nút comment
add_action('comment_form_logged_in_after', 'additional_fields', 1);
add_action('comment_form_after_fields', 'additional_fields', 1);
function additional_fields()
{
	if (!is_user_logged_in()) {
		echo '<p class="comment-form-phone"><input id="author" name="phone" type="text" size="30" tabindex="4" placeholder="Số điện thoại"/></p>
		<p><input name="actionsubmit" type="hidden" value="1" /><input id="submit-commnent" name="submit-commnent" type="submit" value="Hoàn tất" /></p></div></div>';
	}
}

// Lưu nội dung comment 
add_action('comment_post', 'save_comment_meta_data');
function save_comment_meta_data($comment_id)
{
	if ((isset($_POST['phone'])) && ($_POST['phone'] != ''))
		$phone = wp_filter_nohtml_kses($_POST['phone']);
	add_comment_meta($comment_id, 'phone', $phone);
}

// Add the filter to check if the comment meta data has been filled or not
add_filter('preprocess_comment', 'verify_comment_meta_data', 1, 1);
function verify_comment_meta_data($commentdata)
{
	$commentdata['phone'] = (!empty($_POST['phone'])) ? sanitize_text_field($_POST['phone']) : false;
	if (!$commentdata['phone'] && !is_admin()) {
		wp_die(__('<p>Lỗi: Vui lòng điền số điện thoại</p><a href="javascript:history.back()">« Quay lại</a>'));
	}
	return $commentdata;
}

// Thêm nút trong trang quản trị 
add_action('add_meta_boxes_comment', 'extend_comment_add_meta_box');
function extend_comment_add_meta_box()
{
	add_meta_box('title', __('Thông tin số điện thoại khách hàng'), 'extend_comment_meta_box', 'comment', 'normal', 'high');
}

function extend_comment_meta_box($comment)
{
	$phone = get_comment_meta($comment->comment_ID, 'phone', true);
	wp_nonce_field('extend_comment_update', 'extend_comment_update', false);
	?>
	<p><label for="phone"><?php _e('Số điện thoại'); ?></label><input type="text" name="phone"
			value="<?php echo esc_attr($phone); ?>" class="widefat" /></p>
	<?php
}

// Cập nhật khi thay đổi 
add_action('edit_comment', 'extend_comment_edit_metafields');
function extend_comment_edit_metafields($comment_id)
{
	if (!isset($_POST['extend_comment_update']) || !wp_verify_nonce($_POST['extend_comment_update'], 'extend_comment_update'))
		return;
	if ((isset($_POST['phone'])) && ($_POST['phone'] != '')):
		$phone = wp_filter_nohtml_kses($_POST['phone']);
		update_comment_meta($comment_id, 'phone', $phone);
	else:
		delete_comment_meta($comment_id, 'phone');
	endif;
}

//Thêm cột số điện thoại trong admin
add_filter('manage_edit-comments_columns', 'myplugin_comment_columns');
function myplugin_comment_columns($columns)
{
	return array_merge($columns, array(
		'phone' => __('Số điện thoại'),
	));
}

add_filter('manage_comments_custom_column', 'myplugin_comment_column', 10, 2);
function myplugin_comment_column($column, $comment_ID)
{
	switch ($column) {
		case 'phone':
			if ($meta = get_comment_meta($comment_ID, $column, true)) {
				echo $meta;
			} else {
				echo '-';
			}
			break;
	}
}

add_action('admin_head', 'my_column_width');
function my_column_width()
{
	echo '<style type="text/css">';
	echo 'th#phone {width: 15%;}';
	echo '</style>';
}







// Mobile
if (wp_is_mobile()) {
	// remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
	// wp_enqueue_style( 'style-mobile', CHILD_URL.'/style-mobile.css' );

}


function add_fontawesome_to_theme()
{
	wp_enqueue_style(
		'font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
		array(),
		'6.5.0'
	);
}
add_action('wp_enqueue_scripts', 'add_fontawesome_to_theme');


