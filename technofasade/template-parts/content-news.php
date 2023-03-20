<?php
$args = array(
    'posts_per_page' => 10,
    'post_type' => 'post',
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>

    <div class="news__wrap">
        <div class="container">
            <div class="news__heading" data-aos="fade-up">
                <div class="news__backtext">
                    Интересное
                </div>
                <div class="news__heading-content">
                    Новости
                </div>
            </div>

            <ul class="news__list">
                <?php while ($query->have_posts()) :
                    $query->the_post(); ?>
                    <li class="news__news-item news-item" data-aos="fade-right" data-aos-delay="<?= $query->current_post * 150; ?>">
                        <?php get_template_part('template-parts/content', 'news-item'); ?>
                    </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>

            <div data-aos="fade-up"><a href="<?= get_permalink(get_option('page_for_posts')); ?>" class="news__link" data-animate-link> Все новости </a></div>
        </div>
    </div>

<?php endif; ?>