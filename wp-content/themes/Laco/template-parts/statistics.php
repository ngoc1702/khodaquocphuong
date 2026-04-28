<?php
/**
 * Statistics Section Template
 */

$stats = get_field('statistics', 'option');
?>

<?php if ($stats && have_rows('statistics')): ?>
    <section class="statistics-section" style="background: #1F5BA8;">
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
                                <img src="<?php echo esc_url($stat_icon['url']); ?>" alt="<?php echo esc_attr($stat_description); ?>" />
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($stat_number): ?>
                            <h3 class="stat-number"><?php echo esc_html($stat_number); ?></h3>
                        <?php endif; ?>
                        
                        <?php if ($stat_description): ?>
                            <p class="stat-description"><?php echo esc_html($stat_description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
