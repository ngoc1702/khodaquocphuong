<?php
/**
 * Statistics Section Template
 */
?>

<?php if (have_rows('statistics')): ?>
<section class="statistics-section" id="noibat">
    <div class="container">
        <div class="stats-grid">

            <?php while (have_rows('statistics')): the_row();

                $stat_number = get_sub_field('stat_number');
                $stat_description = get_sub_field('stat_description');
                $stat_icon = get_sub_field('stat_icon');
            ?>

                <div class="stat-item">

                    <?php if ($stat_icon): ?>
                        <div class="stat-icon">
                            <img 
                                src="<?php echo esc_url($stat_icon['url']); ?>" 
                                alt="<?php echo esc_attr($stat_description); ?>"
                            >
                        </div>
                    <?php endif; ?>
                    <div>
                    <?php if ($stat_number): ?>
                        <h3 class="stat-number">
                            <?php echo esc_html($stat_number); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($stat_description): ?>
                        <p class="stat-description">
                            <?php echo esc_html($stat_description); ?>
                        </p>
                    <?php endif; ?>
                    </div>
                </div>

            <?php endwhile; ?>

        </div>
    </div>
</section>
<?php endif; ?>