<?php
/**
 * WooCommerce product archive.
 */

if (!defined('ABSPATH')) {
	exit;
}

add_filter('genesis_site_layout', function () {
	return 'full-width-content';
});

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_after_header', 'quoc_phuong_render_product_archive_page');

genesis();
