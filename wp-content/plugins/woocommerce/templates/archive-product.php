<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<div class="shop-wrapper">
    <aside class="shop-sidebar">
        <?php
        // Sidebar filter custom
        if ( is_active_sidebar('content-filter') ) {
            dynamic_sidebar('content-filter');
        } else {
            the_widget( 'WC_Widget_Price_Filter' );
        }
        ?>
    </aside>

    <div class="shop-products">
        <?php
        do_action( 'woocommerce_before_main_content' );

        if ( woocommerce_product_loop() ) {

            do_action( 'woocommerce_before_shop_loop' );

            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();

                    do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'product' );
                }
            }

            woocommerce_product_loop_end();

            do_action( 'woocommerce_after_shop_loop' );
        } else {
            do_action( 'woocommerce_no_products_found' );
        }

        do_action( 'woocommerce_after_main_content' );
        ?>
    </div>
</div>

<?php get_footer( 'shop' ); ?>
