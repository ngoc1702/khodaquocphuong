<?php
$hero_main_title       = get_field('hero_main_title');
$hero_sub_title        = get_field('hero_sub_title');
$hero_description      = get_field('hero_description');
$hero_image            = get_field('hero_image');
$hero_primary_button   = get_field('hero_primary_button');
$hero_secondary_button = get_field('hero_secondary_button');
$benefits = array();

for ($i = 1; $i <= 3; $i++) {
    $title = get_field("benefit_{$i}_title");
    $desc  = get_field("benefit_{$i}_description");
    $icon  = get_field("benefit_{$i}_icon");

    if ($title || $desc || $icon) {
        $benefits[] = array(
            'title' => $title,
            'description' => $desc,
            'icon' => $icon,
        );
    }
}
?>

<section class="landing-hero"
    style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
    <div class="landing-hero__inner">
    <div class=" landing-hero__content">

        <h1 class="title">
            <?php echo esc_html($hero_main_title); ?>
            <span><?php echo esc_html($hero_sub_title); ?></span>
        </h1>

        <p class="desc"><?php echo esc_html($hero_description); ?></p>
     <?php if (have_rows('why_choose_benefits')) : ?>
    <div class="hero-benefits">
        <?php while (have_rows('why_choose_benefits')) : the_row(); ?>
            <?php
            $icon  = get_sub_field('benefit_icon');
            $title = get_sub_field('benefit_title');
            $desc  = get_sub_field('benefit_description');
            ?>

            <div class="hero-benefit">
                <?php if (!empty($icon['url'])) : ?>
                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($title); ?>">
                <?php endif; ?>

                <div>
                    <?php if ($title) : ?>
                        <h4><?php echo esc_html($title); ?></h4>
                    <?php endif; ?>

                    <?php if ($desc) : ?>
                        <p><?php echo esc_html($desc); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
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
    </div>
</section>