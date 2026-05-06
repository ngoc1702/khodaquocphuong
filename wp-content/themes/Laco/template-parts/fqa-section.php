<?php
$faq_title = get_field('faq_title');
$faq_description = get_field('faq_description');
?>

<?php if (have_rows('faq_items')): ?>
<section class="faq-section" id="cauhoi">
    <div class="container">
       <div class="fqa-header">
        <?php if ($faq_title): ?>
            <h2 class="faq-heading">
                <?php echo wp_kses_post($faq_title); ?>
            </h2>
        <?php endif; ?>
          <?php if ($faq_description): ?>
                    <p class="section-description"><?php echo esc_html($faq_description); ?></p>
                <?php endif; ?>
        </div>
        <div class="faq-grid">
            <?php $i = 0; ?>
            <?php while (have_rows('faq_items')): the_row();
                $i++;
                $question = get_sub_field('question');
                $answer = get_sub_field('answer');
            ?>

                <div class="faq-item <?php echo $i === 1 ? 'active' : ''; ?>">
                    <button class="faq-question" type="button">
                        <span><?php echo esc_html($question); ?></span>
                        <span class="faq-icon"></span>
                    </button>

                    <?php if ($answer): ?>
                        <div class="faq-answer">
                            <p><?php echo esc_html($answer); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

            <?php endwhile; ?>
        </div>

    </div>
</section>
<?php endif; ?>