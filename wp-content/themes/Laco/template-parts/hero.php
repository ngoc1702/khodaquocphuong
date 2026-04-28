<?php
$hero_main_title       = get_field('hero_main_title');
$hero_sub_title        = get_field('hero_sub_title');
$hero_description      = get_field('hero_description');
$hero_image            = get_field('hero_image');
$hero_primary_button   = get_field('hero_primary_button');
$hero_secondary_button = get_field('hero_secondary_button');
?>

<section class="landing-hero"
    style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">

    <div class="wrap landing-hero__content">

        <h1 class="title">
            <?php echo esc_html($hero_main_title); ?>
            <span><?php echo esc_html($hero_sub_title); ?></span>
        </h1>

        <p class="desc"><?php echo esc_html($hero_description); ?></p>

        <div class="buttons">
            <?php if ($hero_primary_button): ?>
                <a class="btn btn-primary"
                   href="<?php echo esc_url($hero_primary_button['url']); ?>">
                   <?php echo esc_html($hero_primary_button['title']); ?>
                </a>
            <?php endif; ?>

            <?php if ($hero_secondary_button): ?>
                <a class="btn btn-outline"
                   href="<?php echo esc_url($hero_secondary_button['url']); ?>">
                   <?php echo esc_html($hero_secondary_button['title']); ?>
                </a>
            <?php endif; ?>
        </div>

    </div>
</section>