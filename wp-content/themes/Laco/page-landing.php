<?php
/*
Template Name: Landing Page
*/

add_filter( 'genesis_site_layout', 'caia_landing_layout' );
function caia_landing_layout() {
    return 'full-width-content';
}

// Xóa post-info và post-meta
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// Xóa loop mặc định
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Xóa section trước footer nếu không muốn hiện
remove_action( 'genesis_before_footer', 'caia_add_content_after_footer', 8 );

// Thêm layout landing vào genesis_loop
add_action( 'genesis_after_header', 'caia_add_page_landing');
function caia_add_page_landing() {
    ?>
    <main id="main-landing" class="landing-page">

        <?php get_template_part( 'template-parts/hero' ); ?>

        <?php get_template_part( 'template-parts/why-choose-us' ); ?>

        <?php get_template_part( 'template-parts/featured-courses'); ?>

        <?php get_template_part( 'template-parts/statistics'); ?>

        <?php get_template_part( 'template-parts/testimonials' ); ?>

        <?php get_template_part( 'template-parts/cta-section' ); ?>

        <?php get_template_part( 'template-parts/fqa-section' ); ?>

        <?php get_template_part( 'template-parts/hinhanh-section' ); ?>
       
    </main>
    <?php
}

genesis();